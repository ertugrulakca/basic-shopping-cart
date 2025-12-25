<?php

namespace App\Livewire\Shopping;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.ecommerce.app')]
class Cart extends Component
{
    protected $listeners = ['cart-updated' => 'loadCartItemCount'];

    public $cartItemCount;

    public function render()
    {
        return view('livewire.shopping.cart');
    }

    public function mount()
    {
        $this->loadCartItemCount();
    }

    public function loadCartItemCount()
    {
        $this->cartItemCount = Order::where('user_id', Auth::id())->where('status', 'onCart')->first()?->items()->count() ?? 0;
    }
}
