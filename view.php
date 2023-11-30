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

  <!-- MAIN CONTENT -->
  <div class="container">
  <h2>Team<span> list</span></h2>


  <?php
	session_start();
	if (!isset($_SESSION['ID'])) {
		header('location:signin.php');
		exit();
	}
	else {
		//connect to db
    
		require 'database.php';
    
 
  

  // R E S P O N S E S   F R O M   E D I T I O N
  if (isset($_GET['msg1']) == "insert") {
  echo "<div class='alert alert-success alert-dismissible'>
          <button type='button' class='close' data-dismiss='alert'>×</button>
          Your Registration added successfully
        </div>";
  }
  if (isset($_GET['msg2']) == "update") {
    echo "<div class='alert alert-success alert-dismissible'>
          <button type='button' class='close' data-dismiss='alert'>×</button>
          Your Registration updated successfully
        </div>";
  }
  if (isset($_GET['msg3']) == "delete") {
   echo "<div class='alert alert-success alert-dismissible'>
          Record deleted successfully
        </div>";
  }

  $sure = "('You are deleting this record. Are you sure?')";

		//set up query
		$sql = "SELECT * FROM player";
		//run the query and store the results
		$result = $database->getData($sql);


 // D E L E T E   F I L E S
 if(isset($_GET['deleteID']) && !empty($_GET['deleteID'])) {
  $deleteID = $_GET['deleteID'];
  $database->delete($deleteID);
}

		//start our table
		echo '<table class="table ">
          <tr>
          <th>Picture</th>
          <th>Name</th>
          <th>Username</th>
          <th>Birth Year</th>
          <th>Email</th>
          <th>Position</th>
          <th>Contact Number</th>
          <th>Time Slot</th>
          <th>-</th>
          <th>-</th>
        </tr>';
        foreach($result as $key => $res){
          echo "<tr>";
          echo "<td class='picture'><div style='background-image: url(./uploads/".$res['IMAGE'].")'></div></td>";
          echo "<td class='capitalize'>".$res['NAME']."</td>";
          echo "<td class='capitalize'>".$res['USERNAME']."</td>";
          echo "<td>".$res['BIRTH_YEAR']."</td>";
          echo "<td>".$res['EMAIL']."</td>";
          echo "<td>".$res['POSITION']."</td>";
          echo "<td>".$res['CONTACT_NUMB']."</td>";
          echo "<td>".$res['TIME_SLOT']."</td>";
          echo "<td style='text-align: center;'><a href='edit.php?editID=".$res['ID']."'><img src='./img/edit.svg' title='Edit' alt='Edit' class='tdIcon'></a></td>";
          echo '<td style="text-align: center;"><a href="view.php?deleteID='.$res['ID'].'" onclick="return confirm'.$sure.'; return false;"><img src="./img/delete.svg" title="Delete" alt="Delete" class="tdIcon"></a></td>';

          echo "</tr>";
        }
		//close the table

		echo '</table>';
		echo '</section>';


		//disconnect
		$conn = null;
	}
 ?> 
 </div>
  <?php
	  require './inc/footer.php';
  ?>




























</body>
</html>
