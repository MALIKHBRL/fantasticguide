<?php
include "config.php";


if(isset($_POST['girisyap']))
{
	$email=$_POST['E-mail'];
	$parola=$_POST['sifre'];
	$sorgu = $conn->query("select * from users where email='$email' and password='$parola'");

	if($sorgu->num_rows>0){
		$cikti = $sorgu->fetch_array();

		$_SESSION['user_id']=$cikti[0];
		$_SESSION['email']=$cikti[2];
		$_SESSION['username']=$cikti[1];
		
		
		echo'
		<div class="conteiner w-50 mx-auto p-3">
			<div class="alert alert-danger" role="alert">
					Giriş Başarılı Yönlendiriliyorsunuz.
			</div>
		</div>';
	
		header('Refresh: 1; url=http://localhost/prj/index.php');
		
	}
	else{
		echo'
		<div class="conteiner w-50 mx-auto p-3">
			<div class="alert alert-danger" role="alert">
					Yönlendiriliyorsunuz Mail Adresiniz veya şifreniz yanlış tekrar deneyiniz!
			</div>
		</div>';
		header('Refresh: 1; url=http://localhost/prj/giris-yap.php');
		
	}
}
?>