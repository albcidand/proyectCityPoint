<!DOCTYPE html>
<html lang="en" translate="no">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/commonStyles.css">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div id="wrapper">

        <header>
            <div class="blur"></div>
            <nav id="mobileNav">

                <div id="mobileNavContainer">
                    <a href="#">
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

            <button id="hamburger">
                <div class="bar"></div>
            </button>

            <a href="/home" id="logo">City<span>Point</span></a>

            <img src="/assets/userPlaceholderImg.png" alt="User Pic" id="userPic"> 

        </header>
        <div id="content">
            
            <nav id="desktopNav">
                <div id="dsktpNavContainer">
                    <a href="#">
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

            <main>
    
                <section id="titleHomeContainer">
                    <div id="titleHome">
                        <h2>Discover<br><span>New</span> Places.</h2>
                        <div id="image"></div>
                    </div>
                </section>
    
                <section id="cities">
                    <a class="city" href="/seville"><p>Seville</p></a>
                    <a class="city" href="/madrid"><p>Madrid</p></a>
                    <a class="city" href="/valencia"><p>Valencia</p></a>
                    <a class="city" href="/lisbon"><p>Lisbon</p></a>
                </section>

                <section id="categories">
                    <div class="categoriesBtn">
                        <a href="/monuments"><i class="fa-solid fa-landmark-dome"></i><p>Monument</p></a>
                    </div>
                    <div class="categoriesBtn">
                        <a href="/nature"><i class="fa-solid fa-leaf"></i><p>Nature</p></a>
                    </div>
                    <div class="categoriesBtn">
                        <a href="/food"><i class="fa-solid fa-utensils"></i><p>Food</p></a>
                    </div>
                    <div class="categoriesBtn">
                        <a href="/secret"><i class="fa-solid fa-user-secret"></i><p>Secret</p></a>
                    </div>
                </section>
    
                <section id="random">
                <p class="sectionTitle"><span class="mark">Random</span> Places</p>
                    <div id="cardContainer">
                        @foreach($randomPlaces as $place)
                        
                            <div class="card">
                                <button class="fav_btn" value="{{$place -> place_id}}"><i class="uil uil-heart likeHeart"></i></button>
                                <img src="{{$place -> place_img}}" alt="">
                                <div>
                                    <h3>{{$place -> place_title}}</h3>
                                    <p><i class="uil uil-map-marker"></i><a href="{{$place -> place_location}}" target="_BLANK">{{$place -> place_city}}</a></p>
                                    <p class="hidden_info">{{$place -> place_description}}</p>
                                </div>
                                <p id="srcMap" class="hidden_info">{{$place -> place_map}}</p>
                            </div>

                        @endforeach
                    </div>
    
                </section>
    
            
    
            </main>
    
            <aside id="favorites">
                <p class="sectionTitle"><span class="mark">Favorite</span> Places</p>

                <div id="cardContainer" class="fav_places">
                    
                    @if (!isset($favoritePlaces[0]))
                    <p id="notification" class="muted">You don't have any favorites yet.<br>Try adding a couple.</p>
                    @else
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
                </div>

                <div id="seeMoreFavBtn"><a href="/favorites">See more favorites</a></div>

            </aside>
        </div>

        <footer>
            <p>Design <span>&</span> Code by <span>&nbsp<i class="fa-solid fa-terminal"></i> Alberto Cid&nbsp</span> 2022</p>
        </footer>

        

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="home.js"></script>
    <script src="expandCard.js"></script>
    <script src="nav.js"></script>

    <script>
        var url_global = '{{url("/")}}';
        var token = '{{csrf_token()}}';
    </script>
</body>
</html>