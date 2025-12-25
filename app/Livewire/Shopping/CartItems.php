<?php

namespace App\Livewire\Shopping;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CartItems extends Component
{
    public $cartItems = [];

    public function render()
    {
        return view('livewire.shopping.cart-items');
    }

    public function mount()
    {
        $this->loadCartItems();
    }

    public function loadCartItems()
    {
        $orderId = Order::where('user_id', Auth::id())->where('status', 'onCart')->first()->id;
        $this->cartItems = OrderItem::where('order_id', $orderId)->get();
    }

    public function removeItem($itemId)
    {
        $item = OrderItem::find($itemId);
        $item->delete();

        $this->loadCartItems();
        $this->dispatch('cart-updated');
    }

    public function updateItemQuantity($itemId, $quantity)
    {
        $item = OrderItem::find($itemId);
        $product = Product::find($item->product_id);

        if($product->stock_quantity < $quantity) {
            $this->dispatch('cart-error', message: 'Product stock is not enough');
            session()->flash('message', 'Product stock is not enough');
            return;
        }

        if($quantity < 1) {
            $item->delete();
            $this->loadCartItems();
            $this->dispatch('cart-updated');
            return;
        }

        $item->quantity = $quantity;
        $item->save();

        $this->loadCartItems();
        $this->dispatch('cart-updated');
    }
}
