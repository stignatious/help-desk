<?php
session_start();
// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'round2');

// Check database connection
if (!$db) {
    die("Database connection failed: " . mysqli_connect_error());
}

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM signup WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "Email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO signup (username, email, password) 
  			  VALUES('$username', '$email', '$password')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "";
  	header('location: login.php');
  } else {
    $_SESSION['error'] = implode('<br>', $errors);
    header('location: Sign_up.php');
  }
}

// LOGIN USER
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
    $password = md5($password);//encrypt the password before saving in the database
    $query = "SELECT * FROM signup WHERE username='$username' AND password='$password'";
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) == 1) {
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "";
        header('location: main_page.php');
    } else {
        $_SESSION['error'] = "Wrong username/password combination";
        header('location: login.php');
    }
  } else {
    $_SESSION['error'] = implode('<br>', $errors);
    header('location: login.php');
  }
}

// Contact Us Form Submission
if (isset($_POST['contact_us'])) {
  $fullname = mysqli_real_escape_string($db, $_POST['fullname']);
  $office = mysqli_real_escape_string($db, $_POST['office']);
  $phone = mysqli_real_escape_string($db, $_POST['phone']);
  $message = mysqli_real_escape_string($db, $_POST['message']);

  if (empty($fullname)) {
      array_push($errors, "Full name is required");
  }
  if (empty($office)) {
      array_push($errors, "Office is required");
  }
  if (empty($phone)) {
      array_push($errors, "Phone is required");
  }
  if (empty($message)) {
      array_push($errors, "Message is required");
  }

  if (count($errors) == 0) {
      $query = "INSERT INTO contact (fullname, office, phone, message) VALUES('$fullname', '$office', '$phone', '$message')";
      if (mysqli_query($db, $query)){
          $_SESSION['message'] = $message;
          $_SESSION['success'] = "Message submitted successfully";
          header('location: main_page.php');
      } else {
          $_SESSION['error'] = "Database error: " . mysqli_error($db);
          header('location: errors.php');
      }
  } else {
      $_SESSION['error'] = implode('<br>', $errors);
      header('location: errors.php');
  }
}
?>
