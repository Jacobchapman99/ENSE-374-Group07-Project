<?php
    $db = new mysqli('localhost', 'jjc805', '!1b0caj', 'jjc805');
    if ($db->connect_error){
        die ("Connection failed: " . $db->connect_error);
    }
    
    $q1 = "SELECT PhotoLink FROM Professors WHERE ProfessorName = 'Tim Maciag';";
    $result = $db->query($q1);
	$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Match_Your_Prof</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" media="only screen and (max-device-width: 480px)" href="css/small_device.css">
	<link rel="stylesheet" type="text/css" media="only screen and (min-device-width: 481px)" href="css/large_device.css">
	<script src="js/timer.js"></script>
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

			<button class="dif_button"><img src="../Website_Sct/Website_Interface/main.phpketches/hell.png" class="difficulty"></button>
			
			<div class="space"></div>

		</div>
	</aside>
	
	<aside id="right">
		<nav class="nav">
		<ul>
			<li><a href="html/sign_in.html" id="first">Sign In</a></li>
			<li>|</li>
			<li><a href="html/professors.html">Professors</a></li>
			<li>|</li>
			<li><a href="https://github.com/Jacobchapman99/ENSE-374-Group07-Project.git">GitHub</a></li>
			<li>|</li>
			<li><a href="html/group_member.html">Group Members</a></li>
			<li>|</li>
			<li><a href="html/highest.html">Highest</a></li>
		</ul>
		</nav>

		<container>
			<section>
				<table>
				<tr>
					<td>
						<h2>Time Remaining:</h2>
					</td>
					<td>
						<p id="timer">60s</p>
					</td>
					<td>
						<button class="start_button" type="button" onclick="timer()">Start</button>
					</td>
				</tr>
				</table>
               
				<article class="playground">
					<table class="game_table">
					<tr>
						<td>
                            <?php
                                while ($row1 = $result1->fetch_assoc()) {
                            ?>
                            				<img src="<?php echo $row["PhotoLink"];?>"/>
                            <?php
                                }
                            ?>
						</td>
						<td>
							<img src="../Website_Sketches/Anyone.jpg" alt="UofR">
						</td>
						<td>
							<img src="../Website_Sketches/Anyone.jpg" alt="UofR">
						</td>
					</tr>
					<tr>
						<td>
							<img src="../Website_Sketches/Anyone.jpg" alt="UofR">
						</td>
						<td>
							<img src="../Website_Sketches/Anyone.jpg" alt="UofR">
						</td>
						<td>
							<img src="../Website_Sketches/Anyone.jpg" alt="UofR">
						</td>
					</tr>
					<tr>
						<td>
							<img src="../Website_Sketches/Anyone.jpg" alt="UofR">
						</td>
						<td>
							<img src="../Website_Sketches/Anyone.jpg" alt="UofR">
						</td>
						<td>
							<img src="../Website_Sketches/Anyone.jpg" alt="UofR">
						</td>
					</tr>
                    
					</table>
				</article>
			</section>
		</containner>
	</aside>
	<footer>
		<p>
			© 2019 ENSE 374 Group_7 All rights reserved.
			<a class="linkText" href="https://validator.w3.org/nu/?doc=http%3A%2F%2Fwww2.cs.uregina.ca%2F~li787%2F">Validate HTML5</a>
		</p>
	</footer>
	<?php
		$db->close();
	?>
</body>

</html>
