<?php
    //start the session
    session_start();
?>
<!DOCTYPE html>
<html>
    <body>

    <?php
        // set session variables
        $_SESSION["favcolor"] = "green";
        $_SESSION["favanimal"] = "dog";
        echo "Session variables are set";
    ?>
    </body>
</html>
