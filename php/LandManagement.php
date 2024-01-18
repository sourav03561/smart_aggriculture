<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Land Management</title>
		<!-- <link rel="stylesheet" href="../css/style.css" type="text/css"/> -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
		<script src="../js/javascript.js" type="text/javascript"></script>
		<style>
		        body {
		            font-family: Arial, sans-serif;
		            margin: 0;
		            padding: 0;
		            background-color: #f4f4f4;
		            text-align: center;
		        }
		        
		        h1 {
		            color: rgb(22,167,30);
					font-weight: 900;
		        }
		        
		        button {
		            margin-top: 20px;
		            padding: 8px 12px;
		            background-color: #4caf50;
		            color: #fff;
		            border: none;
		            cursor: pointer;
		        }
		        
		        button:hover {
		            background-color: #45a049;
		        }
		        
		        table {
		            width: 80%;
		            margin: 20px auto;
		            border-collapse: collapse;
		            background-color: #fff;
		            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
		        }
		        
		        th, td {
		            border: 1px solid #ddd;
		            padding: 12px;
		            text-align: left;
		        }
		        
		        th {
		            background-color: #f2f2f2;
		        }
		        
		        td:last-child {
		            text-align: center;
		        }
		        
		        td button {
					min-width: 120px;
					border-radius: 50px;
		            margin-right: 5px;
					margin: 10px;
					font-size: 15px;
					font-weight: 600;
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
		
		<h1>Land Management</h1>
		<button class="custom-button" onclick="location.href='detectland.html'">Detect Land</button>
		
		<table>
		    <thead>
		        <tr>
		            <th>Land Name</th>
		            <th>Land Location</th>
		            <th>Actions</th>
		        </tr>
		    </thead>
		    <tbody>
		        <!-- Test Data -->
		        <tr>
		            <td>Land A</td>
		            <td>Location A</td>
		            <td>
		                <button onclick="location.href='detectland.html'">Edit</button>
		                <button onclick="deleteRow(this)">Delete</button>
		            </td>
		        </tr>
		        <tr>
		            <td>Land B</td>
		            <td>Location B</td>
		            <td>
		                <button onclick="location.href='detectland.html'">Edit</button>
		                <button onclick="deleteRow(this)">Delete</button>
		            </td>
		        </tr>
		        <!-- Add more rows as needed -->
		    </tbody>
		</table>
		
		<script>
		    function deleteRow(button) {
		        // Implement logic to delete the row
		        var row = button.parentNode.parentNode;
		        row.parentNode.removeChild(row);
		    }
		</script>
	</body>
</html>