<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Login - codeneko™</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{ asset('backEnd/image/logo/icon.png') }}" />
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&family=Spline+Sans:wght@400;500;600;700&display=swap"
        rel="stylesheet">
    <script src="https://kit.fontawesome.com/2952392494.js" crossorigin="anonymous"></script>
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href={{ asset('backEnd/css/styles.css') }} rel="stylesheet" />
    <link href={{ asset('backEnd/css/main.css') }} rel="stylesheet" />
    <script src="https://kit.fontawesome.com/2952392494.js" crossorigin="anonymous"></script>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/sign-in/">

    <script src={{ asset('backEnd/js/jquery.js') }}></script>

</head>

<body>

    @include('backEnd.components.messageModal')

    <div class="container-fluid vh-100 d-flex justify-content-center align-items-center">
        <div class="container d-flex justify-content-center align-items-center">
            <form action="/login" method="POST">
                @csrf
                <div class="w-100 mx-auto d-flex justify-center align-items-center mb-4">
                    <img src="{{ asset('backEnd/image/logo/codeneko-black.png') }}" width="120px" alt=""
                        class="mx-auto ">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control " name="email" id="exampleInputEmail1"
                        aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control " id="exampleInputPassword1">
                </div>
                <button type="submit" class="btn bg-dark text-white form-control">Login</button>
            </form>
        </div>
    </div>


    <script>
        $(document).ready(function() {
                    $(".toast").toast('show');
                });
    </script>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src={{ asset('backEnd/js/scripts.js') }}></script>
</body>

</html>