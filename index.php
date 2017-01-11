<?php include "includes/header.php";?>
<?php include "includes/db-connection.php";?>
<?php include "includes/functions.php";?>
<div class="main-content">
    
    <div class="container flex-center">
        
        <?php
            createUser();
        ?>

        <form action="index.php" method="post">
            <h2>Sign Up</h2>
            <div class="form-group">
                <label for="first-name">First Name:</label>
                <input type="text" name="first-name" value="<?php echo isset($_POST['first-name']) ? $_POST['first-name'] : '' ?>">
            </div>
            <div class="form-group">
                <label for="last-name">Last Name:</label>
                <input type="text" name="last-name">
            </div>
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" name="username">
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password">
            </div>
            <div class="form-group">
                <label for="confirm-password">Password:</label>
                <input type="password" name="confirm-password">
            </div>
            <div class="form-group">
                <input class="submit-btn" type="submit" name="submit" value="Submit details">
            </div>
            
        </form>
    </div>
</div>


<?php include "includes/footer.php";?>