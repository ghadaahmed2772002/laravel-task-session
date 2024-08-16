<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4">Edit Product</h2>
    <form action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Product Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" placeholder="Enter product name">
        </div>
        <div class="mb-3">
            <label for="date" class="form-label">Expiry Date</label>
            <input type="date" class="form-control" id="date" name="date" value="{{ $product->expired_at }}">
        </div>
        <div class="mb-3">
            <label for="details" class="form-label">Details</label>
            <textarea class="form-control" id="details" name="details" rows="3" placeholder="Enter product details">{{ $product->details }}</textarea>
        </div>
        <div class="mb-3">
            <label for="company" class="form-label">Company</label>
            <select class="form-select" id="company" name="company">
                @foreach($companies as $company)
                    <option value="{{ $company->id }}" {{ $company->id == $product->company_id ? 'selected' : '' }}>{{ $company->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update Product</button>
    </form>
    <a href="{{ route('products.index') }}" class="btn btn-secondary mt-3">Back to Products</a>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
