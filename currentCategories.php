<?php 


require('connect.php');
$oldCat = false;
$querrry = "SELECT * FROM categories";
$sstmt = $db->prepare($querrry);
$sstmt->execute();
$allCats = $sstmt->fetchAll(PDO::FETCH_ASSOC);

$queray = "SELECT * FROM Reviews";
$statemennt = $db->prepare($queray);
$statemennt->execute();
$allReviews = $statemennt->fetchAll(PDO::FETCH_ASSOC);



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
        <a href = "searchMovie.php" id = "catsAnchor"><h3>Search For a Film </h3></a> 
        <a href = "currentCategories.php" id = "catsAnchor"><h3> View Categories</h3> </a> 
        <a href = "post.php" id = "catsAnchor"><h3>Create Review</h3></a> 
        <a href = "categories.php" id = "catsAnchor"><h3> Edit Categories</h3> </a> 
       
        
        </div>
            
            <ul id = "currentCatList"> 
                    <?php foreach($allCats as $categoriesIndex):   ?> 
                    <h2>  <?php echo $categoriesIndex['categorieName']  ?>  </h2>   
                    <?php foreach($allReviews as $reviewIndex):   ?>
                        <?php if($reviewIndex['categorieID'] === $categoriesIndex['id']) { ?>
                    <li class = "listLinksCats"> 
                           
                            
                            <a  class = "currentCatListLinks"  href = "viewPost.php?reviewID=<?= $reviewIndex['reviewID']?>"> <?= $reviewIndex['reviewTitle'] ?> </a>
                    </li>
                    <?php  } ?> 
                    <?php endforeach  ?>
                    <?php endforeach ?>      
            </ul>




</body>
</html>