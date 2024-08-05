<?php

/*******w******** 
    
    Name:
    Date:
    Description:

****************/

require('connect.php');
$query = "SELECT * FROM Reviews";
$statement = $db->prepare($query);
$statement->execute();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title>BetterLoxd</title>
</head>
<body id = "indexBody">
    <!-- Remember that alternative syntax is good and html inside php is bad -->
     
    <h1 id = "titleCard"><a href = "index.php" id = "homeLink"> BetterLoxd </a> </h1>
        <div id = "linksWrapper">
        <a href = "post.php" id = "catsAnchor"><h3>Create Post</h3></a> 
        <a href = "categories.php" id = "catsAnchor"><h3> Edit Categories</h3> </a> 
        <a href = "currentCategories.php" id = "catsAnchor"><h3> View Categories</h3> </a> 
        <a href = "searchMovie.php" id = "catsAnchor"><h3>Search For a Film </h3></a> 
        </div>

        <div id = "listOfReviews">
            <h1> There are  <?= $statement->rowCount()  ?> Movie Reviews in total. </h1>
            <ul> 

            <?php while($row = $statement->fetch()): ?>
                <li class = "links"> <h1><a href = "viewPost.php?reviewID=<?= $row['reviewID']?>"><?php echo $row['movieTitle'] ?></a> </h1>
                <input type = "hidden" name = "indexID" value = "<?= $row['reviewID']?>">
                <?php echo $row['reviewTitle'] ?> by <?php echo $row['author'] ?> 
            
                 <a href = "edit.php?reviewID=<?= $row['reviewID']?>">edit </a> 
            </li>
            <?php endwhile ?>

            </ul>
        </div>
</body>
</html>