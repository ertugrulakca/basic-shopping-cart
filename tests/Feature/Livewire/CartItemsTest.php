<?php

use App\Livewire\Shopping\CartItems;
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

    $product1 = Product::factory()->create(['price' => $price1 = fake()->randomFloat(2, 10, 100), 'stock_quantity' => 10]);
    $product2 = Product::factory()->create(['price' => $price2 = fake()->randomFloat(2, 10, 100), 'stock_quantity' => 10]);

    $orderItem1 = OrderItem::factory()->create([
        'order_id' => $order->id,
        'product_id' => $product1->id,
        'quantity' => 1,
        'product_name' => $product1->name,
        'price' => $product1->price,
    ]);

    $orderItem2 = OrderItem::factory()->create([
        'order_id' => $order->id,
        'product_id' => $product2->id,
        'quantity' => 3,
        'product_name' => $product2->name,
        'price' => $product2->price,
    ]);

    Livewire::test(CartItems::class)->assertStatus(200);
    Livewire::test(CartItems::class)->assertSee($product1->name);
    Livewire::test(CartItems::class)->assertSee($product1->image_url);
    Livewire::test(CartItems::class)->assertSee($price1);
    Livewire::test(CartItems::class)->assertSee($product2->name);
    Livewire::test(CartItems::class)->assertSee($product2->image_url);
    Livewire::test(CartItems::class)->assertSee($price2 * $product2->quantity);
    Livewire::test(CartItems::class)->assertSee($product1->quantity);
    Livewire::test(CartItems::class)->assertSee($product2->quantity);

    // updateItemQuantity tests
    Livewire::test(CartItems::class)->call('updateItemQuantity', $orderItem1->id, 5);
    $orderItem1->refresh();
    Livewire::test(CartItems::class)->assertSee($orderItem1->price * 5);
    Livewire::test(CartItems::class)->call('updateItemQuantity', $orderItem2->id, 4);
    $orderItem2->refresh();
    Livewire::test(CartItems::class)->assertSee($orderItem2->price * 4);
});
