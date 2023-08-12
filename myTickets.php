<?php
    include('dbconn.php');
    session_start();

    $user_id = $_SESSION['user'];

    $query = "SELECT * FROM showorder WHERE userId = :user_id";
    $stmt = $pdo->prepare($query);
    $stmt -> bindParam(':user_id', $user_id);
    $stmt -> execute();
    $value = $stmt->fetchAll(PDO::FETCH_ASSOC);

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Tickets</title>
    <style>
        table, th, td {
            border: 1px solid black;
        }       
    </style>
</head>
<body>
    <table>
        <tr>
            <th>Date</th>
            <th>Time Slot</th>
            <th>Theater</th>
            <th>Movie Name</th>
            <th>Seat</th>
        </tr>
        <?php foreach($value as $item){ ?>
        <tr>
            <th><?php echo $item['date']; ?></th>
            <th><?php echo $item['timeslot']; ?></th>
            <th><?php echo $item['theater']; ?></th>
            <th><?php echo $item['movieName']; ?></th>
            <th><?php echo $item['seat']; ?></th>
            </tr>
        <?php } ?>
    </table>
</body>
</html>