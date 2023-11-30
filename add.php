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
	<!-- WEB HEADER AND NAVIGATION BAR -->
	<?php
	require './inc/header.php';
	?>

	<!-- PRESENTATION -->
	<section class="masthead2">
		<div>
		<h1>Registration</h1>	
		</div>
	</section>

	<main class="container top">
		<h2>Enrollment <span>status</span></h2>
		<?php

		// including classes
		include_once('validate.php');
		include_once('database.php');

		// create class objects
		$valid = new validate();
		

		if (!empty($_POST['Submit'])) {
			// escape_string function
			
			$NAME = $_POST['name'];
			$CONTACT_NUMB = $_POST['contact'];
			$EMAIL = $_POST['email'];
			$BIRTH_YEAR = $_POST['birth'];
			$POSITION = $_POST['position'];
			$TIME_SLOT = $_POST['timeslot'];
			$USERNAME = $_POST['username'];
			$IMAGE = $_FILES['file']['name'];
			$IMAGE = str_replace(" ", "", $IMAGE);	
			$IMAGE = str_replace("(", "", $IMAGE);
			$IMAGE = str_replace(")", "", $IMAGE);
			$IMAGE = preg_replace("/\.+[0-9]/", "", $IMAGE); 

			$password = $_POST['password'];
			$confirm = $_POST['confirm'];
			$target_file = 'uploads/'.$IMAGE;

			// validate class
			$msg = $valid->checkEmpty($_POST, array('name', 'contact', 'email', 'birth', 'position', 'timeslot', 'username', 'password'));
			$msg = $msg.$valid->checkEmptyImg($IMAGE);
			$checkName = $valid->validName($NAME);
			$checkContact = $valid->validContact($_POST['contact']);
			$checkEmail = $valid->validEmail($_POST['email']);
			$checkBirth = $valid->validBirth($_POST['birth']);
			$checkPosition = $valid->validPosition($_POST['position']);
			$checkUserName = $valid->validUserName($_POST['username']);
			$checkImage = $valid->validImage($target_file);
			$checkPassword = $valid->validPassword($_POST['password']);
			$checkTimeSlot = $valid->validTimeSlot($TIME_SLOT);

			// answer to empty fields
			if ($msg != null) {
				echo $msg;
				// link to the previous page
				echo "<a class='buttons' href='javascript:self.history.back();'>Go Back</a>";
			} elseif (!$checkName) {
				echo '<p>Please provide a valid Name</p>';
				echo "<a class='buttons' href='javascript:self.history.back();'>Go Back</a>";
			} elseif (!$checkContact) {
				echo '<p>Please provide a valid contact number.</p>';
				echo "<a class='buttons' href='javascript:self.history.back();'>Go Back</a>";
			} elseif (!$checkEmail) {
				echo '<p>Please provide a valid email.</p>';
				echo "<a class='buttons' href='javascript:self.history.back();'>Go Back</a>";
			} elseif (!$checkBirth) {
				echo '<p>Please provide a valid birth date.</p>';
				echo "<a class='buttons' href='javascript:self.history.back();'>Go Back</a>";
			} elseif (!$checkPosition) {
				echo '<p>Please provide a valid position.</p>';
				echo "<a class='buttons' href='javascript:self.history.back();'>Go Back</a>";
			} elseif (!$checkTimeSlot) {
				echo '<p>Please provide a valid Time Slot.</p>';
				echo "<a class='buttons' href='javascript:self.history.back();'>Go Back</a>";
			} elseif (!$checkImage) {
				echo '<p>Image required</p>';
				echo "<a class='buttons' href='javascript:self.history.back();'>Go Back</a>";
			} elseif (!$checkUserName) {
				echo '<p>Username required</p>';
				echo "<a class='buttons' href='javascript:self.history.back();'>Go Back</a>";
			} elseif (!$checkPassword) {
				echo '<p>Invalid password</p>';
				echo "<a class='buttons' href='javascript:self.history.back();'>Go Back</a>";
			} else {
				echo "bucando el error3";
				$url_source = $_FILES['file']['tmp_name'];
				if(move_uploaded_file($url_source, $target_file)){
					echo "<br>bucando el error4";
					// Execute query
					// if all the fields are valid
					$password = hash('sha512', $_POST['password']);
					$result = $database->execute("INSERT INTO player(NAME,CONTACT_NUMB,EMAIL,BIRTH_YEAR,POSITION,TIME_SLOT, USERNAME, IMAGE, password) VALUES('$NAME','$CONTACT_NUMB','$EMAIL','$BIRTH_YEAR','$POSITION','$TIME_SLOT','$USERNAME','$IMAGE','$password')");
					// user knows that the record has been added
					if ($result) {
						echo "<h3>You are in, welcome to the camp 2023!</h3>";
						echo "<p>We will be in contact with you soon.</p>";
						echo "<a href='view.php' class='buttons'>View Result</a>";
					}else{
						echo $result;
					}
					
				} else{
					echo "<br>Upload an image again";
				}
				
			}
		}
		//redirect the user
        Header('Location: view.php');
		?>
	</main>
	<!-- FOOTER -->
	<?php
	require './inc/footer.php';
	?>
	

</body>
</html>