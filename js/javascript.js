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
