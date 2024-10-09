<?php
namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class productController extends Controller
{
    public function index()
    {
        $products = product::all();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'total' => 'required|numeric',
            'status' => 'required',
        ]);

        product::create($validatedData);
        return redirect()->route('products.index')->with('success', 'product created successfully.');
    }

    public function show($id)
    {
        $product = product::findOrFail($id);
        return view('products.show', compact('product'));
    }

    public function edit($id)
    {
        $product = product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'status' => 'required',
        ]);

        $product = product::findOrFail($id);
        $product->update($validatedData);
        return redirect()->route('products.index')->with('success', 'product updated successfully.');
    }

    public function destroy($id)
    {
        $product = product::findOrFail($id);
        $product->delete();
        return redirect()->route('products.index')->with('success', 'product deleted successfully.');
    }
}

