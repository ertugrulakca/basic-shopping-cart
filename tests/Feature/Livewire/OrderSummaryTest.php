<?php

use App\Livewire\Shopping\OrderSummary;
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
    $product1 = Product::factory()->create(['price' => fake()->randomFloat(2, 10, 100)]);
    $product2 = Product::factory()->create(['price' => fake()->randomFloat(2, 10, 100)]);


    OrderItem::factory()->create([
        'order_id' => $order->id,
        'product_id' => $product1->id,
        'quantity' => 3,
        'product_name' => $product1->name,
        'price' => $product1->price,
    ]);

    OrderItem::factory()->create([
        'order_id' => $order->id,
        'product_id' => $product2->id,
        'quantity' => 2,
        'product_name' => $product2->name,
        'price' => $product2->price,
    ]);

    Livewire::test(OrderSummary::class)->assertStatus(200);
    Livewire::test(OrderSummary::class)->assertSee('$' . $product1->price * 3 + $product2->price * 2); 
    Livewire::test(OrderSummary::class)->assertSet('totalPrice', $product1->price * 3 + $product2->price * 2); 
});
