<?php
require('connect.php');
/*******w******** 
    
    Name: Finn Stuchbery
    Date: August 9th
    Description:

****************/



    
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
     
    <h1 id = "titleCard"><a href = "index.php" id = "homeLink">Home </a> </h1>
        <div id = "linksWrapper">
        <a href = "searchMovie.php" class = "catsAnchor"><h3>Search For a Film </h3></a> 
        <a href = "sortPosts.php?sortThing=reviewDate"  class = "catsAnchor"><h3>Sort Reviews</h3></a> 
        <a href = "currentCategories.php" class = "catsAnchor"><h3> View Categories</h3> </a> 
        <a href = "post.php" class = "catsAnchor"><h3>Create Review</h3></a> 
        <a href = "categories.php" class = "catsAnchor"><h3> Edit Categories</h3> </a> 
        </div>

        <div id = "listOfReviews">
     
            <ul> 
            <?php while($row1 = $statement->fetch()): ?>
                <li class = "links">
                 <h3><a href = "viewPost.php?reviewID=<?= $row1['reviewID']?>" class = "linkAnchorTags"><?php echo $row1['movieTitle'] ?></a> </h3>
                <input type = "hidden" name = "indexID" value = "<?= $row1['reviewID']?>">
                <?php echo $row1['reviewTitle'] ?> <br> by <?php echo $row1['author'] ?> 
                 <a href = "edit.php?reviewID=<?= $row1['reviewID']?>" class = "editTagss">-edit </a> 
            </li>
            <?php endwhile ?>
            </ul>


        </div>
</body>
</html>