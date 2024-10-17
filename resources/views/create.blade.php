@extends('layouts.app')

@section('content')
    <h1>Create Product</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <div>
            <label for="name">Product Name:</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required>
        </div>
        <div>
            <label for="stock_quantity">Stock Quantity:</label>
            <input type="number" id="stock_quantity" name="stock_quantity" value="{{ old('stock_quantity') }}" required>
        </div>
        <button type="submit">Create</button>
    </form>

    <a href="{{ route('products.index') }}">Back to Products List</a>
@endsection
