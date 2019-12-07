<?php include("template/header.php"); ?>

<div class="w3-container" style="width:100%;max-width:450px;margin:auto">
			<form method="post" action="../create.php" class="w3-container w3-round w3-card-4 w3-light-grey w3-text-teal w3-margin">
				<h3 class="w3-center">New Employee</h3>
				<div class="w3-row w3-section">
					<div class="w3-col" style="width:50px">
						<i class="w3-xxlarge fa fa-user"></i>
					</div>
					<div class="w3-rest">
						<input class="w3-input w3-border" name="name" type="text" placeholder="Name" />
					</div>
				</div>
				 
				<div class="w3-row w3-section">
					<div class="w3-col" style="width:50px">
						<i class="w3-xxlarge fa fa-envelope-o"></i>
					</div>
					<div class="w3-rest">
						<input class="w3-input w3-border" name="email" type="email" placeholder="Email" />
					</div>
				</div>
				<div class="w3-row w3-section">
					<div class="w3-col" style="width:50px">
						<i class="w3-xxlarge fa fa-birthday-cake"></i>
					</div>
					<div class="w3-rest">
						<input data-toggle="datepicker" class="w3-input w3-border" name="birthdate" type="text" placeholder="Brithdate" />
					</div>
				</div>
				<div class="w3-row w3-section">
					<div class="w3-col" style="width:50px">
						<i class="w3-xxlarge fa fa-home"></i>
					</div>
					<div class="w3-rest">
						<select name="address" class="w3-input w3-border">
							<option>Select City</option>
							<?php
							$file = file_get_contents("../data/province.txt");
							$province = str_replace('"', '', explode(",", $file));
							$max = count($province);
							
							for($i=0; $i<$max; $i++){
								echo "<option value='$province[$i]'>$province[$i]</option>";
							}
							?>
						</select>
					</div>
				</div>
				<button class="w3-button w3-block w3-section w3-teal w3-ripple w3-round">Save</button>
			</form>
		</div>
	</body>
</html>