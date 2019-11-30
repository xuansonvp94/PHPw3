<?php
    session_start();
?>

<!DOCTYPE html>
<html>
    <body>
    <?php
        echo "My favorite color is ".$_SESSION["favcolor"]."<br>";
        echo "My favorite animal is ".$_SESSION["favanimal"]."<br>";
        print_r($_SESSION); //show all the session variable values
    ?>
    </body>
</html>
