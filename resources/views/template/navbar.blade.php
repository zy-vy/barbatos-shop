<nav class="navbar navbar-expand-lg navbar-light bg-light ">


    <div class="collapse navbar-collapse px-5" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item active">
                <a class="nav-link" href="/">Home <span class="sr-only"></span></a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Category
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                    @php
                        $categories = App\Models\Category::orderBy('name')->get();
                    @endphp
                    @foreach ($categories as $category)
                        <a class="dropdown-item" href="/category/{{ $category->name }}">{{ $category->name }}</a>
                    @endforeach

                </div>
            </li>
            @auth
            @if (Auth::user()->role == 'Admin')
                <li class="nav-item">

                    <a class="nav-link" href="/manage">Manage Product</a>
                </li>
            @endif
            @endif

        </ul>
        <ul class="navbar-nav ms-auto">
            @auth
                @if (Auth::user()->role == 'Customer')
                    <a href="/cart" class="mx-2"><button type="button" class="btn btn-outline-success">Cart</button>
                    </a>
                    <a href="/history">
                        <button type="button" class="btn btn-outline-dark">History</button>

                    </a>
                @endif

                <form action="/logout" class="mx-2" method="get">
                    <button type="submit" class="btn btn-primary">Log Out</button>

                </form>
                <a class="nav-link dropdown-toggle" href="/profile" id="navbarDropdown" role="button" data-toggle="#"
                    aria-haspopup="true" aria-expanded="false">
                    {{ Auth::user()->name }}
                </a>
            @else
                <li class="nav-item">

                    <a class="nav-link" href="/login">login</a>
                </li>
                <li class="nav-item">

                    <a class="nav-link" href="/register">register</a>
                </li>

                @endif
            </ul>

        </div>
    </nav>
