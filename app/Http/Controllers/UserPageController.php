<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class UserPageController extends Controller
{


    public function LandingPage()
    {
        $categories = Category::all();
        $products = Product::paginate(8);

        return view('userSide.landing', ['categories' => $categories , 'products' => $products]);
    }




    public function shop(Request $request)
    {
        $categories = Category::all();
        $query = Product::query();

        // فلترة حسب الفئة
        if ($request->has('category') && $request->category != '') {
            $query->where('category_id', $request->category);
        }


        // فلترة حسب السعر
        if ($request->has('price')) {
            $priceRanges = $request->price;
            $query->where(function ($query) use ($priceRanges) {
                foreach ($priceRanges as $range) {
                    [$min, $max] = explode('-', $range);
                    $query->orWhereBetween('price', [(float) $min, (float) $max]);
                }
            });
        }

        $products = $query->paginate(9);

        return view('userSide.shop', [
            'categories' => $categories,
            'products' => $products
        ]);
    }



    //    7/11
    public function showProduct($id)
    {
        $product = Product::findOrFail($id); // جلب المنتج بناءً على المعرف
        return view('userSide.productDetails', ['product' => $product]);
    }
    



}
