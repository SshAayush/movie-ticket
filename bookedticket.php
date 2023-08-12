<?php
    include 'dbconn.php';
    if (!session_id()) {
        session_start();
    }
    if (!(($_SESSION['user'])==1)) {
        header('Location: index.php');
    }
    
    $query = "SELECT * FROM showorder";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $value = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booked Tickets</title>
    <style>
        table, th, td {
            border: 1px solid black;
        }       
    </style>
</head>
<body>
    <table>
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
    <button><a href="adminpage.php">Back</a></button>
    
</body>
</html>