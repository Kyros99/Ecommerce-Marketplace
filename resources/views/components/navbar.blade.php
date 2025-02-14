<div class="navbar navbar-expand-lg navbar-light">
    <div class="container-fluid">
        <a class="navbar-brand nav-link active" aria-current="page" href="/">
            <img src="/assets/icons/store.png" width="24" style="margin-right: 10px;"/>
            <span>Big Market</span>
        </a>
        <div class="d-flex">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="/cart">
                        <img src="/assets/icons/shopping-cart.png" width="24" style="margin-right: 10px;"/>
                    </a>
                </li>

                <!-- Check if user is logged in -->
                @if(session()->has('first_name') && session()->has('last_name'))
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                           data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="/assets/icons/user-profile.png" width="24" style="margin-right: 10px;"/>
                            <span> {{ session('first_name') . ' ' . session('last_name') }} </span>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="/user">Settings</a></li>
                            <li><a class="dropdown-item" href="/business">My Business</a></li>
                            <li><a class="dropdown-item" href="/logout">Logout</a></li>
                        </ul>
                    </li>
                @else
                    <!-- If user is NOT logged in, show Login button -->
                    <li class="nav-item">
                        <a class="nav-link" href="/login">
                            <img src="/assets/icons/user-profile.png" width="24" style="margin-right: 10px;"/>
                            <span>Login</span>
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</div>
