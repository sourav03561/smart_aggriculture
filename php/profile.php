<?php
// Database connection details
$servername = "your_servername";
$username = "your_username";
$password = "your_password";
$dbname = "your_database_name";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch user data from the database
$sql = "SELECT * FROM users WHERE user_id = 1"; // Adjust the query according to your database structure
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $username = $row['username'];
    $email = $row['email'];
    $phone = $row['phone'];
    $address = $row['address'];
} else {
    // Default values if no data is found (You can modify as per your needs)
    $username = "JohnDoe";
    $email = "johndoe@example.com";
    $phone = "123-456-7890";
    $address = "123 Main St";
}
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Profile</title>
    <link rel="stylesheet" href="../css/style.css" type="text/css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

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
        <img src="../img/logo.png"/>
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
</div>

<script>
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
                restoreEditButton();
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
