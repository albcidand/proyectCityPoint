<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
                    <i class="uil uil-setting"></i>
                        <h3>Settings</h3>
                    </a>
    
                    <a href="/">
                    <i class="uil uil-signout"></i>
                        <h3>Logout</h3>
                    </a>
                </div>
                
            </nav>

            <nav id="desktopNav"></nav>

            <button id="hamburger">
                <div class="bar"></div>
            </button>

            <a href="/home" id="logo">City<span>Point</span></a>

            <img src="/assets/userPlaceholderImg.png" alt="User Pic" id="userPic">

        </header>

        <div id="content">

            <main>

                <div id="hero_img_lisbon"></div>
            <section class="filterTitle">

                <div>
                    <p class="sectionTitle">Lisbon</p>
                    <a id="backBtn" href="/home"><i class="uil uil-arrow-left"></i><p>Go Back</p></a>
                </div>
                <p class="muted">Discover places in Lisbon</p>

            </section>

            <section id="categories">
                <button class="categories_btn" id="categoriesMonument" value="monument"><i class="fa-solid fa-landmark-dome"></i> Monument</button>
                <button class="categories_btn" id="categoriesNature" value="nature"><i class="fa-solid fa-leaf"></i> Nature</button>
                <button class="categories_btn" id="categoriesFood" value="food"><i class="fa-solid fa-utensils"></i> Food</button>
                <button class="categories_btn" id="categoriesSecret" value="secret"><i class="fa-solid fa-user-secret"></i> Secret</button>
            </section>
             
            <section id="places">
                @foreach($lisbonPlaces as $place)
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
    <script src="lisbonFilter.js"></script>
    <script src="favorites.js"></script>
    <script src="expandCard.js"></script>
    <script src="nav.js"></script>
    <script>
        var url_global = '{{url("/")}}';
        var token = '{{csrf_token()}}';
    </script>
    
</body>
</html>