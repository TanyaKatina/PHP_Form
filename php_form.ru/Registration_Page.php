
<head>
  <link href='style.css' rel='stylesheet' type='text/css'>
</head>

<html>
    <head>
		<title>REGISTRATION</title>
    </head>
	
    <body><div id="reg">
		<h2>REGISTRATION</h2>
		<form action="Registration_Process.php" method="post">
		
		<fieldset> 
		<p class="field">
			<label>Username:<br></label>
			<input name="username" type="text" size="25" maxlength="256">
		</p>

		<p class="field">
			<label>Email:<br></label>
			<input name="email" type="email" size="25" maxlength="80">
		</p>

		<p class="field">
			<label>Password:<br></label>
			<input name="password" type="password" size="25" maxlength="60">
		</p>
</div> 

	</fieldset>
		<p class="submit">
		<input type="submit" name="submit" class="button" value="Create Account">
		<!--**** Кнопочка (type="submit") отправляет данные на страничку Registration_Process.php ***** --> 
		</p> 
		</form>
    </body> 
</html>