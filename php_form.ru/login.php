
<head>
  <link href='style.css' rel='stylesheet' type='text/css'>
  <title>LOGIN</title>
</head>

<?php
session_start();
?>



<?php

 include("include/connected.php"); 

if(isset($_SESSION["session_username"])){
// echo "Session is set"; // for testing purposes
header("Location: intropage.php");
}

if(isset($_POST["login"])){

if(!empty($_POST['username']) && !empty($_POST['password'])) {
    $username=$_POST['username'];
    $password=$_POST['password'];

    $query =mysqli_query($db,"SELECT * FROM usersdata WHERE username='$username' AND password='$password'");

    $numrows=mysqli_num_rows($query);
    if($numrows!=0)

    {
    /*while($row=mysqli_fetch_assoc($query))
    {
    $dbusername=$row['username'];
    $dbpassword=$row['password'];
    }

    if($username == $dbusername && $password == $dbpassword)

    {*/


    $_SESSION['session_username']=$username;

    /* Redirect browser */
    header("Location: intropage.php");
    //}
    } else {

 $message =  "Invalid username or password!";
    }

} else {
    $message = "All fields are required!";
}
}
?>



    <div class="container mlogin">
            <div id="login">
    <h1>LOGIN</h1>
<form name="loginform" id="loginform" action="" method="POST">
<fieldset> 
    <p class="field">
        <label for="user_login">Username<br />
        <input type="text" name="username" id="username" class="input" value="" size="25" /></label>
    </p>

    <p class="field">
        <label for="user_pass">Password<br />
        <input type="password" name="password" id="password" class="input" value="" size="25" /></label>
    </p>
        <p class="submit">
        <input type="submit" name="login" class="button" value="Log In"/>
    </p>
	</fieldset>
        <p class="regtext">No account yet? <a href="Registration_Page.php" >Register Here</a>!</p><br />
</form>

    </div>

    </div>
	

	<?php if (!empty($message)) {echo "<p class=\"error\">" . $message . "</p>";} ?>
	