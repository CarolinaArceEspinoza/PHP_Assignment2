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
	  	<!-- WEB HEADER AND NAVIGATION BAR -->
		  <?php
	require './inc/header.php';
	?>

	<!-- PRESENTATION -->
	<section class="masthead2">
		<div>
		<h1>EDIT PROFILE</h1>	
		</div>
	</section>

	<main class="container top">
		<h2>REGISTRATION <span>STATUS</span></h2>
		<?php

		// including classes
		include_once('validate.php');
		include_once('database.php');

		// create class objects
		$valid = new validate();

		if (!empty($_POST['Submit'])) {
            $NAME = $_POST['name'];
			$CONTACT_NUMB = $_POST['contact'];
			$EMAIL = $_POST['email'];
			$BIRTH_YEAR = $_POST['birth'];
			$POSITION = $_POST['position'];
			$TIME_SLOT = $_POST['timeslot'];
            $ID = $_POST['id'];
            $OLD_IMAGE = $_POST['oldImage'];
			$IMAGE = $_FILES['file']['name'];
			
            
            if(!empty($IMAGE)){
				$IMAGE = str_replace(" ", "", $IMAGE);
				$IMAGE = str_replace("(", "", $IMAGE);
				$IMAGE = str_replace(")", "", $IMAGE);
				$IMAGE = preg_replace("/\.+[0-9]/", "", $IMAGE);
                $target_file = 'uploads/'.$IMAGE;
            }else{
                $target_file = 'uploads/'.$OLD_IMAGE;
            }

            $msg = $valid->checkEmpty($_POST, array('name', 'contact', 'email', 'birth', 'position', 'timeslot'));
			$checkName = $valid->validName($NAME);
			$checkContact = $valid->validContact($_POST['contact']);
			$checkEmail = $valid->validEmail($_POST['email']);
			$checkBirth = $valid->validBirth($_POST['birth']);
			$checkPosition = $valid->validPosition($_POST['position']);
			$checkTimeSlot = $valid->validTimeSlot($TIME_SLOT);
            $checkImage = $valid->validImage($target_file);

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
			}elseif (!$checkImage) {
				echo '<p>Image required</p>';
				echo "<a class='buttons' href='javascript:self.history.back();'>Go Back</a>";
			}else {
                
				$changeNewImage = true;
                if(!empty($IMAGE)){
                    $url_source = $_FILES['file']['tmp_name'];
                    if(!move_uploaded_file($url_source, $target_file)){
                        $changeNewImage = false;
                        echo "<br>Upload an image again";					
                    } 
                }else{
                    $IMAGE = $OLD_IMAGE;
                }
                
                if($changeNewImage){
                    $query = "UPDATE player SET NAME = '$NAME', CONTACT_NUMB = '$CONTACT_NUMB', BIRTH_YEAR = '$BIRTH_YEAR', EMAIL = '$EMAIL', IMAGE = '$IMAGE', POSITION = '$POSITION', TIME_SLOT = '$TIME_SLOT' WHERE ID = '$ID'";
                    $result = $database->execute($query);
					// user knows that the record has been updated
					if ($result) {
						echo "<h3>Your record was successfully updated</h3>";
						echo "<a href='view.php' class='buttons'>View All Records</a>";
					}
                }
				
				
			}
        }
		
		?>
	</main>
	<!-- FOOTER -->
	<?php
	require './inc/footer.php';
	?>

</body>

</html>