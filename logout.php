<!DOCTYPE HTML>
<HTML LANG="EN">

<!-- HEAD AND METADATA -->
<head>
	<meta charset="utf-8">
  <title>Oakville Women's Soccer Team</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600&family=Roboto+Condensed:wght@300;400;700&family=Sofia+Sans+Extra+Condensed:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
	<meta name="description" content="Webpage of Oakville Women's Soccer Team">
  <link rel="stylesheet" href="./css/style.css">
	<link rel="shortcut icon" href="img/fabicon.png" type="image/x-icon">
</head>

<body>

<?php
  //access existing session
  session_start();
  //remove session variables
  session_unset();
  //kill the session
  session_destroy();
  //redirect to login
  //header('location:signin.php');
  //require './inc/footer.php';
?>
 <?php
	require './inc/header.php';
	?>
  <!-- PRESENTATION -->
	<section class="masthead2">
		<div>
		<h1>YOU ARE LOGGED OUT</h1>	
		</div>
	</section>
  <main>
    <section class="row signin-row">
      <div class="col align-self-center">
        <h3>Do you want to sign in again?</h3>
        <p>You must log in to view and edit the team list</p>
        <form method="post" action="firsVal.php">
          <p><input class="form-control" name="USERNAME" type="text" placeholder="Username" required ></p>
          <p><input class="form-control" name="password" type="password" placeholder="Password" required ></p>
          <input class="buttons" type="submit" value="Login" >
        </form>
      </div>
    </section>
  </main>
<?php
  require './inc/footer.php';
?>
</body>

</html>