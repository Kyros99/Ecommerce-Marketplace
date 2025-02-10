
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome to Marketplace | Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/8879801888.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-stars/2.1.0/bootstrap-stars.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-stars/2.1.0/bootstrap-stars.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
    <link href="/css/main/core.css" rel="stylesheet">
</head>
<body class="antialiased">
@include('components.navbar')
<div class="main-container" style="width: 1000px; margin: 0 auto;">
    <div class="row category" style="margin: 30px 0">
        <div class="product-info text-primary">
            <span><a href="/search_results" style="text-decoration: none;">All Products</a></span>
            <span>  </span>
            <span>{{$productInfo['product_category']['title']}}</span>
        </div>
    </div>
    <div class="row" style="height: 100%; overflow: auto;">
        <div class="product-container row">
            <div class="col-2 mb-3 text-center">
                <div class="image-container"
                     style="width: 150px; height: 150px; margin: 0 auto; background: url({{$productInfo['image_url']}}) no-repeat center; background-size: contain;"></div>
            </div>
            <div class="col-8 mb-3">
                <h3>{{$productInfo['title']}}</h3>
                <p class="text-primary">Code: {{$productInfo['product_id']}}</p>
                <p>{{$productInfo['short_description']}}</p>
            </div>
            <div class="col-2 mb-3 text-end">
                <h3>$ {{$productInfo['price']}}</h3>
                @if($productInfo['amount'] > 0)
                <form action="/cart/products/{{$productInfo['product_id']}}/add" method="post"
                      class="float-end">
                      @csrf
                    <button class="form-control btn-danger btn-sm" type="submit">Add to Cart</button>
                </form>
                @else
                    <span class="badge bg-warning text-dark">Out of Stock</span>
                @endif
            </div>
        </div>
        <br/>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation" style="cursor: pointer;">
                <a class="nav-link " {{ $section == 'details' ? 'show_active' : '' }}id="product-details-tab"
                   data-bs-toggle="tab"
                   data-bs-target="#product-details"
                   type="button" role="tab">Details</a>
            </li>
            <li class="nav-item" role="presentation" style="cursor: pointer;">
                <a class="nav-link " {{ $section == 'reviews' ? 'show_active' : '' }} id="product-reviews-tab"
                   data-bs-toggle="tab"
                   data-bs-target="#product-reviews"
                   type="button" role="tab">Reviews</a>
            </li>
            <li class="nav-item" role="presentation" style="cursor: pointer;">
                <a class="nav-link "  {{ $section == 'similar' ? 'show_active' : '' }} id="similar-products-tab"
                   data-bs-toggle="tab" data-bs-target="#similar-products"
                   type="button" role="tab">Similar Products</a>
            </li>
        </ul>
        <div class="tab-content" id="profileTabContent">
            <div class="tab-pane fade " {{ $section == 'details' ? 'show_active' : '' }} id="product-details"
                 role="tabpanel" aria-labelledby="product-details-tab" style="padding: 20px 10px;">
                <p>{{ $productInfo['long_description'] }}</p>
            </div>
            <div class="tab-pane fade " {{ $section == 'reviews' ? 'show_active' : '' }} id="product-reviews"
                 role="tabpanel" aria-labelledby="product-reviews-tab" style="padding: 20px 10px;">
                <div class="add-review d-flex justify-content-end">
                    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                            data-bs-target="#addReviewModal">Add Review
                    </button>
                    <!-- Order Modal -->
                    <div class="modal fade" id="addReviewModal" tabindex="-1"
                         aria-labelledby="orderModal" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <form action="/product/{{$productInfo['product_id']}}/review" method="post">
                                    @csrf
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add Review
                                            - {{$productInfo['title']}}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" name="score"/>
                                        <div id="review-rating"></div>
                                        <script>
                                            // Setup rating stars
                                            let options = {
                                                max_value: 5,
                                                step_size: 1,
                                            }
                                            $("#review-rating").rate(options).on("change", function (ev, data) {
                                                $('input[name="score"]').attr('value', data.to).val(data.to);
                                            });
                                        </script>
                                        <textarea class="form-control" name="review" required></textarea>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @foreach($productReviews as $review)
                <div class="product-container row">
                    <div class="col-2 mb-3">a
                        <p><strong> {{ $review['User']['FirstName'].' ' .$review['User']['LastName'] }} </strong></p>
                        <div class="review-stars">
                            <i class="bi {{ $review['Score'] >= 1 ? 'bi-star-fill' : 'bi-star'}}"></i>
                            <i class="bi {{ $review['Score'] >= 2 ? 'bi-star-fill' : 'bi-star'}}"></i>
                            <i class="bi {{ $review['Score'] >= 3 ? 'bi-star-fill' : 'bi-star'}}"></i>
                            <i class="bi {{ $review['Score'] >= 4 ? 'bi-star-fill' : 'bi-star'}}"></i>
                            <i class="bi {{ $review['Score'] == 5 ? 'bi-star-fill' : 'bi-star'}}"></i>
                        </div>
                        <p> {{ (new Datetime($review['CreatedAt']))->format('Y-m-d') }}</p>
                    </div>
                    <div class="col-10 mb-3">
                        <pre>{{ $review['Review'] }}</pre>
                    </div>
                </div>
                <hr>
                @endforeach
            </div>
            <div class="tab-pane fade {{ $section == 'similar' ? 'show_active' : '' }} d-flex justify-content-center"
                 id="similar-products" role="tabpanel" aria-labelledby="similar-products-tab">
                @foreach($similarProducts as $similarProduct)
                    @if ($similarProduct['ProductId'] == $productInfo['product_id'])
                        @continue
                    @endif
                <a href="/product/{{$similarProduct['ProductId']}}/details" class="text-center"
                   style="text-decoration: none; margin: 0 10px;">
                    <div class="image-container"
                         style="width: 100px; height: 100px; margin: 10px auto; background: url() no-repeat center; background-size: contain;"></div>
                    <div> {{$similarProduct['Title'] }} </div>
                    <div>$ {{$similarProduct['Price'] }}</div>
                </a>
                @endforeach
            </div>
        </div>
    </div>
</div>
</body>
</html>
