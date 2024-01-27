<?php
// include auth_session.php file on all user panel pages
include("auth_session.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add/Edit Task</title>
    <link rel="stylesheet" href="style.css" type="text/css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Add this script tag to your HTML file -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .task-form {
            min-width: 400px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: rgb(22,167,30);
            font-weight: 900;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-top: 10px;
            color: rgb(22,167,30);
        }

        select, input {
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 10px;
            margin: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        button + button {
            margin-left: 10px;
        }
    </style>
</head>
<body>
    <div class="task-form">
        <h1>Add Task</h1>
        <form>
            <label for="landName">Land Name:</label>
            <select id="landName" name="landName">
                <!-- Add more land names as needed -->
            </select>

            <label for="taskType">Task Type:</label>
            <select id="taskType" name="taskType">
                <!-- Add more task types as needed -->
            </select>

            <label for="beginDate">Begin Date:</label>
            <input type="date" id="beginDate" name="beginDate">

            <label for="endDate">End Date:</label>
            <input type="date" id="endDate" name="endDate">

            <label for="farmer">Farmer:</label>
            <select id="farmer" name="farmer">
                <!-- Add more farmer names as needed -->
            </select>

            <label for="taskStatus">Task Status:</label>
            <select id="taskStatus" name="taskStatus">
                <option value="Pending">Pending</option>
                <option value="Completed">Completed</option>
                <!-- Add more task statuses as needed -->
            </select>

            <button onclick="saveTask()">Save</button>
            <button onclick="cancel()">Cancel</button>
        </form>
    </div>

    <script>
        $(document).ready(function () {
            addLebelLand();
            // Initial population of "Task Type" dropdown
            addTasks();
			addFarmers(); // Initial population of "Farmer" dropdown

		// Add event listener for changes in the "Land Name" dropdown
		$('#landName').on('change', function () {
			addFarmers(); // Call addFarmers when the land selection changes
		});
        });

        const addLebelLand = () => {
            $.post("all_lands.php", function (data) {
                var selectBox = document.getElementById('landName');
                // Add options to the select box
                var jsonArray = JSON.parse(data);
                if (Array.isArray(jsonArray)) {
                    jsonArray.forEach(function (item) {
                        var option = document.createElement('option');
                        option.value = item['Land_id'];
                        option.text = item['Location'];
                        selectBox.appendChild(option);
                    });
                    // Call addFarmers only after successfully populating land names
                    addFarmers();
                } else {
                    console.error('Data is not an array:', data);
                }
            });
        }

        const addTasks = () => {
            $.post("getTasks.php", function (data) {
                var selectBox = document.getElementById('taskType');
                // Clear existing options
                selectBox.innerHTML = "";

                if (Array.isArray(data)) {
                    data.forEach(function (item) {
                        var option = document.createElement('option');
                        option.value = item['Type_id'];
                        option.text = item['Tasktype_name'];
                        selectBox.appendChild(option);
                    });
                } else {
                    console.error('Data is not an array:', data);
                }
            });
        }

        const addFarmers = () => {
            $.post("getFarmer.php", { landId: $("#landName").val() }, function (data) {
                var selectBox = document.getElementById('farmer');
                // Clear existing options
                selectBox.innerHTML = "";
                console.log("Hi");
				console.log("Response from server:", data);
               

                if (Array.isArray(data)) {
                    data.forEach(function (item) {
                        var option = document.createElement('option');
                        option.value = item['Farmer_id'];
                        option.text = item['Name'];
                        selectBox.appendChild(option);
                    });
                } else {
                    console.error('Data is not an array:', data);
                }
            });
        }
		const saveTask = () => {
    // Collect form data
    var formData = {
        landId: $("#landName").val(),
        taskId: $("#taskType").val(),
        taskType: $("#taskType option:selected").text(),
		beginDate: $("#beginDate").val(),
        endDate: $("#endDate").val(),
        farmerId: $("#farmer").val(),
        taskStatus: $("#taskStatus").val()
    };
	console.log(formData);
    // Use AJAX to send the data to the server
    $.ajax({
        type: "POST",
        url: "saveTask.php", // Replace with the actual server-side script
        data: formData,
        success: function (response) {
            console.log("Server response:", response);
            // Handle the response as needed
			window.location.href = "dashboard.php";
        },
        error: function (error) {
            console.error("Error saving task:", error);
        }
    });
};
    </script>
</body>
</html>
