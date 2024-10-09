<?php
namespace App\Http\Controllers;

use App\Models\ProductImage;
use Illuminate\Http\Request;

class ProductImageController extends Controller
{
    public function index()
    {
        $productImages = ProductImage::all();
        return view('productImages.index', compact('productImages'));
    }

    public function create()
    {
        return view('productImages.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'product_id' => 'required|exists:products,id',
            'image_path' => 'required|image',
        ]);

        $imagePath = $request->file('image_path')->store('product_images', 'public');
        $validatedData['image_path'] = $imagePath;

        ProductImage::create($validatedData);
        return redirect()->route('productImages.index')->with('success', 'Product image uploaded successfully.');
    }

    public function show($id)
    {
        $productImage = ProductImage::findOrFail($id);
        return view('productImages.show', compact('productImage'));
    }

    public function edit($id)
    {
        $productImage = ProductImage::findOrFail($id);
        return view('productImages.edit', compact('productImage'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'image_path' => 'required|image',
        ]);

        $imagePath = $request->file('image_path')->store('product_images', 'public');
        $productImage = ProductImage::findOrFail($id);
        $productImage->update(['image_path' => $imagePath]);

        return redirect()->route('productImages.index')->with('success', 'Product image updated successfully.');
    }

    public function destroy($id)
    {
        $productImage = ProductImage::findOrFail($id);
        $productImage->delete();
        return redirect()->route('productImages.index')->with('success', 'Product image deleted successfully.');
    }
}
