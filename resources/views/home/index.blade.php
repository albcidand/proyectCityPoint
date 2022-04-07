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
    <h1>home</h1>
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
</body>
</html>