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

    <?php 
    
    while($row = mysqli_fetch_assoc($result)) {
//        var_dump($row);
        $title = $row['title'];
        echo $title;
        echo "<hr>";
    }
    
    //Step 4 Release returned data
    mysqli_free_result($result);
    
    //Step 5 close the database connection 
    mysqli_close($connection);
    ?>


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
                <img class='photo' src="images/beef.jpg" alt="" />
            </div>
            <div class="photoWrapper">
                <img class='photo' src="images/broc.jpg" alt="" />
            </div>
            <div class="photoWrapper">
                <img class='photo' src="images/cal.jpg" alt="" />
            </div>
            <div class="photoWrapper">
                <img class='photo' src="images/finish.jpg" alt="" />
            </div>
        </div>
        <!--
        <div id="hero">
            <img src="images/beef.jpg" alt="Recipe Slideshow">
-->
        <!--
        <div class="hero_desc">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam illum voluptatum consequuntur obcaecati dolore, sit dicta est sed similique aspernatur quod? Laborum nobis eum atque porro incidunt qui accusantium accusamus.</p>
-->
        <!--        </div>-->


        <div id="browse">
            <h3>Browse by Category&#33;</h3>
            <button>Gluten-Free</button>
            <button>Heart Healthy</button>
            <button>Low Calorie</button>
            <button>Quick&amp;Easy</button>
            <button>Vegan</button>
        </div>
        <div id="cards">
            <div id="food_card">
                <!--            <div class="food_image">-->
                <a class="food_image" href="recipe.html"><img src="images/broc.jpg" alt="Food Image" a href="recipe.html"></a>
                <!--                <img src="images/broc.jpg" alt="Food Image">-->
                <!--            </div>-->
                <div class="food_name">
                    <h4>Broccoli &amp; Basil Pesto Sandwiches</h4>
                </div>
                <div class="food_desc">
                    <p>with Romaine &amp; Citrus Salad</p>
                </div>
            </div>

            <div id="food_card">
                <div class="food_image">
                    <img src="images/beef.jpg" alt="Food Image">
                </div>
                <div class="food_name">
                    <h4>Beef Medallions &amp; Mushroom Sauce</h4>
                </div>
                <div class="food_desc">
                    <p>with Mashed Potatoes</p>
                </div>
            </div>
            <div id="food_card">
                <div class="food_image">
                    <img src="images/cal.jpg" alt="Food Image">
                </div>
                <div class="food_name">
                    <h4>Broccoli &amp; Mozzarella Calzones

                    </h4>
                </div>
                <div class="food_desc">
                    <p>with Caesar Salad</p>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
