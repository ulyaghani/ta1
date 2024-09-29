@extends('dashboard.app-dashboard')

@section('content')
    <div class="container">
        <br>
        <h1>Product Management</h1>

        <!-- Tombol untuk menambahkan produk baru -->
        <button type="button" class="btn btn-primary mb-3" id="addNewProduct" data-bs-toggle="modal"
            data-bs-target="#productModal">
            Add New Product
        </button>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Specification</th>
                    <th>Price</th>
                    <th>Picture</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $product->product_name }}</td>
                        <td>{{ $product->spesification }}</td>
                        <td>{{ number_format($product->price, 2) }}</td>
                        <td>
                            @if ($product->picture)
                                <img src="{{ asset('storage/' . $product->picture) }}" alt="{{ $product->product_name }}"
                                    width="50">
                            @else
                                No Image
                            @endif
                        </td>
                        <td>
                            <!-- Tombol Edit Produk -->
                            <button type="button" class="btn btn-sm btn-primary edit-product"
                                data-product-id="{{ $product->product_id }}" data-bs-toggle="modal"
                                data-bs-target="#productModal">
                                Edit
                            </button>

                            <!-- Form Hapus Produk -->
                            <form action="{{ route('products.destroy', $product->product_id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Product Modal -->
        <div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="productModalLabel">Add New Product</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="productForm" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" id="product_id" name="product_id">
                            <input type="hidden" name="_method" id="formMethod">

                            <div class="form-group mb-3">
                                <label for="product_name">Product Name</label>
                                <input type="text" id="product_name" name="product_name" class="form-control" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="spesification">Specification</label>
                                <textarea id="spesification" name="spesification" class="form-control"></textarea>
                            </div>

                            <div class="form-group mb-3">
                                <label for="price">Price</label>
                                <input type="number" id="price" name="price" step="0.01" class="form-control"
                                    required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="picture">Picture</label>
                                <input type="file" id="picture" name="picture" class="form-control">
                            </div>

                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Script to handle form logic -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Reset form ketika tombol Add New Product diklik
            document.getElementById('addNewProduct').addEventListener('click', function() {
                document.getElementById('productForm').reset();
                document.getElementById('productModalLabel').textContent = 'Add New Product';
                document.getElementById('productForm').action = "{{ route('products.store') }}";
                document.getElementById('formMethod').value = 'POST'; // Use POST method for new products
                document.querySelector('input[name="_method"]').value = ''; // No method override for POST
            });

            // Handle edit button click
            document.querySelectorAll('.edit-product').forEach(function(button) {
                button.addEventListener('click', function() {
                    const productId = this.getAttribute('data-product-id');
                    const url = `/products/${productId}/edit`;

                    fetch(url)
                        .then(response => response.json())
                        .then(data => {
                            document.getElementById('productModalLabel').textContent =
                                'Edit Product';
                            document.getElementById('product_id').value = data.product_id;
                            document.getElementById('product_name').value = data.product_name;
                            document.getElementById('spesification').value = data.spesification;
                            document.getElementById('price').value = data.price;
                            document.getElementById('productForm').action =
                                `/products/${productId}`;
                            document.getElementById('formMethod').value =
                                'PUT'; // Use PUT method for editing
                            document.querySelector('input[name="_method"]').value =
                                'PUT'; // Override with PUT method
                        })
                        .catch(error => console.error('Error fetching product data:', error));
                });
            });
        });
    </script>
@endsection
