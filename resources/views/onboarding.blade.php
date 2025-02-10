<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome to Marketplace | Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/8879801888.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/main/onboarding.css" rel="stylesheet">
</head>
<body class="antialiased" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0;">
<div class="main-container row" style="height: 100%;">
    <div class="col-5" style="background: #019eff; height: 100%; padding-top: 10%; color: #fff;">
        <div class="m-auto" style="width: 70%; text-align: center;">
            <img src="/assets/icons/store_color.png" width="150"/>
            <br>
            <br>
            <br>
            <br>
            <h2>Welcome to Big Market!</h2>
            <br>
            <h2>Find everything you need in a click of a button.</h2>
        </div>
    </div>
    <div class="col-7" style="height: 100%; overflow: auto;">
        <form action="/onboarding" method="post" style="width: 50%; margin: 50px auto;">
            @csrf
            <div class="form-group row">
                <h4>
                    <span class="register-icon">
                        <img src="/assets/icons/hacker.png" style="width: 64px; height: 64px; margin-right: 20px;"/>
                    </span>
                    <strong>Complete your profile</strong>
                </h4>
            </div>
            <br/>
            @if ( $error ?? false)
                <div class="alert alert-danger" role="alert">{{$error_message}}</div>
            @endif
            <p><strong>Personal Info</strong></p>
            <hr/>
            <div class="form-group row">
                <div class="col-md-6">
                    <input type="text" class="form-control" name="first_name" value="{{$first_name ?? ''}}"
                           placeholder="First Name"
                           required>
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="last_name" value="{{$last_name ?? ''}}"
                           placeholder="Last Name"
                           required>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-12">
                    <input type="date" class="form-control" name="birth_date" placeholder="Date of Birth"
                           value="{{$birth_date ?? ''}}">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-12">
                    <input type="text" class="form-control" name="phone" placeholder="Phone Number" maxlength="15"
                           value="{{$phone ?? ''}}">
                </div>
            </div>
            <p><strong>Your Address</strong></p>
            <hr/>
            <div class="form-group row">
                <div class="col-md-8">
                    <input type="text" class="form-control" name="street" placeholder="Address" required
                           value="{{$street ?? ''}}">
                </div>
                <div class="col-md-4">
                    <input type="number" class="form-control" name="number" placeholder="Number" required
                           value="{{$number ?? ''}}">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-8">
                    <input type="text" class="form-control" name="city" placeholder="City" required
                           value="{{$city ?? ''}}">
                </div>
                <div class="col-md-4">
                    <input type="text" class="form-control" name="postal_code" placeholder="Postal Code" required
                           value="{{$postal_code ?? ''}}">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary float-right">Continue</button>
                    <a href="/" target="_self" class="btn btn-outline-secondary float-right right"
                       style="margin-right: 10px;">Skip this step</a>
                </div>
            </div>
        </form>
    </div>
</div>
</body>
</html>
