<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Вывод списка продуктов
    public function index()
    {
        $products = Product::all();
        return view('products', compact('products'));
    }

    // Форма создания продукта
    public function create()
    {
        return view('products.create');
    }

    // Сохранение нового продукта
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'stock_quantity' => 'required|integer|min:0',
        ]);

        Product::create($request->all());
        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    // Вывод отдельного продукта
    public function show(Product $product)
    {
        return view('products.show', compact('products'));
    }

    // Форма редактирования продукта
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    // Обновление продукта
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'stock_quantity' => 'required|integer|min:0',
        ]);

        $product->update($request->all());
        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    // Удаление продукта
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
