
<?php
// home.php
include("auth_session.php");
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
		<meta name="viewport" content="width=device-width, initial-scale=1"/>
		<title>DetectLand</title>
		<link rel="stylesheet" href="style.css" type="text/css"/>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<style>
			
			.custom-formcontent label {
						      display: block;
						      margin-bottom: 10px;
							  color: rgb(22,167,30);
						}
						.custom-input{
							border: 2px solid rgb(154,240,115);
							border-radius: 5px;
							background-color: transparent;
							color: rgb(22,167,30);
							box-shadow: 0 2px 4px rgb(203, 240, 187);
							padding-left: 15px;
							max-width: 100%;
							width: 250px;
							height: 40px;
							font-size: 15px;
							font-weight: 600;
							font-family: Arial, Helvetica, sans-serif;
							
						}
						.custom-input::placeholder{
							color: rgb(154,240,115);
							font-size: 15px;
							font-weight: 600;
							font-family: Arial, Helvetica, sans-serif;
							
						}
						.custom-input:focus{
							outline:none;
							border:3px solid rgb(0,191,99);
							width: 260px;
						}
						.custom-button{
							width: 150px;
							display: block;
							margin: 30px auto 0;
							padding: 10px 20px;
							border: none;
							border-radius: 50px;
							background-color: rgb(0,191,99);
							color: white;
							height: 40px;
							font-size: 15px;
							font-weight: 600;
							font-family: Arial, Helvetica, sans-serif;
							
						}
						.custom-button:hover{
							background-color: rgb(60,191,99);
							color: rgb(203, 240, 187);
							
						}
						.custom-dropdown{
							width: 250px;
							height: 40px;
							border: 2px solid rgb(154,240,115);
							border-radius: 5px;
							outline: none;
							box-shadow: 0 2px 4px rgb(203, 240, 187);
							display: block;
							text-align-last: center;
							color: rgb(22,167,30);
						}
						
						.custom-dropdown:hover{
							border: 3px solid rgb(22,167,30);
						}
						.custom-formcontent {
						      margin: 20px;
						      padding: 20px;
						      /*border: 2px solid rgb(154,240,115);
							  box-shadow: 0 2px 4px rgb(203, 240, 187);
						      border-radius: 5px;*/
						      width: 310px;
						}
						.outside-form{
							display: flex;
							justify-content: center;
							margin: 0;
							padding: 0;
							width: 100%;
							margin-bottom: 150px;
						}
						.custom-background{
							margin: 0;
							padding: 0;
							height: 100vh;
							display: flex;
							justify-content: flex-start;
							align-items: center;
							background-color: white;
						}
						.custom-dropdown{
							width: 250px;
							height: 40px;
							border: 2px solid rgb(154,240,115);
							border-radius: 5px;
							outline: none;
							box-shadow: 0 2px 4px rgb(203, 240, 187);
							display: block;
							text-align-last: center;
							color: rgb(22,167,30);
						}
						
						.custom-dropdown:hover{
							border: 3px solid rgb(22,167,30);
						}
						.sensor-location{
							display: flex;
						}
						.sensor-button{
							width: 150px;
							display: block;
							border: none;
							border-radius: 50px;
							margin: 0 5px;
							background-color:rgb(92, 230, 29);;
							color: white;
							height: 40px;
							font-size: 25px;
							font-weight: 600;
							font-family: Arial, Helvetica, sans-serif;
						}
						.sensor-button:hover{
							background-color: rgb(60,191,99);
							color: rgb(203, 240, 187);
							
						}
						
					</style>
				</head>
				<body>
				<div class="leftContainer">
					<div class="navbar">
						<img src="logo.png"/>
						<a href="home.html" target="contentFrame" class="selected">Home</a>
						<a href="Suggestion.html" target="contentFrame">About Us</a>
						<a href="LandCompare.html" target="contentFrame">Profile</a>
						<link rel="stylesheet" href="style.css">
						<a href="login.html">Sign out</a>
					</div>
					<div class="leftContent" >
					<div class="custom-background">
							<section class="outside-form">
							<form class="custom-formcontent" action="save_land.php" method="post">
							    <div>
									<label for="landLocation">Land Location:</label>
									<input type="text" id="landLocation" name="landLocation" class="custom-input" style="color: rgb(92, 230, 29);">
								</div>
								<div>
									<label for="Soil">Soil:</label>
									<select id="Soil" name="Soil" class="custom-dropdown">
									  <option value="Loam">Loam</option>
									  <option value="Silt">Silt</option>
									  <option value="Clay">Clay</option>
									</select>
								</div>
			
			<!-- 					<div>
									<label for="LandPicture">Land Picture:</label>
								</div> -->
								<div>
								<label for="Soil">Sensor Type:</label>
									<div class="sensor-row">
										<!-- Add brackets [] to indicate an array -->
										<select id="sensorType" name="sensorType" class="custom-dropdown"></select>
										<label for="senorLocation">Sensor Location:</label>
										<div class="sensor-location">
										<input type="text" class="sensorLocation custom-input" name="sensorLocation[]" style="color: rgb(92, 230, 29);">
										<input type="button" class="add-button sensor-button" value="+" onclick="addSensorRow(this)">
										<input type="button" class="delete-button sensor-button" value="-" onclick="deleteSensorRow(this)">
				
										</div>
										
									</div>
								</div>
								<div id='sub'>
								<input type="submit" class="save-form custom-button" id="saveForm" name="saveForm" value="save" style='background-color: rgb(92, 230, 29);color: #fff;border-radius:2em;border:1px solid rgb(92, 230, 29);'/>
								<input type="submit" class="detecting-form custom-button" id="detecting" name="detecting" value="detecting" style='background-color: rgb(92, 230, 29);color: #fff;border-radius:1em;border:1px solid rgb(92, 230, 29);'/>
								<input type="button" value="cancel" class="custom-button" style='background-color: rgb(92, 230, 29);color: #fff;border-radius:1em;border:1px solid rgb(92, 230, 29);' />
								</div>
							  </form>
						</section>
						</div>
					</div>
				</div>
				<div class="rightContainer">
					<h1 class="dashboard-title">Harvesting<br />Tomorrow</h1>
					<h1 class="dashboard-title">Smart<br />Agriculture</h1>
					<h1 class="dashboard-title">Sensor<br />Solutions</h1>
				</div>
	<script>
		document.addEventListener('DOMContentLoaded', function () {
    addOptionsToSelect();
});

function addOptionsToSelect() {
    var selectBox = document.querySelector('#sensorType');
    // Clear existing options
    selectBox.innerHTML = '';

    // Fetch sensor types from getSensors.php and update the select options
    fetchSensorTypes(selectBox);
}

function fetchSensorTypes(selectBox) {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'getSensors.php', true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var data = JSON.parse(xhr.responseText);

            // Add new options
            data.forEach(function (item) {
                var option = document.createElement('option');
                option.value = item.Sensortype_id;
                option.text = item.Typename;
                selectBox.appendChild(option);
            });
        } else if (xhr.status != 200) {
            console.error('Error loading data');
        }
    };
    xhr.send();
}

function addSensorRow() {
    var sensorForm = document.querySelector('form.custom-formcontent');
    var newRow = document.createElement('div');
    newRow.classList.add('sensor-row');

    var label1 = document.createElement('label');
    label1.setAttribute('for', 'sensorType');
    label1.textContent = 'Sensor Type:';
    newRow.appendChild(label1);

    var select = document.createElement('select');
    select.setAttribute('name', 'sensorType[]');
	select.classList.add('custom-dropdown');
    fetchSensorTypes(select); // Populate the dropdown with sensor types
    newRow.appendChild(select);

	var label2 = document.createElement('label');
    label2.setAttribute('for', 'sensorLocation');
    label2.textContent = 'Sensor Location:';
    newRow.appendChild(label2);

    var input = document.createElement('input');
    input.setAttribute('type', 'text');
    input.classList.add('custom-input');
    input.setAttribute('name', 'sensorLocation[]');
	input.style.color='rgb(22,167,30)';
    newRow.appendChild(input);

    var addButton = document.createElement('input');
    addButton.setAttribute('type', 'button');
    addButton.classList.add('custom-button');
    addButton.setAttribute('value', '+');
    addButton.addEventListener('click', addSensorRow);
    newRow.appendChild(addButton);

    var deleteButton = document.createElement('input');
    deleteButton.setAttribute('type', 'button');
    deleteButton.classList.add('custom-button');
    deleteButton.setAttribute('value', '-');
    deleteButton.addEventListener('click', deleteSensorRow);
    newRow.appendChild(deleteButton);
    var savef = document.getElementById('sub')

    sensorForm.insertBefore(newRow, savef);
}

function deleteSensorRow() {
    var sensorForm = document.querySelector('form');
    var rowToDelete = this.parentElement;
    sensorForm.removeChild(rowToDelete);
}

	</script>

	</body>
</html>