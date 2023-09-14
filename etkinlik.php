
<?php

include 'config.php';
 function getKartVerileri(){
  global $conn;
  $conn = $GLOBALS["conn"];
  $sql = "SELECT e.event_id, e.event_name, e.event_date, e.event_time,e.location FROM events e";
  $result = $conn->query($sql);

  $veriler = array();

  if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
          $veriler[] = $row;
      }
  }
  $conn->close();

  return $veriler;
}

include 'navbar.php';
  ?>
  
  <div class="container">
  <div class="row p-5">
    
  <?php

$renkler = array("bg-primary", "bg-secondary", "bg-success", "bg-danger", "bg-warning", "bg-info", "bg-light", "bg-dark");

$events = getKartVerileri();

for ($i = 0; $i < count($events); $i++) {
    $event = $events[$i];
    $kartBaslik = $event['event_name'];
    $kartIcerik = $event['event_date'] . ' ' . $event['event_time'] . ', ' . $event['location'];
    $kartLink = 'table.php?tur=' . $event['event_id'];

    $rastgeleRenk = $renkler[$i];

    echo '<div class="col-md-3">
        <div class="card text-white ' . $rastgeleRenk . ' mb-3" style="max-width: 18rem;height: 350px;">
            <div class="card-header">' . $kartBaslik . '</div>
            <div class="card-body">
                <h5 class="card-title">' . $kartIcerik . '</h5>
                <p class="card-text"></p>';
    
    
    if (isset($_SESSION['user_id']) && !is_null($_SESSION['user_id'])) {
        echo '<a href="' . $kartLink . '" class="btn btn-outline-light">Detay</a>';
    }

    echo '</div>
        </div>
    </div>';
}


?>



  
      </div>
    </div>


    
  </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
  integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
  integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>


