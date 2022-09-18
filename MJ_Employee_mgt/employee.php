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
//$x = "none;";
// variables
$e_ID = "";
$e_name = "";
$e_dob = "";
$e_desgn = "";
$e_dept = "";
$e_doj = "";
$e_pan = "";
$e_aadhar = "";
$e_ph = "";
$e_address = "";
$e_city = "";
$e_state = "";
$e_pin = "";
$e_dor = "";
$e_dop = "";
$e_pos = "";
// for values inserting
$e__ID = "";
$e__name = "";
$e__dob = "";
$e__desgn = "";
$e__dept = "";
$e__doj = "";
$e__pan = "";
$e__aadhar = "";
$e__ph = "";
$e__address = "";
$e__city = "";
$e__state = "";
$e__pin = "";
$e__dor = "";
$e__dop = "";
$e__pos = "";


// -----------insert------------
if (isset($_POST['saveBTN'])) {
	$e_ID = $_POST['e_ID'];
	$e_name = $_POST['e_name'];
	$e_dob1 = $_POST['e_dob'];
	$dob = date("d-m-Y", strtotime($e_dob1));
	$e_desgn = $_POST['e_desgn'];
	$e_dept = $_POST['e_dept'];
	$e_doj1 = $_POST['e_doj'];
	$doj = date("d-m-Y", strtotime($e_doj1));
	$e_pan = $_POST['e_pan'];
	$e_aadhar = $_POST['e_aadhar'];
	$e_ph = $_POST['e_ph'];
	$e_address = $_POST['e_address'];
	$e_city = $_POST['e_city'];
	$e_state = $_POST['e_state'];
	$e_pin = $_POST['e_pin'];
	$e_dor1 = $_POST['e_dor'];
	$e_dor = date("d-m-Y", strtotime($e_dor1));
	$e_dop1 = $_POST['e_dop'];
	$e_dop = date("d-m-Y", strtotime($e_dop1));
	$e_pos = $_POST['e_pos'];


	// retrived details ends here -->
	if (
		!empty($e_ID) || !empty($e_name) || !empty($dob) || !empty($e_desgn) || !empty($e_dept) || !empty($doj) ||
		!empty($e_pan) || !empty($e_aadhar) || !empty($e_ph) || !empty($e_address) || !empty($e_city) || !empty($e_state)
		|| !empty($e_pin) || !empty($e_dor) || !empty($e_dop) || !empty($e_pos)
	) {
		$insert = "insert into emp values
				('$e_ID', '$e_name', STR_TO_DATE('$dob', '%d-%m-%Y'), '$e_desgn', '$e_dept', STR_TO_DATE('$doj', '%d-%m-%Y'), '$e_pan', '$e_aadhar', '$e_ph', '$e_address', '$e_city', '$e_state', '$e_pin',STR_TO_DATE('$e_dor', '%d-%m-%Y'), STR_TO_DATE('$e_dop', '%d-%m-%Y'),'$e_pos' )";
		$run_insert = mysqli_query($cn, $insert);
		if ($run_insert === true) {
			echo "<script>alert('Record inserted successfully');</script>";
			$e_ID = "";
			$e_name = "";
			$e_dob = "";
			$e_desgn = "";
			$e_dept = "";
			$e_doj = "";
			$e_pan = "";
			$e_aadhar = "";
			$e_ph = "";
			$e_address = "";
			$e_city = "";
			$e_state = "";
			$e_pin = "";
			$e_dor = "";
			$e_dop = "";
			$e_pos = "";
		} else {
			echo "<script>alert('Dublicate ID or field blank');</script>";
		}
	}
}

// -----------search------------
if (isset($_POST['searchBTN'])) {
	$e_ID = $_POST['e_search'];

	$sql = "SELECT * FROM emp WHERE e_id  ='$e_ID'";
	$result = mysqli_query($cn, $sql);

	if (mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			$e__ID = $row['e_id'];
			$e__name = $row['e_name'];
			$e__dob = $row['e_dob'];
			$e__desgn = $row['e_desgn'];
			$e__dept = $row['e_dept'];
			$e__doj = $row['e_doj'];
			$e__pan = $row['e_pan'];
			$e__aadhar = $row['e_aadhar'];
			$e__ph = $row['e_ph'];
			$e__address = $row['e_address'];
			$e__city = $row['e_city'];
			$e__state = $row['e_state'];
			$e__pin = $row['e_pin'];
			$e__dor = $row['e_dor'];
			$e__dop = $row['e_dop'];
			$e__pos = $row['e_pos'];

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
	$e_ID = $_POST['e_ID'];
	$e_name = $_POST['e_name'];
	$e_dob1 = $_POST['e_dob'];
	$dob = date("d-m-Y", strtotime($e_dob1));
	$e_desgn = $_POST['e_desgn'];
	$e_dept = $_POST['e_dept'];
	$e_doj1 = $_POST['e_doj'];
	$doj = date("d-m-Y", strtotime($e_doj1));
	$e_pan = $_POST['e_pan'];
	$e_aadhar = $_POST['e_aadhar'];
	$e_ph = $_POST['e_ph'];
	$e_address = $_POST['e_address'];
	$e_city = $_POST['e_city'];
	$e_state = $_POST['e_state'];
	$e_pin = $_POST['e_pin'];
	$e_dor1 = $_POST['e_dor'];
	$e_dor = date("d-m-Y", strtotime($e_dor1));
	$e_dop1 = $_POST['e_dop'];
	$e_dop = date("d-m-Y", strtotime($e_dop1));
	$e_pos = $_POST['e_pos'];

	if (
		!empty($e_ID) || !empty($e_name) || !empty($dob) || !empty($e_desgn) || !empty($e_dept) || !empty($doj) ||
		!empty($e_pan) || !empty($e_aadhar) || !empty($e_ph) || !empty($e_address) || !empty($e_city) || !empty($e_state)
		|| !empty($e_pin) || !empty($e_dor)
	) {
		$update = "update emp set e_name='$e_name', e_dob=STR_TO_DATE('$dob', '%d-%m-%Y'), e_desgn='$e_desgn', e_dept='$e_dept',e_doj = STR_TO_DATE('$doj', '%d-%m-%Y'), e_pan = '$e_pan', e_aadhar = '$e_aadhar', e_ph = '$e_ph', e_address = '$e_address', e_city = '$e_city', e_state = '$e_state', e_pin = '$e_pin', e_dor=STR_TO_DATE('$e_dor', '%d-%m-%Y'),   e_dop=STR_TO_DATE('$e_dop', '%d-%m-%Y'), e_pos = '$e_pos' where e_id='$e_ID'";
		$run_update = mysqli_query($cn, $update);
		if ($run_update === true) {
			echo "<script>alert('Record updated successfully');</script>";
			$e_ID = "";
			$e_name = "";
			$e_dob = "";
			$e_desgn = "";
			$e_dept = "";
			$e_doj = "";
			$e_pan = "";
			$e_aadhar = "";
			$e_ph = "";
			$e_address = "";
			$e_city = "";
			$e_state = "";
			$e_pin = "";
			$e_dor = "";
			$e_dop = "";
			$e_pos = "";

			$btn_dispS = "";
			$btn_dispu = "none";
		} else {
			echo "<script>alert('Duplicate record');</script>";
		}
	}
}
// -----------delete------------
if (isset($_POST['deleteBTN'])) {
	$e_id = $_POST['e_ID'];
	$sql = "DELETE FROM emp WHERE e_id ='$e_id'";
	$result = mysqli_query($cn, $sql);
	echo "<script>alert('Record deleted');</script>";
	$e_ID = "";
	$e_name = "";
	$e_dob = "";
	$e_desgn = "";
	$e_dept = "";
	$e_doj = "";
	$e_pan = "";
	$e_aadhar = "";
	$e_ph = "";
	$e_address = "";
	$e_city = "";
	$e_state = "";
	$e_pin = "";
	$e_dor = "";
	$e_dop = "";
	$e_pos = "";

	$btn_dispS = "";
	$btn_dispu = "none";
}
?>

<!doctype html>
<html lang="en">

<head>
	<title>Employee Form</title>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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

		.your_style {
			font-family: 'Courier New', Courier, monospace;
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
				<li class="nav-item ">
					<a class="nav-link" href="home.php">Home </a>
				</li>
				<li class="nav-item active">
					<a class="nav-link" href="#">Employee <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="user.php">User</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="leave.php">Leave</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="jobEntry.php">Job Details</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="dept.php">Department</a>
				</li>
			</ul>
			<div class="form-inline my-2 my-lg-0">
				<form name="emp" method="POST">
					<input class="form-control mr-sm-2" type="search" name="e_search" placeholder="Search" aria-label="Search">
					<button class="btn btn-warning my-2 my-sm-0" type="submit" name="searchBTN">Search</button>
				</form>
			</div>
		</div>
	</nav>
	<!-- NavBar -->
	<!-- Container -->
	<section class="form mx-2 mt-3">
		<form name="emp" method="POST">

			<div class="row no-gutters mx-5 mb-4 px-3 py-3">
				<div class="form-row">

					<div class="form-group col-md-4 form__group field">
						<input type="text" class="form-control form__field" id="empID" name="e_ID" value="<?= $e__ID ?>" placeholder="Employee ID" required>
						<label class="form__label" for="empID">Employee ID</label>
					</div>

					<div class="form-group col-md-4 form__group field">
						<input type="text" class="form-control form__field" id="ename" name="e_name" value="<?= $e__name ?>" placeholder="Employee Name" required>
						<label class="form__label" for="ename">Employee Name</label>
					</div>
					<div class="form-group col-md-4 form__group field">
						<input type="text" class="form-control form__field" id='dob' name="e_dob" value="<?= $e__dob ?>" placeholder="Date of Birth" data-provide="datepicker" autocomplete="off" required />
						<label for="dob" class="form__label">Date of Birth</label>
					</div>
					<div class="form-group col-md-4 form__group field">
						<input type="input" class="form-control form__field" id="desgn" name="e_desgn" value="<?= $e__desgn ?>" placeholder="Designation" required>
						<label class="form__label" for="desgn">Designation</label>
					</div>
					<!-- <div class="form-group col-md-4 form__group field">
						<input type="text" class="form-control form__field" id="dept" name="e_dept" value="<?= $e__dept ?>" placeholder="Department" required>
						<label class="form__label" for="dept">Department</label>
					</div> -->

					<!-- depat -->
					<div class="form-group col-md-4 form__group field">
						<select name="e_dept" class="form-control form__field" required>
							<option value="" selected disabled hidden>Select Department</option>
							<?php
							$sql = "SELECT d_name FROM dept ";
							$result = mysqli_query($cn, $sql);
						
							if (mysqli_num_rows($result) > 0)
							{
								while ($row = mysqli_fetch_assoc($result)) {
									$d___name = $row['d_name'];
									?>
									
							<option value="<?= $d___name ?>" <?php if($e__dept=="$d___name") echo 'selected="selected"'; ?> ><?= $d___name ?></option>
							<?php
								}
							}
							?>
							<!-- <label class="form__label" for="dept">Department</label> -->
						</select>
					</div>
					<!-- depart -->


					<div class="form-group col-md-4 form__group field">
						<input type="text" class="form-control form__field" id="ph_no" name="e_ph" value="<?= $e__ph ?>" placeholder="Phone Number" required>
						<label class="form__label" for="ph_no">Phone Number</label>
					</div>
					<div class="form-group col-md-4 form__group field">
						<input type="input" class="form-control form__field" id="doj" name="e_doj" value="<?= $e__doj ?>" placeholder="Date of Joining" data-provide="datepicker" autocomplete="off" required />
						<label class="form__label" for="doj" class="form__label">Date of Joining</label>
					</div>
					<div class="form-group col-md-4 form__group field">
						<input type="input" class="form-control form__field" id="dop" name="e_dop" value="<?= $e__dop ?>" placeholder="Date of Promotion" data-provide="datepicker" autocomplete="off" required />
						<label class="form__label" for="dop" class="form__label">Date of Promotion</label>
					</div>
					<div class="form-group col-md-4 form__group field">
						<input type="text" class="form-control form__field" id="pos" name="e_pos" value="<?= $e__pos ?>" placeholder="Position" required>
						<label class="form__label" for="pos">Position</label>
					</div>
					<div class="form-group col-md-4 form__group field">
						<input type="input" class="form-control form__field" id="dor" name="e_dor" value="<?= $e__dor ?>" placeholder="Date of Retiring" data-provide="datepicker" autocomplete="off" required />
						<label class="form__label" for="dor" class="form__label">Date of Retirement</label>
					</div>
					<div class="form-group col-md-4 form__group field">
						<input type="text" class="form-control form__field" id="pan" name="e_pan" value="<?= $e__pan ?>" placeholder="PAN Number" required>
						<label class="form__label" for="pan">PAN Number</label>
					</div>
					<div class="form-group col-md-4 form__group field">
						<input type="text" class="form-control form__field" id="adh" name="e_aadhar" value="<?= $e__aadhar ?>" placeholder="Aadhar Number" required>
						<label class="form__label" for="adh">Aadhar Number</label>
					</div>

					<div class="form-group col-md-12 form__group field">
						<textarea class="form-control form__field" id="inputAddress" name="e_address" value="<?= $e__address ?>" rows="1" placeholder="1234 Main Street" required><?= $e__address ?></textarea>
						<label class="form__label" for="inputAddress">Address</label>
					</div>
					<div class="form-group col-md-4 form__group field">
						<input type="text" class="form-control form__field" id="inputCity" name="e_city" value="<?= $e__city ?>" required>
						<label class="form__label" for="inputCity">City</label>
					</div>
					<div class="form-group col-md-4 form__group field">
						<input type="text" class="form-control form__field" id="inputState" name="e_state" value="<?= $e__state ?>" required>
						<label class="form__label" for="inputState">State</label>
					</div>
					<div class="form-group col-md-4 pb-5 form__group field">
						<input type="text" class="form-control form__field" id="inputZip" name="e_pin" value="<?= $e__pin ?>" required>
						<label class="form__label" for="inputZip">Pin code</label>
					</div>

					<!-- Modal -->
					<!-- <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLongTitle">Department</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<select id="s_dept" class="custom-select modal-title" style="width: 250px;">
										<option selected>Choose...</option>
										<option>...</option>
										<option>...</option>
									</select>
									<button type="button" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
									<button type="button" class="btn btn-primary">Save changes</button>
								</div>
							</div>
						</div>
					</div> -->
					<!-- Modal -->
					<!-- buttons -->
					<div class="form-group col-md-12">
						<button type="submit" name="saveBTN" class="form-control btn btn-danger" style="display:<?= $btn_dispS ?>">save</button>
					</div>
					<div class="form-group col-md-6">
						<button type="submit" name="updateBTN" class="form-control btn btn-danger" style="display:<?= $btn_dispu ?>">update</button>
					</div>
					<div class="form-group col-md-6">
						<button type="submit" name="deleteBTN" class="form-control btn btn-danger" style="display:<?= $btn_dispu ?>">delete</button>
					</div>
					<div class="form-group col-md-12">
						<button type="button" class="form-control btn btn-outline-danger" onclick="location.href='home.php'">cancel</button>
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