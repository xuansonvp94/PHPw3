<?php

    /*setcookie($cookieName, $cookieValue, time() + (86400 * 30), "/") *///86400 = 1 day, The "/" means that the cookie is available in entire website
    setcookie("user", "Son", time() - (86400 * 30), "/");
    var_dump($_COOKIE); die();
?>

<html>
    <body>
    <?php
        echo "cookie is delete";
    ?>
    </body>
</html>
