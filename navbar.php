
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


<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #2e2f30;">
        <div class="container-fluid">
          <a href='index.php'>
            <img src="img/eventino.png" class=" " style="max-width:100px;height:50px;" />
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
         </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href='index.php'>Anasayfa</a>
          </li>
              <li class="nav-item">
                <a class="nav-link" href="etkinlik-ekle.php">Etkinlik Oluştur</a>
          </li>
              <li class="nav-item ">
                <a class="nav-link " href="#" >iletişim</a>

              </li>
              <li class="nav-item ">
                <a class="nav-link " href="etkinlik.php" >Etkinlikler</a>

              </li>
              
            </ul>
                  <ul class="navbar-nav">
                    <li class="nav-item">
                      <div class="input-group">
                        <input type="text" placeholder="Arama" class="form-control">
                        
     
            <div class="btn-group" role="group" aria-label="Basic outlined example"  >
                    <button type="button" class="btn btn-outline-dark ms-1">Arama</button>

                    <?php 
				
				if(empty($_SESSION["user_id"])){
					echo '	<li class="nav-item">
					<div class="btn-group ms-1">
          <a href="giris-yap.php"><button type="button" class="btn btn-outline-dark ms-1">Giriş Yap</button></a>
          <a href="KayitOl.php"><button type="button" class="btn btn-outline-dark ms-1">Kayıt Ol</button></a>
					</div>
				</li>';
				}
				else{

					
					echo'	<li class="nav-item">
					<div class="btn-group ms-1">
						<a href="cikis.php"class="btn  btn-danger ms-1">Çıkış Yap</a>
					</div>
				</li>';
				}
				?>
               </div>
            </form>
          </div> 
        </div>
      </nav>

    
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Recipient:</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Message:</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Send message</button>
      </div>
    </div>
  </div>
</div>

</body>
</html>



				
			
                 
                    