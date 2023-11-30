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
	<link rel="shortcut icon" href="img/fabicon.png" type="image/x-icon">
</head>
<body>


  <?php
  	session_start();
    if (!isset($_SESSION['ID'])) {
      header('location:signin.php');
      exit();
    }
    else {
  
    // Include database file
    include 'database.php';

    $editId = $_GET['editID'];
    $player = $database->displayRecordById($editId);
    }
  ?>
   
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

<main class="container">
  <h2>Update<span> records</span></h2>
    
    <form method="POST" action="editStep.php" enctype="multipart/form-data">
            <p>
              <label>Name and Last Name:</label><br>
              <input type="text" name="name" value="<?php echo $player['NAME']; ?>" required="">
            </p>
            <p>
              <label>Contact Number:</label><br>
              <input type="text" name="contact" value="<?php echo $player['CONTACT_NUMB']; ?>" required="">
            </p> 
            <p>
              <label>Parents/Guardians E-mail:</label><br>
              <input type="text" name="email" value="<?php echo $player['EMAIL']; ?>" required="">
            </p>
            <p class="formSmall"> 
              <label>Birth date:</label><br>
              <input type="date" id="birth" name="birth" min="2000-01-01" max="2020-12-31" value="<?php echo $player['BIRTH_YEAR']; ?>" required="">
            </p>
            <p class="formSmall">
              <label>Your play position</label><br>  
              <select name="position" id="position">
                <option value="<?php echo $player['POSITION']; ?>" required="" selected><?php echo $player['POSITION']; ?></option>
                <option value="goalkeeper">Goalkeeper</option>
                <option value="defender">Defender</option>
                <option value="midfielder">Midfielder</option>
                <option value="forward">Forward</option>
              </select>
            </p> 
            
            <p>
              <label>Time Slot</label><br>
              <select name="timeslot" id="timeslot">
                <option value="<?php echo $player['TIME_SLOT']; ?>" required="" selected><?php echo $player['TIME_SLOT']; ?></option>
                <option value="Sat 09:00 - 12:00">Saturday 09:00 to 12:00</option>
                <option value="Sun 09:00 - 12:00">Sunday 09:00 to 12:00</option>
                <option value="Wed 18:00 - 21:00">Wednesday 18:00 to 21:00</option>
              </select>
            </p>
            <p><input type='file' name='file' /></p>

              
              <div class="form-group">
                <input type="hidden" name="id" value="<?php echo $player['ID']; ?>">
                <input type="hidden" name="oldImage" value="<?php echo $player['IMAGE']; ?>">
                <input class="buttons" type="submit" name="Submit" value="Update">
              </div>
            </form>            
</main> 
<?php
	require './inc/footer.php';
	?>
</body>
</html>