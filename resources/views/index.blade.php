<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <!--desgin myseft-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/ad763c8084.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="../css/styles.css">

        <!-- Styles -->
    </head>
    <body>
        {{-- <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif --}}

                <nav class=" navbar px-md-0 navbar-expand-lg navbar-dark  pf-nav-light p-3 ">
                    <div class="container">
                        <a class="navbar-brand " href="#">Pets<i>Friend</i>.</a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                            aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                       
                            <div class="collapse navbar-collapse" id="navbarResponsive" >
                             @if (Route::has('login'))
                            @auth
                            <a href="{{ url('/home') }}">Home</a>
                            @else
                            <ul class="navbar-nav ml-auto ">
                                <li class="nav-item ">
                                    <a class="nav-link " href="#">Article</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link"href="{{ route('login') }}">Log In</a>
                                </li>
                            @if (Route::has('register'))
                                <li class="nav-item ">
                                    <a class="nav-link " href="{{ route('register') }}">Resgister</a>
                                </li>
                            @endif
                            </ul>
                            @endauth
                        @endif
                     </div>
                    </div>
                </nav>
                <header class="header img-fluid p-5 ">
                    <div class="header__content text-white text-center   ">
                        <p class="h1 pt-5">We Love To Have Pets</p> 
                        <p class="h2">Will Rock Your Socks Off</p>
                        <a href="#" class="btn btn-primary btn-xl rounded-pill mt-5">Learn More</a>
                    </div>
                </header>
                <section class="section bg-light">
                    <div class="container my-auto text-center">
                        <div class="h2">
                            Visit the pet blog
                        </div>
                        <p class="section__text">This theme features a flexible, UX friendly sidebar menu and stock photos from our
                            friends at Unsplash!
                        </p>
                        <a class="btn btn-dark btn-p mt-5" href="#">What We Offer</a>
                    </div>
                </section>
                <article class="article text-white">
                    <div class="container text-center ">
                        <div class="content-article-heading">
                            <h3 class=" mb-0"><b>WHY US ?</b></h3>
                            <h2 class="mb-5  ">What We Offer</h2>
                            <span><i class="fa fa-paw"></i></span>
                        </div>
                        <div class="row">
                            <div class="col-lg-3 col-md-6 mb-5 justify-content-center">
                                <div class=" icon-item icon-item-1 rounded-circle mx-auto mb-3 ">
                                    <i class="fas fa-paw"></i>
                                </div>
                                <h4>
                                    <strong>Pets</strong>
                                </h4>
                                <p class="text-faded mb-0">ccessories</p>
                            </div>
                            <div class="col-lg-3 col-md-6 mb-5">
                                <div class=" icon-item icon-item-2 rounded-circle mb-3 ">
                                    <i class="fas fa-utensils"></i>
                                </div>
                                <h4>
                                    <strong>Natural and raw</strong>
                                </h4>
                                <p class="text-faded mb-0">Food</p>
            
                            </div>
                            <div class="col-lg-3 col-md-6 mb-5">
                                <div class=" icon-item icon-item-3 rounded-circle mb-3 ">
                                    <i class="fas fa-fish"></i>
                                </div>
                                <h4>
                                    <strong>Professional</strong>
                                </h4>
                                <p class="text-faded mb-0">Grooming</p>
            
                            </div>
                            <div class="col-lg-3 col-md-6 mb-5">
                                <div class=" icon-item icon-item-4 rounded-circle mb-3 ">
                                    <i class="fas fa-dove"></i>
                                </div>
                                <h4>
                                    <strong>Pets</strong>
                                </h4>
                                <p class="text-faded mb-0">Accessories</p>
                            </div>
                        </div>
                    </div>
                </article >
                <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
       
            </div>
        </div>
    </body>
</html>
