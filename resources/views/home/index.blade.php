<!DOCTYPE html>
<html lang="en">
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
                    <button id="categoriesMonument"><a href="/monuments">Monument</a></button>
                    <button id="categoriesNature"><a href="/nature">Nature</a></button>
                    <button id="categoriesFood"><a href="/food">Food</a></button>
                    <button id="categoriesSecret"><a href="/secret">Secret</a></button>
                </section>
    
                <section id="cities">
                    <div class="city">Sevilla</div>
                    <div class="city">Madrid</div>
                    <div class="city">Valencia</div>
                    <div class="city">Lisbon</div>
                </section>
    
                <section id="random">
                <h2>Random Places</h2>
                    <div id="cardContainer">
                        @foreach($randomPlaces as $place)
                    
                            <div class="card">
                                <button class="fav_btn" value="{{$place -> place_id}}"><i class="uil uil-heart-alt"></i></button>
                                <img src="{{$place -> place_img}}" alt="">
                                <div>
                                    <h2>{{$place -> place_title}}</h2>
                                    <p><i class="uil uil-map-marker"></i><a href="{{$place -> place_location}}" target="_BLANK">{{$place -> place_city}}</a></p>
                                    <p>{{$place -> place_description}}</p>
                                </div>
                            </div>

                        @endforeach
                    </div>
    
                </section>
    
            
    
            </main>
    
            <aside id="favorites">
                <h2>Favorite Places</h2>

                <div id="cardContainer" class="fav_places">
                        @foreach($favoritePlaces as $favorite)
                            <div class="card">
                            <button class="fav_btn btn_active" value="{{$favorite -> place_id}}"><i class="uil uil-heart-alt fav_active"></i></button>
                                <img src="{{$favorite -> place_img}}" alt="">
                                <div>
                                    <h2>{{$favorite -> place_title}}</h2>
                                    <p><i class="uil uil-map-marker"></i><a href="{{$favorite -> place_location}}" target="_BLANK">{{$favorite -> place_city}}</a></p>
                                    <p>{{$favorite -> place_description}}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
            </aside>
        </div>

        <footer>
            <p>Coded by <span>Alberto Cid</span>| <i class="far fa-copyright"></i> 2022 All rights reserved</p>
        </footer>

        

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        var clicked_btn

        $(document).on('click', '.fav_btn', function (){
            let id = $(this).val()
            clicked_btn = $(this)
            
            $(this).addClass('btn_active')
            $(this).children('i').addClass('fav_active')
                        
            
            $.ajax({
                method: 'GET',
                dataType: 'json',
                url: '<?php echo route('add_fav_place')?>',
                data: {
                    '_token': '<?php echo csrf_token() ?>',
                    'place_id': $(this).val()
                },
                success: function(response) {

                    if(response == 1){
                        
                        $('#content').append(
                            '<div id="alert">'+
                                '<div>'+
                                    '<p>This place is already in your favorites list, do you want to remove it from the list?</p>'+
                                    '<div>'+
                                        '<button id="btn_confirm_alert" value="'+ id +'">Yes</button>'+
                                        '<button id="btn_cancel_alert">No</button>'+
                                    '</div>'+
                                '</div>'+
                            '</div>'
                        )
                        
                    }else {

                        $('.fav_places').html('');
                        response.forEach(element => {
                            $('.fav_places').append(
                                '<div class="card">'+
                                '<button class="fav_btn btn_active" value="'+ element.place_id +'"><i class="uil uil-heart-alt fav_active"></i></button>'+
                                    '<img src="'+ element.place_img +'" alt="">'+
                                    '<div>'+
                                        '<h2>'+ element.place_title +'</h2>'+
                                        '<p><i class="uil uil-map-marker"></i><a href="'+ element.place_location +'" target="_BLANK">'+ element.place_city +'</a></p>'+
                                        '<p>'+ element.place_description +'</p>'+
                                    '</div>'+
                                '</div>'
                            );

                            $('.card').eq(4).hide().fadeIn();
                        })
                        
                    }
                }
            })
        });

        $(document).on('click', '#btn_cancel_alert', function() {
            $('#alert').remove();
            $('body').css('overflow', 'auto');
        })

        $(document).on('click', '#btn_confirm_alert', function() {

            clicked_btn.removeClass('btn_active')
            clicked_btn.children('i').removeClass('fav_active')

            $.ajax({
                method: 'GET',
                dataType: 'json',
                url: '<?php echo route('delete_fav_place')?>',
                data: {
                    '_token': '<?php echo csrf_token() ?>',
                    'place_id': $('#btn_confirm_alert').val()
                },
                success: function(response) {


                    $('.fav_places').html('');
                    response.forEach(element => {
                        $('.fav_places').append(
                            '<div class="card">'+
                            '<button class="fav_btn btn_active" value="'+ element.place_id +'"><i class="uil uil-heart-alt fav_active"></i></button>'+
                                '<img src="'+ element.place_img +'" alt="">'+
                                '<div>'+
                                    '<h2>'+ element.place_title +'</h2>'+
                                    '<p><i class="uil uil-map-marker"></i><a href="'+ element.place_location +'" target="_BLANK">'+ element.place_city +'</a></p>'+
                                    '<p>'+ element.place_description +'</p>'+
                                '</div>'+
                            '</div>'
                        )
                    })

                }
            })

            $('#alert').remove();
            
        })
    </script>
</body>
</html>