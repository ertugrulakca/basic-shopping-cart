<x-mail::message>
# ⚠️ Low Stock Alert

The following products are running low on inventory and need restocking:

<x-mail::table>
| Product Name | Current Stock | Status |
|:-------------|:-------------:|:------:|
@foreach($products as $product)
| {{ $product->name }} | {{ $product->stock_quantity }} | @if($product->stock_quantity < 5) 🔴 Critical @else 🟡 Low @endif |
@endforeach
</x-mail::table>

<x-mail::button :url="url('/dashboard')">
View Inventory
</x-mail::button>

Please restock these items as soon as possible to avoid stockouts.

Thanks!
</x-mail::message>
