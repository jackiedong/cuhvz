<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Basic Page Needs
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta charset="utf-8">

  <title>CU Humans vs. Zombies</title>

  <meta name="keywords" content="CU, HVZ, Humans vs Zombies, zombies">
  <meta name="description" content="Can you survive the zombie apocalypse? Play Humans versus Zombies at CU Boulder.">
  <meta name="author" content="CU Boulder Humans versus Zombies">

  <!-- Mobile Specific Metas
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- FONT
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link href="//fonts.googleapis.com/css?family=Raleway:400,300,600" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Anton" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,900|Arimo:400,700|Roboto:400,700,900" rel="stylesheet">

  <!-- CSS
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/skeleton.css">
  <link rel="stylesheet" href="css/custom.css">

  <!-- <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet"> -->

  <!-- Favicon
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="icon" type="image/png" href="images/favicon.png">
  
  <!-- FB Meta Tags (Attempt by Philip) -->
  <meta property="og:site_name"		content="HVZ CU BOULDER" />
  <meta property="og:type"			content="website" />
  <meta property="og:image"			content="http://www.cuhvz.com/layout/WeeklongPromo.jpg" />
  <meta property="og:description"	content="Can you survive a week in the zombie apocalypse?" />
  <meta property="og:url"			content="http://www.cuhvz.com" />
  <meta property="og:title"			content="HVZ CU BOULDER" />

  <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-93715393-1', 'auto');
  ga('send', 'pageview');

</script>

  <script src="js/jquery-3.1.1.min.js"></script>
  <script src="js/checkbox.js"></script>

</head>
<body>

<!-- Check for deceased zombies -->

<?php

$currTime = date('Y-m-d H:i:s');
$sql = "UPDATE members SET status='deceased' WHERE StarveDate <= '$currTime'";
    $stmt = $db->prepare($sql);
    $stmt->execute();
?>

<!-- End check for deceased zombies -->




