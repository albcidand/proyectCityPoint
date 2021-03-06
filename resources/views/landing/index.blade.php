<!DOCTYPE html>
<html lang="en" translate="no">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="CityPoint A personal city guide in your mobile">
    <title>CityPoint</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="wrapper">

        <header>
        <div id="logo">City<span>Point</span></div>
        <ul id="nav">
            <li><a href="#login">Login</a></li>
            <li><button>Sign Up</button></li>
        </ul>
        </header>

        <main>
            <div id="presentation">
                <section id="p_text">
                    <div class ="icon">
                        <i class="fa-solid fa-map-location-dot"></i>
                    </div>
                    <div>
                        <h1>Discover <br><span>Unique</span> Places</h1>
                        <p>A personal city guide in your mobile.</p>
                    </div>

                    <div>
                        <img src="/assets/play.png" alt="google play">
                        <img src="/assets/apple.svg" alt="apple store">
                    </div>

                </section>
                <section id="mockup">
                    
                </section>
            </div>
            
            <div id="description">
                <section id="login" class="login">
                    
                    <div class="tarjeta blue">
                        <h1>City<span>Point</span></h1>
                        <form id="loginForm" >
                            <input id="email" type="email" name="email" placeholder="Email">
                            <input type="password" id="password" name="password" placeholder="Password">
                            <button id="loginBtn">Login</button>
                        </form>
                        <div id="guestContainer">
                            <p>Or</p>
                            <a id="guestBtn" href="/home">Enter as a Guest</a>
                        </div>
                    </div>
    
                </section>

                <section id="list">
                    <div>
                        <div class="l_text">
                            <div class ="icon">
                                <i class="fa-solid fa-earth-americas"></i>
                            </div>
                            
                        </div>
                        <div>
                            <h2>Pick Your Destination</h2>
                            <p>From a selection of cities all around the world</p>
                        </div>
                        
                    </div>
                    <div>
                        <div class="l_text">
                            <div class ="icon">
                                <i class="fa-solid fa-location-dot"></i>
                            </div>
                            
                        </div>
                        <div>
                            <h2>Explore The City</h2>
                            <p>Search for special places selected <br>by expert local guides</p>
                        </div>
                        
                    </div>
                    <div>
                        <div class="l_text">
                            <div class ="icon">
                            <i class="fa-solid fa-route"></i>
                            </div>
                            
                        </div>
                        <div>
                            <h2>Plan Your Own Trip<br>And Experience</h2>
                            <p>Make a custom list of your favorite places</p>
                        </div>
                        
                    </div>
                </section>
            </div>

        </main>

        <footer>
            <p>Design <span>&</span> Code by <span>&nbsp<i class="fa-solid fa-terminal"></i> Alberto Cid&nbsp</span> 2022</p>
        </footer>



    </div>
</body>

</html>