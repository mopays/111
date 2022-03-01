<?php
require("connect.php");
$sql = "SELECT * FROM products";
$result = $conn->query($sql);
?>
<html>
<head>
    <meta charset="utf-8">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>รายการสินค้า</title>
</head>
<body>
<?php
if(isset($_POST["task"]))
{
    if($_POST["task"]=="DELETE")
    {
        // สั่งลบข้อมูลใน Database
        $id=$_POST["id"];
        $sql = "DELETE FROM products WHERE pid='$id';";
    }
}
?>
<h1 class="text-center my-5">เเสดงรายการสินค้า</h1>
<form name="form1" method="post" action="">
<input type="hidden" name="task" value="">
<input type="hidden" name="id" value="">
<?php
//include("connectdb.php");


if ($result->num_rows > 0)
{
  // output data of each row
  echo "<div class=row>";
  while($row = $result->fetch_assoc()) {
?>

    <div class='col-2'><img src="pics/<?=$row ["pid"]?>.png" class="img-fluid"></div>
    <div class='col-8'>
    <h4>รหัสสินค้า: <?=$row ["pid"]?></h4>
    <h4 style='color:blue;'><?=$row ["pname"]?></h4>
    <h7 style='color:red;'><?=$row ["pprice"]?></h7>
    จำนวน:<?=$row ["pqty"]?>
    </div>
    <div class='col-2'>
        <button type="button" class="btn btn-primary">แก้ไข </button>
        <button type="button" class="btn btn-danger" onclick="deletedata('<?=$row ["pid"]?>');">ลบ </button>
    </div>
    
<?php
  }
?>
 
    <div class='col-12 my-5 text-center'>
        <button type="button" class="btn btn-success">เพิ่มข้อมูล </button>
        <button type="button" class="btn btn-info">พิมพ์หน้านี้ </button>
        <button type="button" class="btn btn-warning">ส่งออกไฟล์ </button>
    </div>


<?php
  echo "</div>";
}  else 
{
  echo "0 results ไม่มีข้อมูล";
}
$conn->close();

?>
</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script>
function deletedata(id)
{
    if(confirm('คุณต้องการลบข้อมูล รหัสสินค้า: ' + id + 'ใช่หรือไม่?'))
    {
        
        //ส่งรหัสสินค้าไปลบที่ฐานข้อมูล
        document.form1.task.value='DELETE';
        document.form1.id.value=id;
        document.form1.submit();
    }
}

</script>
</body>
</html>