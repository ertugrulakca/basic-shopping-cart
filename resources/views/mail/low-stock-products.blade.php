<x-mail::message>
# Low Stock Products Detected!

@foreach($products as $product)
    {{ $product->name }} - {{ $product->stock_quantity }} left
@endforeach

Thanks.<br>
</x-mail::message>
