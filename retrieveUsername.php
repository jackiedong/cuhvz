<?php
//include config
require_once('includes/config.php');

// check if already logged in move to home page
if( $user->is_logged_in() ){ header('Location: index.php'); } 


// define page title
$title = 'HVZ CU BOULDER';

// include header template
require('layout/header.php'); 
?>

<!-- Begin Document
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<div class="lightslide">

<div class="container">

	<div class="row">

	<!-- HEADLINE -->
    <div class="five columns">
      <h1 class="section-heading">Humans
      <span class="white">versus</span> Zombies</h1>
      <h2 class="grey subheader">University of Colorado <strong class="deeporange">Boulder</strong></h2>
      <img src="images/skull.png" class="u-max-full-width">
    </div> <!-- end headline -->

	 
	 <div class="six columns lightslide-box">
      <h4 class="white">Forget Username</h4>
      <p><a href='login.php'>&#9664; Back to Login Page.</a></p>
      <hr>
	  <p>Please input the email associated with your account to retrieve your username.</p>

		<form role="form" method="post" action="" autocomplete="on">

			<input type="email" name="email" id="email" class="form-control input-lg u-full-width" placeholder="Email Address" value="" tabindex="1">

			
			<input type="submit" name="submit" value="Retrieve" class="btn btn-primary btn-block btn-lg button-primary" tabindex="2">


			<?php
			// retrieve matching username with email
			if(isset($_POST['submit'])){

				$stmt = $db->prepare('SELECT email, username FROM members WHERE email = :email');
				$stmt->execute(array(':email' => $_POST['email']));
				$row = $stmt->fetch(PDO::FETCH_ASSOC);

				if(!empty($row['email'])){
					echo '<p class="bg-success">Your username: <strong class="deepgrey">'. $row['username'] . '</strong></p><a href="login.php">&#9664; Back to Login Page.</a>';
				
				} else {
					echo '<p class="bg-danger">Email is not registered in our system.</p>';
				}
			}
			?>

		</form>
		</div>
	</div>

</div>

</div>

<!-- End Document
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<?php 
//include header template
require('layout/footer.php'); 
?>
