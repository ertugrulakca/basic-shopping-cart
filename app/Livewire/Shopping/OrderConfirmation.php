<?php

namespace App\Livewire\Shopping;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.ecommerce.app')]
class OrderConfirmation extends Component
{
    public $orderId;

    public function mount($orderId)
    {
        $order = Order::findOrFail($orderId);
        
        if($order->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        if($order->status !== 'paid') {
            abort(403, 'Order is not paid.');
        }
        
        $this->orderId = $orderId;
    }

    public function render()
    {
        return view('livewire.shopping.order-confirmation');
    }
}
