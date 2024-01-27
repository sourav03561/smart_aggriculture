<?php
// Database connection details
$hostname = "localhost:3306";
$username = "root";
$password = "Naren@03561";
$database = "smartagriculture";
include("auth_session.php");

// Create connection
$conn = new mysqli($hostname, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the username from the session and sanitize it
$user = $_SESSION["username"];

// Prepare a statement with a placeholder for the username
$sql = "SELECT * FROM smartagriculture.users WHERE User_name = ?";
$stmt = $conn->prepare($sql);

// Bind the username parameter to the statement
$stmt->bind_param("s", $user);

// Execute the statement
$stmt->execute();

// Get the result
$result = $stmt->get_result();

if ($result) {
    // Fetch the result as an associative array
    $data = $result->fetch_assoc();

    // Check if data is not empty
    if ($data) {
        // Assign values to variables
        $username = $data['User_name'];
        $email = $data['Email_id'];
        $phone = $data['PhoneNumber'];
        $address = $data['Address'];

        // Now you can use these variables in your HTML or elsewhere
    } else {
        // Handle the case where no data is found
        // You may want to set default values or display an error message
    }
} else {
    // Handle the case where the query fails
    echo "Error: " . $conn->error;
}

// Close the statement and the database connection
$stmt->close();
$conn->close();
?>

<!-- The rest of your HTML and JavaScript code -->


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Profile</title>
    <link rel="stylesheet" href="style.css" type="text/css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <style>
        .button-profile {
            width: 250px;
            display: block;
            margin: 30px auto 0;
            padding: 10px 20px;
            border: none;
            border-radius: 50px;
            background-color: rgb(0, 191, 99);
            color: white;
            height: 40px;
            font-size: 15px;
            font-weight: 600;
            font-family: Arial, Helvetica, sans-serif;
            align-items: center;
        }

        .button-profile:hover {
            background-color: transparent;
            color: rgb(22, 167, 30);
            border: 2px solid rgb(0, 191, 99);
            font-size: 16px;
            align-items: center;
            justify-content: center;
        }

        button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin-right: 10px;
        }

        button:hover {
            background-color: #45a049;
        }

        .profile-input {
            width: 200px;
            padding: 10px 10px;
            margin: 5px;
            border: 2px solid #4caf50;
            border-radius: 5px;
            font-size: 16px;
            color: #4caf50;
        }

        .profile-input:hover {
            border: 3px solid #45a049;
            color: #45a049;
        }

        .profile-input:focus {
            outline: none;
            border: 3px solid rgb(86, 94, 81);
            color: rgb(86, 94, 81);
        }

        .custom-header {
            text-align: center;
            padding: 20px 0;
            color: rgb(22, 167, 30);
        }

        .profile {
            width: 400px;
            height: 500px;
            margin: 0 auto;
        }

        .profile-form p {
            padding: 20px 0;
            font-size: 20px;
            color: rgb(22, 167, 30);
        }

        .profile-form span {
            color: rgb(86, 94, 81);
        }

        .leftContent {
            background-color: rgb(250, 252, 255);
        }
    </style>
</head>
<body>
<div class="leftContainer">
    <div class="navbar">
        <img src="logo.png"/>
        <a href="dashboard.php" target="contentFrame">Home</a>
        <a href="AboutUs.html" target="contentFrame">About Us</a>
        <a href="profile.php" target="contentFrame" class="selected">Profile</a>
        <a href="signout.php">Sign out</a>
    </div>
    <div class="leftContent">
        <div class="profile">
            <h1 class="custom-header">User Profile</h1>
            <div id="profile-form" class="profile-form">
                
                <p>Name: <span id="username"><?php echo $username; ?></span></p>
                <p>Email: <span id="email"><?php echo $email; ?></span></p>
                <p>Phone: <span id="phone"><?php echo $phone; ?></span></p>
                <p>Address: <span id="address"><?php echo $address; ?></span></p>
            </div>
            <button id="editButton">Edit</button>
        </div>
    </div>
</div>

<div class="rightContainer">
    <!-- Your other HTML content -->
    <h1 class="dashboard-title">Harvesting<br />Tomorrow</h1>
	<h1 class="dashboard-title">Smart<br />Agriculture</h1>
	<h1 class="dashboard-title">Sensor<br />Solutions</h1>
</div>

<script>
    function callPHPFunction(newUsername, newEmail,newPhone,newAddress) {
    
  $.ajax({
    type: "POST",
    url: "update_profile.php",
    data: { newUsername: newUsername, newEmail: newEmail,newPhone: newPhone,newAddress: newAddress },
    success: function(response) {
      // Handle the response from the PHP file
      console.log(response);
    },
    error: function(error) {
      // Handle any errors that occur during the AJAX request
      console.error(error);
    }
  });
}
    document.addEventListener("DOMContentLoaded", function() {
        const editButton = document.getElementById("editButton");
        const usernameSpan = document.getElementById("username");
        const emailSpan = document.getElementById("email");
        const phoneSpan = document.getElementById("phone");
        const addressSpan = document.getElementById("address");
        const profileForm = document.getElementById("profile-form");

        editButton.addEventListener("click", function() {
            usernameSpan.innerHTML = `<input type="text" id="newUsername" class="profile-input" value="${usernameSpan.textContent}">`;
            emailSpan.innerHTML = `<input type="email" id="newEmail" class="profile-input" value="${emailSpan.textContent}">`;
            phoneSpan.innerHTML = `<input type="tel" id="newPhone" class="profile-input" value="${phoneSpan.textContent}">`;
            addressSpan.innerHTML = `<input type="text" id="newAddress" class="profile-input" value="${addressSpan.textContent}">`;
            editButton.style.display = "none";

            function restoreEditButton() {
                editButton.style.display = "block";
            }

            const saveButton = document.createElement("button");
            saveButton.textContent = "Save";
            saveButton.addEventListener("click", function() {
                const newUsername = document.getElementById("newUsername").value;
                const newEmail = document.getElementById("newEmail").value;
                const newPhone = document.getElementById("newPhone").value;
                const newAddress = document.getElementById("newAddress").value;

                usernameSpan.textContent = newUsername;
                emailSpan.textContent = newEmail;
                phoneSpan.textContent = newPhone;
                addressSpan.textContent = newAddress;
                console.log(newEmail);
                callPHPFunction(newUsername,newEmail,newPhone,newAddress);
                restoreEditButton();
                //onst xhr = new XMLHttpRequest();
                //xhr.open("POST", "update_profile.php", true);
                //xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                //xhr.onreadystatechange = function() {
                 //   if (xhr.readyState === 4 && xhr.status === 200) {
                        // Handle the response if needed
                        //console.log(xhr.responseText);
                        // Assuming the response is successful, you can also update the displayed values here if necessary
                        //usernameSpan.textContent = newUsername;
                        //emailSpan.textContent = newEmail;
                        //phoneSpan.textContent = newPhone;
                        //addressSpan.textContent = newAddress;

                        // Restore the edit button
                        //restoreEditButton();
                    //}}
            });

            const cancelButton = document.createElement("button");
            cancelButton.textContent = "Cancel";
            cancelButton.addEventListener("click", function() {
                usernameSpan.textContent = "<?php echo $username; ?>";
                emailSpan.textContent = "<?php echo $email; ?>";
                phoneSpan.textContent = "<?php echo $phone; ?>";
                addressSpan.textContent = "<?php echo $address; ?>";
                restoreEditButton();
            });

            const buttonContainer = document.createElement("div");
            buttonContainer.appendChild(cancelButton);
            buttonContainer.appendChild(saveButton);
            buttonContainer.style.display = "flex";

            addressSpan.appendChild(buttonContainer);
        });
    });
</script>
</body>
</html>
