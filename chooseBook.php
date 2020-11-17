<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css/style1.css">
	<title>Choose a book to edit</title>
</head>
<body>
	<div class="grid-container">
			<header>
				<form method="post" action="loginProcess.php">
				<input class='login' type="text" placeholder="Username" name="username" required>
      			<br>
      			<input class='login' type="password" placeholder="Password" name="password" required>
      			<br>
      			<button class='login' type="submit" value="Login">Login</button>
				</form>
			</header>
			<?php $menuArray = array ("index.php" => "HOME", "chooseBook.php" => "EDIT BOOK", "orderBooksForm.php" => "ORDER BOOK", "credits.php" => "CREDITS", "loginForm.php" => "LOGIN");
			require_once("functions.php");
			echo makeNavMenu($menuArray, "index.php"); ?>
			</div>
			<main>
	<h1>Choose book to edit:</h1>
	<table class="booksTable">
<thead>
<tr>
<th>Title</th>
<th>Category</th>
<th>Year</th>
<th>Price</th>
</tr>
</thead>
<tbody>
<?php
try {
require_once("functions.php");
$dbConn = getConnection();

$sqlQuery = "SELECT bookISBN, bookTitle, bookYear, catDesc, bookPrice
		FROM NBL_books
		INNER JOIN NBL_category
		ON NBL_category.catID = NBL_books.catID
		ORDER BY bookTitle";
$queryResult = $dbConn->query($sqlQuery);
	
while ($rowObj = $queryResult->fetchObject()) {
	echo "<tr>\n
	<td class='bookTitle'><a href='editBook.php?bookISBN={$rowObj->bookISBN}'>{$rowObj->bookTitle}</a></td>
	<td class='catDesc'>{$rowObj->catDesc}</td>
	<td class='bookYear'>{$rowObj->bookYear}</td>
	<td class='bookPrice'>{$rowObj->bookPrice}</td></tr>";
}
}
catch (Exception $e){
echo "<p>Query failed: ".$e->getMessage()."</p>\n";
}
?>
</tbody>
</table>
</main>
</body>
</html>