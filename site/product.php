<?php
//fetch row from table based on "name" url parameter, then show that product on the page
$db_conn = pg_connect("host=localhost dbname=shop user=shopadmin password=velvet_admin");
$name = $_GET['name'];
$query = 'SELECT * FROM products WHERE name = '.$name.' LIMIT 1';
$result = pg_query($db_conn, $query);
$res_arr = pg_fetch_all($result);
var_dump($res_arr)

?>