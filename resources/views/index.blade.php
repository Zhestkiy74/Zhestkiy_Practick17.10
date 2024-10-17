@extends('layouts.app')
$products = Product::all(); // Получаем все продукты из базы данных
return view('products.index', compact('products'));
@section('content')
<h1>Products</h1>
<a href="{{ route('products.create') }}">Add New Product</a>
<ul>
    @foreach ($products as $product)

    <li>
        {{ $product->name }} ({{ $product->stock_quantity }} in stock)
        <a href="{{ route('products.show', $product->id) }}">View</a>
        <a href="{{ route('products.edit', $product->id) }}">Edit</a>
        <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
    </li>
    @endforeach
</ul>
@endsection