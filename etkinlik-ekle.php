<?php
include "config.php";

if(isset($_POST['olustur'])){

		$event_name= $_POST['etkinlik'];
		$event_date=$_POST['tarih'];
		$event_time=$_POST['saat'];
		$location=$_POST['konum'];
    $event_aciklama=$_POST['aciklama'];
		$ekle="INSERT INTO events (event_name,event_date,event_time,location,event_aciklama) VALUES ('$event_name','$event_date','$event_time','$location','$event_aciklama')";

		$conn->query($ekle);	
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> 
    <title>Giriş Yap</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
    <?php 
	include 'navbar.php';
	?>
      <section> 
        <div class="container w-25 mx-auto">
            <form class="form" action="etkinlik-ekle.php" method="post">
              <input type="hidden" name="olustur"/>
            <div class="w-100 mb-3 bg-input text-dark rounded-2 text-center">
                    <span>Hoşgeldiniz</span>
                </div>
                <div class="w-100 mb-3">
                  <label class="form-label">Etkinlik</label>
                  <input name="etkinlik" type="text" class="form-control border border-info" placeholder=" Etkinliğin Adını Giriniz" required>
                </div>

                <div class="w-100  mb-3" >
                  <label class="form-label">Tarih</label>
                  <input name="tarih" type="date" class="form-control border border-info" placeholder=" Tarih Giriniz" required>                
                </div>

                <div class="w-100 mb-3">
                  <label class="form-label">Etkinlik Saat'i</label>
                  <input name="saat" type="text" class="form-control border border-info" placeholder=" Etkinlik Saatini Giriniz" required>
                </div>
                <div class="w-100 mb-3">
                  <label class="form-label">Konum</label>
                  <input name="konum" type="text" class="form-control border border-info" placeholder="Etkinlik Konumunu Giriniz" required>
                </div>
                <div class="w-100 mb-3">
                  <label class="form-label">Açıklama</label>
                  <input name="aciklama" type="text" class="form-control border border-info" placeholder="Etkinlik Açıklamasını Giriniz" required>
                </div>
                <button type="submit"  class="btn btn-outline-primary" >Kaydet</button>
				</div>
            </form> 

        </div>
      </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>