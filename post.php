<?php

/*******w******** 
    
    Name: Finn Stuchbery
    Date:
    Description:

****************/

// has authentication to stop normal users
require('authenticate.php');
require('connect.php');

$querrry = "SELECT * FROM categories";
$stmt = $db->prepare($querrry);
$stmt->execute();
$cats = $stmt->fetchAll(PDO::FETCH_ASSOC);



if($_POST && !empty($_POST['dateInput']) && !empty($_POST['reviewTitleInput']) && !empty($_POST['movieTitleInput']) && !empty($_POST['authorInput']) && !empty($_POST['contentInput']) ) {

    $titleInput = filter_input(INPUT_POST,'reviewTitleInput', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $dateInput = $_POST['dateInput'];
    if( preg_match('/^\d{4}-\d{2}-\d{2}$/', $dateInput)) {
        $date = DateTime::createFromFormat('Y-m-d', $dateInput);
    if ($date != false) {
        $movieInput = filter_input(INPUT_POST,'movieTitleInput', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $authorInput = filter_input(INPUT_POST,'authorInput', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $contentInput = filter_input(INPUT_POST,'contentInput', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $catChoice = $_POST['category'];
    
        $query = "INSERT INTO Reviews ( reviewTitle, reviewDate, author, movieTitle,  content, categorieID) VALUES (:reviewTitleInput , :dateInput , :authorInput , :movieTitleInput , :contentInput, :catChoice) ";
        $statement = $db->prepare($query);
        $statement->bindValue(':reviewTitleInput', $titleInput);
        $statement->bindValue(':dateInput', $dateInput);
        $statement->bindValue(':movieTitleInput', $movieInput);
        $statement->bindValue(':authorInput', $authorInput);
        $statement->bindValue(':contentInput', $contentInput);
        $statement->bindValue(':catChoice', $catChoice);

        $statement->execute();
    }
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title>My Blog Post!</title>
</head>
<body id = "postBody">

    <h1 id = "newTitleCard"><a href = "index.php" id = "homeLink">Home </a> </h1>
    <div id = "linksWrapper">
        <a href = "searchMovie.php" id = "catsAnchor"><h3>Search For a Film </h3></a> 
        <a href = "currentCategories.php" id = "catsAnchor"><h3> View Categories</h3> </a> 
        <a href = "post.php" id = "catsAnchor"><h3>Create Review</h3></a> 
        <a href = "categories.php" id = "catsAnchor"><h3> Edit Categories</h3> </a> 
       
        
        </div>
    <form method = "post" action = "post.php" id = "postForm">


        <label for = "dateInput">Date Watched: </label>
        <input id = "dateInput" name = "dateInput" type = "date">
        <br>
        <label for = "reviewTitleInput">Review Title: </label>
        <input id = "reviewTitleInput" name = "reviewTitleInput">
        <br>
        <label for = "movieTitleInput">Movie Title: </label>
        <input id = "movieTitleInput" name = "movieTitleInput">
        <br>
        <label for = "authorInput">Author: </label>
        <input id = "authorInput" name = "authorInput">
        <br>
        <label for = "contentInput">Review: </label>
        <br>
        <textarea id = "contentInput" name = "contentInput" rows = "15" cols = "40" > </textarea>
        <br>
        <label for="category">Choose a category:</label>
        <select name="category" id="category">
        <?php foreach($cats as $catsIndex): ?>
                <option value = "<?php echo $catsIndex['id'] ?>"><?php echo $catsIndex['categorieName'] ?> </option>

           <?php endforeach  ?> 
        </select>
        <br>
        <input id = "submitButton" type = "submit">


    </form>
    
</body>
</html>