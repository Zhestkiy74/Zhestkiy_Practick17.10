@extends('layouts.app')

@section('content')
    <h1>Edit Product</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="name">Product Name:</label>
            <input type="text" id="name" name="name" value="{{ $product->name }}" required>
        </div>
        <div>
            <label for="stock_quantity">Stock Quantity:</label>
            <input type="number" id="stock_quantity" name="stock_quantity" value="{{ $product->stock_quantity }}" required>
        </div>
        <button type="submit">Update</button>
    </form>

