<?php

session_start();
require_once("./database.php");

$users = $mysqli->query("SELECT * FROM users");
$users = $users->fetch_all(MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html>

<head>
    <title>Users List | Php Crud</title>
    <link rel="stylesheet" href="./style.css" />
</head>

<body>
    <form method="POST" action="./addUser.php" class="box">
        <div class="header">
            <a href="#" class="pageTitle">Users List</a>
            <a href="#" class="projectTitle">Php-Crud</a>
        </div>
        <?php if (isset($_SESSION["userCreateSuccess"])) { echo "<div class='successText'>" . $_SESSION["userCreateSuccess"] . "</div>"; } ?>
        <?php if (isset($_SESSION["userDeleteSuccess"])) { echo "<div class='successText'>" . $_SESSION["userDeleteSuccess"] . "</div>"; } ?>

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
                            <a href="./deleteConfirm.php?username=<?php echo $user["username"] ?>">delete</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="menu">
            <a href="./index.php" class="item">New User</a>
            <a href="./users.php" class="item active">Users List</a>
        </div>
    </form>
</body>

</html>

<?php session_destroy(); ?>