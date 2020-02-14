<?php include "templates/header.php"; ?>
<center>
<h2>Product Information </h2>
<a href="inventory.php">Back to inventory</a>
<br>

<?php
$db_conn = mysqli_connect("localhost", "shopadmin", "velvet_admin", "shop");
if (!$db_conn) {
  echo "Error: Unable to connect to MySQL." . PHP_EOL;
  echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
  echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
  exit;
}
$name = $_GET['name'];
$query = 'SELECT * FROM products WHERE name = '.$name.' LIMIT 1';
$result = mysqli_query($db_conn, $query);
$row = mysqli_fetch_all($result, MYSQLI_ASSOC)[0];
$impath = "\"images/products/" . $row["name"] .".jpg\"";
echo "<h3> " . $row["name"] . "</h3>";
echo "<img src=" . $impath . " alt=\"" . $row["name"] . "\" border=3 </img>";
echo "<br>";
echo "<h4> " . $row["price"] . "</h4>";
echo "<br>";
echo "<p> " . $row['description'] . "</p>";
echo "<br>";
if ($row["instock"] == "1"){
    echo '<font size="5" color="green">In Stock!</font><br>';
    $purchlink = "purchase.php?prid='" . $row["id"] . "'";
    echo '<a id="buynowbutton" href="' . $purchlink . '"><img src="images/buy-now.png" alt="" height=50 width=250></img></a>';
  }else { echo '<font size="5" color="red">Out of Stock!</font><br>';
    echo '<img src="images/buy-now-gr.png" alt="" height=50 width=250</img>';
  }

echo "<br>";
echo '<a href="inventory.php">Back to inventory</a>';


?>
</center>
<?php include "templates/footer.php"; ?>