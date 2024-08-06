<?php

/*******w******** 
    
    Name:
    Date:
    Description:

****************/

require('connect.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <script src = "scripts.js"> </script>
    <title>BetterLoxd</title>
</head>
<body id = "indexBody">
    <!-- Rememberw that alternative syntax is good and html inside php is bad -->
     
    <h1 id = "titleCard"><a href = "index.php" id = "homeLink"> BetterLoxd </a> </h1>
        <div id = "linksWrapper">
        <a href = "post.php" id = "catsAnchor"><h3>Create Review</h3></a> 
        <a href = "categories.php" id = "catsAnchor"><h3> Edit Categories</h3> </a> 
        <a href = "currentCategories.php" id = "catsAnchor"><h3>View Categories </h3></a> 
        <a href = "searchMovie.php" id = "catsAnchor"><h3>Search For a Film </h3></a> 
        </div id = "popo">

        <div id = "movieResultWrapper">
        <div id = "infoWrapper">
            <form method = "post" action = "searchMovie.php"  onsubmit="handleSubmit(event)"> 
            <label for = "inputOne">Movie Name:</label>
            <input id = "inputOne" type = "text"></input>
            <br>
            <label for = "inputTwo" >Year Released:</label>
            <input id = "inputTwo" type = "number"></input>

            <button id = "searchButton" type = "submit" class = "touchUp">Search</button>
            </form>
            
            <h1 id = "titleOfMovie"></h1>
            <h1 id = "dateOfMovie"></h1>
            <h1 id = "ratesOfMovie"></h1>
            <h1 id = "directorOfMovie"></h1>
            <h1 id = "writerOfMovie"></h1>
            <h1 id = "lengthOfMovie"></h1>
            <h1 id = "boxOfficeOfMovie"></h1>
            <p id = "contentOfMovie"></p>
            
            </div>
            
        </div>
</body>
</html>