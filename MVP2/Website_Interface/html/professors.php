<?php
    
    $db = new mysqli("localhost", "jjc805", "!1b0caj", "jjc805");
    if ($db->connect_error) {
        die ("Connection failed: " . $db->connect_error);
    }
    
    $q = "SELECT name, photoLink, uofrLink FROM 374Professor;";
    $result = $db->query($q);
    
    
    ?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>Match_Your_Prof</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" media="only screen and (max-device-width: 480px)" href="../css/small_device.css">
	<link rel="stylesheet" type="text/css" media="only screen and (min-device-width: 481px)" href="../css/large_device.css">
</head>

<body>
	<aside id="left">
		<div>
			<a href="https://www.uregina.ca">
				<img src="../../Website_Sketches/logo.png" class="logo" alt="UofR">
			</a>
		</div>
		
		<div class="space"></div>
	</aside>
			
	<aside id="right">
		<nav class="nav">
			<ul>
				<li><a href="score.php" id="first">Score</a></li>
				<li>|</li>
				<li><a href="../main.php">Main Page</a></li>
				<li>|</li>
				<li><a href="https://github.com/Jacobchapman99/ENSE-374-Group07-Project.git">GitHub</a></li>
				<li>|</li>
				<li><a href="group_member.php">Group Members</a></li>
				<li>|</li>
				<li><a href="highest.php">High Scores</a></li>
			</ul>
		</nav>
		
		<container>
			<section>
				<article class="playground">
					<table class="game_table">

                  	<div id="professors">
							
						<?php
                        while ($row = $result->fetch_assoc()) {
                        ?>

							<div class="prof-block">
								<a href="<?=$row1["uofrLink"];?>"><img class="prof-img" src="<?=$row1["photoLink"];?>"></a>
								<a href="<?=$row1["uofrLink"];?>"><?=$row["name"];?></a>
							</div>

							<?php
                            }
                            $db->close();
                            ?>
						</div>

					</table>
				</article>
			</section>
		</container>
	</aside>

	<footer>
		<p>
			© 2019 ENSE 374 Group_7 All rights reserved.
			<a class="linkText" href="https://validator.w3.org/nu/?doc=http%3A%2F%2Fwww2.cs.uregina.ca%2F~li787%2F">Validate HTML5</a>
		</p>
	</footer>
</body>

</html>
