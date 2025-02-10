<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome to Marketplace | Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/8879801888.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body class="antialiased">
@include('components.navbar')
<div class="main-container">
    <div class="col-12" style="height: 100%; overflow: auto;">
        <div class="profile-container" style="width: 50%; margin: 50px auto;">
            <div class="form-group row mb-3">
                <h4>
                    <span class="register-icon">
                        <img src="/assets/icons/hacker.png" style="width: 64px; height: 64px; margin-right: 20px;"/>
                    </span>
                    <strong>Business Profile</strong>
                </h4>
            </div>
            <br/>
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation" style="cursor: pointer;">
                    <a class="nav-link {{ $section == 'basic' ? 'active' : '' }}" id="basic-info-tab"
                       data-bs-toggle="tab" data-bs-target="#basic-info"
                       type="button" role="tab">Basic Information
                    </a>
                </li>
                <li class="nav-item" role="presentation" style="cursor: pointer;">
                    <a class="nav-link {{ $section == 'products' ? 'active' : '' }}" id="products-tab"
                       data-bs-toggle="tab" data-bs-target="#products"
                       type="button" role="tab">Products
                    </a>
                </li>
                <li class="nav-item" role="presentation" style="cursor: pointer;">
                    <a class="nav-link {{ $section == 'orders' ? 'active' : '' }}" id="orders-tab"
                       data-bs-toggle="tab" data-bs-target="#orders"
                       type="button" role="tab">Orders
                    </a>
                </li>
            </ul>
            <div class="tab-content" id="profileTabContent">
                <div class="tab-pane fade {{ $section == 'basic' ? 'show active' : '' }}" id="basic-info"
                     role="tabpanel" aria-labelledby="basic-info-tab">
                    <form action="/business/basic" method="post">
                        @csrf
                        <br>
                        @if ($basic_info_error ?? false)
                            <div class="alert alert-danger" role="alert">{{ $basic_info_error_message }}</div>
                        @endif
                        @if ($basic_info_success ?? false)
                            <div class="alert alert-success" role="alert">{{ $basic_info_success_message }}</div>
                        @endif
                        <div class="form-group row mb-3">
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="name"
                                       value="{{ $businessInfo['name'] ?? '' }}"
                                       placeholder="Name"
                                       required>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <div class="col-md-12">
                                <select class="form-control" name="sector">
                                    <option
                                        value="technology" {{ $businessInfo['sector'] ?? '' == 'technology' ? 'selected' : '' }}>
                                        Technology
                                    </option>
                                    <option
                                        value="clothes" {{ $businessInfo['sector'] ?? '' == 'clothes' ? 'selected' : '' }}>
                                        Clothes
                                    </option>
                                    <option
                                        value="books" {{ $businessInfo['sector'] ?? '' == 'books' ? 'selected' : '' }}>
                                        Books
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <div class="col-md-12">
                                <textarea class="form-control"
                                          name="description">{{ $businessInfo['description'] ?? '' }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary float-right">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade {{ $section == 'products' ? 'show active' : '' }}" id="products"
                     role="tabpanel" aria-labelledby="products-tab">
                    <br>
                    @if ($products_error ?? false)
                        <div class="alert alert-danger" role="alert">{{ $products_error_message }}</div>
                    @endif
                    @if ($products_success ?? false)
                        <div class="alert alert-success" role="alert">{{ $products_success_message }}</div>
                    @endif
                    <div class="add-review d-flex justify-content-end">
                        <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                                data-bs-target="#addProduct">Add New Product
                        </button>
                        <!-- New Product Modal -->
                        <div class="modal fade" id="addProduct" tabindex="-1"
                             aria-labelledby="addModal" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-xl">
                                <div class="modal-content">
                                    <form action="/business/products" method="post">
                                        @csrf
                                        <div class="modal-header">
                                            <h5 class="modal-title">Create a Product</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group row mb-3">
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" name="code"
                                                           placeholder="Product Code" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" name="title"
                                                           placeholder="Title" required>
                                                </div>
                                            </div>
                                            <div class="form-group row mb-3">
                                                <div class="col-md-6">
                                                    <select class="form-control" name="category_id" required>
                                                        @foreach($categories as $productCategory)
                                                            <option
                                                                value="{{ $productCategory['category_id'] }}">{{ $productCategory['title'] }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="number" class="form-control" name="price"
                                                           placeholder="Price" required>
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="number" class="form-control" name="amount"
                                                           placeholder="Amount" required>
                                                </div>
                                            </div>
                                            <div class="form-group row mb-3">
                                                <div class="col-md-12">
                                                    <textarea class="form-control" name="short_description" rows="2"
                                                              required placeholder="Short Description"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row mb-3">
                                                <div class="col-md-12">
                                                    <textarea class="form-control" name="long_description" rows="5"
                                                              required placeholder="Long Description"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    @foreach($products as $product)
                        <div class="product-container row">
                            <div class="col-2 mb-3 text-center">
                                <div class="image-container"
                                     style="width: 100px; height: 100px; margin: 0 auto; background: url({{$product['image_url'] ?? '/assets/icons/product.png'}}) no-repeat center; background-size: contain;"></div>
                            </div>
                            <div class="col-8 mb-3">
                                <h4>{{$product['title']}}</h4>
                                <p>{{$product['short_description']}}</p>
                            </div>
                            <div class="col-2 mb-3 text-end">
                                <h3>$ {{$product['price']}}</h3>

                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#editProduct{{ $product['product_id'] }}">Edit
                                </button>
                                <!-- Edit Product Modal -->
                                <div class="modal fade" id="editProduct{{ $product['product_id'] }}" tabindex="-1"
                                     aria-labelledby="addModal" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-xl">
                                        <div class="modal-content">
                                            <form action="/business/products/{{ $product['product_id'] }}"
                                                  method="post">
                                                @csrf
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Edit Product</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group row mb-3">
                                                        <div class="col-md-6">
                                                            <input type="text" class="form-control" name="code"
                                                                   placeholder="Product Code" required
                                                                   value="{{ $product['code'] }}">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <input type="text" class="form-control" name="title"
                                                                   placeholder="Title" required
                                                                   value="{{ $product['title'] }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-3">
                                                        <div class="col-md-6">
                                                            <select class="form-control" name="category_id" required>
                                                                @foreach($categories as $productCategory)
                                                                    <option
                                                                        value="{{ $productCategory['category_id'] }}" {{ $product['category_id'] == $productCategory['category_id'] ? 'selected' : '' }}>{{ $productCategory['title'] }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <input type="number" class="form-control" name="price"
                                                                   placeholder="Price" required
                                                                   value="{{ $product['price'] }}">
                                                        </div>
                                                        <div class="col-md-3">
                                                            <input type="number" class="form-control" name="amount"
                                                                   placeholder="Amount" required
                                                                   value="{{ $product['amount'] }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-3">
                                                        <div class="col-md-12">
                                                    <textarea class="form-control" name="short_description" rows="2"
                                                              required
                                                              placeholder="Short Description">{{ $product['short_description'] }}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-3">
                                                        <div class="col-md-12">
                                                    <textarea class="form-control" name="long_description" rows="5"
                                                              required
                                                              placeholder="Long Description">{{ $product['long_description'] }}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary">Save</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="tab-pane fade {{ $section == 'orders' ? 'show active' : '' }}" id="orders" role="tabpanel"
                     aria-labelledby="orders-tab">
                    <br>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">Order Id</th>
                            <th scope="col">Date Created</th>
                            <th scope="col">User</th>
                            <th scope="col">Total Price</th>
                            <th scope="col">Info</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($orders ?? [] as $order)
                            <tr>
                                <th scope="row">{{ $order['order_id'] }}</th>
                                <td>{{ (new DateTime($order['created_at']))->format('Y-m-d') }}</td>
                                <td>{{ $order['user']['first_name'].' '.$order['user']['last_name'] }}</td>
                                <td>$ {{ $order['total_price'] }}</td>
                                <td>
                                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#orderModal{{ $order['order_id'] }}">Info
                                    </button>
                                    <!-- Order Modal -->
                                    <div class="modal fade" id="orderModal{{ $order['order_id'] }}" tabindex="-1"
                                         aria-labelledby="orderModal" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-xl">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Order Info
                                                        - {{ $order['order_id'] }}</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <table class="table table-bordered">
                                                        <thead>
                                                        <tr>
                                                            <th scope="col">Product</th>
                                                            <th scope="col">Amount</th>
                                                            <th scope="col">Price</th>
                                                            <th scope="col">Total Price</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach ($order['products'] ?? [] as $productInfo)
                                                            <tr>
                                                                <td>{{ $productInfo['product']['title'] }}</td>
                                                                <td>{{ $productInfo['amount'] }}</td>
                                                                <td>$ {{ $productInfo['product']['price'] }}</td>
                                                                <td>$ {{ $productInfo['amount'] * $productInfo['product']['price'] }}</td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                    <p><strong>Comments:</strong></p>
                                                    <p>{{ $order['comments'] }}</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-primary"
                                                            data-bs-dismiss="modal">Close
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
