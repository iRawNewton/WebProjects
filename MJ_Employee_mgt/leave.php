<?php
$host = "localhost";
$dbusername = "root";
$dbpassword = "root";
$dbname = "jm";
//create connection
$cn = mysqli_connect($host, $dbusername, $dbpassword, $dbname);

// button variable
$btn_dispS = "";
$btn_dispu = "none";

// variables
$l_id = "";
$l_emp = "";
$l_type = "";
$l_from = "";
$l_status = "";
$l_apply = "";
$l_dur = "";
$l_to = "";

// for values inserting
$l__id = "";
$l__emp = "";
$l__type = "";
$l__from = "";
$l__status = "";
$l__apply = "";
$l__dur = "";
$l__to = "";

// -----------insert------------
if (isset($_POST['saveBTN'])) {
	$l_id = $_POST['l_id'];
	$l_emp = $_POST['l_emp'];
	$l_type = $_POST['l_type'];
	$l_temp = $_POST['l_from'];
	$l_from = date("d-m-Y", strtotime($l_temp));
	$l_status = $_POST['l_status'];
	$l_temp = $_POST['l_apply'];
	$l_apply = date("d-m-Y", strtotime($l_temp));
	$l_dur = $_POST['l_dur'];
	$l_temp = $_POST['l_to'];
	$l_to = date("d-m-Y", strtotime($l_temp));

	try {
		// retrived details ends here -->
		if (
			!empty($l_id) || !empty($l_emp) || !empty($l_type) || !empty($l_from) || !empty($l_status)
		) {
			$insert = "insert into leave_ values
				('$l_id', '$l_emp', '$l_type', STR_TO_DATE('$l_from', '%d-%m-%Y'), '$l_status', STR_TO_DATE('$l_apply', '%d-%m-%Y'), '$l_dur' ,STR_TO_DATE('$l_to', '%d-%m-%Y') )";
			$run_insert = mysqli_query($cn, $insert);
			if ($run_insert === true) {
				echo "<script>alert('Record inserted successfully');</script>";
				$l_id = "";
				$l_emp = "";
				$l_type = "";
				$l_from = "";
				$l_status = "";
				$l_apply = "";
				$l_dur = "";
				$l_to = "";
			} else {
				echo "<script>alert('Dublicate ID or field blank');</script>";
			}
		}
	} catch (Exception $e) {
		echo "<script>alert('Invalid ID or field blank');</script>";
	}
}

// -----------search------------
if (isset($_POST['searchBTN'])) {
	$l_id = $_POST['l_search'];

	$sql = "SELECT * FROM leave_ WHERE l_id  ='$l_id'";
	$result = mysqli_query($cn, $sql);

	if (mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			$l__id = $row['l_id'];
			$l__emp = $row['l_emp'];
			$l__type = $row['l_type'];
			$l__from = $row['l_from'];
			$l__status = $row['l_status'];
			$l__apply = $row['l_apply'];
			$l__dur = $row['l_dur'];
			$l__to = $row['l_to'];

			$btn_dispS = "none";
			$btn_dispu = "";
		}
	} else {
		echo "<script>alert('No record found on searching');</script>";
	}
}

// -----------update------------
if (isset($_POST['updateBTN'])) {
	// retrived details
	$l_id = $_POST['l_id'];
	$l_emp = $_POST['l_emp'];
	$l_type = $_POST['l_type'];
	$l_temp = $_POST['l_from'];
	$l_from = date("d-m-Y", strtotime($l_temp));
	$l_status = $_POST['l_status'];
	$l_temp = $_POST['l_apply'];
	$l_apply = date("d-m-Y", strtotime($l_temp));
	$l_dur = $_POST['l_dur'];
	$l_temp = $_POST['l_to'];
	$l_to = date("d-m-Y", strtotime($l_temp));

	try {
		if (
			!empty($l_id) || !empty($l_emp) || !empty($l_type) || !empty($l_from) || !empty($l_status)
		) {
			$update = "update leave_ set l_emp='$l_emp', l_type='$l_type', l_from = STR_TO_DATE('$l_from', '%d-%m-%Y'), l_status = '$l_status', l_apply = STR_TO_DATE('$l_apply', '%d-%m-%Y'), l_dur = '$l_dur', l_to = STR_TO_DATE('$l_to', '%d-%m-%Y') where l_id='$l_id'";
			$run_update = mysqli_query($cn, $update);
			if ($run_update === true) {
				echo "<script>alert('Record updated successfully');</script>";
				$l_id = "";
				$l_emp = "";
				$l_type = "";
				$l_from = "";
				$l_status = "";

				$l_apply = "";
				$l_dur = "";
				$l_to = "";

				$btn_dispS = "none";
				$btn_dispu = "";
			} else {
				echo "<script>alert('Duplicate record');</script>";
			}
		}
	} catch (Exception $e) {
		echo "<script>alert('Invalid ID or field blank');</script>";
	}
}

// -----------delete------------
if (isset($_POST['deleteBTN'])) {
	$l_id = $_POST['l_id'];
	$sql = "DELETE FROM leave_ WHERE l_id ='$l_id'";
	$result = mysqli_query($cn, $sql);
	echo "<script>alert('Record deleted');</script>";
	$l_id = "";
	$l_emp = "";
	$l_type = "";
	$l_from = "";
	$l_status = "";
	$l_apply = "";
	$l_dur = "";
	$l_to = "";

	$btn_dispS = "";
	$btn_dispu = "none";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Leave Form</title>
	<!-- Required meta tags -->
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
	<!-- Bootstrap calendar -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<!-- Custom CSS -->
	<link rel="stylesheet" href="custom_style.css">
	<style>
		.row {
			background: rgb(255, 255, 255);
			border-radius: 10px;
			box-shadow: 0 10px 30px 0px rgba(0, 0, 0, 0.2);
			/* box-shadow: 12px 12px 22px rgb(65, 60, 60); */
		}

		.input_design {
			background: rgb(255, 255, 255);
			border-radius: 10px;
		}
	</style>
</head>

<body>
	<!-- NavBar -->
	<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #AB274F;">
		<a class="navbar-brand" href="#">Directorate Of Sericulture</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item">
					<a class="nav-link" href="home.php">Home </a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="employee.php">Employee</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="user.php">User </a>
				</li>
				<li class="nav-item active">
					<a class="nav-link" href="#">Leave <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="jobEntry.php">Job Details</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="dept.php">Department</a>
				</li>
			</ul>
			<div class="form-inline my-2 my-lg-0">
				<form method="POST">
					<input class="form-control mr-sm-2" type="search" name="l_search" placeholder="Search" aria-label="Search" />
					<button class="btn btn-warning my-2 my-sm-0" type="submit" name="searchBTN">
						Search
					</button>
				</form>
			</div>
		</div>
	</nav>
	<!-- NavBar -->
	<!-- Container -->
	<section class="form mx-2 mt-3">
		<form method="POST">
			<div class="row no-gutters mx-5 mb-4 px-3 py-3">
				<div class="form-row">
					<div class="form-group col-md-6 form__group field">
						<input type="text" class="form-control form__field" id="leaveID" name="l_id" value="<?= $l__id ?>" placeholder="Leave ID" required />
						<label class="form__label" for="leaveID">Leave ID</label>
					</div>
					<div class="form-group col-md-6 form__group field">
						<input type="text" class="form-control form__field" id="e_id" name="l_emp" value="<?= $l__emp ?>" placeholder="Employee ID" required />
						<label class="form__label" for="e_id">Employee ID</label>
					</div>
					<div class="form-group col-md-4 form__group field">
						<input type="text" class="form-control form__field" id="l_type" name="l_type" value="<?= $l__type ?>" placeholder="Leave Type" required />
						<label class="form__label" for="l_type">Leave Type</label>
					</div>
					<!--  -->
					<div class="form-group col-md-4 form__group field">
						<input type="input" class="form-control form__field" placeholder="Leave Apply Date" id='l_apply' data-provide="datepicker" autocomplete="off" name="l_apply" value="<?= $l__apply ?>" required />
						<label class="form__label" for="l_apply">Leave Apply Date</label>
					</div>
					<div class="form-group col-md-4 form__group field">
						<input type="input" class="form-control form__field" placeholder="Leave From" id='l_from' data-provide="datepicker" autocomplete="off" name="l_from" value="<?= $l__from ?>" required />
						<label class="form__label" for="l_from">Leave From</label>
					</div>
					<div class="form-group col-md-4 form__group field">
						<input type="input" class="form-control form__field" placeholder="Leave To" id='l_to' data-provide="datepicker" autocomplete="off" name="l_to" value="<?= $l__to ?>" required />
						<label class="form__label" for="l_to">Leave To</label>
					</div>
					<div class="form-group col-md-4 form__group field">
						<input type="input" class="form-control form__field" placeholder="Leave duration" id='l_dur' name="l_dur" value="<?= $l__dur ?>" required />
						<label class="form__label" for="l_dur">Leave Duration</label>
					</div>
					<!--  -->
					<div class="form-group col-md-4 form__group field">
						<input type="text" class="form-control form__field" id="l_status" name="l_status" value="<?= $l__status ?>" placeholder="Leave Status" required />
						<label class="form__label" for="l_status">Leave Status</label>
					</div>

					<!-- buttons -->
					<div class="form-group col-md-12">
						<button type="submit" class="form-control btn btn-outline-danger" name="saveBTN" style="display:<?= $btn_dispS ?>">
							save
						</button>
					</div>
					<div class="form-group col-md-6">
						<button type="submit" class="form-control btn btn-outline-danger" name="updateBTN" style="display:<?= $btn_dispu ?>">
							update
						</button>
					</div>
					<div class="form-group col-md-6">
						<button type="submit" class="form-control btn btn-outline-danger" name="deleteBTN" style="display:<?= $btn_dispu ?>">
							delete
						</button>
					</div>
					<div class="form-group col-md-12">
						<button type="button" class="form-control btn btn-outline-danger">
							cancel
						</button>
					</div>
					<!-- buttons -->
				</div>
			</div>
		</form>
	</section>
	<!-- Container -->
	<!-- Optional JavaScript -->
	<script src="cusstom_script.js"></script>
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>