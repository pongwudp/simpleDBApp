<?php include("template/header.php");?>

		<div class="w3-container" style="width:100%;max-width:450px;margin:auto">
			<form method="post" action="../update.php?act=update" class="w3-container w3-round w3-card-4 w3-light-grey w3-text-teal w3-margin">
			<?php
			if(isset($_GET['id'])){
				try {
					require '../config.php';
					
					$gid = $_GET['id'];
					$sql = "SELECT * FROM $table WHERE id = ?";
					$query = $conn->prepare($sql);
					$query->execute([$gid]);
					$data = $query->fetch();
				}
				catch(PDOException $err) {
					die($err->getMessage());
				}
			}
			?>
			<input type="hidden" name="id" id="id" value="<?php echo $data['id']; ?>" />
				<h3 class="w3-center">Update Profile</h3>
				<div class="w3-row w3-section">
					<div class="w3-col" style="width:50px">
						<i class="w3-xxlarge fa fa-user"></i>
					</div>
					<div class="w3-rest">
						<input class="w3-input w3-border" name="name" type="text" value="<?php echo $data['name'];?>" />
					</div>
				</div>
				 
				<div class="w3-row w3-section">
					<div class="w3-col" style="width:50px">
						<i class="w3-xxlarge fa fa-envelope-o"></i>
					</div>
					<div class="w3-rest">
						<input class="w3-input w3-border" name="email" type="email" value="<?php echo $data['email']; ?>" />
					</div>
				</div>
				<div class="w3-row w3-section">
					<div class="w3-col" style="width:50px">
						<i class="w3-xxlarge fa fa-birthday-cake"></i>
					</div>
					<div class="w3-rest">
						<input data-toggle="datepicker" class="w3-input w3-border" name="birthdate" type="text" value="<?php echo $data['birthdate']; ?>" />
					</div>
				</div>
				<div class="w3-row w3-section">
					<div class="w3-col" style="width:50px">
						<i class="w3-xxlarge fa fa-home"></i>
					</div>
					<div class="w3-rest">
						<select name="address"  class="w3-input w3-border">
							<option> Select </option>
							<?php
							$file = file_get_contents("../data/province.txt");
							$province = str_replace('"', '', explode(",", $file));
							$max = count($province);
							
							for($i=0; $i<$max; $i++){
								echo "<option value='$province[$i]'";
									if($province[$i] === $data['address']) {
										echo "selected";
									}
								echo ">$province[$i]</option>";
							}
							/*
							<option value="<?php echo $data['address'];?>"> <?php echo $data['address']; ?> </option>
							*/
							?>
						</select>
					</div>
				</div>
				<div class="w3-section w3-row-padding">
					<div class="w3-half">
						<button onclick="history.back()" class="w3-button w3-block w3-teal w3-round">Cancel</button>
					</div>
					<div class="w3-half">
						<button class="w3-block w3-button w3-teal w3-round">Save</button>
					</div>
				</div>
			</form>
		</div>
	</body>
</html>

<?php //include("template/footer.php"); ?>