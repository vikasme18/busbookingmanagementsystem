
<?php
	$alert_fieldmandatory = false;
	if (isset($_POST['source'])) {
		if ($_POST['source'] == "" || $_POST['destination'] == "" || $_POST['date'] == "") {
				$alert_fieldmandatory = true;
				header("location: index.php?fm=1;");
		} else {
				if ($_SERVER['REQUEST_METHOD'] == "POST") {
						$source = $_POST['source'];
						$dest = $_POST['destination'];
						$date = $_POST['date'];
						header("location: result.php?source=$source&destination=$dest&date=$date");
						exit();
				} else {
					header("location: Error404");
					exit();
				}
		}
	}else {
		
	}
?>

		<div style="display: flex; justify-content: center; align-items: center;" class="container">
			<div class="row">
				<div class="booking-form">
					<form action="" method="POST">
						<div class="row no-margin">
							
							<div style="display: flex; justify-content: center;" class="search-font">
								<div class="row no-margin">
								<div class="col-md-4">
									<div class="form-group">
										<span class="form-label">From</span>
										<input class="form-control" type="text" placeholder="Source" name="source">
									</div>
							</div>
									<div class="col-md-4">
										<div class="form-group">
											<span class="form-label">To</span>
											<input class="form-control" type="text" placeholder="Destination" name="destination">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<span class="form-label">Date</span>
											<input class="form-control" type="date" name="date" required>
										</div>
									</div>
								</div>
								<div class="col-md-4 available-btn">
										<button class="submit-btn" type="submit">Book Now</button>
								</div>
							</div>
							
						</div>
					</form>
				</div>
			</div>
		</div>
