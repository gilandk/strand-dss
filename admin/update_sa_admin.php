<?php

session_start();

require_once('../db.php');

if (isset($_POST)) {

	$sa_id = mysqli_real_escape_string($conn, $_POST['sa_id']);
	$sa_uid = mysqli_real_escape_string($conn, $_POST['sa_uid']);
	$fullname = mysqli_real_escape_string($conn, $_POST['fname']);
	$sa_contact = mysqli_real_escape_string($conn, $_POST['contact']);
	$position = mysqli_real_escape_string($conn, $_POST['position']);

	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$emailcomp = mysqli_real_escape_string($conn, $_POST['emailcomp']);

	$oldpassword = mysqli_real_escape_string($conn, $_POST['oldpassword']);
	$newpassword = mysqli_real_escape_string($conn, $_POST['newpassword']);

	if ($newpassword == NULL) {
		$password = $oldpassword;
	} else {
		$password = $newpassword;
	}


	$emailcheck = "SELECT * FROM school_admin WHERE user_email='$email'";
	$result = $conn->query($emailcheck);

	if ($email == $emailcomp) {
		$sql = "UPDATE school_admin SET
        
            sa_uid='$sa_uid',
            sa_fullname='$fullname',
            sa_contact='$sa_contact',
						sa_position='$position',
            sa_pass='$password'

            WHERE sa_id = '$sa_id'";
		if ($conn->query($sql) == TRUE) {

			$_SESSION['updateFacilitatorSuccess'] = true;
			header("Location: school_facilitator_edit.php?id=" . $sa_id);
			exit();
		} else {
			//If data failed to insert then show that error. Note: This condition should not come unless we as a developer make mistake or someone tries to hack their way in and mess up
			echo "Error " . $sql . "<br>" . $conn->error;
		}
	} else if ($result->num_rows == 0) {

		$sql = "UPDATE school_admin SET
        
           	sa_uid='$sa_uid',
            sa_fullname='$fullname',
            sa_contact='$contact',
						sa_position='$position',
            sa_pass='$password'
						sa_email='$email'

            WHERE sa_id = '$sa_id'";
		if ($conn->query($sql) == TRUE) {

			$_SESSION['updateFacilitatorSuccess'] = true;
			header("Location: school_facilitator_edit.php?id=" . $sa_id);
			exit();
		} else {
			//If data failed to insert then show that error. Note: This condition should not come unless we as a developer make mistake or someone tries to hack their way in and mess up
			echo "Error " . $sql . "<br>" . $conn->error;
		}
	} else {

		//if name found in database then show email already exists error.
		$_SESSION['updateFacilitatorFailed'] = true;
		header("Location: school_facilitator_edit.php?id=" . $sa_id);
		exit();
	}
	//Close database connection. Not compulsory but good practice.
	$conn->close();
} else {
	//redirect them back to register page if they didn't click register button
	header("Location: school_facilitator_edit.php?id=" . $sa_id);
	exit();
}
