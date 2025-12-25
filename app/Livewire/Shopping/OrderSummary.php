<?php

namespace App\Livewire\Shopping;

use App\Models\Order;
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

    public function proceedToCheckout()
    {
        // todo:later
    }

    public function applyPromoCode()
    {
        // todo:later
    }
}
