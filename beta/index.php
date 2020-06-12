<?php
    //Step 1 open a connection to database
    require'include/db.php';

    //Get filter info if passed in URL
    $filter = $_GET['filter'];
//    print_r($filter);

    $table = 'recipes';

    if (isset($_POST['submit'])){
   
    $search = $_POST['search'];
        
    $query = "SELECT * FROM {$table} WHERE title LIKE '%{$search}%' OR subtitle  LIKE '%{$search}%'";
    $result = mysqli_query($connection, $query);
//     print_r($result); 
    if (!$result){
        die('Search query failed');
        }
    } else if (isset($filter)) {
          $query = "SELECT * FROM {$table} WHERE proteine LIKE '%{$filter}%'";
        $result = mysqli_query($connection, $query);
    } else {
        
    // Step 2 preform and DB table query
    $query = "SELECT * FROM {$table}";
    $result = mysqli_query($connection, $query);

    // Check for errors
    if (!$result){
        die('Database query failed');
    }

    }
?>

<!DOCTYPE html>
<html>

<head>
    <title>Chopped Kitchen</title>
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

                    <form action="index.php" method="POST" class="form form--search">

                        <div class="form__field">
                            <input type="search" placeholder="Search…" name="search">
                            <input type="submit" name="submit" value="Submit">
                        </div>

                    </form>

                </div>
            </div>
            <div class="help-tip">
                <p>Click on your favorite image to start cooking your favorite recipe!</p>
            </div>

        </div>
        <div class="container">
            <div class="photoWrapper">
                <img class='photo' src="images/0108_2PV1_Roasted-Pepper-Pasta_97907_SQ_hi_res.jpg" alt="" />
            </div>
            <div class="photoWrapper">
                <img class='photo' src="images/0108_2PF_Barramundi_98380_SQ_hi_res.jpg" alt="" />
            </div>
            <div class="photoWrapper">
                <img class='photo' src="images/0108_2PM_Ginger-Steak-Stirfry_98208_201_SQ_hi_res.jpg" alt="" />
            </div>
            <div class="photoWrapper">
                <img class='photo' src="images/0108_2PRE08_Roasted-Pork_98452_WEB_SQ_hi_res.jpg" alt="" />
            </div>
        </div>
        <div id="browse">
            <h3>Browse by Category&#33;</h3>

            <a href="index.php?filter=Beef"><button>Beef</button></a>
            <a href="index.php?filter=Chicken"><button>Chicken</button></a>
            <a href="index.php?filter=Pork"><button>Pork</button></a>
            <a href="index.php?filter=Fish"><button>Fish</button></a>
            <a href="index.php?filter=Vegitarian"><button>Vegetarian</button></a>

        </div>
        <div id="results">
            <?php 
             if (isset($_POST['submit'])){
                if ($result->num_rows == 0){
                  echo "<p class=\"recipe_header\"> No Recipes Found</p>";   
                }else {
                     echo "<p> Found Recipes</p>";
                }
             } else if (isset($filter)){
                echo "<p> Filtered Recipes</p>";
             } else {
                 echo "<p> All Recipes</p>";
             }
            ?>


        </div>
        <div id="cards">


            <?php 
    while($row = mysqli_fetch_assoc($result)) { 
        ?>



            <div id="food_card">

                <?php
        $id = $row['id'];
    
        
        echo "<a class=\"food_image\" href=\"recipe.php?id={$id}\">";
                ?>

                <!--                <a class="food_image" href="recipe.php">-->

                <img src="images/<?php echo $row['main_img']; ?>" alt="Food Image" a href="recipe.html"></a>

                <div class="title_recipe">
                    <?php echo $row['title']; ?>

                </div>
                <div class="subtitle">
                    <?php echo $row['subtitle']; ?>
                </div>
            </div>

            <?php
            } //End php while loop

            //Step 4 Release returned data
            mysqli_free_result($result);

            //Step 5 close the database connection
            mysqli_close($connection);
            ?>

        </div>


</body>

</html>
