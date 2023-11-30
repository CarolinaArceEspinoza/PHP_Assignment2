<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
  <title>Oakville Women's Soccer Team</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600&family=Roboto+Condensed:wght@300;400;700&family=Sofia+Sans+Extra+Condensed:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
	<meta name="description" content="Webpage of Oakville Women's Soccer Team">
  <link rel="stylesheet" href="./css/style.css">
	<link rel="shortcut icon" href="./img/fabicon.png" type="image/x-icon">
</head>


<?php
//store the user inputs in variables and hash the password
$USERNAME = $_POST['USERNAME'];
$password = hash('sha512', $_POST['password']);

//connect to db
require './database.php';

//set up and run the query
$sql = "SELECT ID FROM player 
WHERE USERNAME = '$USERNAME' AND password = '$password'";

$result = $database->getData($sql);

//store the number of results in a variable
$count = count($result);

//check if any matches found
if ($count == 1){
        session_start();
        //take the user's id from the database and store it in a session variable
		$row = $result[0]['ID'];
		echo "<br>Result<br>";
		echo $row ;
        $_SESSION['ID'] = $result[0]['ID'];
		$_SESSION['NAME'] = $result[0]['NAME'];
		$_SESSION['USERNAME'] = $result[0]['USERNAME'];
		$_SESSION['EMAIL'] = $result[0]['EMAIL'];
		$_SESSION['CONTACT'] = $result[0]['CONTACT'];
		$_SESSION['BIRTH'] = $result[0]['BIRTH'];

        //redirect the user
        Header('Location: ./view.php');
    // }
}
else {
	echo "<h3 style='display:none;'>Invalid Login, Try Again</h3>";
	
    
}

?>
<body>
	
	<?php
		require './inc/header.php';
	?>
	<!-- PRESENTATION -->
	<section class="masthead2">
		<div>
		<h1>Invalid Login</h1>	
		</div>
	</section>
	
		
	<main class="container">  
    <h2>Try <span> again</span></h2>

    <h3>Already have an account,  <span>then sign in below!</span></h3>
    <form method="post" action="firsVal.php" style="margin: 0 auto 30px auto;">
          <p><input class="form-control" name="USERNAME" type="text" placeholder="Username" required ></p>
          <p><input class="form-control" name="password" type="password" placeholder="Password" required ></p>
          <input class="buttons" type="submit" value="Login" >
        </form>
	
	</main>
<?php
	require './inc/footer.php';
	?>
</body>
</html>