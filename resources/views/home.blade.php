<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome to Marketplace | Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/8879801888.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="antialiased">
@include('components.navbar')
<div class="main-container">
    <div class="col-12" style="height: 100%; overflow: auto;width: 70%; margin: 0 auto; text-align: center;">
        <form action="/search_results" method="get" style="margin: 100px 0;">
            <div class="input-group mb-3">
                <input type="search" class="form-control form-control-lg" placeholder="Search for a Product" required
                       aria-label="Search for a Product" aria-describedby="search-button" name="search">
                <button class="btn btn-primary" type="submit" id="search-button">Search</button>
            </div>
        </form>
        <h4>Or navigate by category:</h4>
        <br>
        <div class="card-container d-flex justify-content-center" style="flex-wrap: wrap;">

            @foreach ($ProductCategories as $index => $category )
                <a href="/search_results?category_id={{$category['CategoryId']}}"
                   class="card align-items-center d-flex justify-content-center"
                   style="width: 30%; height: 150px; margin: 1%; text-decoration: none; color: #000; font-size: 1.2em;
   background-color: {{$colors[$index % count($colors)]}};">
                    <span>{{$category['Title']}}</span>
                </a>
            @endforeach

        </div>
        --}}
        <br>
        <a href="/business/register" class="btn btn-outline-primary">Register Your Business</a>
        <br>
        <br>
    </div>
</div>
</body>
</html>
