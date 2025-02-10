
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome to Marketplace | Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/8879801888.js" crossorigin="anonymous"></script>
    <link href="/css/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="/css/main/login.css" rel="stylesheet">
</head>
<body class="antialiased">
<div class="main-container row">
    <div class="col-7">
        <form action="/login" method="post" style="width: 50%; margin: 50px auto;">
            @csrf
            <div class="form-group row">
                <h4>
                    <span class="register-icon">
                        <img src="/assets/icons/store.png" style="width: 64px; height: 64px; margin-right: 20px;"/>
                    </span>
                    <strong>Login</strong>
                </h4>
            </div>
            <br/>
            @if($error ?? false)
                <div class="alert alert-danger" role="alert">{{$error_message}}</div>
            @endif
            <div class="form-group row">
                <input type="email" class="form-control" name="email" value="{{$email ?? ''}}" placeholder="Email"
                       required>
            </div>
            <div class="form-group row">
                <input type="password" class="form-control" name="password" placeholder="Password" required>
            </div>
            <div class="form-group row">
                <div class="col-md-9">
                    <input class="form-check-input" type="checkbox" value="1" id="remember_me" name="remember_me">
                    <label class="form-check-label" for="remember_me">Remember Me</label>
                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-primary float-right">Login</button>
                </div>
            </div>
            <hr>
            <div class="text-center social_login_wrapper">
                <a href="/facebook_login_url" class="btn btn-outline-primary facebook">
                    <span>Continue with Facebook</span>
                    <i class="fa fa-facebook"></i>
                </a>
            </div>
            <hr>
            <p class="text-center">Not a Member Yet? - <a target="_self" href="/register">Register</a></p>
        </form>
    </div>
    <div class="col-5">
        <img src="/assets/images/marketplace.jpg" width="100%"/>
    </div>
</div>
</body>
</html>
