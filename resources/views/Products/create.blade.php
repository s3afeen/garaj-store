@extends('layouts.app')
@section('content')

<div class="card-body">
    <h4 class="card-title">Add New Product</h4>
    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <!-- حقل اسم المنتج -->
        <div class="form-group">
            <label for="productName">Product Name</label>
            <input type="text" class="form-control" id="productName" name="name" placeholder="Enter product name" required>
        </div>

        <!-- حقل الوصف -->
        <div class="form-group">
            <label for="productDescription">Description</label>
            <textarea class="form-control" id="productDescription" name="description" placeholder="Enter product description" rows="4" required></textarea>
        </div>

        <!-- حقل السعر -->
        <div class="form-group">
            <label for="productPrice">Price</label>
            <input type="number" class="form-control" id="productPrice" name="price" placeholder="Enter product price" step="0.01" required>
        </div>

        <!-- قائمة اختيار الفئة -->
        <div class="form-group">
            <label for="productCategory">Category</label>
            <select class="form-control" id="productCategory" name="category_id" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- زر الإرسال وزر الإلغاء -->
        <button type="submit" class="btn btn-primary">Add Product</button>
        <a href="{{ route('products.index') }}" class="btn btn-light">Cancel</a>
    </form>
</div>


@endsection('content');
