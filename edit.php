<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="assets/styles.css">
</head>
<body>

<div id="containerregister">
	<header>
		<div id="facebook"><a href=""><img src="assets/images/facebook.png" alt=""></a></div>
		<div id="twitter"><a href=""><img src="assets/images/twitter.png" alt=""></a></div>
		<div id="google"><a href=""><img src="assets/images/google.png" alt=""></a></div>
		<div id="logo"><img src="assets/images/cap.png" alt="Cap logo"></div>
	</header>


<nav id="mainNav">
		<ul>
			<li class="cat"><a href="listCategory.php">spring 15</a></li>
			<li class="cat"><a href="listCategory.php">fall 15</a></li>

			<li id="login"><a href="log_in.html">login</a></li>
			<li id="register"><a href="registration.html">register</a></li>
		</ul>
	</nav>

	<div id="form">
		<div class="registerform">
			
			<h3>Edit Membership</h3>
		
			<form action="" method="post">
			
				<span class="errormessage"></span>
				<label for="firstname" class="formlabel">*First Name</label>
				<input type="text" id="first_name" name="first_name" value="" class="forminput">

				<span class="errormessage"></span>
				<label for="lastname" class="formlabel">*Last Name</label>
				<input type="text" id="last_name"name="last_name" value="" class="forminput">

				<span class="errormessage"></span>
				<label for="address" class="formlabel">*Address</label>
				<input type="text" id="address" name="address" value="" class="forminput">

				<span class="errormessage"></span>
				<label for="telephone" class="formlabel">*Telephone</label>
				<input type="text" id="telephone" name="telephone" value="" class="forminput">

				<span class="errormessage"></span>
				<label for="email" class="formlabel">*Email</label>
				<input type="text" id="email" name="email" value="" class="forminput">

				<span class="errormessage"></span>
				<label for="username" class="formlabel">*Username</label>
				<input type="text" id="username" name="username" value="" class="forminput">

				<span class="errormessage"></span>
				<label for="password" class="formlabel">*Password</label>
				<input type="text" id="password" name="password" value="" class="forminput">

				<input type="submit" name="submit" value="Register" class="forminput"/>
		</div>
	</div>
		
	</form>

	<footer>
		<div id="registerfooter">
			<p>© 2014 Cap Ltd. All Rights Reserved. Powered by Insignia Ltd</p>
		</div>
	</footer>
</div>
	
</body>
</html>