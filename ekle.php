<?php
include "config.php";

if($_POST){
		$ad= $_POST['ad'];
		$soyad=$_POST['soyad'];
		$email=$_POST['email'];
		$yas=$_POST['yas'];
        $event_id=$_POST['event_id'];
        $user_id=$_SESSION['user_id'];
		$ekle="INSERT INTO katilim (ad,soyad,email,yas,event_id,user_id) VALUES ('$ad','$soyad','$email','$yas','$event_id','$user_id')";
		
		if($conn->query($ekle)){
		    print true;
        }else{
            print false;
        }
}
?>