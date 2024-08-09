<?php 
require('connect.php');
require('authenticate.php');
// has authentication to stop normal users

$oldCat = false;
$querrry = "SELECT * FROM categories";
$sstmt = $db->prepare($querrry);
$sstmt->execute();
$allCats = $sstmt->fetchAll(PDO::FETCH_ASSOC);

$queray = "SELECT * FROM Reviews";
$statemennt = $db->prepare($queray);
$statemennt->execute();
$allReviews = $statemennt->fetchAll(PDO::FETCH_ASSOC);




if($_POST && !empty($_POST['catName']) ) {

    $catNamee = $_POST['catName'];

    foreach ($allCats as $catsArray):
        if($catsArray['categorieName'] === $catNamee) {
            $oldCat = true;
        }
    endforeach;


    if($oldCat === false) {
        $query = "INSERT INTO categories ( categorieName ) VALUES ( :catNamee )  ";
        $statementt = $db->prepare($query);
        $statementt->bindValue(':catNamee', $catNamee);
        $statementt->execute();
    }
}
 if($_POST) {
    $chosenCategory = $_POST['category'];
    if($chosenCategory === 'none') {
        
    } elseif( !empty($_POST['newCatName'])) {
    $newestCategorieName = $_POST['newCatName'];
     $queryy = "UPDATE categories SET categorieName = :newestCategorieName WHERE id = :id";
     $statemont = $db->prepare($queryy);
     $statemont->bindValue(':newestCategorieName', $newestCategorieName);
     $statemont->bindValue(':id', $chosenCategory);
     $statemont->execute();
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
    <title>BetterLoxd</title>
</head>
<body id = "indexBody">
    <!-- Remember that alternative syntax is good and html inside php is bad -->
     
    <h1 id = "titleCard"><a href = "index.php?sortThing=reviewTitle" id = "homeLink">Home </a> </h1>
        <div id = "linksWrapper">
        <a href = "searchMovie.php" id = "catsAnchor"><h3>Search For a Film </h3></a> 
        <a href = "currentCategories.php" id = "catsAnchor"><h3> View Categories</h3> </a> 
        <a href = "post.php" id = "catsAnchor"><h3>Create Review</h3></a> 
        <a href = "categories.php" id = "catsAnchor"><h3> Edit Categories</h3> </a> 
       
        
        </div>
            
        <form id = "newCatForm" method = "post">
        <label for = "catName">New Category: </label>
        <input  name = "catName" > 
        <br>
        <label for="category">Rename a category:</label>
        <select name="category" id="category">

            <option value = "none">None </option>

        <?php foreach($allCats as $catsIndex): ?>
                <option value = "<?php echo $catsIndex['id'] ?>"><?php echo $catsIndex['categorieName'] ?> </option>

           <?php endforeach  ?> 
        </select>
        <br>
        <label for = "newCatName"> new name: </label>
        <input  name = "newCatName" > 
        <br>
        <input id = "submitButton" type = "submit">
        </form>
            

</body>
</html>