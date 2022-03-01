<?php require_once("connect.php");?> 
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<title>รายการสินค้า</title>
</head>
<body>


<div class="container">
	<?php
	if(isset($_POST['task'])) // มีการส่งคำสั่ง INSERT, UPDATE, DELETE ผ่านตัวแปร task มาหรือไม่
	{
		if(trim($_POST['task'])=="INSERT")
		{
	?>
		<h1 class='text-center my-5'>เพิ่มรายการสินค้า</h1>	
		<form name="form2" method="post">
		<input type="hidden" name="task" value="<?=$_POST['task']?>">
		<input type="hidden" name="subtask" value="">
		<div class="row">
			<div class="col-3">รูปภาพ</div>
			<div class="col-9">
				<div class="row">
					<label class="col-2 my-1">ชื่อสินค้า:</label>
					<div class="col-10 my-1">
						<input class="form-control" type="text" name="pname">
					</div>
					
					<label class="col-2 my-1">ราคาสินค้า:</label>
					<div class="col-10 my-1">
						<input class="form-control" type="text" name="pprice">
					</div>
					
					<label class="col-2 my-1">จำนวนคงเหลือ:</label>
					<div class="col-10 my-1">
						<input class="form-control" type="text" name="pqty">
					</div>
					
					<label class="col-2 my-1">ประเภทสินค้า:</label>
					<div class="col-10 my-1">
						<input class="form-control" type="text" name="pcategory">
					</div>
					
					<div class="col-2"></div>
					<div class="col-10">
						<button type="submit" class="btn btn-success">บันทึก</button>
						<button type="reset" class="btn btn-warning">ยกเลิก</button>
						<button type="button"  class="btn btn-primary ">ย้อนกลับ </button>
					</div>
				</div>
			</div>
		</div>
		</form>
<?php	
	}
}
else
{
?>
<h1 class='text-center my-5'>แสดงรายการสินค้า</h1>
<form name="form1" method="post">
<input type="hidden" name="task">

<?php
$sql = "SELECT * FROM products";
$result = $conn->query($sql);
if ($result->num_rows > 0)
{
  // output data of each row
  echo "<div class=row>";
  while($row = $result->fetch_assoc()) {
?>
    <div class='col-2 my-3'><img class="img-fluid" src="pics/<?=$row["pid"]?>.png"></div>
	<div class='col-8 my-3'>
	รหัสสินค้า: <?=$row["pid"]?>
	<br><h3 style='color:blue;'><?=$row["pname"]?></h3>
	<h4 style='color:red;'>฿<?=$row["pprice"]?></h4>
	จำนวนคงเหลือ: <?=$row["pqty"]?>
	</div>
	<div class='col-2 my-3'>
		<button type='button'class='btn btn-success'>แก้ไข</button>
		<button type='button'class='btn btn-danger'>ลบ</button>
	</div>
<?php	
  }
?>
	<div class='col-12 my-5 text-center'>
		<button id="btnAdd" type='button'class='btn btn-primary'>เพิ่มข้อมูล</button>
		<button type='button'class='btn btn-info'>พิมพ์หน้านี้</button>
		<button type='button'class='btn btn-warning'>ส่งออกไฟล์</button>
	</div>
<?php
  echo "</div>";
}
else
{
  echo "0 results ไม่มีข้อมูล";
}
$conn->close();
?>
</form>
<?php
}
?>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script>
$(document).ready(function(){
	$('#btnAdd').click(function(){
		document.form1.task.value='INSERT';
		document.form1.submit();
	});
});
</script>
</body>
</html>