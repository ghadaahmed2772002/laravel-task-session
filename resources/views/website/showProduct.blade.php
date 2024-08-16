<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4">Product Info</h2>
    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Product Name</th>
                <th>Expire Date</th>
                <th>Details</th>
                <th>Company Name</th>
                <th>Country</th>
                <th>City</th>
                <th>Country Size</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->expired_at }}</td>
                <td>{{ $product->details }}</td>
                <td>{{ $product->company->name }}</td>
                <td>{{ $product->company->country }}</td>
                <td>{{ $product->company->city }}</td>
                <td>{{ $product->company->country_size }}</td>
            </tr>
        </tbody>
    </table>
    <a href="{{ route('products.index') }}" class="btn btn-secondary">Products</a>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
