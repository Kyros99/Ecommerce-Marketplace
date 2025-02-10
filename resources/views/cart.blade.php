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
        <div class="cart-container" style="width: 50%; margin: 50px auto;">
            <div class="form-group row mb-3">
                <h4>
                    <span class="register-icon">
                        <img src="/assets/icons/shopping-cart.png"
                             style="width: 64px; height: 64px; margin-right: 20px;"/>
                    </span>
                    <strong>Your Cart</strong>
                </h4>
            </div>
            <br/>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th scope="col">Product Id</th>
                    <th scope="col">Title</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Price per Unit</th>
                    <th scope="col">Total Price</th>
                </tr>
                </thead>
                <tbody>
                @foreach($cartProducts as $cartProduct)
                    <tr>
                        <th scope="row">{{$cartProduct['product_id']}}</th>
                        <td>
                            <a href="/product/{{$cartProduct['product_id']}}">{{$cartProduct['product']['title']}}</a>
                        </td>
                        <td>
                            <span>{{$cartProduct['amount']}}</span>
                            <form id="cart-increase-amount-{{$cartProduct['product_id']}}"
                                  action="/cart/products/{{$cartProduct['product_id']}}/update" method="post"
                                  class="float-end">
                                @csrf
                                <input type="hidden" name="amount" value="1">
                                <span class="badge bg-success" style="cursor: pointer;"
                                      onclick="document.getElementById('cart-increase-amount-{{$cartProduct['product_id']}}').submit();">+</span>
                            </form>
                            <form id="cart-decrease-amount-{{$cartProduct['product_id']}}"
                                  action="/cart/products/{{$cartProduct['product_id']}}/update" method="post"
                                  class="float-end" style="margin: 0 5px;">
                                @csrf
                                <input type="hidden" name="amount" value="-1">
                                <span class="badge bg-danger" style="cursor: pointer;"
                                      onclick="document.getElementById('cart-decrease-amount-{{$cartProduct['product_id']}}').submit();">-</span>
                            </form>
                        </td>
                        <td>$ {{$cartProduct['product']['price']}}</td>
                        <td>
                            $ {{number_format((float)$cartProduct['amount']*(float)$cartProduct['product']['price'],2)}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            @if(!empty($cartProducts))
                <div class="order-container d-flex justify-content-center">
                    <a href="/checkout" class="btn btn-primary">Create Order</a>
                </div>
            @endif
        </div>
    </div>
</div>
</body>
</html>
