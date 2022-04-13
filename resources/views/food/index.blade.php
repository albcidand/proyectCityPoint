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

            <section id="title">
                    <h2>FOOD PLACES</h2>
                    <p>A selection of food related places from cities all around the world</p>
            </section>
             
            <section id="places">
                @foreach($food as $food_place)
                            <div class="card">
                                <button class="fav_btn" value="{{$food_place -> place_id}}"><i class="uil uil-heart-alt"></i></button>
                                <img src="{{$food_place -> place_img}}" alt="">
                                <div>
                                    <h2>{{$food_place -> place_title}}</h2>
                                    <p><i class="uil uil-map-marker"></i><a href="{{$food_place -> place_location}}" target="_BLANK">{{$food_place -> place_city}}</a></p>
                                    <p>{{$food_place -> place_description}}</p>
                                </div>
                            </div>
                @endforeach
            </section>

            </main>
    
        </div>

        <footer>
            <p>Coded by <span>Alberto Cid</span>| <i class="far fa-copyright"></i> 2022 All rights reserved</p>
        </footer>
    </div>
</body>
</html>