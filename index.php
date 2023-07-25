<?php session_start(); ?>

<!DOCTYPE html>
<html>

<head>
    <title>Php Crud</title>
    <link rel="stylesheet" href="./style.css" />
</head>

<body>
    <form method="POST" action="./addUser.php" class="box">
        <div class="header">
            <a href="#" class="pageTitle">User Create</a>
            <a href="#" class="projectTitle">Php-Crud</a>
        </div>
        <div class="body">
            <div class="line">
                <input type="text" class="w50" placeholder="First name" name="first_name" <?php if (isset($_SESSION["userCreateInputs"]["firstName"])) { echo "value='".$_SESSION["userCreateInputs"]["firstName"]."'"; } ?> required>
                <input type="text" class="w50" placeholder="Last name" name="last_name" <?php if (isset($_SESSION["userCreateInputs"]["lastName"])) { echo "value='".$_SESSION["userCreateInputs"]["lastName"]."'"; } ?> required>
            </div>
            <div class="line">
                <input type="text" placeholder="Username" name="username" <?php if (isset($_SESSION["userCreateInputs"]["username"])) { echo "value='".$_SESSION["userCreateInputs"]["username"]."'"; } ?> <?php if (isset($_SESSION["userCreateErrors"]["username"])) { ?> style="border-color: red;" <?php } ?> required>
            </div>
            <?php if (isset($_SESSION["userCreateErrors"]["username"])) { echo "<div class='errorText'>" . $_SESSION["userCreateErrors"]["username"] . "</div>"; } ?>
            <div class="line">
                <input type="text" placeholder="Email address" name="email" <?php if (isset($_SESSION["userCreateInputs"]["email"])) { echo "value='".$_SESSION["userCreateInputs"]["email"]."'"; } ?> <?php if (isset($_SESSION["userCreateErrors"]["email"])) { ?> style="border-color: red;" <?php } ?> required>
            </div>
            <?php if (isset($_SESSION["userCreateErrors"]["email"])) { echo "<div class='errorText'>" . $_SESSION["userCreateErrors"]["email"] . "</div>"; } ?>
            <div class="line">
                <input type="text" placeholder="Phone number" name="phone" <?php if (isset($_SESSION["userCreateInputs"]["phone"])) { echo "value='".$_SESSION["userCreateInputs"]["phone"]."'"; } ?> <?php if (isset($_SESSION["userCreateErrors"]["phone"])) { ?> style="border-color: red;" <?php } ?>>
            </div>
            <?php if (isset($_SESSION["userCreateErrors"]["phone"])) { echo "<div class='errorText'>" . $_SESSION["userCreateErrors"]["phone"] . "</div>"; } ?>

            <?php if (isset($_SESSION["userCreateSuccess"])) { echo "<div class='successText'>" . $_SESSION["userCreateSuccess"] . "</div>"; } ?>
        </div>
        <div class="footer">
            <button type="submit" name="addUser" value="true">Create</button>
        </div>
    </form>
</body>

</html>

<?php session_destroy(); ?>