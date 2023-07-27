<?php

$pageTitle = "User Delete";

if (!isset($_GET["username"]) || $_GET["username"] == null) {
    header("Location: users.php");
}

$username = $_GET["username"];

$user = $mysqli->query("SELECT * FROM users WHERE username = '$username'");

if ($user->num_rows == 0) {
    header("Location: users.php");
}

$user = $user->fetch_all(MYSQLI_ASSOC)[0];

?>

<?php include("./pages/components/htmlHeader.php") ?>

<div class="box">
    <?php include("./pages/components/header.php") ?>
    <div class="body">
        <div class="deleteConfirm">
            <div class="title">You are deleting the user "<?php echo $username; ?>", are you sure?</div>
            <div class="description">
                <div class="line">
                    <label>First name:</label>
                    <span><?php echo $user["first_name"] ?></span>
                </div>
                <div class="line">
                    <label>Last name:</label>
                    <span><?php echo $user["last_name"] ?></span>
                </div>
                <div class="line">
                    <label>Username:</label>
                    <span><?php echo $user["username"] ?></span>
                </div>
                <div class="line">
                    <label>Email:</label>
                    <span><?php echo $user["email"] ?></span>
                </div>
                <div class="line">
                    <label>Phone:</label>
                    <span><?php if ($user["phone"]) {
                                echo $user["phone"];
                            } else {
                                echo "-";
                            } ?></span>
                </div>
            </div>
            <div class="action">
                <a href="./" class="cancel">Cancel</a>
                <a href="./workers/userDelete.php?username=<?php echo $username; ?>" class="confirm">Confirm</a>
            </div>
        </div>
    </div>
</div>

<?php include("./pages/components/htmlFooter.php") ?>