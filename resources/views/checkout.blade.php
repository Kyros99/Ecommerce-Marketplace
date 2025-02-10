<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome to Marketplace | Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/8879801888.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/main/core.css" rel="stylesheet">
</head>
<body class="antialiased">
@include('components.navbar')
<div class="main-container" style="width: 65%; margin: 50px auto;">
    <form action="/checkout" method="post" class="row">
        @csrf
        <div class="col-4" style="height: 100%; overflow: auto;">
            <div class="form-group row mb-3">
                <h4>
                    <span class="cart-icon">
                        <img src="/assets/icons/hacker.png"
                             style="width: 64px; height: 64px; margin-right: 20px;"/>
                    </span>
                    <strong>Your Address</strong>
                </h4>
            </div>
            @if(!empty($userAddress))
                <span
                    class="badge bg-info text-dark">{{ $userAddress['street']. ' ' .$userAddress['number']. ' '.$userAddress['city']. ' '.$userAddress['postal_code']}}</span>
            @else
                <div class="form-group row mb-3">
                    <input type="text" class="form-control" name="street" placeholder="Address" required>
                </div>
                <div class="form-group row mb-3">
                    <input type="number" class="form-control" name="number" placeholder="Number" required>
                </div>
                <div class="form-group row mb-3">
                    <input type="text" class="form-control" name="city" placeholder="City" required>
                </div>
                <div class="form-group row mb-3">
                    <input type="text" class="form-control" name="postal_code" placeholder="Postal Code" required>
                </div>
            @endif
        </div>
        <div class="col-8" style="height: 100%; overflow: auto;">
            <div class="products-container">
                <div class="form-group row mb-3">
                    <h4>
                    <span class="cart-icon">
                        <img src="/assets/icons/shopping-cart.png"
                             style="width: 64px; height: 64px; margin-right: 20px;"/>
                    </span>
                        <strong>Your Products</strong>
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
                                <a href="/products/{{$cartProduct['product_id']}}">{{$cartProduct['product']['title']}}</a>
                            </td>
                            <td>
                                <span>{{$cartProduct['amount']}}</span>
                            </td>
                            <td>$ {{$cartProduct['product']['price']}} </td>
                            <td>
                                $ {{number_format((float)$cartProduct['amount']*(float)$cartProduct['product']['price'],2)}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <br>
            <h3 class="text-end">Total Amount: $ {{number_format($totalPrice,2)}}</h3>
            <br>
            <div class="col-12 mb-3">
                <textarea class="form-control" name="comments"></textarea>
            </div>
            <div class="col-12 mb-3">
                <div class="form-check">
                    <input id="order-terms" class="form-check-input" type="checkbox" name="terms" required>
                    <label class="form-check-label" for="order-terms">I have read and accept the Terms and Conditions
                        and
                        Privacy Policy for this order.</label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Create Order</button>
        </div>
    </form>
</div>
</body>
</html>
