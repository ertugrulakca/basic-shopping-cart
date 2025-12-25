<x-mail::message>
# Daily Sales Report

Here's your daily sales summary:

## Orders Summary

@foreach($orders as $order)
### Order #{{ $order->id }}

<x-mail::table>
| Product | Quantity | Price | Subtotal |
|:--------|:--------:|---------:|---------:|
@foreach($order->items as $item)
| {{ $item->product->name }} | {{ $item->quantity }} | ${{ number_format($item->price, 2) }} | ${{ number_format($item->quantity * $item->price, 2) }} |
@endforeach
| | | **Total:** | **${{ number_format($order->totalPrice, 2) }}** |
</x-mail::table>

---

@endforeach

Thanks for reviewing today's sales report!
</x-mail::message>
