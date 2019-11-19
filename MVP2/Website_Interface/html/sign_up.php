<?php
    if(isset($_POST["submitted"]) && $_POST["submitted"]) {
        $email = trim($_POST["email"]);
        $username = trim($_POST["uname"]);
        $password = trim($_POST["password"]);
        $valid = 1;
        
        if (strlen($email) < 1 || strlen($username) < 1 || strlen($password) < 1)
        {
            $valid = 0;
        }
        
        $foundemail = preg_match("/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/", $email);
        $founduname = preg_match("/^[\S][^\W]+$/", $username);
        $foundpword = preg_match("/^(?=.*\d)[a-zA-Z\d]{8}$/", $password);
        
        if (!$foundemail || !$founduname || !$foundpword)
        {
            $valid = 0;
        }
        
         if ( $valid == 1) {
             $db = new  mysqli("localhost", "jjc805", "!1b0caj", "jjc805");
                if ($db->connect_error) {
                    die ("Connection failed: " . $db->connect_error);
                    
                }
              $query = "INSERT INTO 374User (username, email, password) VALUES
                ('$username', '$email', '$password');";
                $db->query($query);
                $db->close();
                header("Location: sign_in.php");
         } else {
                $error1 = ("invalid input");
         }
    }
    ?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>Sign Up Page</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" media="only screen and (max-device-width: 480px)"
		href="../css/small_device.css">
	<link rel="stylesheet" type="text/css" media="only screen and (min-device-width: 481px)"
		href="../css/large_device.css">

</head>

<body>
	<header>
		<table>
			<tr>
				<td>
					<a href="https://www.uregina.ca"><img src="../../Website_Sketches/logo.png" class="logo"
							alt="UofR"></a>
				</td>

				<td>
					<nav class="short-nav">
						<ul>
							<li><a href="../main.php" id="first">Main Page</a></li>
							<li>|</li>
							<li><a href="professors.php">Professors</a></li>
							<li>|</li>
							<li><a href="https://github.com/Jacobchapman99/ENSE-374-Group07-Project.git">GitHub</a></li>
							<li>|</li>
							<li><a href="group_member.php">Group Members</a></li>
							<li>|</li>
							<li><a href="highest.php">High Scores</a></li>
						</ul>
					</nav>
				</td>
			</tr>
		</table>
	</header>

	<section class="sign-in-up">
		<form id="signup" action="sign_up.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="submitted" value="1" />
			<table>
				<tr>
					<td>Email: </td>
					<td> <input type="text" placeholder="Enter Email" name="email" id="email" size="30" /></td>
					<td><label id="email_msg" class="err_msg"></label></td>
				</tr>

				<tr>
					<td>Username: </td>
					<td> <input type="text" placeholder="Enter Username" name="uname" id="uname" size="30" /></td>
					<td><label id="uname_msg" class="err_msg"></label></td>
				</tr>

				<tr>
					<td>Password: </td>
					<td> <input type="password" placeholder="Enter Password" name="password" id="password" size="30" /></td>
					<td><label id="pswd_msg" class="err_msg"></label></td>
				</tr>

				<tr>
					<td>Confirm Password: </td>
					<td> <input type="password" placeholder="Confirm Password" name="pwdr" id="pswdr" size="30" /></td>
					<td><label id="pswdr_msg" class="err_msg"></label></td>
				</tr>

			</table><br />
			<input type="submit" value="Sign up" />
			<input type="reset" value="Reset" />
		</form>
	</section>

	<footer>
		<p>
			© 2019 ENSE 374 Group_7 All rights reserved.
			<a class="linkText"
				href="https://validator.w3.org/nu/?doc=http%3A%2F%2Fwww2.cs.uregina.ca%2F~li787%2F">Validate HTML5</a>
		</p>
	</footer>
    <script type="text/javascript" src="../js/SignUp.js"></script>
</body>

</html>
