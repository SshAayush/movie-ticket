<?php
    include 'dbconn.php';
    if (!session_id()) {
        session_start();
    }
    if (!(($_SESSION['user'])==1)) {
        header('Location: index.php');
    }
    
    $query = "SELECT * FROM showorder";
    $stmt = $pdo->prepare($query); $stmt->execute(); $value =
$stmt->fetchAll(PDO::FETCH_ASSOC); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Booked Tickets</title>
    <style>
      .container {
        width: 100vw;
        display: flex;
        justify-content: center;
        align-items: center;
      }
      table,
      th,
      td {
        border: 1px solid black;
      }
      .table-content {
        border-collapse: collapse;
        margin: 25px 0;
        font-size: 1em;
        min-width: 400px;
      }

      .table-content tr {
        background-color: #009879;
        color: white;
        text-align: left;
        font-weight: bold;
      }
      .table-content th,
      .table-content td {
        padding: 12px 15px;
      }
      .table-content tr th {
        border-bottom: 1px solid white;
      }
      h3 {
        text-align: center;
        font-size: 24px;
        text-decoration: underline 1px solid #009879;
        text-transform: capitalize;
      }
      button {
        width: 3.5rem;
        margin-left: 1rem;
        position: fixed;
        height: 2rem;
        background-color: #009879;
        border: none;
      }
      button a {
        display: block;
        font-size: 24px;
        text-decoration: none;
        font-weight: 600;
        color: #fff;
      }
    </style>
  </head>
  <body>
    <button><a href="adminpage.php"> &larr;</a></button>
    <h3>booked tickets</h3>
    <div class="container">
      <table class="table-content">
        <tr>
          <th>ID</th>
          <th>Date</th>
          <th>Time Slot</th>
          <th>Theater</th>
          <th>Movie Name</th>
          <th>Seat</th>
        </tr>
        <tr>
          <?php
                foreach($value as $item){ 
            ?>
          <td><?php echo $item['showOrderId'] ?></td>
          <td><?php echo $item['date'] ?></td>
          <td><?php echo $item['timeslot'] ?></td>
          <td><?php echo $item['theater'] ?></td>
          <td><?php echo $item['movieName'] ?></td>
          <td><?php echo $item['seat'] ?></td>
        </tr>
        <?php 
            }
            ?>
      </table>
    </div>
  </body>
</html>
