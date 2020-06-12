<?php
    //Step 1 open a connection to database
    require'include/db.php';
?>


<!DOCTYPE html>
<html>

<head>
    <title>Recipe</title>
    <meta charset="UTF-8">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link rel="stylesheet" href="main.css">
</head>

<body>
    <div id="wrapper">

        <h1> <a href="index.php">CHOPPED KITCHEN</a></h1>
        <div id="navbar">
            <div class="search-container">

                <div class="align">

                    <form action="" method="get" class="form form--search">

                        <div class="form__field">
                            <input type="search" placeholder="Search …">
                            <input type="submit" value="Search">
                        </div>

                    </form>

                </div>
            </div>
            <div class="help-tip">
                <p>Click on your favorite image to start cooking your favorite recipe!</p>
            </div>

        </div>

        <?php 
       // Get the ID # passed to this page 
       $id = $_GET['id'];
       
       //Query for said ID #
        $table = 'recipes';
        $query = "SELECT * FROM {$table} WHERE id=$id";
        $result = mysqli_query($connection, $query);

    // Check for errors
    if (!$result){
        die('Database query failed');
    }else{
        $row = mysqli_fetch_assoc($result);
       // print_r($row);
    }
         //Extract record information
      ?>



        <div id="recipe">
            <div id="title">
                <h3><?php echo $row['title'];?> </h3>
            </div>
            <div id="subtitle">
                <h4><?php echo $row['subtitle'];?> </h4>
            </div>
            <div id="food_image">
                <img src="images/<?php echo $row ['main_img']?>" alt="Food Image">
            </div>
            <div id="serving">
                <h4> Servings 8-10</h4>
            </div>
            <div id="desc">
                <p><?php echo $row['description'];?></p>
            </div>

            <div id="ingredients">
                <div id="ing_img">
                    <img src="images/<?php echo $row ['ingredients_img']?>" alt="Ingredients">
                </div>
                <div id="ing_list">
                    <?php 
                        $ingredStr = $row['all_ingredients'];
//                         echo $ingredStr;
                         //Convert string into array 
                         $ingredArray = explode("*", $ingredStr);
//                         print_r($ingredArray);
                         for ($lp = 0; $lp < count($ingredArray); $lp++){
                             $oneIngred = $ingredArray[$lp];
                             echo "<li>" .$oneIngred . "</li>";
                         }
                         
                        ?>
                </div>
            </div>

            <?php
                    //Get the step data
                    $stepImgStr = $row['step_imgs'];
                    $allStepStr = $row['all_steps'];

            $stepImgArray = explode("*", $stepImgStr);
            $allStepArray = explode("*", $allStepStr);
       

            for ($lp = 0; $lp < count($stepImgArray); $lp++){ 
                $oneStepImg = $stepImgArray[$lp]; 
            $oneStepStr = $allStepArray[$lp];
//                                                   
             
//            echo "image filename" . $oneStepImg . "</br>";
//            echo "step inst" . $oneStepStr . "</br>";   
                echo  "<div id=\"instructions\">";
                echo "<img src=\"images/". $oneStepImg . "\"alt=\"Step Image\">";
                echo "<p>";
                echo $oneStepStr; 
                echo "</p>";
                echo "</div";
            }
                    ?>



        </div>


    </div>
</body>

</html>
