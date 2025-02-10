<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome to Marketplace | Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/8879801888.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="antialiased" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0;">
    <div class="main-container row" style="height: 100%;">
        <div class="col-5" style="background: #019eff; height: 100%; padding-top: 10%; color: #fff;">
            <div class="m-auto" style="width: 70%; text-align: center;">
                <img src="/assets/icons/store_color.png" width="150" />
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
            <form action="/business/register" method="post" style="width: 50%; margin: 50px auto;">
                @csrf
                <div class="form-group row mb-3">
                    <h4>
                        <span class="register-icon">
                            <img src="/assets/icons/store.png" style="width: 64px; height: 64px; margin-right: 20px;" />
                        </span>
                        <strong>Register Your Business</strong>
                    </h4>
                </div>
                <br />
                @if ($error ?? false)
                    <div class="alert alert-danger" role="alert">{{ $error_message }}</div>
                @endif
                <div class="form-group row mb-3">
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="name" value="{{ $name ?? '' }}"
                            placeholder="Name" required>
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <div class="col-md-12">
                        <select class="form-control" name="sector">
                            <option value="technology" {{ $sector ?? '' == 'technology' ? 'selected' : '' }}>Technology
                            </option>
                            <option value="clothes" {{ $sector ?? '' == 'clothes' ? 'selected' : '' }}>Clothes</option>
                            <option value="books" {{ $sector ?? '' == 'books' ? 'selected' : '' }}>Books</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <div class="col-md-12">
                        <textarea class="form-control" name="description">{{ $description ?? '' }}</textarea>
                    </div>
                </div>
                <div class="col-12 mb-3">
                    <div class="form-check">
                        <input id="order-terms" class="form-check-input" type="checkbox" name="terms" required>
                        <label class="form-check-label" for="order-terms">I accept the Terms and Conditions of
                            Use.</label>
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary float-right">Register</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
