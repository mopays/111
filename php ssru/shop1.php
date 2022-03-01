<?php require("connect.php"); 
$sql = "SELECT * FROM products";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title>shop</title>
</head>
<body>

  <div class="container">
       <div class="col-12">
    <table class="table table-striped table-boedered table-hover mt-4">
        <thead>
            <tr>
              <div class="col-2">
              <th>รูปภาพ</th>
              </div>
              <div class="col-8">
                <th>idสินค้า</th>
                <th>ชื่อสินค้า</th>
                <th>ราคา</th>
                <th>จำนวน</th>
              </div>
            </tr>
        </thead>
        <tbody>
            <?php

          while($row = $result->fetch_assoc()) {
            ?>
            <tr>
             <div class="col-2">
              <td><img src="" alt=""></td>
              </div>
              <div class="col-8">
              <td><?php echo $row['pid'];?></td>
                <td><?php echo $row['pname'];?></td>
                <td><?php echo $row['pprice'];?></td>
                <td><?php echo $row['pqty'];?></td>
                
              </div>
              
            </tr>

            <?php }?>
        </tbody>
    </table>
    </div>
  </div>
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>

