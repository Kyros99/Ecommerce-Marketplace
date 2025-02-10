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
<div class="main-container">
    <div class="col-12" style="height: 100%; overflow: auto;">
        <div class="profile-container" style="width: 50%; margin: 50px auto;">
            <div class="form-group row mb-3">
                <h4>
                    <span class="register-icon">
                        <img src="/assets/icons/hacker.png" style="width: 64px; height: 64px; margin-right: 20px;"/>
                    </span>
                    <strong>User Profile</strong>
                </h4>
            </div>
            <br/>
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation" style="cursor: pointer;">
                    <a class="nav-link {{ $section == 'personal' ? 'active' : ''}}" id="personal-info-tab"
                       data-bs-toggle="tab"
                       data-bs-target="#personal-info"
                       type="button" role="tab">Personal Information
                    </a>
                </li>
                <li class="nav-item" role="presentation" style="cursor: pointer;">
                    <a class="nav-link {{ $section == 'security' ? 'active' : ''}}" id="security-info-tab"
                       data-bs-toggle="tab"
                       data-bs-target="#security-info"
                       type="button" role="tab">Security Information
                    </a>
                </li>
                <li class="nav-item" role="presentation" style="cursor: pointer;">
                    <a class="nav-link {{ $section == 'address' ? 'active' : ''}}" id="address-tab"
                       data-bs-toggle="tab" data-bs-target="#address"
                       type="button" role="tab">Address
                    </a>
                </li>
                <li class="nav-item" role="presentation" style="cursor: pointer;">
                    <a class="nav-link {{ $section == 'orders' ? 'active' : ''}}" id="orders-tab" data-bs-toggle="tab"
                       data-bs-target="#orders"
                       type="button" role="tab">Orders
                    </a>
                </li>
            </ul>
            <div class="tab-content" id="profileTabContent">
                <div class="tab-pane fade {{ $section == 'personal' ? 'show active' : ''}}" id="personal-info"
                     role="tabpanel"
                     aria-labelledby="personal-info-tab">
                    <form action="/user/personal" method="post">
                        @csrf
                        <br>
                        @if ( $personal_info_error ?? false)
                            <div class="alert alert-danger" role="alert">{{ $personal_info_error_message}}</div>
                        @endif
                        @if ( $personal_info_success ?? false)
                            <div class="alert alert-success" role="alert">{{ $personal_info_success_message}}</div>
                        @endif
                        <div class="form-group row mb-3">
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="first_name"
                                       value="{{ $first_name ?? ''}}"
                                       placeholder="First Name"
                                       required>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="last_name" value="{{ $last_name ?? ''}}"
                                       placeholder="Last Name"
                                       required>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <div class="col-md-12">
                                <input type="date" class="form-control" name="birth_date" placeholder="Date of Birth"
                                       value="{{ $birth_date ?? ''}}">
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="phone" placeholder="Phone Number"
                                       maxlength="15"
                                       value="{{ $phone ?? ''}}">
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary float-right">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade {{ $section == 'security' ? 'show active' : ''}}" id="security-info"
                     role="tabpanel" aria-labelledby="security-info-tab">
                    <form action="/user/security" method="post">
                        @csrf
                        <br>
                        @if ( $security_info_error ?? false)
                            <div class="alert alert-danger" role="alert">{{ $security_info_error_message}}</div>
                        @endif
                        @if ( $security_info_success ?? false)
                            <div class="alert alert-success" role="alert">{{ $security_info_success_message}}</div>
                        @endif
                        <div class="col-md-12">
                            <input type="email" class="form-control" name="email" placeholder="Email"
                                   value="{{ $email ?? ''}}" required>
                        </div>

                        <div class="form-group row mb-3">
                            <div class="col-md-12">
                                <input type="password" class="form-control" name="new_password"
                                       placeholder="New Password">
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <div class="col-md-12">
                                <input type="password" class="form-control" name="repeat_password"
                                       placeholder="Repeat Password">
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <div class="col-md-12">
                                <input type="password" class="form-control" name="current_password"
                                       placeholder="Current Password" required>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary float-right">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade {{ $section == 'address' ? 'show active' : ''}}" id="address" role="tabpanel"
                     aria-labelledby="address-tab">
                    <form action="/user/address" method="post">
                        @csrf
                        <br>
                        @if ( $address_info_error ?? false)
                            <div class="alert alert-danger" role="alert">{{ $address_info_error_message}}</div>
                        @endif
                        @if ( $address_info_success ?? false)
                            <div class="alert alert-success" role="alert">{{ $address_info_success_message}}</div>
                        @endif
                        <div class="form-group row mb-3">
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="street" placeholder="Address" required
                                       value="{{$street ?? ''}}">
                            </div>
                            <div class="col-md-4">
                                <input type="number" class="form-control" name="number" placeholder="Number" required
                                       value="{{$number ?? ''}}">
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="city" placeholder="City" required
                                       value="{{$city ?? ''}}">
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="postal_code" placeholder="Postal Code"
                                       required
                                       value="{{$postal_code ?? ''}}">
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary float-right">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade {{ $section == 'orders' ? 'show active' : ''}}" id="orders" role="tabpanel"
                     aria-labelledby="orders-tab">
                    <br>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">Order Id</th>
                            <th scope="col">Date Created</th>
                            <th scope="col">Total Price</th>
                            <th scope="col">Info</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders ?? [] as $order)
                            <tr>
                                <th> {{ $order['order_id']}} </th>
                                <td> {{ $order['created_at'] }}</td>
                                <td>$ {{$order['total_price']}} </td>
                                <td>
                                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#orderModal{{ $order['order_id']}}">Info
                                    </button>
                                    <!-- Order Modal -->
                                    <div class="modal fade" id="orderModal{{ $order['order_id']}}" tabindex="-1"
                                         aria-labelledby="orderModal" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-xl">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Order Info
                                                        - {{ $order['order_id']}} </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <table class="table table-bordered">
                                                        <thead>
                                                        <tr>
                                                            <th scope="col">Product</th>
                                                            <th scope="col">Company</th>
                                                            <th scope="col">Amount</th>
                                                            <th scope="col">Price</th>
                                                            <th scope="col">Total Price</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                        @foreach ($order['products'] ?? [] as $product_info )
                                                            <tr>
                                                                <td> {{$product_info['product']['title']}} </td>
                                                                <td>{{$product_info['product']['business']['name']}}</td>
                                                                <td> {{$product_info['amount']}} </td>
                                                                <td>$ {{$product_info['initial_price']}} </td>
                                                                <td>$ {{$product_info['total_price']}}</td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                    <p><strong>Comments:</strong></p>
                                                    <p>{{ $order['comments']}}</p>
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
                        </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
