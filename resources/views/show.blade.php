@extends('layouts.app')

@section('content')
    <h1>Product Details</h1>

    <div>
        <strong>Name:</strong> {{ $product->name }}
    </div>
    <div>
        <strong>Stock Quantity:</strong> {{ $product->stock_quantity }}
    </div>

    <a href="{{ route('products.index') }}">Back to Products List</a>
    <a href="{{ route('products.edit', $product->id) }}">Edit Product</a>

    <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
@endsection
