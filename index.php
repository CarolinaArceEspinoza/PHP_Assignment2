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
  <section class="masthead">
    <div>
      <h1>Women's soccer camp</h1>
      <h2>is about<br>to start!</h2>
    </div>
  </section>



  <!-- MAIN CONTENT -->
  

  <main class="container">  
    <h2>Sign up and <span> participate</span></h2>

    <h3>Already have an account,  <span>then sign in below!</span></h3>
    <form method="post" action="firsVal.php" style="margin: 0 auto 30px auto; border-bottom: 2px solid #ff02f1;">
          <p><input class="form-control" name="USERNAME" type="text" placeholder="Username" required ></p>
          <p><input class="form-control" name="password" type="password" placeholder="Password" required ></p>
          <input class="buttons" type="submit" value="Login" >
        </form>

    <h3>Don't have an account, <span>then sign up below!</span></h3>

     <!-- FORM TO FILL THE INFORMATION THAT WILL BE STORED IN DATABASE -->
		     <form method="post" action="add.php" enctype="multipart/form-data">
            <p>
              <label>Name and Last Name:</label><br>
              <input type="text" name="name" placeholder="Your Name Here" required>
            </p>
            <p>
              <label>Contact Number:</label><br>
              <input type="text" name="contact" placeholder="xxx xxx xxxx" required>
            </p> 
            <p>
              <label>Parents/Guardians E-mail:</label><br>
              <input type="text" name="email" placeholder="E-mail" required>
            </p>
            <p class="formSmall"> 
              <label>Birth date:</label><br>
              <input type="date" id="birth" name="birth" value="2000-07-22" min="2000-01-01" max="2020-12-31" required>
            </p>
            <p class="formSmall">
              <label>Your play position</label><br>  
              <select name="position" id="position" required>
                <option value="" selected>Choose here</option>
                <option value="goalkeeper">Goalkeeper</option>
                <option value="defender">Defender</option>
                <option value="midfielder">Midfielder</option>
                <option value="forward">Forward</option>
              </select>
            </p>
            <p>
              <label>Time Slot</label><br>
              <select name="timeslot" id="timeslot" required>
                <option value="" selected>Choose here</option>
                <option value="Sat 09:00 - 12:00">Saturday 09:00 to 12:00</option>
                <option value="Sun 09:00 - 12:00">Sunday 09:00 to 12:00</option>
                <option value="Wed 18:00 - 21:00">Wednesday 18:00 to 21:00</option>
              </select>
            </p>
            <p><input type='file' name='file' >

            <p><input class="form-control" name="username" type="text" placeholder="Username" required ></p>
        	<p><input class="form-control" name="password" type="password" placeholder="Password" required ></p>
        	<p><input class="form-control" name="confirm" type="password" placeholder="Confirm Password" required ></p>

             <!-- BUTTONS -->
             
          <div class="form-group">
           <input class="buttons" type="submit" name="Submit" value="Add">
           <input class="buttons" type="reset" value="Clear">
          </div>
		     </form>
        


     </main>

			<!-- FOOTER -->	
  <?php
  require 'inc/footer.php';
  ?>

</body>
</html>
