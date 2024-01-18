<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Management</title>
	<link rel="stylesheet" href="../css/style.css" type="text/css"/>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="../js/javascript.js" type="text/javascript"></script>
	<style>
		body {
		    font-family: Arial, sans-serif;
		    margin: 0;
		    padding: 0;
		    background-color: #f4f4f4;
		}
		
		.task-list {
		    max-width: 1000px;
		    margin: 20px auto;
		    background-color: #fff;
		    padding: 20px;
		    border-radius: 8px;
		    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
		}
		
		.task-form {
		    max-width: 400px;
		    margin: 20px auto;
		    background-color: #fff;
		    padding: 20px;
		    border-radius: 8px;
		    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
		}
		h1{
			text-align: center;
			color: rgb(22,167,30);
			font-weight: 900;
		}
		table {
		    width: 100%;
		    border-collapse: collapse;
		    margin-top: 20px;
		}
		
		table, th, td {
		    border: 1px solid #ddd;
		}
		
		th, td {
		    padding: 12px;
		    text-align: left;
		}
		
		th {
		    background-color: #f2f2f2;
		}
		
		button {
		    background-color: #4caf50;
			margin: 10px;
		    color: #fff;
		    border: none;
		    padding: 10px 20px;
		    border-radius: 5px;
		    cursor: pointer;
		    margin-right: 10px;
		}
		
		button:hover {
		    background-color: #45a049;
		}
		.custom-button{
			width: 350px;
			display: block;
			margin: 30px auto 0;
			padding: 10px 20px;
			border: none;
			border-radius: 50px;
			background-color:  #4caf50;
			color: white;
			height: 40px;
			font-size: 15px;
			font-weight: 600;
			font-family: Arial, Helvetica, sans-serif;
			
		}
		.custom-button:hover{
			background-color: #45a049;
			color: rgb(203, 240, 187);
		}

	</style>
</head>
<body>
    <div class="task-list">
        <h1>Task List</h1>
		<button class="custom-button" onclick="location.href='Add_EditTask.html'">Add Task</button>
        <table>
            <thead>
                <tr>
                    <th>Land Name</th>
                    <th>Task Type</th>
                    <th>Farmer</th>
                    <th>Begin Date</th>
                    <th>Task Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="taskTableBody">
                <!-- Task items will be added here dynamically using JavaScript -->
				<tr>
				            <td>Land A</td>
				            <td>Plowing</td>
				            <td>John Farmer</td>
				            <td>2024-01-01</td>
				            <td>In Progress</td>
				            <td>
				                <button>Edit</button>
				                <button>Delete</button>
				            </td>
				        </tr>
				        <tr>
				            <td>Land B</td>
				            <td>Planting</td>
				            <td>Jane Farmer</td>
				            <td>2024-02-01</td>
				            <td>Completed</td>
				            <td>
				                <button>Edit</button>
				                <button>Delete</button>
				            </td>
				        </tr>
			</tbody>
        </table>
        
    </div>

    <script>
		// Sample task data for testing
const sampleTasks = [
    { landName: 'Farm 1', taskType: 'Planting', farmer: 'John Doe', beginDate: '2022-01-01', taskStatus: 'Pending' },
    { landName: 'Farm 2', taskType: 'Harvesting', farmer: 'Jane Doe', beginDate: '2022-02-01', taskStatus: 'Completed' },
    // Add more sample tasks as needed
];

// Function to populate task list
function populateTaskList() {
    const taskTableBody = document.getElementById('taskTableBody');
    taskTableBody.innerHTML = '';

    sampleTasks.forEach(task => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>${task.landName}</td>
            <td>${task.taskType}</td>
            <td>${task.farmer}</td>
            <td>${task.beginDate}</td>
            <td>${task.taskStatus}</td>
            <td>
                <button onclick="editTask('${task.landName}')">Edit</button>
                <button onclick="deleteTask('${task.landName}')">Delete</button>
            </td>
        `;
        taskTableBody.appendChild(row);
    });
}

// Function to edit a task
function editTask(landName) {
    // Redirect to edit task page with the selected task data
    location.href = `Add_EditTask.html?landName=${landName}`;
}

// Function to delete a task
function deleteTask(landName) {
    // Delete the task from the sampleTasks array (in a real app, this would interact with a database)
    const index = sampleTasks.findIndex(task => task.landName === landName);
    if (index !== -1) {
        sampleTasks.splice(index, 1);
        populateTaskList();
    }
}

// Function to save a task (placeholder, actual implementation depends on your requirements)
function saveTask() {
    // Placeholder for saving task data (in a real app, this would interact with a database)
    alert('Task saved!');

    // Redirect back to the task management page
    location.href = 'TaskManagement.html';
}

// Function to cancel (go back to the task management page)
function cancel() {
    location.href = 'TaskManagement.html';
}

// Initial population of task list
populateTaskList();

	</script>
</body>
</html>
