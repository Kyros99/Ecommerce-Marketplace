<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome to Marketplace | Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/8879801888.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="antialiased">
@include('components.navbar')
<div class="search-container" style="position: fixed; top: 58px; width: 100%; z-index: 5; background-color: #ccc;">
    <form action="/search_results" method="get" style="margin: 20px 40px;">
        <div class="input-group">
            <input type="search" class="form-control" placeholder="Search for a Product" required
                   aria-label="Search for a Product" aria-describedby="search-button" name="search"
                   value="{{ $payload['search'] ?? ''}}">
            <button class="btn btn-primary" type="submit" id="search-button">Search</button>
        </div>
    </form>
</div>
<div class="main-container" style="padding-top: 78px">
    <div class="row" style="height: 100%; overflow: auto;">
        <div class="filter-container col-3"
             style="padding: 20px 40px; border-right: 1px solid #ccc; margin-top: 20px;">
            <form id="filter-form" action="/search_results" method="get">
                <input type="hidden" name="search" value="{{ $payload['search'] ?? ''}}">
                <select class="form-select" name="order_by"
                        onchange="document.getElementById('filter-form').submit()">
                    <option selected disabled>Order By</option>

                    <option value="title_asc" {{($payload['order_by'] ?? '' ) == 'title_asc' ? 'selected' : '' }}>
                        Title (A-Z)
                    </option>
                    <option value="title_desc" {{($payload['order_by'] ?? '' ) == 'title_desc' ? 'selected' : '' }}>
                        Title (Z-A)
                    </option>
                    <option value="price_asc" {{($payload['order_by'] ?? '' ) == 'price_asc' ? 'selected' : '' }}>
                        Cheap First
                    </option>
                    <option value="price_desc" {{($payload['order_by'] ?? '' ) == 'price_desc' ? 'selected' : '' }}>
                        Expensive First
                    </option>
                </select>
                <br>
                <div class="product-category">
                    <h5>Categories</h5>
                    @foreach ($productCategories as $categoryId => $category)
                        <div class="form-check">
                            <input id="category-check-{{ $categoryId }}" class="form-check-input" type="checkbox"
                                   name="categories[]" value="{{ $categoryId }}"
                                   {{ in_array($categoryId, $payload['categories'] ?? []) ? 'checked' : '' }}
                                   onchange="document.getElementById('filter-form').submit()">
                            <label class="form-check-label"
                                   for="category-check-{{ $categoryId }}">{{ $category['title'] }}
                                ({{ $category['counter'] }})
                            </label>
                        </div>
                    @endforeach
                    <hr>
                </div>
                <div class="price-range">
                    <h5>Price Range</h5>
                    <div class="form-check">
                        <input id="price-range-100" class="form-check-input" type="radio"
                               name="priceRange" value="100"
                               {{ ($payload['priceRange'] ?? null) == 100 ? 'checked' : '' }}
                               onchange="document.getElementById('filter-form').submit()">
                        <label class="form-check-label" for="price-range-100">
                            < $100 ({{ $priceCounter[100] ?? 0 }}) </label>
                    </div>
                    <div class="form-check">
                        <input id="price-range-500" class="form-check-input" type="radio" name="priceRange"
                               value="500"
                               {{ ($payload['priceRange'] ?? null) ==  500 ? 'checked' : '' }}
                               onchange="document.getElementById('filter-form').submit()">
                        <label class="form-check-label" for="price-range-500">$100 - $500
                            ({{ $priceCounter[500] ?? 0 }})
                        </label>
                    </div>
                    <div class="form-check">
                        <input id="price-range-1000" class="form-check-input" type="radio" name="priceRange"
                               value="1000"
                               {{ ($payload['priceRange'] ?? null) == 1000 ? 'checked' : '' }}
                               onchange="document.getElementById('filter-form').submit()">
                        <label class="form-check-label" for="price-range-1000">$500 - $1000
                            ({{ $priceCounter[1000] ?? 0 }}(
                        </label>
                    </div>
                    <div class="form-check">
                        <input id="price-range-inf" class="form-check-input" type="radio" name="priceRange"
                               value="inf"
                               {{ ($payload['priceRange'] ?? null) == 'inf' ? 'checked' : '' }}
                               onchange="document.getElementById('filter-form').submit()">
                        <label class="form-check-label" for="price-range-inf">>$1000 ({{ $priceCounter['inf'] ?? 0 }})
                        </label>
                    </div>
                    <hr>
                </div>
                <div class="availability-filter">
                    <h5>Availability</h5>
                    <div class="form-check">
                        <input id="in-stock" class="form-check-input" type="checkbox" name="in_stock"
                               value="1"
                               {{ ($payload['in_stock'] ?? false) ? 'checked' : '' }}
                               onchange="document.getElementById('filter-form').submit()">
                        <label class="form-check-label" for="in-stock"> In Stock ({{ $stockCounter ?? 0 }})
                        </label>
                    </div>
                </div>
            </form>
        </div>
        <div class="search-results-container col-9" style="padding: 40px;">
            @if($productList['products'] ?? [])
            @foreach ($productList['products'] as $product)
                <div class="product-container row">
                    <div class="col-2 mb-3 text-center">
                        <div class="image-container"
                             style="width: 150px; height: 150px; margin: 0 auto; background: url() no-repeat center; background-size: contain;">
                        </div>
                    </div>
                    <div class="col-8 mb-3">
                        <h3> {{$product['Title']}} </h3>
                        <p>{{ $product['ShortDescription'] }}</p>
                        <div class="product-info text-primary">
                            <span>{{ $product['ProductCategory']['Title'] }}</span>
                            <span>|</span>
                            <a href="/product/{{ $product['ProductId'] }}" style="text-decoration: none;">More
                                Info</a>
                        </div>
                    </div>
                    <div class="col-2 mb-3 text-end">
                        <h3>$ {{ $product['Price'] }}</h3>
                        @if($product['Amount'] > 0)
                        <form action="/cart/products/{{$product['ProductId']}}/add" method="post"
                              class="float-end">
                            @csrf
                            <button class="form-control btn-danger btn-sm" type="submit">Add to Cart</button>
                        </form>
                        @else
                            <span class="badge bg-warning text-dark">Out of Stock</span>
                        @endif
                    </div>
                </div>
                <hr>
                @endforeach
                <div class="pagination float-end">
                    <a href="/search_results?{{ http_build_query(['page' => $productList['pager']['page'] - 1] + $payload) }}"
                       class="btn btn-outline-primary {{ $productList['pager']['page'] == 1 ? 'disabled' : '' }}"
                       id="previous-page" style="margin-right: 10px;">Previous Page</a>
                    <a href="/search_results?{{ http_build_query(['page' => $productList['pager']['page'] + 1] + $payload) }}"
                       class="btn btn-outline-primary {{ $productList['pager']['page'] == $productList['pager']['last_page'] ? 'disabled' : '' }}"
                       id="next-page" style="margin-right: 10px;">Next Page</a>
                </div>
            @else
                <div class="alert alert-warning" role="alert">There are no products matching your search criteria!</div>
            @endif
        </div>
    </div>
</div>
</body>

</html>
