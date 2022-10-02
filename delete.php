<?php
if (isset($_POST['Delete'])){

$delete_query="DELETE FROM datatable WHERE ID={$_POST['ID']}";



mysqli_query($connection,$delete_query);
}
?>

