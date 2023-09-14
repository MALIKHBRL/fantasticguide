<?php
include"config.php";

session_start();

$id=$_POST['silme'];

if(isset($_POST['sil']))
					
{
	$sql_silme='DELETE FROM katilim WHERE `katilim`.`id`='.$id.'';
	$conn->query($sql_silme);
	header("Location: table.php?tur=1");

	

}

?>