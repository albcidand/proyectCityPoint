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
</head>
<body>
    <div id="wrapper">
        
        <header>

            <button id="hamburger">
                <div class="bar"></div>
            </button>

            <a href="/home" id="logo">City<span>Point</span></a>

            <img src="/assets/userPlaceholderImg.png" alt="User Pic" id="userPic">

        </header>

        <div id="content">

            <main>

                <div id="hero_img_lisbon"></div>
            <section id="title">

                <div>
                    <h2>Lisbon</h2>
                    <a href="/home"><i class="uil uil-arrow-left"></i> Go Back</a>
                </div>
                <p>Discover places in Lisbon</p>

            </section>

            <section id="categories">
                <button class="categories_btn" id="categoriesMonument" value="monument">Monument</button>
                <button class="categories_btn" id="categoriesNature" value="nature">Nature</button>
                <button class="categories_btn" id="categoriesFood" value="food">Food</button>
                <button class="categories_btn" id="categoriesSecret" value="secret">Secret</button>
            </section>
             
            <section id="places">
                @foreach($lisbonPlaces as $place)
                            <div class="card">
                                <button class="fav_btn" value="{{$place -> place_id}}"><i class="uil uil-heart"></i></button>
                                <img src="{{$place -> place_img}}" alt="">
                                <div>
                                    <h2>{{$place -> place_title}}</h2>
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
            <p>Coded by <span>Alberto Cid</span>| <i class="far fa-copyright"></i> 2022 All rights reserved</p>
        </footer>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="lisbonFilter.js"></script>
    <script src="favorites.js"></script>
    <script src="expandCard.js"></script>
    <script>
        var url_global = '{{url("/")}}';
        var token = '{{csrf_token()}}';
    </script>
    
</body>
</html>