<?php
include "config.php";
$bookId = $_GET['bookId'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookPage</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
</head>
<body>
    <?php
    $query = "SELECT * FROM tbl_18_books WHERE id = '$bookId'";
    $result = mysqli_query($connection, $query);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $bookName = $row['book_name'];
            $bookprice = $row['price'];
            $bookdesc = $row['description'];
            $bookimage = $row['image_path'];
            $bookimage2 = $row['image_path2'];
            $bookrating = $row['rating'];
            $bookauthor = $row['author_name'];
            

            echo '<h1>Book Details</h1>';
            echo '<div>';
            echo '<br><h3><b>' . $bookName . '</b></h3>';
            echo '<h5>Price: $' . $bookprice . '</h5>';
            echo '<h6>Category: <label id="bookCategory"></label></h6>';
            echo '<p>Author name: ' . $bookauthor . '</p>';
            echo '<p>Rating: &#9733;' . $bookrating . '</p>';
            echo '<img src="' . $bookimage . '" alt="Book Cover">';
            echo '<img src="' . $bookimage2 . '" alt="Book Cover">';
            echo '<p>' . $bookdesc . '</p>';
            echo '</div>';
        } else {
            echo 'Book not found';
        }
    } else {
        echo 'Error executing the query: ' . mysqli_error($connection);
    }
    ?>
    <script src="includes/bookJS.js"></script>
    <script>
        // Set the book category using the value from JavaScript variable
        document.getElementById("bookCategory").innerHTML = bookCategory;
    </script>
</body>
</html>

<?php
mysqli_close($connection);
?>




