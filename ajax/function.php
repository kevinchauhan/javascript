<?php
include('conn.php');

// insert 
if (isset($_POST['ins']) == 1) {
	
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];

    $ins = "INSERT INTO user(name,email,address)VALUES('$name','$email','$address')";
    if ($conn->query($ins)) {
        echo json_encode(['status' => 'success']);
    } else {
		echo json_encode(['status' => 'error', 'message' => mysqli_error($conn)]);
	}
    exit();
}

// reading all data
if (isset($_GET['sel']) == 1) {
	$sel = "SELECT * FROM user";
	$run = $conn->query($sel);
	if($run){
		$row = array();
		while ($r = $run->fetch_object()) {
			$row[] = $r;
		}
		echo json_encode($row);
	}  else {
		echo json_encode(['status' => 'error', 'message' => mysqli_error($conn)]);
	} 
	exit();
}

// deleteing
if (isset($_GET['del']) == 1) {
	$id = $_GET['id'];
	$del = "DELETE  FROM user WHERE id=$id";
	if ($run = $conn->query($del)) {
		echo json_encode(["status", "success"]);
	}  else {
		echo json_encode(['status' => 'error', 'message' => mysqli_error($conn)]);
	}
	exit();
}

// edit
if (isset($_GET['eid']) == 1) {
    $id = $_GET['id'];
    $del = "SELECT *   FROM user WHERE id=$id";
    $run = $conn->query($del);
    $r = $run->fetch_object();
    echo json_encode($r);
    exit();
}

// update
if (isset($_POST['upd']) == 1) {
    $id = $_POST['uid'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $upd = "UPDATE user SET name = '$name',email='$email',address='$address' WHERE id=$id";
    if ($conn->query($upd)) {
        echo json_encode(['status' => 'success']);
    }
    exit();
}

?>