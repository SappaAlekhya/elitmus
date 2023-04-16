<?php
session_start(); 
$_SESSION['clue1']=10?>
<h3 align="center" id="h1">Welcome to level-1
    <?php
    echo $_SESSION['name'];
    ?></h3>

<!doctype html>
<html>

<head>
  <meta charset="UTF-8">
  <style>
    #gate {
  cursor: pointer;
  margin-bottom: 100px;
  width: 400px;
  height: 400px;
}

#ball {
  cursor: pointer;
  width: 100px;
  height: 100px;
  padding-right:0;
}
#apple{
  cursor: pointer;
  width: 200px;
  height: 200px;
  padding-right:0;
}
#butterfly{
  cursor: pointer;
  width: 150px;
  height: 150px;
  padding-right:0;
}
#cricket{
  cursor: pointer;
  width: 150px;
  height: 150px;
  padding-right:0;
}
div {
    animation: colorchange 8s; /* animation-name followed by duration in seconds*/ /* you could also use milliseconds (ms) or something like 2.5s */ 
    animation-timing-function: ease-in-out; 
    animation-iteration-count: infinite; 
    animation-play-state: running;
}

@keyframes colorchange { 
    0% { background: #ff0000; } 
    14% { background: #ffa500; } 
    28% { background: #ffff00; } 
    42% { background: #008000; } 
    56% { background: #0000ff; }
    70% { background: #4b0082; } 
    84% { background: #ee82ee; } 
    100% { background: #ff0000; }
}
</style>
</head>


<body>
  <div>
<img style="display: block;
  margin-left: auto;
  margin-right: auto;" src="https://thumbs.dreamstime.com/b/goal-word-realistic-soccer-ball-comic-book-style-illustration-vector-football-118358272.jpg" align="center" width="100" height="50">
<h1 align="center">Goal!</h1>
<form action="logout.php" method="post">
<table>
    <tr>
        <td>
    <input float="right" align="right" type="submit" name="logout" value="logout">
</td>
</tr>
</table>
</div>
  
  <img src="https://en.js.cx/clipart/soccer-gate.svg" id="gate" class="droppable" width="500" height="500">
  <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSu28QQjr9YObH5j7KFbWfdjK-3QjEoOvjwJQ&usqp=CAU" id="apple" class="droppable" width="500" height="500">
  <img src="https://render.fineartamerica.com/images/images-profile-flow/400/images/artworkimages/mediumlarge/2/69-butterfly-csa-images.jpg" id="butterfly">
  <img src="https://en.js.cx/clipart/ball.svg" id="ball" width="500" height="500">
  <img src="https://static.vecteezy.com/system/resources/previews/007/698/280/non_2x/bat-and-ball-doodle-icon-of-cricket-vector.jpg" id="cricket" width="500" height="500">
   <form align="center" action="clue2.php" method="post">
<table>
    <tr>
        <td>
    <input align="center" type="submit" name="logout" value="level 2">
</td>
</tr>
</table>
</form>
  <script>
    let open = new Audio("assets_open-chest.mp3");
    let currentDroppable = null;

    ball.onmousedown = function(event) {

      let shiftX = event.clientX - ball.getBoundingClientRect().left;
      let shiftY = event.clientY - ball.getBoundingClientRect().top;
      //let shiftX = event.clientX - apple.getBoundingClientRect().left;
      //let shiftY = event.clientY - apple.getBoundingClientRect().top;

      ball.style.position = 'absolute';
      ball.style.zIndex = 1000;
      document.body.append(ball);
      //apple.style.position = 'relative';
      //apple.style.zIndex = 10;
      //document.body.append(apple);

      moveAt(event.pageX, event.pageY);

      function moveAt(pageX, pageY) {
        ball.style.left = pageX - shiftX + 'px';
        ball.style.top = pageY - shiftY + 'px';
      }

      function onMouseMove(event) {
        moveAt(event.pageX, event.pageY);

        ball.hidden = true;
        let elemBelow = document.elementFromPoint(event.clientX, event.clientY);
        ball.hidden = false;

        if (!elemBelow) return;

        let droppableBelow = elemBelow.closest('.droppable');
        if (currentDroppable != droppableBelow) {
          if (currentDroppable) { // null when we were not over a droppable before this event
            leaveDroppable(currentDroppable);
          }
          currentDroppable = droppableBelow;
          if (currentDroppable) { // null if we're not coming over a droppable now
            // (maybe just left the droppable)
            enterDroppable(currentDroppable);
          }
        }
      }

      document.addEventListener('mousemove', onMouseMove);

      ball.onmouseup = function() {
        document.removeEventListener('mousemove', onMouseMove);
        ball.onmouseup = null;
      };

    };

    function enterDroppable(elem) {
      //assets_ocean.play();
      open.play();
      const ocean = new Audio("assets_bonfire.mp3"); //ocean sounds
ocean.volume = 0.8;
      elem.style.background = 'pink';
      alert('Congrats! you went to level 2');
      location.replace('clue2.php');
      

    }

    function leaveDroppable(elem) {
      elem.style.background = '';
    }

    ball.ondragstart = function() {
      return false;
    };
  </script>


</body>
</html>
