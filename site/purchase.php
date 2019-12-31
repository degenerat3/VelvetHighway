<?php include "templates/header.php"; ?><h3>Create a new purchase order</h3>

    <form method="post">
    	<label for="firstname">First Name</label>
    	<input type="text" name="firstname" id="firstname">
        <br><br>
    	<label for="lastname">Last Name</label>
    	<input type="text" name="lastname" id="lastname">
        <br><br>
    	<label for="email">Email Address</label>
    	<input type="text" name="email" id="email">
        <br><br>
        <label for="prodid">Product ID</label>
        <?php 
        $prid = $_GET['prid'];
        echo '<input type="text" name="prodid" id="prodid" value=' . $prid . '>';
        ?>
        <br><br>
    	<label for="ccnum">Credit Card Number</label>
    	<input type="text" name="ccnum" id="ccnum">
        <br><br>
        <label for="cvv">CVV/CVC</label>
    	<input type="text" name="cvv" id="cvv">
        <br><br><br>
    	<input type="submit" name="submit" value="Submit">
    </form>

    <a href="index.php">Back to home</a>

    <?php include "templates/footer.php"; ?>