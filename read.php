<?php
require 'config.php';
$sql = "SELECT id, name, email, address FROM $table";
$query = $conn->prepare($sql);
$query->execute();
$employee = $query->fetchAll(PDO::FETCH_OBJ);

$conn = null;
?>

<?php require 'public/template/header.php';?>

<div class="w3-container">
	<h2>Employees</h2>
	<table width="100%" class="w3-table-all w3-centered w3-card-4">
		<thead>
		<tr>
			<th>No.</th>
			<th>Name</th>
			<th>Email</th>
			<th>Address</th>
			<th colspan="2">Action</th>
		</tr>
		</thead>
		<tbody>
		<?php
		$i=1;
		foreach($employee as $emp){
			echo "<tr>";
			echo "<td class='w3-center'>".$i++."</td>";
			echo "<td>".$emp->name."</td>";
			echo "<td>".$emp->email."</td>";
			echo "<td>".$emp->address."</td>";
			echo "<td class='w3-center'><div class='w3-row'>";
			echo "	<div class='w3-half'><a class=\"w3-btn w3-round w3-green\" href='public/update.php?id=$emp->id'>Edit</a></div>";
			echo "<div class='w3-half'><a onclick=\"return confirm('Are you sure?')\" href='delete.php?id=$emp->id' class='w3-button w3-round w3-red'>Del</a></div>";
			echo "</div></td></tr>";
		}
		?>
		</tbody>
	</table>
</div>

<?php include("public/template/footer.php"); ?>