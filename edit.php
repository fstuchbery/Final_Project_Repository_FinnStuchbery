<?php

/*******w******** 
    
    Name: Finn Stuchbery
    Date: August 9th
    Description:

****************/
// has authentication to stop normal users
require('authenticate.php');
require('connect.php');
$submitResponse = isset($_POST['submitButton']) ? $_POST['submitButton'] : '';
//update the parts if they are there 
if($_POST && isset($_POST['dateInput2']) && isset($_POST['reviewTitleInput2']) && 
isset($_POST['movieTitleInput2']) && isset($_POST['authorInput2']) && isset($_POST['contentInput2']) && isset($_POST['reviewID']) && $submitResponse === 'update') {
    
    
    
     // SANITIZE ID 
    $id = filter_input(INPUT_POST,'reviewID', FILTER_SANITIZE_NUMBER_INT);
    $titleInput = filter_input(INPUT_POST,'reviewTitleInput2', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $dateInput = $_POST['dateInput2'];
    if( preg_match('/^\d{4}-\d{2}-\d{2}$/', $dateInput)) {
       
        $movieInput = filter_input(INPUT_POST,'movieTitleInput2', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $authorInput = filter_input(INPUT_POST,'authorInput2', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $contentInput = filter_input(INPUT_POST,'contentInput2', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    
        $query = "UPDATE Reviews SET reviewTitle = :titleInput, reviewDate = :dates, author = :authorInput, movieTitle = :movieTitleInput, content = :contentInput WHERE reviewID = :id";
        $statement = $db->prepare($query);
        $statement->bindValue(':titleInput', $titleInput);
        $statement->bindValue(':dates', $dateInput);
        $statement->bindValue(':movieTitleInput', $movieInput);
        $statement->bindValue(':authorInput', $authorInput);
        $statement->bindValue(':contentInput', $contentInput);
        $statement->bindValue(':id', $id, PDO::PARAM_INT);
        $statement->execute();

        header('Location: /index.php');
        exit();
        
    }
} elseif( $submitResponse === 'delete') {
    $id = filter_input(INPUT_POST,'reviewID', FILTER_SANITIZE_NUMBER_INT); // SANITIZE ID 
    $stmt = $db->prepare('DELETE FROM Reviews WHERE reviewID = :id');
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    header('Location: /index.php');
    exit();

} elseif(isset($_GET['reviewID'])) { // VALIDATE ID 

$id = filter_input(INPUT_GET,'reviewID', FILTER_SANITIZE_NUMBER_INT); // SANIITIZE
$query = "SELECT * FROM Reviews WHERE reviewID = :id";
$statement = $db->prepare($query);
$statement->bindValue(':id',$id,PDO::PARAM_INT); //
$statement->execute();
$quote = $statement->fetch();

}  else {
    $id = false;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title>Edit this Post!</title>
</head>
<body id = "editBody">
    <!-- Remember that alternative syntax is good and html inside php is bad -->
     <?php if($id): ?>
        <h1 id = "titleCard"><a href = "index.php" id = "homeLink">Home </a> </h1>
        <div id = "linksWrapper">
        <a href = "searchMovie.php" class = "catsAnchor"><h3>Search For a Film </h3></a> 
        <a href = "sortPosts.php?sortThing=reviewDate"  class = "catsAnchor"><h3>Sort Reviews</h3></a> 
        <a href = "currentCategories.php" class = "catsAnchor"><h3> View Categories</h3> </a> 
        <a href = "post.php" class = "catsAnchor"><h3>Create Review</h3></a> 
        <a href = "categories.php" class = "catsAnchor"><h3> Edit Categories</h3> </a>  
       
        
        </div>
    <form method = "post" action = "edit.php?reviewID=<?= $quote['reviewID']?>" id = "editForm"> 
        <input type = "hidden" name = "reviewID" value = "<?= $quote['reviewID']?>">
        <label for = "dateInput2">Date Watched: </label>
        <input id = "dateInput2" name = "dateInput2" type = "date" value = "<?=$quote['reviewDate'] ?>"> 
        <br>
        <label for = "reviewTitleInput2">Review Title: </label>
        <input id = "reviewTitleInput2" name = "reviewTitleInput2" value = "<?=$quote['reviewTitle'] ?>">
        <br>
        <label for = "movieTitleInput2">Movie Title: </label>
        <input id = "movieTitleInput2" name = "movieTitleInput2" value = "<?=$quote['movieTitle'] ?>">
        <br>
        <label for = "authorInput2">Author: </label>
        <input id = "authorInput2" name = "authorInput2" value = "<?=$quote['author'] ?>">
        <br>
        <label for = "contentInput2">Review: </label>
        <br>
        <textarea id = "contentInput2" name = "contentInput2" rows = "15" cols = "40"><?=$quote['content'] ?>  </textarea>
        <br>
        <button name = "submitButton" type = "submit" value = "update" >Edit</button>
        <button name = "submitButton" type = "submit" value = "delete" >Delete</button>

    </form>
    <?php else:  ?>
     <h1> Nothing selected</h1>  
     <?php endif ?>
</body>
</html>