<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Welcome To Smart Wallet</title>

    <!-- Bootstrap core CSS -->
    <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i"
        rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="/css/my-style.min.css" rel="stylesheet" />
    <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="/vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css">
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-warning">
        <a class="navbar-brand ml-lg-5" href="/"><b><span class="text-white">Smart</span><span
                    class="text-success">Wallet</span></b></a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId"
            aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation"> <span
                class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav ml-auto mt-2 m-2 mt-lg-0 mr-5">
                @guest
                    <li class="nav-item">
                        <a class="nav-link text-dark " href="{{ route('register') }}">Register</a>
                    </li>
                    <li class="nav-item mt-2 mt-lg-0">
                        <a class="nav-link text-dark" href="{{ route('login') }}">Log In</a>
                    </li>
                @endguest
                @auth
                    <li class="nav-item">
                        <a class="nav-link btn btn-success text-white " href="{{ route('home') }}">Dashboard</a>
                    </li>

                @endauth

            </ul>

        </div>
    </nav>
    <header class="masthead text-center text-white">
        <div class="masthead-content">
            <div class="container">
                <h2 class="masthead-subheading mb-0">Online Wallet Transactions</h2>
                <a href="{{ route('register') }}" class="btn btn-primary btn-xl rounded-pill mt-5">GET STARTED</a>
            </div>
        </div>

    </header>

    <section class="features-icons bg-light text-center">
        <div class="container">
            <div class="row">

                <div class="col-lg-6 ">
                    <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                        <div class="features-icons-icon d-flex">
                            <i class="icon-layers m-auto text-primary"></i>
                        </div>
                        <h3>Welcome to Smart Wallet</h3>
                        <p class="lead mb-0">Sign Up, Fund Your Wallet, Make transfer of virtual money to friends using
                            their unique wallet id.</p>
                    </div>
                </div>
                <div class="col-lg-6 ">
                    <div class="features-icons-item mx-auto mb-0 mb-lg-3">
                        <div class="features-icons-icon d-flex">
                            <i class="icon-check m-auto text-primary"></i>
                        </div>
                        <h3>Easy to Use</h3>
                        <p class="lead mb-0">This is a simple web application that allows users to fund their account
                            easily and also be able to transfer funds to friends. You can also Ask a friend to fund you.
                            It's so easy to use.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer -->
    <footer class="py-5 bg-black">
        <div class="container">
            <p class="m-0 text-center text-white small">
                Copyright &copy; Smart Wallet 2020. Sunny Ojo...
            </p>
        </div>
        <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>
