<?php

session_start();
require_once("./database.php");

$users = $mysqli->query("SELECT * FROM users");
$users = $users->fetch_all(MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html>

<head>
    <title>Php Crud</title>
    <link rel="stylesheet" href="./style.css" />
</head>

<body>
    <form method="POST" action="./addUser.php" class="box">
        <div class="header">
            <a href="#" class="pageTitle">Users</a>
            <a href="#" class="projectTitle">Php-Crud</a>
        </div>
        <div class="list">
            <?php foreach ($users as $user) { ?>
                <div class="item">
                    <div class="section">
                        <div class="fullName"><?php echo $user["first_name"] . " " . $user["last_name"] ?></div>
                        <div class="username"><?php echo $user["username"] ?></div>
                        <div class="edit">
                            <a href="#">edit</a>
                        </div>
                    </div>
                    <div class="section">
                        <div class="email"><?php echo $user["email"] ?></div>
                        <?php if ($user["phone"] == NULL) { ?>
                            <div class="phone">-</div>
                        <?php } else {  ?>
                            <div class="phone"><?php echo $user["phone"] ?></div>
                        <?php } ?>
                        <div class="delete">
                            <a href="#">delete</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </form>
</body>

</html>