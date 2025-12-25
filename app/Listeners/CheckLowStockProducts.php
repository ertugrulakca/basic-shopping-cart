<?php

namespace App\Listeners;

use App\Events\OrderCompleted;
use App\Mail\LowStockProducts;
use App\Models\Product;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class CheckLowStockProducts implements ShouldQueue
{
    use InteractsWithQueue;

    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(OrderCompleted $event): void
    {
        // check low stock products
        $products = Product::where('stock_quantity', '<', 2)->get();
        
        // send email to admin
        Mail::to('admin@example.com')->send(new LowStockProducts($products));
    }
}
