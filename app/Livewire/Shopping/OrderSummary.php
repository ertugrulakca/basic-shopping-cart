<?php

namespace App\Livewire\Shopping;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class OrderSummary extends Component
{
    // add listeners 
    protected $listeners = ['cart-updated' => 'cartUpdated'];
    public $totalPrice;

    public function render()
    {
        return view('livewire.shopping.order-summary');
    }

    public function mount()
    {
        $this->calculateTotalPrice();
    }

    public function cartUpdated()
    {
        $this->calculateTotalPrice();
    }

    // calculate total price
    public function calculateTotalPrice()
    {
        $this->totalPrice = Order::where('user_id', Auth::id())->where('status', 'onCart')->first()->totalPrice;
    }

    /**
     *  These part did not work in real application, just for demo purpose
     *  In real application, you need to implement the checkout process
     *  We need this step to simulate sales report and stock tracking
     * @return \Illuminate\Http\RedirectResponse
     */
    public function proceedToCheckout()
    {

        if(!Auth::check()) {
            return redirect()->route('login');
        }

        $order = Order::where('user_id', Auth::id())->where('status', 'onCart')->first();
        // check Quantity
        $orderItems = $order->items;
        foreach($orderItems as $item) {
            $product = Product::find($item->product_id);
            if($product->stock_quantity < $item->quantity) {
                return redirect()->route('cart')->with('error', 'Product stock is not enough');
            }
        }

        // decrease stock quantity
        foreach($orderItems as $item) {
            $product = Product::find($item->product_id);
            $product->stock_quantity -= $item->quantity;
            $product->save();
        }

        // update order status
        $order->update(['status' => 'paid']);

        session()->flash('message', 'Order paid successfully');

        return redirect()->route('order-confirmation', $order->id);
    }

    public function applyPromoCode()
    {
        // todo:later
    }
}
