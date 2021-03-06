<?php require('includes/config.php');


// if form has been submitted process it
if(isset($_POST['submit'])){

	// email validation
	if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
	    $error[] = 'Please enter a valid email address.';
	} else {
		$stmt = $db->prepare('SELECT email FROM subscribers WHERE email = :email');
		$stmt->execute(array(':email' => $_POST['email']));
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		if(!empty($row['email'])){
			$error[] = 'Email provided is already in use.';
		}
	}


	// if no errors have been created carry on
	if(!isset($error)){

		try {

			// insert into database with a prepared statement
			$stmt = $db->prepare('INSERT INTO subscribers (email) VALUES (:email');
			$stmt->execute(array(
				':email' => $_POST['email'],
			));
			$id = $db->lastInsertId('memberID');

			// send email
			$to = $_POST['email'];
			$subject = "CU Boulder HvZ Registration Confirmation";
			$body = "<p>You have successfully subscribed to CU Humans vs Zombies updates.</p>
			<p>- CU Boulder Humans VS Zombies Mod Team</p>";

			$mail = new Mail();
			$mail->setFrom(SITEEMAIL);
			$mail->addAddress($to);
			$mail->subject($subject);
			$mail->body($body);
			$mail->send();

			// redirect to index page
			header('Location: subscribe.php?=success');
			exit;

		// else catch the exception and show the error
		} catch(PDOException $e) {
		    $error[] = $e->getMessage();
		}
	}
}


// define page title
$title = 'HVZ CU BOULDER';

// include header template
require('layout/header.php');
?>


<!-- Begin Primary Document
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<nav>
<center>
<a href="#slideshow" class="cta">What is HVZ? Click to learn more.</a>
</center>
</nav>

<!-- SLIDE #1 - SIGNUP -->

<div id="signup" class="lightslide">

 <div class="container">

  <div class="row">

	<!-- HEADLINE -->
    <div class="five columns">
      <h1 class="section-heading">Humans
      <span class="white">versus</span> Zombies</h1>
      <h2 class="grey subheader">University of Colorado <strong class="deeporange">Boulder</strong></h2>
      <img src="images/skull.png" class="u-max-full-width">
    </div> <!-- end headline -->

	<!-- SIGNUP BOX -->
    <div class="six columns lightslide-box">

      <h4 class="white">Subscribe for CU HVZ updates.</h4>
    <hr>

	  	<?php
		// check for any errors, error messages
		if(isset($error)){
		foreach($error as $error){
		echo '<p class="bg-danger"> &#10006; '.$error.'</p>';
		}
		}

		// if action is joined show success message
		if(isset($_GET['action']) && $_GET['action'] == 'success'){
		echo "<p class='bg-success'> &#10003; <strong>Thanks for subscribing! We will email you about future games and missions.</strong>";
		} 
		?>

		<!-- BEGIN SIGNUP FORM -->
        <form role="form" method="post" action="" autocomplete="off">

          <div class="row">
            <div class="twelve columns">
            <input type="email" name="email" id="email" class="form-control input-lg u-full-width" placeholder="Email Address" value="<?php if(isset($error)){ echo $_POST['email']; } ?>" tabindex="3">
            </div>
          </div>

          <div class="row">
            <div class="twelve columns">
                <input type="submit" name="submit" value="Submit" class="btn btn-primary btn-block btn-lg button-primary" tabindex="7">
            </div>
          </div>

        </form>

      </div> <!-- end signup box -->

  </div> <!-- end row -->

 </div> <!-- end container -->

</div> <!-- end signup section -->

<div class="darkslide" id="slideshow">
<div class="slideshow-container">
  <div class="mySlides">
    <img src="images/info/Slide01.jpg" style="width:100%">
  </div>

  <div class="mySlides">
    <img src="images/info/Slide02.jpg" style="width:100%">
  </div>

  <div class="mySlides">
    <img src="images/info/Slide03.jpg" style="width:100%">
  </div>
   <div class="mySlides fade">
    <img src="images/info/Slide04.jpg" style="width:100%">
  </div>

  <div class="mySlides fade">
    <img src="images/info/Slide05.jpg" style="width:100%">
  </div>

  <div class="mySlides fade">
    <img src="images/info/Slide06.jpg" style="width:100%">
  </div>
  <div class="mySlides fade">
    <img src="images/info/Slide07.jpg" style="width:100%">
  </div>

  <div class="mySlides fade">
    <img src="images/info/Slide08.jpg" style="width:100%">
  </div>

  <div class="mySlides fade">
    <img src="images/info/Slide09.jpg" style="width:100%">
</div>

      <div class="mySlides fade">
    <img src="images/info/Slide10.jpg" style="width:100%">
  </div>

  <div class="mySlides fade">
    <img src="images/info/Slide11.jpg" style="width:100%">
  </div>

  <div class="mySlides fade">
    <img src="images/info/Slide12.jpg" style="width:100%">
  </div>

        <div class="mySlides fade">
    <img src="images/info/Slide13.jpg" style="width:100%">
  </div>

  <div class="mySlides fade">
    <img src="images/info/Slide14.jpg" style="width:100%">
  </div>

  <div class="mySlides fade">
    <img src="images/info/Slide15.jpg" style="width:100%">
  </div>

        <div class="mySlides fade">
    <img src="images/info/Slide16.jpg" style="width:100%">
  </div>

  <div class="mySlides fade">
    <img src="images/info/Slide17.jpg" style="width:100%">
  </div>

  <div class="mySlides fade">
    <img src="images/info/Slide18.jpg" style="width:100%">
  </div>

      <div class="mySlides fade">
    <img src="images/info/Slide19.jpg" style="width:100%">
  </div>

  <div class="mySlides fade">
    <img src="images/info/Slide20.jpg" style="width:100%">
  </div>

  <div class="mySlides fade">
    <img src="images/info/Slide21.jpg" style="width:100%">
  </div>

    <div class="mySlides fade">
    <img src="images/info/Slide22.jpg" style="width:100%">
  </div>

        <div class="mySlides fade">
    <img src="images/info/Slide23.jpg" style="width:100%">
  </div>

  <div class="mySlides fade">
    <img src="images/info/Slide24.jpg" style="width:100%">
  </div>

  <div class="mySlides fade">
    <img src="images/info/Slide25.jpg" style="width:100%">
  </div>

        <div class="mySlides fade">
    <img src="images/info/Slide26.jpg" style="width:100%">
  </div>

  <div class="mySlides fade">
    <img src="images/info/Slide27.jpg" style="width:100%">
  </div>

  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
  <a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>
<br>

<!--<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 
  <span class="dot" onclick="currentSlide(3)"></span> 
</div> -->
</div>
<script src="js/slider.js"></script>



<!-- End Document
–––––––––––––––––––––––––––––––––––––––––––––––––– -->


<?php
// include footer template
require('layout/footer.php');
?>

