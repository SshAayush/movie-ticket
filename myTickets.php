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
            
            .container{
                max-width: 100vw;
                display: flex;
                align-items: center;
                justify-content: center;
            }
        .table-content{
            border-collapse: collapse;
            margin: 25px 0;
            font-size: 1em;
            min-width: 400px;

        }

        .table-content tr{
            background-color: #009879;
            color: white;
            text-align: left;
            font-weight: bold;
        }
        .table-content th,
        .table-content td{
            padding: 12px 15px;

        }
        .table-content tr th{
            border-bottom: 1px solid white;
        }
         h3{
            text-align: center;
            font-size: 24px;
            text-decoration: underline 1px solid #009879;
            text-transform: capitalize;
        }
    </style>
</head>
<body>
    <h3>my tickets</h3>
    <div class="container">
        <table class="table-content">
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
    </div>
    </body>
    </html>