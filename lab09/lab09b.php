<?php include("./dbconnect.php")?>
<?php

$sql = "SELECT * FROM photos ORDER BY date_taken DESC";
$result = mysqli_query($connect, $sql);

echo '<style>
    .container {
      font-family: helvetica;
      display: flex;
      flex-direction: column;
      justify-content: center;
    }

    table {
      border: solid 1px white;
      border-radius: 25px;
    }

    th,
    td {
      padding: 10px;
    }

    .heading {
      background-color: rgb(239, 134, 134);
    }

    .pic-num,
    .location,
    .url {
      background-color: lightgray;
    }

    .subject,
    .date {
      background-color: white;
    }
  </style>';
  if (mysqli_num_rows($result) > 0) {
    echo '<div class="container">
        <table>
          <tr class="heading">
            <th>Picture Number</th>
            <th>Subject</th>
            <th>Location</th>
            <th>Date Taken</th>
            <th>Picture URL</th>
          </tr>';
  while($row = mysqli_fetch_assoc($result)) {
    echo '<tr>
            <td class="pic-num">'. $row['picture_number'] .'</td>
            <td class="subject">'.$row['subject'].'</td>
            <td class="location">'.$row['location'].'</td>
            <td class="date">'.$row['date_taken'].'</td>
            <td class="url">'.$row['picture_url'].'</td>
          </tr>';
  }
        echo '</table>
      </div>';
} else {
    echo "<p>No photos found in the database.</p>";
}
mysqli_close($connect);
?>