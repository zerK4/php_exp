<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP Website</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./style/style.css">
</head>
<body>
    <?php require_once 'process.php'; ?>

    <?php
        $mysqli = new mysqli('localhost', 'root', '', 'crud') or die($mysqli);
        $result = $mysqli->query("SELECT * FROM new_data") or die($mysqli->error);
        //pre_r($result);
    ?>
<div class="container-main">
    <div class="row justify-content-center">
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Device</th>
                    <th>Location</th>
                    <th>Street Number</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
            <?php 
                while($row = $result->fetch_assoc()):?>
            <tr>
                <td><?php echo $row['name'];?></td>
                <td><?php echo $row['device'];?></td>
                <td><?php echo $row['location'];?></td>
                <td><?php echo $row['street_number'];?></td>
                <td>
                    <a href="process.php?delete=<?php echo $row['id'];?>" class="btn btn-danger">Delete</a>
                       
                </td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>

    <div class="row justify-content-center">
        <form action="process.php" method="POST">
            <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="">
            </div>
            <div class="form-group">
            <label>Device</label>
            <input type="text" name="device" class="form-control" value="">
            </div>
            <div class="form-group">
            <label>Location</label>
            <input type="text" name="location" class="form-control" value="">
            </div>
            <div class="form-group">
            <label>Street Number</label>
            <input type="text" name="street_number" class="form-control" value="">
            </div>
            <div class="form-group">
            <button class="btn btn-primary" type="submit" name="save">Save</button>
            </div>
    </form>
    </div>
    </div>
</body>
</html>