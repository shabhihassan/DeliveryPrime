<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"/>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
          integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!-- Stylesheet -->
    <link rel="stylesheet" href="{{asset('/style/style.css')}}"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>Food Delivery</title>
</head>

<body>
<!-- Navbar -->
<nav class="navbar fixed-top navbar-dark text-white bg-dark">
    <div class="container-xxl py-3">
        <div class="col-md-4 left">

            <a href="/" class="text-white text-decoration-none">
                <h2 class="d-inline">Delivery Prime</h2>
            </a>

        </div>

        <div class="col-md-4 right ms-auto ">
            <div class="d-flex align-items-center justify-content-end">

                @if(auth()->check())
                    @if(auth()->user()->role->name == 'Customer' )
                        <a href="/customer/home"
                           class="navbtn btn btn-light text-dark btn-outline-light btn-md px-4 py-2 mx-1">
                            Dashboard
                        </a>
                    @elseif(auth()->user()->role->name == 'Business' )
                        <a href="/business/home"
                           class="navbtn btn btn-light text-dark btn-outline-light btn-md px-4 py-2 mx-1">
                            Dashboard
                        </a>

                    @elseif(auth()->user()->role->name == 'Admin' )
                        <a href="/admin/home"
                           class="navbtn btn btn-light text-dark btn-outline-light btn-md px-4 py-2 mx-1">
                            Dashboard
                        </a>

                    @endif

                @else
                    <a href="/login" class="navbtn btn btn-light text-dark btn-outline-light btn-md px-4 py-2 mx-1">
                        Login
                    </a>
                    <a href="/register" class="navbtn btn btn-light text-dark btn-outline-light btn-md px-4 py-2 mx-1">
                        Sign Up
                    </a>

                @endif

            </div>
        </div>
    </div>
</nav>


{{$slot}}


<footer class="bg-dark text-white py-2">
    <h6 class="container-lg py-1 text-center">© 2022 Delivery Prime.</h6>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>


<script src="{{asset('/js/app.js')}}"></script>
<script src="{{asset('/js/validate.js')}}"></script>
</body>

</html>
