<?php

namespace App\Jobs;

use App\Mail\SalesReportMail;
use App\Models\Order;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;

class DailySalesReport implements ShouldQueue
{
    use Queueable;

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $orders = Order::where('paid_at', '>=', now()->subDay())
            ->where('status', 'paid')->get();

        Mail::to('test@example.com')
            ->send(new SalesReportMail($orders));
    }
}
