<!DOCTYPE html>
<html lang="en" translate="no">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Madrid</title>
    <link rel="stylesheet" href="css/commonStyles.css">
    <link rel="stylesheet" href="css/citiesFilter.css">
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

                <div id="hero_img_madrid"></div>
            <section class="filterTitle">

                <div>
                    <p class="filterSectionTitle"><span class="mark">Madrid</span></p>
                    <a id="backBtn" href="/home"><i class="uil uil-arrow-left"></i><p>Go Back</p></a>
                </div>
                <p class="muted">Discover places in Madrid</p>

            </section>

            <section id="categories">
                <button class="categories_btn" id="categoriesMonument" value="monument"><i class="fa-solid fa-landmark-dome"></i> Monument</button>
                <button class="categories_btn" id="categoriesNature" value="nature"><i class="fa-solid fa-leaf"></i> Nature</button>
                <button class="categories_btn" id="categoriesFood" value="food"><i class="fa-solid fa-utensils"></i> Food</button>
                <button class="categories_btn" id="categoriesSecret" value="secret"><i class="fa-solid fa-user-secret"></i> Secret</button>
            </section>
             
            <section id="places" class="responsive_cards">
                @foreach($madridPlaces as $place)
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
            </section>

            </main>
    
        </div>

        <footer>
            <p>Design <span>&</span> Code by <span>&nbsp<i class="fa-solid fa-terminal"></i> Alberto Cid&nbsp</span> 2022</p>
        </footer>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="madridFilter.js"></script>
    <script src="favorites.js"></script>
    <script src="expandCard.js"></script>
    <script src="nav.js"></script>
    <script>
        var url_global = '{{url("/")}}';
        var token = '{{csrf_token()}}';
    </script>
</body>
</html>