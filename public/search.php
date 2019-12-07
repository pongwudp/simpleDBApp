<?php include("./template/header.php"); ?>
	
	<fieldset class="w3-container w3-card-4 w3-light-grey w3-round w3-text-teal" style="width:100%;max-width:450px;margin:auto">
		<legend class="w3-xlarge">Search</legend>
		<form method="get">
		<div class="w3-container">
			<input type="radio" name="search" value="name" checked /> Name
			<input type="radio" name="search" value="email" /> Email
			<input type="radio" name="search" value="address" /> City
		</div>
			
		<div class="w3-cell" style="display:none">
			<select name="match" class="w3-input w3-teal w3-round">
				<option value="part" selected="selected">ส่วนของคำ</option>
				<option value="whole">ตรงกันทั้งคำ</option>
				<option value="start">ขึ้นต้นด้วย</option>
				<option value="end">ลงท้ายด้วย</option>
			</select>
		</div>
		
		<div class="w3-cell-row">
			<div class="w3-cell">
				<input type="text" name="keyword" class="w3-input w3-border w3-round" required />
			</div>
			<div class="w3-cell w3-right-align">
				<button class="w3-button w3-blue w3-round"><i class="fa fa-search"></i></button>
			</div>
		</div>
		<br class="clear" />
		</form>
	</fieldset>

<?php
require("../config.php");
$i=1;
if(isset($_GET['keyword'])) {		//ถ้าเป็นการ Postback
	$search = $_GET['search'];
	$kw = $_GET['keyword'];
	$match = $_GET['match'];
	//$field = implode(", ", $_GET['field']);
	
	if($match == "part") {
		$kw = "%".$kw."%";
	}
	else if($match == "start") {
		$kw = "$kw%";
	}
	else if($match == "end") {
		$kw = "%$kw";
	}

	$sql = "SELECT * FROM  $table WHERE ($search  LIKE  '$kw')";
	$rs = $conn->prepare($sql);
	$rs->execute();
	$results = $rs->fetchAll();
	
		if($rs->rowCount() ==0){
			echo "<h2>ไม่พบข้อมูลสมาชิก</h2>";
		}
		else {
			echo "<table><caption>ข้อมูลสมาชิก</caption>";
			//อ่านข้อมูลที่ละแถวจาก result set ในแบบอาร์เรย์
			//while($result = mysqli_fetch_array($rs)){
				foreach($results as $result) {
					echo "<tr>";
					echo "<td>".$i++."<td>{$result['name']}</td>
						<td>{$result['email']}</td>
						<td>{$result['address']}</td>";
					echo "</tr>";
				}
			echo "</table>";
			echo "<div class='w3-center'><a href=\"javascript: history.back();\" class='w3-btn w3-blue w3-round'>reset</a></div>";
		}
}
?>
</body>
</html>