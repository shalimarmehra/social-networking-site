<?php

    include("classes/autoload.php");
    
    $login = new Login();
    $user_data = $login->check_login($_SESSION['social_network_user_id']);

    $USER = $user_data;

    if (isset($_GET['id']) && is_numeric($_GET['id'])) 
    {
        $profile = new Profile();
        $profile_data = $profile->get_profile($_GET['id']);
    
        if (is_array($profile_data)) 
        {
            $user_data = $profile_data[0];
        }
    }

    $Post = new Post();
    $ROW = false;

    $error = "";
    if (isset($_GET['id']))
    {
        $ROW = $Post->get_one_post($_GET['id']);
    }
    else
    {
        $error = "";
        echo "<h5 style='color: #DDC3A5; font-size: x-large; text-align: center; margin-bottom: 10px;'>No Image was Found !</h5>";
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/index.css">
    <link rel="stylesheet" href="style/header.css">
    <title>Single Post | SOUL MEDIA</title>
</head>
<body>
    <!-- Main Header -->
    <?php 
        include("header.php");
    ?>

    <!-- Post Area -->
    <div id="timeline-section" style='margin: 20px 350px 0px 350px;'>
        <div id="timeline-post">
            <?php

                $User = new User();
                $image_class = new Image();
                if (is_array($ROW)) 
                {
                    echo "<img src='$ROW[image]' style='width:100%;'/>";
                }
            ?>
        </div>            
    </div>
</body>
</html>