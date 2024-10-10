<?php
namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;


use App\Models\Category;

class productController extends Controller
{
    public function index()
    {
        $products = product::all();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all(); 
        return view('products.create',compact('categories'));
    }

    public function store(Request $request)
{
    // تحقق من صحة البيانات المدخلة
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'price' => 'required|numeric',
        'category_id' => 'required|exists:categories,id',
    ]);

    // إضافة المنتج إلى قاعدة البيانات
    Product::create($validatedData);
    
    return redirect()->route('products.index')->with('success', 'Product created successfully.');
}

    public function show($id)
    {
        $product = product::findOrFail($id);
        return view('products.show', compact('product'));
    }

    public function edit($id)
{
    $product = Product::findOrFail($id);  // جلب المنتج الذي تريد تعديله
    $categories = Category::all();         // جلب جميع الفئات

    return view('products.edit', compact('product', 'categories')); // تمرير المنتج والفئات إلى واجهة العرض
}



    public function update(Request $request, $id)
    {

        // $validatedData = $request->validate([
        //     'status' => 'required',
        // ]);

        $product = product::findOrFail($id);
       $product->name = $request->name;
       $product->description = $request->description;
       $product->price = $request->price;
       $product->category_id = $request->category_id;
       $product->save();

        return redirect()->route('products.index')->with('success', 'product updated successfully.');
    }

    public function destroy($id)
    {
        $product = product::findOrFail($id);
        $product->delete();
        return redirect()->route('products.index')->with('success', 'product deleted successfully.');
    }
}

