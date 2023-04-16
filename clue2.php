<?php
session_start(); 
$_SESSION["clue2"]=$_SESSION['clue1']+10;?>
<h3 align="center" id="h1">Welcome to stage 2
    <?php
    echo $_SESSION['name'];
    ?></h3>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Google fonts: Chelsea Market, Raleway, Press Start 2P, Roboto -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Chelsea+Market&family=Press+Start+2P&family=Raleway:wght@500&family=Roboto:wght@400&display=swap" >
      
    <!-- code for favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="favicon_io/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon_io/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon_io/favicon-16x16.png">
    <link rel="manifest" href="favicon_io/site.webmanifest">
    
    <title>Find the treasure</title>
    <style>
        body {
    height: 100%;
    margin:0;
    width: 100%;
}

.chest {
    align-self: center;
    background: linear-gradient(180deg, 
    bisque 0.1%, transparent 20%, transparent 40%, saddlebrown 41%, black 42%, saddlebrown 42.5%, transparent 43%, transparent 80%, #B2936C 99.5%),
    repeating-linear-gradient(180deg,
    tan, tan 9.6%, black 10%, tan 10.4%);
    border-radius:3px;
    box-shadow: 0px 0px 3px 0.5px #23001E;
    color: gold;
    cursor: pointer;
    font-family: "cochin";
    font-size:20px;
    font-weight:bolder;
    justify-self: center;
    margin:12px;
    padding:25px 30px;
    text-align: center;
    text-shadow:0px 0px 2px #23001E;
    transition: ease-in-out 250ms;
}

.chest:hover {
    text-shadow:0px 0px 2px gold;
    background: linear-gradient(180deg,
    bisque 0.1%, transparent 10%, goldenrod 30%, saddlebrown 31%, black 32%, gold 40%, gold 43%, goldenrod 48%, transparent 82%, transparent 90%, #B2936C 99.5%),
    repeating-linear-gradient(180deg,
    tan, tan 9.6%, black 10%, tan 10.4%);
    text-shadow:0px 0px 2px darkgoldenrod;
}

footer {
    background-color:darkturquoise;
    font-family: "raleway", "roboto";
    padding-bottom:15px;
    text-align:center;
    width:100%;
}

footer a {
    color: paleturquoise;
    text-decoration: none;
}

h1 {
    background-color:#D7CABC;
    box-shadow: 0px 0px 5px 0.5px #23001E;
    color: #23001E;
    font-family: "chelsea market";
    font-size:18px;
    letter-spacing: 15px;
    padding:10px 15px;
    min-width:280px;
    position:absolute;
    top:4rem;
    transition: ease-in-out 250ms;
}

h1, .chest, .lose, .ship {
    animation-name:wobble;
    animation-duration:15s;
    animation-iteration-count:infinite;
    animation-timing-function: ease-in-out;
    transform-origin: 50% 100%;
}

.lose {
    background:linear-gradient(180deg, transparent, #B2936C 3%, transparent 30%, tan, transparent 70%, #B2936C 97%, transparent),
    repeating-linear-gradient(180deg,tan, tan 9.6%, #23001E 10%, tan 10.4%);
    border-radius: 10px;
    color: #23001E;
    font-family: "chelsea market";
    font-size:45px;
    height:370px;
    text-shadow: 0px 0px 2px bisque;
    transition: 2s ease-in-out 250ms;
    width:480px;
}

.lose, .win {
    align-items: center;
    display:flex;
    font-weight: bolder;
    justify-content: center;
    position: absolute;
    visibility:hidden;
    z-index:1;
}

main {
    align-items: center;
    display: flex;
    background: linear-gradient(180deg, 
    bisque 20%, turquoise 50%, turquoise 83%, mediumturquoise 93%, darkturquoise 98%);
    flex-direction: column;
    min-height: 100vh;
    height: 700px;
    min-width: 100vw;
    justify-content: center;
    text-align: center;
}

.puzzle {
    background:linear-gradient(180deg, rgb(184, 202, 184) 85%, rgb(157, 175, 157));
    border-radius: 0px 0px 60px 60px;
    display:grid;
    gap:5px;
    grid-template-columns: 1fr 1fr 1fr;
    grid-template-rows: 1fr 1fr 1fr;
    padding:12px;
    margin-top:50px;
    max-height: 400px;
}

.score {
    color:tan;
    font-family: "press start 2p", "chelsea market", "raleway";
    display:flex;
    flex-direction: row;
    justify-content:space-around;
    position: absolute;
    top:15px;
    width: 100%;
}

.ship {
    position:absolute;
    top:10rem;
}

.ship-bottom {
    border-top: solid 1.5em rgb(157, 175, 157);
    border-left: solid 10em transparent;
    border-right: solid 10em transparent;
    height:0;
    position:absolute;
    bottom: -24px;
    left:85px;
    transition: ease-in-out 100ms;
}

.ship-left {
    border-left:solid 5em transparent;
    border-top:solid 350px rgb(184, 202, 184);
    border-radius: 10px 0px 0px 0px;
    height:0;
    left:-78px;
    top:50px;
    position:absolute;
    transition: ease-in-out 100ms;
}

.ship-right {
    border-radius: 0px 10px 0px 0px;
    border-right:solid 5em transparent;
    border-top:solid 350px rgb(184, 202, 184);
    height:0;
    right:-78px;
    top:50px;
    position:absolute;
    transition: ease-in-out 100ms;
}

.win {
    background-image: url("assets/treasure.jpeg");
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    color:gold;
    font-family: "snell roundhand", "luminari";
    font-size:50px;
    min-height: 100vh;
    min-width:100vw;
    text-shadow: 0px 0px 5px goldenrod;
}


@keyframes wobble {

    0% {
        transform: rotate(0deg);
    }
    25% {
        transform:rotate(2deg);
    }
    50% {
        transform: rotate(0deg);
    }
    75% {
        transform: rotate(-2deg);
    }
    100% {
        transform: rotate(0deg);
    }
}


@media (max-width: 1000px) {

    .chest {
        font-size: 18px;
        padding: 20px 25px;
        margin: 10px
    }

    h1 {
        font-size:17px;
        letter-spacing: 14px;
    }
    
    .lose {
        font-size:40px;
        height:315px;
        width:415px;
    }

    .puzzle {
        max-height:375px;
    }
    
    .ship-bottom {
        border-left: solid 9em transparent;
        border-right: solid 9em transparent;
        bottom:-23px;
        left:75px;
    }

    .ship-left {
        border-left:solid 3.8em transparent;
        border-top:solid 295px rgb(184, 202, 184);
        left:-59px;
    }

    .ship-right {
        border-right:solid 3.8em transparent;
        border-top:solid 295px rgb(184, 202, 184);
        right:-59px;
    }
}

@media (max-width: 585px) {

    body {
        overflow: clip;
    }

    .chest {
        font-size: 16px;
        padding: 18px;
        margin:8px;
    }

    footer {
        background-color: transparent;
        padding-bottom:0px;
        position:absolute;
        bottom:15px;
    }

    h1 {
        font-size:16px;
        letter-spacing: 12px;
    }

    .lose {
        font-size:28px;
        height:280px;
        width:350px;
    }

    .puzzle {
        max-height:350px;
    }
    
    .ship-bottom {
        border-left: solid 7em transparent;
        border-right: solid 7em transparent;
        bottom:-22px;
        left:68px;
    }

    .ship-left {
        border-left:solid 3em transparent;
        border-top:solid 250px rgb(184, 202, 184);
        left:-47px;
    }

    .ship-right {
        border-right:solid 3em transparent;
        border-top:solid 250px rgb(184, 202, 184);
        right:-47px;
    }
}
        </style>
</head>

<body>

    <main>

        <section class="score">
            <div>
                wrong <span id="wrong"></span>
            </div>

            <div>
                <span id="correct"></span> correct 
            </div>
        </section>

        <h1>LOST TREASURE</h1>

        <div class="ship">
            <div class="ship-left"></div>

            <div class="puzzle">
                <div class="chest" id="1">Mystery <br> Box 1</div>
                <div class="chest" id="2">Mystery <br> Box 2</div>
                <div class="chest" id="3">Mystery <br> Box 3</div>
                <div class="chest" id="4">Mystery <br> Box 4</div>
                <div class="chest" id="5">Mystery <br> Box 5</div>
                <div class="chest" id="6">Mystery <br> Box 6</div>
                <div class="chest" id="7">Mystery <br> Box 7</div>
                <div class="chest" id="8">Mystery <br> Box 8</div>
                <div class="chest" id="9">Mystery <br> Box 9</div>

                <div class="lose">
                    The Treasure is Lost <br>
                    Keep Looking . . .
                </div>
            </div>

            <div class="ship-right"></div>
            <div class="ship-bottom"></div>
        </div>
        
        <div class="win">
            Hooray! <br>
            You Found <br> 
            The Treasure!
        </div>
        
    </main>
    
    <footer>
        <a href="https://dany-cervantes-portfolio.pages.dev/" target="_blank">
            Visit my portfolio
        </a>
    </footer>
    
    <script>
        const box1 = document.getElementById("1");
const box2 = document.getElementById("2");
const box3 = document.getElementById("3");
const box4 = document.getElementById("4");
const box5 = document.getElementById("5");
const box6 = document.getElementById("6");
const box7 = document.getElementById("7");
const box8 = document.getElementById("8");
const box9 = document.getElementById("9");
const correct = document.getElementById("correct");
const wrong = document.getElementById("wrong");

const ocean = new Audio("assets_ocean.mp3"); //ocean sounds
ocean.volume = 0.8;
const bonfire = new Audio("assets_bonfire.mp3"); //music
bonfire.loop = true;
bonfire.volume = 0.8;

let treasure = randomRange(1,9); //this is where the treasure is hidden

let correctCount = 0;
let wrongCount = 0;
correct.innerHTML = correctCount;
wrong.innerHTML = wrongCount;


box1.onclick = function() { selection(1) };
box2.onclick = function() { selection(2) };
box3.onclick = function() { selection(3) };
box4.onclick = function() { selection(4) };
box5.onclick = function() { selection(5) };
box6.onclick = function() { selection(6) };
box7.onclick = function() { selection(7) };
box8.onclick = function() { selection(8) };
box9.onclick = function() { selection(9) };


//Returns a random number within a chosen range
function randomRange(min, max) { 

    return Math.floor(Math.random() * (max - min + 1)) + min;
//Math.random() returns a random decimal between 0 - 0.99
//Math.floor() rounds down to the nearest whole number  e.i. 10 = 0 - 9  
}

//compares the user's treasure selection to the randomly chosen selection
function selection(box) { 
    
    let lose = document.querySelector(".lose");
    let win = document.querySelector(".win");

    let open = new Audio("assets_open-chest.mp3");
    let treasureChest = new Audio("assets_treasure-chest.mp3");

    //updates guessing score
    function score(guess) {

        if (guess == "win") {
            correctCount++; 
            correct.innerHTML = correctCount;

        } else if (guess == "lose") {
            wrongCount++;
            <?php $_SESSION["clue2"]=$_SESSION['clue2']+10; ?>
            wrong.innerHTML = wrongCount;
        }   
    }
    
    if (box == treasure) {
        treasureChest.play();
        alert('hurray! you won treasure.\n goto next level')
        window.location='clue3.php';
        bonfire.volume = 0.4;
        treasureChest.play(); //plays sound
        win.style.visibility = "visible"; //shows message

        score("win"); //updates score
        

       setTimeout(function() { 

            bonfire.volume = 0.8;
            win.style.visibility = "hidden"; 

        }, 10000); //Gives time to celebrate, hides again
        
        treasure = randomRange(1,9); //after win asigns a different random number to treasure

    } else {

        open.play(); //plays sound
        lose.style.visibility = "visible";  //shows message

        setTimeout(function() { 

            score("lose"); 

        }, 500 );  //updates score with suspense

        setTimeout(function() { 

            lose.style.visibility = "hidden"; //hides again

        }, 1750 ); //waits 1.75 seconds
    }
}

window.onclick = function() {

    assets_ocean.play(); //plays ocean sounds
    assets_bonfire.play(); //plays music
};
    </script>

</body>

</html>