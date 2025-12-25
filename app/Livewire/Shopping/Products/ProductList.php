<?php

namespace App\Livewire\Shopping\Products;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.ecommerce.app')]
class ProductList extends Component
{
    public $products;
    public $sortBy = 'featured';
    public $viewMode = 'grid';

    public function mount()
    {
        $this->loadProducts();
    }

    public function loadProducts()
    {
        $query = Product::where('stock_quantity', '>', 0);

        switch ($this->sortBy) {
            case 'price_low':
                $query->orderBy('price', 'asc');
                break;
            case 'price_high':
                $query->orderBy('price', 'desc');
                break;
            case 'newest':
                $query->orderBy('created_at', 'desc');
                break;
            default:
                $query->orderBy('price', 'asc');
                break;
        }

        $this->products = $query->get();
    }

    public function updatedSortBy()
    {
        $this->loadProducts();
    }

    public function addToCart($productId, $quantity)
    {
        if (!Auth::check()) {
            session()->flash('error', 'Please login to add items to cart');
            return redirect()->route('login');
        }

        $product = Product::find($productId);

        if (!$product) {
            $this->dispatch('cart-error', message: 'Product not found');
            session()->flash('message', 'Product not found');
            return;
        }

        if ($product->stock_quantity < $quantity) {
            $this->dispatch('cart-error', message: 'Product stock is not enough');
            session()->flash('message', 'Product stock is not enough');
            return;
        }

        $hasCart = Order::where('user_id', Auth::id())->where('status', 'onCart')->first();
        
        if($hasCart) {
            $order = $hasCart;
        } else {
            $order = Order::create(['user_id' => Auth::id(),'status' => 'onCart']);
        }

        // Check if product already in cart
        $existingItem = OrderItem::where('order_id', $order->id)
            ->where('product_id', $productId)
            ->first();

        if ($existingItem) {
            if ($product->stock_quantity < $quantity + $existingItem->quantity) {
                $this->dispatch('cart-error', message: 'Product stock is not enough');
                session()->flash('message', 'Product stock is not enough');
                return;
            }

            $existingItem->quantity += $quantity;
            $existingItem->save();
        } else {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $productId,
                'quantity' => $quantity,
                'product_name' => $product->name,
                'price' => $product->price,
            ]);
        }

        $this->dispatch('cart-success', message: 'Product added to cart successfully');
        session()->flash('message', 'Product added to cart successfully');
    }

    public function render()
    {
        return view('livewire.products.product-list');
    }
}

