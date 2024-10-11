<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'MasterPeas')</title>

    <!-- إضافة Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- إضافة ملفات CSS الخاصة بك هنا -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <!-- الهيدر (Header) -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">MasterPeas</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="products">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="categories">Categories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="orders">Orders</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- محتوى الصفحة (Content) -->
    <div class="container mt-4">
        @yield('content')
    </div>

    <!-- الفوتر (Footer) -->
    <footer class="footer mt-auto py-3 bg-light text-center">
        <div class="container">
            <span class="text-muted">© 2024 MasterPeas - جميع الحقوق محفوظة.</span>
        </div>
    </footer>

    <!-- إضافة Bootstrap JavaScript وjQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- إضافة ملفات JavaScript الخاصة بك هنا -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
