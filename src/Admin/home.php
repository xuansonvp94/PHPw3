<?php
    $user = new App_Libs_UserIdentity();
    $router = new App_Libs_Router();

    ?>
<html>
    <head>
        <title>Welcome Home</title>
    </head>
    <body>
        <div>
            <p>
                Hi <?= $user->getSESSION("username")?><br>
                <a href="<?= $router->createUrl('logout')?>">Logout</a>

            </p>
            <h1>
                ADMIN PAGE
            </h1>
        </div>

        <div class="show-data">
            <ul>
                <li><a href="<?= $router->createUrl('post/post') ?>">Manage Posts</a></li>
                <li><a href="<?= $router->createUrl('categories/index') ?>">Manage Category</a></li>
                <li><a href="<?= $router->createUrl('user/users') ?>">Manage User</a></li>
            </ul>
        </div>
    </body>
</html>

