<?php
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $row = (int) $_POST['row'];
    $column = (int) $_POST['column'];


    if (($row < 3 || $row > 12) && ( $column < 3 || $column > 12)) {
      echo "<p> The values you inputted for both row and column are not from 3 to 12. Please try again and select any number from 3 to 12.</p>";
      echo "<a href='https://www.cs.torontomu.ca/~jbphilip/lab08/lab08.php'> Back to Form </a>";
      exit;
    } elseif ($row < 3 || $row > 12) {
      echo "<p> The value <span style='font-weight: bold;'>". ($row) ."</span> that you inputted for the <span style='font-weight: bold;'> row </span> is not from 3 to 12. Please try again and select any number from 3 to 12.</p>";
      echo "<a href='https://www.cs.torontomu.ca/~jbphilip/lab08/lab08.php'> Back to Form </a>";
      exit; 
    } elseif ( $column < 3 || $column > 12) {
      echo "<p> The value <span style='font-weight: bold;'>". ($column) ."</span> that you inputted for the <span style='font-weight: bold;'> column </span> is not from 3 to 12. Please try again and select any number from 3 to 12.</p>";
      echo "<a href='https://www.cs.torontomu.ca/~jbphilip/lab08/lab08.php'> Back to Form </a>";
      exit;
    }
    echo "<style>
    table {
      border-collapse: collapse;
      width: 100%;
      padding: 10px;
      color: white;
      border: 3px solid black;
    }
    td {
    padding: 10px;
    text-align: center;
    }
    tr:nth-child(even) td:nth-child(odd), tr:nth-child(odd) td:nth-child(even) {
      background-color: green;
    }
    tr:nth-child(odd) td:nth-child(odd), tr:nth-child(even) td:nth-child(even) {
      background-color: red;
    }
    tr:first-child td, td:first-child{
      border: 3px solid black;
      color: gold;
      font-weight: bold;
    }
  </style>";

    echo "<table>";
      for ($i = 1; $i <= $row; $i++) {
          echo "<tr>";
          for ($j = 1; $j <= $column; $j++) {
              echo "<td>" . ($i * $j) . "</td>";
          }
          echo "</tr>";
      }
    echo "</table>";
  }
?>



