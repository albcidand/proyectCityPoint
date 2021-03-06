<!DOCTYPE html>
<html lang="en" translate="no">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Favorites</title>
    <link rel="stylesheet" href="css/commonStyles.css">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div id="wrapper">
        
        <header>

            <div class="blur"></div>
            <nav id="mobileNav">

                <div id="mobileNavContainer">
                    <a href="/home">
                    <i class="uil uil-house-user"></i>
                        <h3>Home</h3>
                    </a>
    
                    <a href="#">
                    <i class="uil uil-user"></i>
                        <h3>Profile</h3>
                    </a>
    
                    <a href="/favorites">
                    <i class="uil uil-heart"></i>
                        <h3>Favorites</h3>
                    </a>
    
                    <a href="#">
                    <i class="uil uil-envelope-check"></i>
                        <h3>Messages</h3>
                    </a>
    
                    <a href="#">
                    <i class="uil uil-setting"></i>
                        <h3>Settings</h3>
                    </a>
    
                    <a href="#">
                    <i class="uil uil-plus-circle"></i>
                        <h3>Add Place</h3>
                    </a>

                    <div class="themeToggler">
                        <span class="light themeActive"><i class="uil uil-sun"></i></span>
                        <span class="dark"><i class="uil uil-moon"></i></span>
                    </div>
    
                    <a href="/">
                    <i class="uil uil-signout"></i>
                        <h3>Logout</h3>
                    </a>
                </div>
                
            </nav>

            <button id="hamburger">
                <div class="bar"></div>
            </button>

            <a href="/home" id="logo">City<span>Point</span></a>

            <img src="/assets/userPlaceholderImg.png" alt="User Pic" id="userPic">

        </header>

        <div id="content">

            <nav id="desktopNav">
                <div id="dsktpNavContainer" class="dsktp">
                    <a href="/home">
                    <i class="uil uil-estate"></i>
                        <h3>Home</h3>
                    </a>
    
                    <a href="#">
                    <i class="uil uil-user"></i>
                        <h3>Profile</h3>
                    </a>
    
                    <a href="/favorites">
                    <i class="uil uil-heart"></i>
                        <h3>Favorites</h3>
                    </a>

                    <a href="#">
                    <i class="uil uil-envelope-check"></i>
                        <h3>Messages</h3>
                    </a>
    
                    <a href="#">
                    <i class="uil uil-setting"></i>
                        <h3>Settings</h3>
                    </a>
    
                    <a href="#">
                    <i class="uil uil-plus-circle"></i>
                        <h3>Add Place</h3>
                    </a>

                    <div class="themeToggler">
                        <span class="light themeActive"><i class="uil uil-sun"></i></span>
                        <span class="dark"><i class="uil uil-moon"></i></span>
                    </div>

                    <a href="/">
                    <i class="uil uil-signout"></i>
                        <h3>Logout</h3>
                    </a>
                </div>
            </nav>

            <main id="responsive_main">

            <section id="title">

                <div>
                    <p class="filterSectionTitle"><span class="mark">Favorite</span> Places</p>
                    <a id="backBtn" href="/home"><i class="uil uil-arrow-left"></i><p>Go Back</p></a>
                </div>
                <p class="muted">Your favorites</p>

            </section>
             
            <section id="places" class="responsive_cards">

                <!-- comprobamos si la respuesta que recibimos del back (FavoriteListController.php) contiene alg??n lugar o si por el contrario est?? vac??a -->

                @if (!isset($favoritePlaces[0]))

                    <!-- si est?? vac??a mostramos una notificaci??n que haga de placeholder -->

                    <p id="notification" class="muted">You don't have any favorites yet.<br>Try adding a couple.</p>

                @else

                    <!-- si no est?? vac??a recorremos los datos y los mostramos -->

                    @foreach($favoritePlaces as $favorite)
                                <div class="card">
                                    <button class="fav_btn btn_active" value="{{$favorite -> place_id}}"><i class="uil uil-heart likeHeart fav_active"></i></button>
                                    <img src="{{$favorite -> place_img}}" alt="">
                                    <div>
                                        <h3>{{$favorite -> place_title}}</h3>
                                        <p><i class="uil uil-map-marker"></i><a href="{{$favorite -> place_location}}" target="_BLANK">{{$favorite -> place_city}}</a></p>
                                        <p class="hidden_info">{{$favorite -> place_description}}</p>
                                    </div>
                                    <p id="srcMap" class="hidden_info">{{$favorite -> place_map}}</p>
                                </div>
                    @endforeach

                @endif
            </section>

            </main>
    
        </div>

        <footer>
            <p>Design <span>&</span> Code by <span>&nbsp<i class="fa-solid fa-terminal"></i> Alberto Cid&nbsp</span> 2022</p>
        </footer>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="expandCard.js"></script>
    <script src="userFavorites.js"></script>
    <script src="nav.js"></script>
    <script>
        var url_global = '{{url("/")}}'; /* la variable url_global contiene la url base de la vista */
        var token = '{{csrf_token()}}'; /* la variable token contiene el csrf_token necesario para poder hacer las peticiones ajax */
    </script>
</body>
</html>