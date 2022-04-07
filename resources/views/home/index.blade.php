<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/commonStyles.css">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
</head>
<body>
    <div id="wrapper">

        <header>

            <button id="hamburger"> <!-- botón hamburguesa del menu mobile -->
                <div class="bar"></div>
            </button>

            <a href="/home" id="logo">City<span>Point</span></a>

            <img src="/assets/userPlaceholderImg.png" alt="User Pic" id="userPic">

        </header>
        <div id="content">

            <main>
    
                <section id="title">
                    <h2>Explore</h2>
                    <p>What do you want to discover?</p>
                </section>
    
                <section id="categories">
                    <button id="categoriesMonument">Monument</button>
                    <button id="categoriesNature">Nature</button>
                    <button id="categoriesFood">Food</button>
                    <button id="categoriesSecret">Secret</button>
                </section>
    
                <section id="cities">
                    <div class="city">Sevilla</div>
                    <div class="city">Madrid</div>
                    <div class="city">Valencia</div>
                    <div class="city">Lisboa</div>
                </section>
    
                <section id="random">
                <h2>Random Places</h2>
    
                    @foreach($places as $place)
                        <div class="card">
                            <img src="{{$place -> place_img}}" alt="">
                            <div>
                                <h2>{{$place -> place_title}}</h2>
                                <p><i class="uil uil-map-marker"></i><a href="https://goo.gl/maps/DPLZUp7RGxfpQ6qM6" target="_BLANK">{{$place -> place_city}}</a></p>
                                <p>{{$place -> place_description}}</p>
                            </div>
                        </div>
                    @endforeach
    
                </section>
    
            
    
            </main>
    
            <aside id="favorites">
                <h2>Favorite Places</h2>
            </aside>
        </div>

        <footer></footer>

        

    </div>
</body>
</html>