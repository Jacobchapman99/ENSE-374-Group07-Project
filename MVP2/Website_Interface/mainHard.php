<?php
    $db = new mysqli("localhost", "jjc805", "!1b0caj", "jjc805");
    if ($db->connect_error) {
        die ("Connection failed: " . $db->connect_error);
    }
    $maxAmount =  12;
    $increment = 0;
    $query = "SELECT photoLink, name FROM 374Professor;";
    $result = $db->query($query);
    
    
    ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
        <title>Match_Your_Prof</title>
            <meta name="viewport" content="width=device-width, initial-scale=1">
                <link rel="stylesheet" type="text/css" media="only screen and (max-device-width: 480px)" href="css/small_device.css">
                <link rel="stylesheet" type="text/css" media="only screen and (min-device-width: 481px)" href="css/large_device.css">
                <link rel="stylesheet" type="text/css" href="css/externalHard.css">
</head>

<body>
    <aside id="left">
        <div>
            <a href="https://www.uregina.ca">
                <img src="../Website_Sketches/logo.png" class="logo" alt="UofR">
            </a>
        </div>
        
        <div class="space"></div>

        <div>
             <a href="main.php" class="dif_button"><img src="../Website_Sketches/easy.png" class="difficulty"></a>

            <div class="space"></div>

             <a href="mainHard.php" class="dif_button"><img src="../Website_Sketches/hard.png" class="difficulty"></a>

            <div class="space"></div>

            <a href="mainHell.php" class="dif_button"><img src="../Website_Sketches/hell.png" class="difficulty"></a>

            <div class="space"></div>

        </div>
    </aside>

    <aside id="right" style="margin-right: 10%;">
        <nav class="nav">
            <ul>
                <li><a href="html/sign_in.php" id="first">Sign In</a></li>
                <li>|</li>
                <li><a href="html/professors.php">Professors</a></li>
                <li>|</li>
                <li><a href="https://github.com/Jacobchapman99/ENSE-374-Group07-Project.git">GitHub</a></li>
                <li>|</li>
                <li><a href="html/group_member.php">Group Members</a></li>
                <li>|</li>
                <li><a href="html/highest.php">High Scores</a></li>
            </ul>
        </nav>
    
        <container>
            <header>
                <h1 class="game-heading">Match Your Prof</h1>
            </header>
            <div id="restart">
                <button class="restart_button" >Restart</button>
            </div>
            <div id="timer">
                <span class="hours">00</span> :
                <span class="minutes">00</span> :
                <span class="seconds">00</span>
            </div>
        </container>
                <section class="memory-game">
            <?php
                while (($row = $result->fetch_assoc()) && ($increment != 12)) {
                ?>
                    <div class="memory-card" data-framework="<?=$row["name"];?>">
                        <img class="front-face" src="<?=$row["photoLink"];?>" alt="UofR">
                        <img class="back-face" src="../Website_Sketches/Anyone.jpg" alt="UofR">
                    </div>
                    <div class="memory-card" data-framework="<?=$row["name"];?>">
                        <img class="front-face" src="<?=$row["photoLink"];?>" alt="UofR">
                        <img class="back-face" src="../Website_Sketches/Anyone.jpg" alt="UofR">
                    </div>
            <?php
                $increment++;
                }
                $db->close();
                ?>
                </section>
                    <button id="moves-counter"> Moves</button>
                        <article id="win-screen">
                        </article>
            <footer style="height: 100px;">
                 <p>
                    © 2019 ENSE 374 Group_7 All rights reserved.
                    <a class="linkText" href="https://validator.w3.org/nu/?doc=http%3A%2F%2Fwww2.cs.uregina.ca%2F~li787%2F">Validate HTML5</a>
                 </p>
            </footer>
    </aside>
   <script src="js/CardsHard.js"></script>
</body>

</html>
