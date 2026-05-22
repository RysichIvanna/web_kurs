<div class="not-main-page container">
    <a href="/admin/car" class="button-form">Машини</a>
    <a href="/admin/drivers" class="button-form">Драйвери</a>
    <a href="/admin/logout" class="">Logout</a>
    
    
    <div class="container" style="margin-top: 50px;">
        <h1>Trip Statistics</h1>
        <p class='stat-galaxy'><strong>Total Number of Trips:</strong> <?=$totalTrips?></p>
        <p class='stat-galaxy'><strong>Total Income:</strong> $<?=$totalIncome?></p>
        <p class='stat-galaxy'><strong>Total Distance:</strong> <?=$totalDistance ?> km</p>
        <p class='stat-galaxy'><strong>Average Trip Distance:</strong> <?=round($averageDistance, 2)?> km</p>
        <p class='stat-galaxy'><strong>Valid Phone Numbers:</strong> <?=$validPhoneCount?></p>
        <p class='stat-galaxy'><strong>Invalid Phone Numbers:</strong> <?=$invalidPhoneCount?></p>
    </div>

    <?
    echo "<h1>All Trip Details</h1>";
    echo '<table style="margin-bottom: 20px">';
    echo "<tr><th>ID</th><th>Date</th><th>Distance (km)</th><th>Car ID</th><th>Phone Number</th><th>Price ($)</th></tr>";

    foreach ($trips as $trip) {
        echo "<tr>
                    <td>{$trip['id']}</td>
                    <td>{$trip['date']}</td>
                    <td>{$trip['trip_range']}</td>
                    <td>{$trip['car_id']}</td>
                    <td>{$trip['customer_phone_number']}</td>
                    <td>{$trip['price']}</td>
                  </tr>";
    }

    echo "</table>";
    ?>
</div>