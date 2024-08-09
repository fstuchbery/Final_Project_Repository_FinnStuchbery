<?php
require('connect.php');
require('authenticate.php');
/*******w******** 
    
    Name: Finn Stuchbery
    Date:
    Description:

****************/
$sortNumber = 0;
$sortOptions = [
    'date' => 'reviewDate',
    'reviewTitle' => 'reviewTitle',
    'authors' => 'author'
];

$pickedSort = isset($_GET['sortThing']) ? $_GET['sortThing'] : 'authors';
if(!array_key_exists($pickedSort, $sortOptions)) {
    $pickedSort = 'authors';
}

if($_GET['sortThing'] === 'reviewDate') {

    $sortNumber = 1;
    $query = "SELECT * FROM Reviews ORDER BY reviewDate";
    $statement = $db->prepare($query);
    $statement->execute();
    


} else if($_GET['sortThing'] === 'reviewTitle') {

    $sortNumber = 2;
    $query = "SELECT * FROM Reviews ORDER BY reviewTitle";
    $statement = $db->prepare($query);
    $statement->execute();
    

} else if($_GET['sortThing'] === 'author') {

    $sortNumber = 3;
    $query = "SELECT * FROM Reviews ORDER BY author";
    $statement = $db->prepare($query);
    $statement->execute();
    

}
$sortColumn = $sortOptions[$pickedSort];



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
        <a href = "searchMovie.php" id = "catsAnchor"><h3>Search For a Film </h3></a> 
        <a href = "sortPosts.php?sortThing=reviewDate" id = "catsAnchor"><h3>Sort Reviews</h3></a> 
        <a href = "currentCategories.php" id = "catsAnchor"><h3> View Categories</h3> </a> 
        <a href = "post.php" id = "catsAnchor"><h3>Create Review</h3></a> 
        <a href = "categories.php" id = "catsAnchor"><h3> Edit Categories</h3> </a> 
        </div>

        <div id = "listOfReviews">

            <form action = "sortPosts.php" method = "get" id = "searchFormIndex">
                <label for = "sortThing">Sort By: </label>
                <select name = "sortThing" id = "sortThing">
                <option value = "reviewDate">Review Date</option>
                    <option value = "reviewTitle">Review Title</option>
                    <option value = "author">author</option>
                </select>
                <input type="submit" value="Sort">
            </form>


            <?php if($sortNumber === 1): ?>

                <?=  "Sorted By: " .  $_GET['sortThing'] ?>
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


                <?php elseif($sortNumber === 2): ?>
                    <?=  "Sorted By: " .  $_GET['sortThing'] ?>
                    <ul> 
                        <?php while($row2 = $statement->fetch()): ?>
                            <li class = "links">
                            <h3><a href = "viewPost.php?reviewID=<?= $row2['reviewID']?>" class = "linkAnchorTags"><?php echo $row2['movieTitle'] ?></a> </h3>
                            <input type = "hidden" name = "indexID" value = "<?= $row2['reviewID']?>">
                            <?php echo $row2['reviewTitle'] ?> <br> by <?php echo $row2['author'] ?> 
                            <a href = "edit.php?reviewID=<?= $row2['reviewID']?>" class = "editTagss">-edit </a> 
                        </li>
                        <?php endwhile ?>
                    </ul>
                    


                    <?php elseif($sortNumber === 3): ?>
                        <?=  "Sorted By: " .  $_GET['sortThing'] ?>
                    <ul> 
                        <?php while($row3 = $statement->fetch()): ?>
                            <li class = "links">
                            <h3><a href = "viewPost.php?reviewID=<?= $row3['reviewID']?>" class = "linkAnchorTags"><?php echo $row3['movieTitle'] ?></a> </h3>
                            <input type = "hidden" name = "indexID" value = "<?= $row3['reviewID']?>">
                            <?php echo $row3['reviewTitle'] ?> <br> by <?php echo $row3['author'] ?> 
                            <a href = "edit.php?reviewID=<?= $row3['reviewID']?>" class = "editTagss">-edit </a> 
                        </li>
                        <?php endwhile ?>
                    </ul>

                    <?php endif  ?>
        </div>
</body>
</html>