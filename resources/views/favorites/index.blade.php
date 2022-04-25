<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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

            <section id="title">

                <div>
                    <p class="sectionTitle">Favorite Places</p>
                    <a id="backBtn" href="/home"><i class="uil uil-arrow-left"></i><p>Go Back</p></a>
                </div>
                <p class="muted">Your favorites</p>

            </section>
             
            <section id="places">
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
        var url_global = '{{url("/")}}';
        var token = '{{csrf_token()}}';
    </script>
</body>
</html>