<?php include "templates/header.php"; ?>
    <h3>inventory</h3>


<?php
$db_conn = pg_connect("host=localhost dbname=shop user=shopadmin password=velvet_admin") or die("Cannot connect to DB.");
$query = "SELECT * FROM products";
$rs = pg_query($db_conn, $query) or die("Cannot execute query: $query\n");
$result = pg_fetch_all($rs);

echo "<table>\n<thead>\n<tr>\n<th>#</th>\n<th>Name</th>\n<th>Price</th>\n<th>Instock?</th>\n</tr>\n</thead>\n<tbody>\n";
foreach ($result as $row){
  echo "<tr>";
  echo "<td>" . $row["id"] . "</td>";
  echo "<td>" . $row["name"] . "</td>";
  echo "<td>" . $row["price"] . "</td>";
  echo "<td>" . $row["instock"] . "</td>";
  echo "</tr>";
}
echo "</tbody> </table>";
?>


<?php include "templates/footer.php"; ?>