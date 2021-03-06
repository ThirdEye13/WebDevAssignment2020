<?php
ini_set("session.save_path", "/home/unn_w18030605/sessionData");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="shortcut icon" href="#">
	<meta name="description" content="Bookstore">
	<meta name="author" content="Mateusz Beclawski">
	<link rel="stylesheet" href="css/style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Main Page</title>
</head>
<body>
	<div class="grid-container">
		<?php
		require_once("functions.php");
		$loginMenu = checkLoginPage();
		$menuArray = array ("index.php" => "HOME", "chooseBook.php" => "EDIT BOOK", "orderBooksForm.php" => "ORDER BOOK", "credits.php" => "CREDITS", $loginMenu['loginPage'] => $loginMenu['name']);
		echo makeHeader();  
		echo makeNavMenu($menuArray, "index.php"); ?>
		<main>
			<div>
				<h1>Bookstore Offers</h1>
				
			</div>
			<aside id='offers'></aside>
			<aside id='JSONoffers'></aside>
		</main>
		<footer>
			<p>Mateusz Beclawski. Student ID: 18030605</p>
		</footer>
	</div>
	<script type="text/javascript" src="functions.js"></script>
	<script type="text/javascript" src="offers.js"></script>
</body>
</html>