@extends('layouts.app')
@section('content')

<div class="card-body">
    <h4 class="card-title">Add New Category</h4>
    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <!-- حقل اسم الفئة -->
        <div class="form-group">
            <label for="categoryName">Category Name</label>
            <input type="text" class="form-control" id="categoryName" name="name" placeholder="Enter category name" required>
        </div>

        <!-- حقل الوصف -->
        <div class="form-group">
            <label for="categoryDescription">Description</label>
            <textarea class="form-control" id="categoryDescription" name="description" placeholder="Enter category description" rows="4" required></textarea>
        </div>

        <!-- زر الإرسال وزر الإلغاء -->
        <button type="submit" class="btn btn-primary">Add Category</button>
        <a href="{{ route('categories.index') }}" class="btn btn-light">Cancel</a>
    </form>
</div>

@endsection('content');
