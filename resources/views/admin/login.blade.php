<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>CMS Penyelenggaraan</title>

    <!-- Fav icon -->
    <link rel="shortcut icon" href="/assets/favicon.ico" type="image/x-icon">

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

    </style>


    <!-- Custom styles for this template -->
    <link href="/assets/css/signin.css" rel="stylesheet">
</head>

<body class="text-center">

    <main class="form-signin">
        <form action="/login" method="POST">
            @csrf
            <img class="mb-4" src="https://i.imgur.com/SejXrSF.png" alt="" width="72" height="57">
            <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
            {{-- Success alert --}}
            @if (session()->has('success'))
            <div class="alert alert-secondary" role="alert">
                <div class="text-center">
                    {{ session('success') }}
                </div>
            </div>
            @endif

            {{-- Error alert --}}
            @if (session()->has('loginError'))
            <div class="alert alert-danger" role="alert">
                <div class="text-center">
                    {{ session('loginError') }}
                </div>
            </div>
            @endif
            <div class="form-floating">
                <input type="text" name="username" class="form-control" id="floatingInput" placeholder="Username...">
                <label for="floatingInput">Username</label>
            </div>
            <div class="form-floating">
                <input type="password" name="password" class="form-control" id="floatingPassword"
                    placeholder="Password...">
                <label for="floatingPassword">Password</label>
            </div>

            <div class="checkbox mb-3">
                <label>
                    <input type="checkbox" value="remember-me"> Remember me
                </label>
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
            <p class="mt-5 mb-3 text-muted">
                Hakcipta Terpelihara &copy; {{ date('Y') }}<br>
                Jabatan Ukur dan Pemetaan Malaysia
            </p>
        </form>
    </main>



</body>

</html>
