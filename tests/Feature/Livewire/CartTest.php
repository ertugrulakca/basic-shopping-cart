<?php

use App\Livewire\Shopping\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Livewire;

it('renders successfully', function () {
    $this->actingAs(User::factory()->create());

    $order = Order::factory()->create([
        'user_id' => Auth::user()->id,
        'status' => 'onCart',
    ]);
    $product1 = Product::factory()->create();
    $product2 = Product::factory()->create();

    OrderItem::factory()->create([
        'order_id' => $order->id,
        'product_id' => $product1->id,
        'quantity' => 1,
        'product_name' => $product1->name,
        'price' => $price = fake()->randomFloat(2, 10, 100),
    ]);
    
    OrderItem::factory()->create([
        'order_id' => $order->id,
        'product_id' => $product2->id,
        'quantity' => 1,
        'product_name' => $product2->name,
        'price' => $price = fake()->randomFloat(2, 10, 100),
    ]);

    Livewire::test(Cart::class)->assertStatus(200);
    Livewire::test(Cart::class)->assertSee('You have 2 items in your cart');
});

it('empty cart', function () {
    $this->actingAs(User::factory()->create());

    Livewire::test(Cart::class)->assertStatus(200);
    Livewire::test(Cart::class)->assertSee('You have 0 items in your cart');
    Livewire::test(Cart::class)->assertSee('Your cart is empty');
});
