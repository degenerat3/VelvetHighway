<?php include "templates/header.php"; ?><h2>Add a user</h2>

    <form method="post">
    	<label for="firstname">First Name</label>
    	<input type="text" name="firstname" id="firstname">
    	<label for="lastname">Last Name</label>
    	<input type="text" name="lastname" id="lastname">
    	<label for="email">Email Address</label>
    	<input type="text" name="email" id="email">
        <label for="prodid">Product ID</label>
    	<input type="text" name="prodid" id="prodid">
    	<label for="ccnum">Credit Card Number</label>
    	<input type="text" name="ccnum" id="ccnum">
        <label for="cvv">CVV/CVC</label>
    	<input type="text" name="cvv" id="cvv">
    	<input type="submit" name="submit" value="Submit">
    </form>

    <a href="index.php">Back to home</a>

    <?php include "templates/footer.php"; ?>