<!DOCTYPE html>
<html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>cook'nShare</title>
</head>
<body>
	<div class="main">  	
		<input type="checkbox" id="chk" aria-hidden="true">

			<div class="signup">
				<form action="inscription.php" method ="POST">
					<label for="chk" aria-hidden="true">Sign up</label>
					<input type="text" name="username" placeholder="Username (20 char max)" required>
					<input type="email" name="mail" placeholder="Email" required>
					<input type="password" name="password" placeholder="Password" required>
					<button>Sign up</button>
				</form>
				<br>

			</div>

			<div class="login">
				<form action="connection.php" method="POST">
					<label for="chk" aria-hidden="true">Login</label>
					<input type="email" name="mail" placeholder="Email" required="">
					<input type="password" name="password" placeholder="Password" required="">
					<button>Login</button>
				</form>
			</div>
	</div>
</body>
</html>
