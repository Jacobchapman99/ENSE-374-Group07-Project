<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
        <title>Match_Your_Prof</title>
            <meta name="viewport" content="width=device-width, initial-scale=1">
                <link rel="stylesheet" type="text/css" media="only screen and (max-device-width: 480px)" href="css/small_device.css">
                <link rel="stylesheet" type="text/css" media="only screen and (min-device-width: 481px)" href="css/large_device.css">
                <link rel="stylesheet" type="text/css" href="css/external.css">
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
            <button class="dif_button"><img src="../Website_Sketches/easy.png" class="difficulty"></button>

            <div class="space"></div>

            <button class="dif_button"><img src="../Website_Sketches/hard.png" class="difficulty"></button>

            <div class="space"></div>

            <button class="dif_button"><img src="../Website_Sketches/hell.png" class="difficulty"></button>

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
                    <div class="memory-card" data-framework="douglas">
                        <img class="front-face" src="pictures/trevor-douglas.png" alt="UofR">
                        <img class="back-face" src="../Website_Sketches/Anyone.jpg" alt="UofR">
                    </div>
                    <div class="memory-card" data-framework="douglas">
                        <img class="front-face" src="pictures/trevor-douglas.png" alt="UofR">
                        <img class="back-face" src="../Website_Sketches/Anyone.jpg" alt="UofR">
                    </div>

                    <div class="memory-card" data-framework="naqvi">
                        <img class="front-face" src="pictures/karim-naqvi.png" alt="UofR">
                        <img class="back-face" src="../Website_Sketches/Anyone.jpg" alt="UofR">
                    </div>
                    <div class="memory-card" data-framework="naqvi">
                        <img class="front-face" src="pictures/karim-naqvi.png" alt="UofR">
                        <img class="back-face" src="../Website_Sketches/Anyone.jpg" alt="UofR">
                    </div>

                    <div class="memory-card" data-framework="zhang">
                        <img class="front-face" src="pictures/Lei-Zhang.png" alt="UofR">
                        <img class="back-face" src="../Website_Sketches/Anyone.jpg" alt="UofR">
                    </div>
                    <div class="memory-card" data-framework="zhang">
                        <img class="front-face" src="pictures/Lei-Zhang.png" alt="UofR">
                        <img class="back-face" src="../Website_Sketches/Anyone.jpg" alt="UofR">
                    </div>

                    <div class="memory-card" data-framework="jones">
                        <img class="front-face" src="pictures/robert-jones.png" alt="UofR">
                        <img class="back-face" src="../Website_Sketches/Anyone.jpg" alt="UofR">
                    </div>
                    <div class="memory-card" data-framework="jones">
                        <img class="front-face" src="pictures/robert-jones.png" alt="UofR">
                        <img class="back-face" src="../Website_Sketches/Anyone.jpg" alt="UofR">
                    </div>

                    <div class="memory-card" data-framework="duguid">
                        <img class="front-face" src="pictures/dave-duguid.png" alt="UofR">
                        <img class="back-face" src="../Website_Sketches/Anyone.jpg" alt="UofR">
                    </div>
                    <div class="memory-card" data-framework="duguid">
                        <img class="front-face" src="pictures/dave-duguid.png" alt="UofR">
                        <img class="back-face" src="../Website_Sketches/Anyone.jpg" alt="UofR">
                    </div>

                    <div class="memory-card" data-framework="paranjape">
                        <img class="front-face" src="pictures/raman-paranjape.png" alt="UofR">
                        <img class="back-face" src="../Website_Sketches/Anyone.jpg" alt="UofR">
                    </div>
                    <div class="memory-card" data-framework="paranjape">
                        <img class="front-face" src="pictures/raman-paranjape.png" alt="UofR">
                        <img class="back-face" src="../Website_Sketches/Anyone.jpg" alt="UofR">
                    </div>
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
   <script src="js/Cards.js"></script>
</body>

</html>
