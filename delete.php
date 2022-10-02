
<?php
 include 'Connection.php';
if (isset($_POST['ID'])){

$delete_query="DELETE FROM datatable WHERE ID={$_POST['ID']}";



mysqli_query($connection,$delete_query);
}
?>

