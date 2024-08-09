<?php

/*******w******** 
    
    Name: Finn Stuchbery
    Date:
    Description:

****************/
require('connect.php');

//update the parts if they are there 
    
    
    
    
    //(isset($_GET['reviewID'])) 

$id = $_GET['reviewID'];
$query = "SELECT * FROM Reviews WHERE reviewID = :id";
$statement = $db->prepare($query);
$statement->bindValue(':id',$id,PDO::PARAM_INT);
$statement->execute();
$quote = $statement->fetch();



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
     
        <h1 id = "newTitleCard"><a href = "index.php" id = "homeLink"> BetterLoxd </a> </h1>
        <div id = "linksWrapper">
        <a href = "post.php" id = "catsAnchor"><h3>Create Review</h3></a> 
        <a href = "categories.php" id = "catsAnchor"><h3> Edit Categories</h3> </a> 
        <a href = "currentCategories.php" id = "catsAnchor"><h3> View Categories</h3> </a> 
        <a href = "searchMovie.php" id = "catsAnchor"><h3>Search For a Film </h3></a> 
        </div>
        <div id = "viewPostWrapper">
        <h1>  <?=$quote['reviewTitle'] ?> </h1>
        <h3> Date Watched: <?= $quote['reviewDate'] ?></h3>
        <h2> By <?=$quote['author'] ?> </h2>
        <h2> Movie: <?= $quote['movieTitle'] ?></h2>
        <p> <?= $quote['content'] ?> </p>
      
    </div>>
    
     
</body>
</html>