<?php
include "config.php";
?>

<!DOCTYPE html>
<html>
	<head>
		<title>books list</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
        <link rel="stylesheet" href="style/style.css">
	</head>
	<body>
        <h1></h1>
		<h2>book list</h2>
		<main id="dataServices">
        <select id="categoryDropdown" class="form-select">
            <option value="">All Categories</option>
			<option value="Romance">Romance</option>
			<option value="Fantasy">Fantasy</option>
			<option value="Science Fiction">Science Fiction</option>
			<option value="Fiction">Fiction</option>
        </select>
        <?php
            $query = "SELECT * FROM tbl_18_books";
            $result = mysqli_query($connection, $query);
            while ($row = mysqli_fetch_assoc($result)){
                $bookId = $row['id'];
                $bookName = $row['book_name'];
                $bookimage = $row['image_path'];
                $bookimage2 = $row['image_path2'];
                $bookdesc = $row['description'];
                $bookprice = $row['price'];
                $bookrating = $row['rating'];
                $bookauthor = $row['author_name'];
                $bookcategory = $row['category'];

                echo '<div class="book" data-category="' . $bookcategory . '">';
                echo '<a href="book.php?bookId=' . $bookId . '">';
                echo '<h4>' . $bookId . '. ' . $bookName . ': $' . $bookprice . '</h4>';
                echo '<img src="' . $bookimage . '"alt = "book-cover">';
                echo '</a>';
                echo '</div>';
            }
        ?>
        </main>
		<script src="includes/getbookslist.js"></script>
        
	</body>
</html>
<?php
mysqli_close($connection);
?>

