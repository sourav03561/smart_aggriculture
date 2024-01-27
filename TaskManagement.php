<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Management</title>
	<link rel="stylesheet" href="style.css" type="text/css"/>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
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
		<button class="custom-button" onclick="location.href='add_edit_task.php'">Add Task</button>
        <table>
            <thead>
                <tr>
                    <th>Land Name</th>
                    <th>Task Type</th>
                    <th>Begin Date</th>
					<th>Ending Date</th>
                    <th>Task Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="taskTableBody">
                <!-- Task items will be added here dynamically using JavaScript -->
				
			</tbody>
        </table>
        
    </div>
	<div id="editTaskModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <form id="editTaskForm">
                <label for="newTaskName">New Task Name:</label>
                <input type="text" id="newTaskName" name="newTaskName" required>

                <label for="newBeginDate">New Begin Date:</label>
                <input type="text" id="newBeginDate" name="newBeginDate" required>

                <label for="newEndDate">New End Date:</label>
                <input type="text" id="newEndDate" name="newEndDate" required>

                <label for="newStatus">New Status:</label>
                <input type="text" id="newStatus" name="newStatus" required>

                <button type="button" onclick="submitEdit()">Submit Edit</button>
            </form>
        </div>
    </div>
    <script>
    // Function to fetch tasks from PHP script
	let currentTaskId;
	function fetchTasks() {
            $.ajax({
                type: "GET",
                url: "all_tasks.php",
                success: function (response) {
                    //console.log("Response received:", response);
                    populateTaskList(response);
                },
                error: function (error) {
                    console.error("Error fetching tasks:", error);
                }
            });
        }

        // Function to populate task list
        function populateTaskList(tasks) {
            //console.log("Tasks received:", tasks);
            const task = JSON.parse(tasks);
            if (Array.isArray(task)) {
                const taskTableBody = document.getElementById('taskTableBody');
                taskTableBody.innerHTML = '';
                //console.log("hi");
                task.forEach(t => {
                    //console.log("hi");
                    const row = document.createElement('tr');
                    row.innerHTML = `
                        <td>${t.LandName}</td>
                        <td>${t.TaskName}</td>
                        <td>${t.TaskStartDate}</td>
                        <td>${t.TaskEndDate}</td>
                        <td>${t.TaskStatus}</td>
                        <td>
                            <button onclick="openEditModal(${t.LandId},'${t.TaskName}','${t.TaskStartDate}','${t.TaskEndDate}','${t.TaskStatus}')">Edit</button>
                            <button onclick="deleteTask(${t.TaskId})">Delete</button>
                        </td>
                    `;
                    taskTableBody.appendChild(row);
                });
            } else {
                console.error("Invalid tasks data:", tasks);
            }
        }

        // Function to open the edit modal
        function openEditModal(taskId, taskName, taskBeginDate, taskEndDate, taskStatus) {
			currentTaskId=taskId;
            document.getElementById('newTaskName').value = taskName;
            document.getElementById('newBeginDate').value = taskBeginDate;
            document.getElementById('newEndDate').value = taskEndDate;
            document.getElementById('newStatus').value = taskStatus;

            showModal();
        }

        // Function to close the modal
        function closeModal() {
            document.getElementById('editTaskModal').style.display = 'none';
        }

        // Function to show the modal
        function showModal() {
            document.getElementById('editTaskModal').style.display = 'block';
        }

        // Function to submit the edit form
        function submitEdit() {
            const taskId = currentTaskId;
            const newTaskName = document.getElementById('newTaskName').value;
            const newBeginDate = document.getElementById('newBeginDate').value;
            const newEndDate = document.getElementById('newEndDate').value;
            const newStatus = document.getElementById('newStatus').value;
			//console.log(taskId);
			//console.log(newTaskName);
			//console.log(newBeginDate);

            $.ajax({
                type: "POST",
                url: "edit_task.php",
                data: {
                    taskId: taskId,
                    newTaskName: newTaskName,
                    newBeginDate: newBeginDate,
                    newEndDate: newEndDate,
                    newStatus: newStatus
                },
                success: function (response) {
                    console.log("Task edited successfully:", response);
                    closeModal();
                    fetchTasks();
                },
                error: function (error) {
                    console.error("Error editing task:", error);
                }
            });
        }

        // Function to delete a task
        function deleteTask(TaskId) {
            console.log(TaskId);
            $.ajax({
                type: "POST",
                url: "delete_task.php",
                data: { taskId: TaskId },
                success: function (response) {
                    console.log("Task deleted successfully:", response);
                    fetchTasks();
                },
                error: function (error) {
                    console.error("Error deleting task:", error);
                }
            });
        }

        // Initial population of task list
        fetchTasks();
</script>


</body>
</html>
