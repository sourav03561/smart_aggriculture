<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add/Edit Task</title>
	<link rel="stylesheet" href="../css/style.css" type="text/css"/>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="../js/javascript.js" type="text/javascript"></script>
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
                    <option value="Farm 1">Farm 1</option>
                    <option value="Farm 2">Farm 2</option>
                    <!-- Add more land names as needed -->
                </select>
    
                <label for="taskType">Task Type:</label>
                <select id="taskType" name="taskType">
                    <option value="Planting">Planting</option>
                    <option value="Harvesting">Harvesting</option>
                    <!-- Add more task types as needed -->
                </select>
    
                <label for="beginDate">Begin Date:</label>
                <input type="date" id="beginDate" name="beginDate">
    
                <label for="endDate">End Date:</label>
                <input type="date" id="endDate" name="endDate">
    
                <label for="farmer">Farmer:</label>
                <select id="farmer" name="farmer">
                    <option value="John Doe">John Doe</option>
                    <option value="Jane Doe">Jane Doe</option>
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

    <script src="script.js"></script>
</body>
</html>
