<?php
    //Step 1 open a connection to database
    require'include/db.php';

    // Step 2 preform and DB table query
    $table = 'recipes';
    $query = "SELECT * FROM {$table}";
    $result = mysqli_query($connection, $query);

    // Check for errors
    if (!$result){
        die('Database query failed');
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
<!--
NEED
home screen
filter results screen
no results found screen
single recipe screen
help screen
-->


<body>


    <div id="wrapper">
        <h1> <a href="index.html">CHOPPED KITCHEN</a></h1>

        <!--
        <nav role="navigation">
            <div id="menuToggle">
                <input type="checkbox" />
                <span></span>
                <span></span>
                <span></span>
                <ul id="menu">
                    <a href="#">
                        <li>Home</li>
                    </a>
                    <a href="#">
                        <li>About</li>
                    </a>
                    <a href="#">
                        <li>Info</li>
                    </a>
                    <a href="#">
                        <li>Contact</li>
                    </a>
                </ul>
            </div>
        </nav>
-->
        <div id="navbar">
            <div class="search-container">
                <form action="/action_page.php">
                    <input type="text" placeholder="Search" name="search">
                    <button type="submit"><i class="fa fa-search">Go</i></button>
                </form>
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
            <button>Gluten-Free</button>
            <button>Heart Healthy</button>
            <button>Low Calorie</button>
            <button>Quick&amp;Easy</button>
            <button>Vegan</button>
        </div>
        <div id="cards">

            <?php 
    while($row = mysqli_fetch_assoc($result)) { 
        ?>

            <div id="food_card">
                <!--            <div class="food_image">-->
                <a class="food_image" href="recipe.html"><img src="images/<?php echo $row['main_img']; ?>" alt="Food Image" a href="recipe.html"></a>
                <!--                <img src="images/broc.jpg" alt="Food Image">-->
                <!--            </div>-->
                <div class="food_name">
                    <h4><?php echo $row['title']; ?></h4>
                    <!--                    <h4>Broccoli &amp; Basil Pesto Sandwiches</h4>-->
                </div>
                <div class="food_desc">
                    <p><?php echo $row['subtitle']; ?></p>
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
    </div>

</body>

</html>
