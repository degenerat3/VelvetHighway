<?php include "templates/header.php"; ?>
<h2>Product Information </h2>
<br>

<?php
$db_conn = pg_connect("host=localhost dbname=shop user=shopadmin password=velvet_admin");
$name = $_GET['name'];
$query = 'SELECT * FROM products WHERE name = '.$name.' LIMIT 1';
$result = pg_query($db_conn, $query);
$row = pg_fetch_all($result)[0];
$impath = "\"images/products/" . $row["name"] .".jpg\"";
echo "<h3> " . $row["name"] . "</h3>";
echo "<img src=" . $impath . " alt=\"" . $row["name"] . "\" border=3 height=100 width=100></img>";
echo "<br>";
echo "<h4> " . $row["price"] . "</h4>";
echo "<br>";
echo "<p> " . $row['description'] . "</p>";
echo "<br>";
if ($row["instock"] == "t"){
    echo '<font size="5" color="green">In Stock!</font><br>';
    echo '<img src="images/buy-now.png" alt="" border=3</img>';
  }else { echo '<font size="5" color="red">Out of Stock!</font><br>';
    echo '<img src="images/buy-now-gr.png" alt="" border=3</img>';
  }

?>

<?php include "templates/footer.php"; ?>