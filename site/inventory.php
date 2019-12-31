<?php include "templates/header.php"; ?>
    <h3>inventory</h3>
    <table>
      <thead>
<tr>
  <th>#</th>
  <th>Thumbnail</th>
  <th>Item Name</th>
  <th>Price</th>
  <th>Status</th>
  <th>Link</th>
</tr>
      </thead>
      <tbody>


<?php
$db_conn = pg_connect("host=localhost dbname=shop user=shopadmin password=velvet_admin");
$result = pg_query($db_conn, "SELECT * FROM products");
$res_arr = pg_fetch_all($result);
?>

<?php foreach ($res_arr as $row) { ?>
      <tr>
<td><?php echo escape($row["id"]); ?></td>
<td><?php echo escape($row["name"]); ?></td>
<td><?php echo escape($row["price"]); ?></td>
<td><?php echo escape($row["instock"]); ?></td>
      </tr>
    <?php } ?>
      </tbody>
  </table>
<?php include "templates/footer.php"; ?>