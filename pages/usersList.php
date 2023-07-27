<?php

$pageTitle = "Users List";

$users = $mysqli->query("SELECT * FROM users");
$users = $users->fetch_all(MYSQLI_ASSOC);

?>

<?php include("./pages/components/htmlHeader.php") ?>

<div class="box">
    <?php include("./pages/components/header.php") ?>

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
                        <a href="./?p=user-delete&username=<?php echo $user["username"] ?>">delete</a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
    <?php include("./pages/components/menu.php") ?>
</div>

<?php include("./pages/components/htmlFooter.php") ?>

<?php

session_destroy();

?>