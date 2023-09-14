<?php
include "config.php";


?>
<?php
include 'navbar.php';
  ?>
<?php
// Veri tabanı bağlantısı oluşturun (uyarlayın)
$servername = "localhost"; // Sunucu adı
$username = "kullanici_adi"; // Kullanıcı adı
$password = "parola"; // Parola
$dbname = "veri_tabani_adi"; // Veri tabanı adı

// Veri tabanı bağlantısını kurun
$conn = new mysqli($servername, $username, $password, $dbname);

// Bağlantıyı kontrol edin
if ($conn->connect_error) {
    die("Bağlantı hatası: " . $conn->connect_error);
}

// Verileri sorgu ile alın
$sql = "SELECT * FROM tablo_adi"; // "tablo_adi" veritabanınıza göre değiştirilmelidir
$result = $conn->query($sql);

// Verileri tabloya ekleyin
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<th scope='row'>" . $row["id"] . "</th>";
        echo "<td>" . $row["first_name"] . "</td>";
        echo "<td>" . $row["last_name"] . "</td>";
        echo "<td>" . $row["handle"] . "</td>";
        echo "</tr>";
    }
} else {
    echo "Veri bulunamadı.";
}

// Veri tabanı bağlantısını kapatın
$conn->close();
?>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
  integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
  integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>


