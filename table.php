<?php
include "config.php";
include 'navbar.php';
?>

<!DOCTYPE html>
<html>
<head>
    <style>
        .center-table {
            margin: 0 auto; 
            width: 50%; 
        }
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-KyZXEAg3QhqLMpG8r+VGxqb1Ikp5FSC0n4fmbn5zsqn5zsqn5zsqn5zsqn5zsqn5zsqn" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</head>
<body>
<div class="text-center mt-2">
    <button class='ekle-button btn btn-danger' data-id='<?php print $id;?>'>Ekle</button></td>
</div>
<?php
if ($conn->connect_error) {
    die("Bağlantı hatası: " . $conn->connect_error);
}

$id = $_GET["tur"];
$sql = "SELECT * FROM katilim t where t.event_id = {$id}";
$result = $conn->query($sql);
$i= 0;
// ... Diğer kodlarınız ...

if ($result->num_rows > 0) {
    echo "<table class='table table-bordered mt-5 center-table'>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<th scope='row'>" . $i . "</th>";
        echo "<td>" . $row["ad"] . "</td>";
        echo "<td>" . $row["soyad"] . "</td>";
        echo "<td>" . $row["yas"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "
        <form action='sil.php' method='post'>
        <td><button name='sil' value='SİL' class='btn btn-danger'>Sil</button></td>
        <input type='hidden' name='silme' value='".$row["id"]."'>
        </form>";
        echo "</tr>";
        
    $i++;
    }
    echo "</table>";
} else {
    echo "<div class='text-center p-10'>
            Veri Bulunamadı, lütfen yeni bir veri ekleyiniz.
        </div>
    ";
} 


// ... Diğer kodlarınız ...

$conn->close();
?>

<input type="hidden" name="id" id="id" value="<?php print $id; ?>"/>

<!-- Modal -->
<div class="modal fade" id="ekleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Yeni Veri Ekle</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Ekleme formu alanları -->
                <label for="ad">Ad:</label>
                <input type="text" class="form-control border border-info" id="ad" name="ad"><br><br>

                <label for="soyad">Soyad:</label>
                <input type="text"  class="form-control border border-info" id="soyad" name="soyad"><br><br>

                <label for="yaş">Yaş:</label>
                <input type="text"  class="form-control border border-info" id="yas" name="yas"><br><br>

                <label for="email">Email:</label>
                <input type="text"  class="form-control border border-info" id="email" name="email"><br><br>

                <input type="hidden" name="event_id" value="<?php print $_GET['tur']?>" id="event_id">
            </div>
            <div class="modal-footer">
              <a href="table.php"></a><button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
              <a href="table.php"></a>  <button type="button" class="btn btn-primary" id="ekleVeri">Kaydet</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $(".ekle-button").click(function () {
            var id = $(this).data("id"); // Kartın id'sini al
            $("#ekleModal").modal("show"); // Modal'ı aç
            $("#ekleVeri").click(function () {
                // Ekleme işlemini burada yapabilir ve id'yi Ajax ile sunucuya gönderebilirsiniz
                $.ajax({
                    type: "POST",
                    url: "ekle.php", // Veriyi işleyecek PHP dosyasının yolunu belirtin
                    data: {
                        id: id,
                        ad: $("#ad").val(),
                        soyad: $("#soyad").val(),
                        yas: $("#yas").val(),
                        email: $("#email").val(),
                        event_id: $("#event_id").val()
                    },
                    success: function (response) {
                       if(response){
                        window.location.reload();
                       }
                       else{
                        alert("veri eklerken bir sorun oluştu " +response)
                       }
                    }
                });
            });
        });
    });
</script>


</body>
</html>


