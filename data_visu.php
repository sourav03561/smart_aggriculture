<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sensor Data Chart</title>
    <!-- Include Chart.js library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/moment"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-moment"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>

<style>
				
			body{
				display: block;
			}
			.select-custom-visu label {
			      display: block;
			      margin-bottom: 10px;
				  color: rgb(22,167,30);
			}
			
			.form-container{
				padding: 50px;
				display: flex;
				justify-content: center;
				align-items: center;
			
			}
			
			.custom-input{
				border: 2px solid rgb(154,240,115);
				border-radius: 5px;
				background-color: transparent;
				color: white;
				padding-left: 15px;
				max-width: 100%;
				width: 99%;
				height: 40px;
				font-size: 15px;
				font-weight: 600;
				font-family: Arial, Helvetica, sans-serif;
				
			}
			.custom-input::placeholder{
				color: white;
				font-size: 15px;
				font-weight: 600;
				font-family: Arial, Helvetica, sans-serif;
				
			}
			.custom-input:focus{
				outline:none;
				border-color: white;
				width: 100%;
			}
			.custom-button{
				width: 100%;
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
			p.link{
				margin: 20px;
				color: white;
				font-size: 15px;
				font-weight: 600;
				font-family: Arial, Helvetica, sans-serif;
			
			}
			a.custom-link{
				color: white;
				font-weight: 800;
				font-family: Arial, Helvetica, sans-serif;
				padding-left: 10px;
			}
			a.custom-link:hover{
				text-decoration: none;
				color: rgb(60,191,99);
			}
			/* .shadow{
				background: linear-gradient(to right, rgba(0,0,0,0.3) 0%, transparent 100%);
				
			} */
			.shadow::before{
				content: '';
				position: absolute;
				top: 0;
				left:-5px;
				width: 50px;
				height: 100%;
				background: linear-gradient(to right, rgba(0,0,0,0.3) 0%, transparent 100%);
			
			}
			
			/* dashboard */
			.rightContainer{
				flex: 0 0 43%;
				float: right;
				background-color:rgb(92,230,29);
				justify-content: center;
				align-items: center;
				display: flex;
				flex-direction: column;
			}
			.leftContainer{
				flex: 0 0 57%;
				height: 100vh;
				float: left;
				overflow: hidden;
				/* background-color: aliceblue; */
			}
			.navbar{
				background-color: rgb(250,252,255);
				/* color: aquamarine; */
				padding: 10px 20px;
				display: flex;
				align-items: center;
				
			}
			.navbar a{
				text-decoration: none;
				color: rgb(127,127,127);
				padding: 10px 30px;
				margin: 5px 0;
				display: block;
				
			}
			
			.navbar img{
				height: 50px;
				width: 50px;
				margin-left: 30px;
				
			}
			.leftContent{
				flex: 1;
				overflow: hidden;
				position: relative;
				background-color: aquamarine;
				height: 100%;
			
			}
			.leftContent iframe{
				/* position: absolute; */
				width: 100%;
				height: 100%;
				border: none;
				margin: 0;
				padding: 0;
				/* overflow: hidden; */
			}
			.navbar a.selected{
				color: black;
				font-size: 20px;
				text-decoration: underline;
			}
			.dashboard-title{
				text-align: center;
				color: white;
				padding: 25px;
			}
			/* home */
			.custom-selection{
			  display: flex;
			  justify-content: space-around;
			  /* align-items: center; */
			  flex-wrap: wrap;
			  margin-top: 80px;
			
			}
			.custom-card{
				display: flex;
				width: 250px;
				padding: 10px;
				margin-bottom: 10px;
				align-items: center;
				justify-content: center;
			}
			.button-link {
			  display: inline-block;
			  /* padding: 10px 20px; */
			  text-decoration: none;
			  text-align: center;
			  background-color: rgb(53,166,0);
			  color: #ffffff;
			  /* border-radius: 5px;
			  border: 1px solid rgb(53,166,0); */
			  width: 250px;
			  height: 150px;
			  line-height: 150px;
			  font-size: 20px;
			  font-weight: bold;
			  
			  transition: background-color 0.3s ease;
			}
			
			.button-link:hover {
			  background-color: rgb(92,230,29);
			}
			
			/* new home */
			.home-body {
			  margin: 0;
			  padding: 0;
			  height: 100vh;
			  display: flex;
			  justify-content: flex-start;
			  align-items: center;
			  background-image: url("../img/TechThinkeres.png");
			  background-size: cover;
			  background-position: right bottom;
			  
			}
			
			.home-container {
			  margin-left: 100px; 
			  margin-bottom: 250px;
			}
			
			.home-container h1 {
			  margin: 0;
			  text-align: center;
			  color: rgb(65,230,75);
			  margin-bottom: 150px;
			  font-size: 50px;
			  font-weight: 800;
			  font-family: Arial, Helvetica, sans-serif;
			}
			
			.home-button {
			  margin: 30px auto 0;
			  padding: 10px 20px;
			  height: 50px;
			  font-size: 20px;
			  font-weight: 800;
			  font-family: Arial, Helvetica, sans-serif;
			  
			  display: inline-block;
			  background-color: rgb(65,230,75);
			  color: white;
			  text-decoration: none;
			  border: none;
			  border-radius: 50px;
			}
			
			
			/* DataAnalysis */
			.OutsideBox {
			  font-family: Arial, sans-serif;
			  max-width: 1200px;
			  margin: 0 auto;
			  padding: 20px;
			}
			.custom-header {
			  text-align: center;
			  padding: 20px 0;
			  /* border-bottom: 1px solid #ccc; */
			  color: rgb(22,167,30);
			}
			
			.dashboard-content {
			  display: flex;
			  justify-content: space-around;
			  flex-wrap: wrap;
			  margin-top: 20px;
			}
			
			.card {
			  width: 200px;
			  padding: 20px;
			  margin-bottom: 20px;
			  /* border: 1px solid #ccc;
			  border-radius: 5px; */
			}
			.card p{
				text-align: center;
				color: rgb(75, 75, 75);
			}
			
			.dashboard-footer {
			  text-align: center;
			  padding: 20px 0;
			  color: rgb(75, 75, 75);
			  /* border-top: 1px solid #ccc; */
			}
			/* Suggestion */
			.custom-dl{
				display: flex;
				flex-wrap: wrap;
				gap: 10px;
			}
			.custom-dl div{
				flex: 1 0 calc(50% - 5px);
				min-width: 150px;
				display: flex;
				flex-wrap: wrap;
				/* border: 1px solid black; */
				padding: 5px;
				margin-bottom: 10px;
				box-sizing: border-box;
			}
			.custom-dl dt,dd{
				flex: 1 0 50%;
				padding: 5px;
				box-sizing: border-box;
				/* border: 1px solid black; */
				overflow: hidden;
			}
			.custom-dl dd{
				text-align: center;
			}
			.custom-dl dt{
				text-align: right;
				color: rgb(22,167,30); 
			}
			/* LandCompare */
			.custom-select select{
				width: 350px;
				margin: 0 auto;
				display: block;
				text-align-last: center;
				margin-bottom: 50px;
				color: rgb(22,167,30);
			}
			.select-land{
				display: flex;
				justify-content: space-between;
			}
			.land-selector{
				margin: 20px;
			}
			.left-side,.right-side {
			  width: 50%;
			  
			}
			
			.image-container {
			  text-align: center;
			}
			
			.selected-image {
			  max-width: 100%;
			  height: 200px;
			}
			
			.value-display {
			  /* display: none; */
			}
			.value-display p{
				display: inline;
			}
			.dropdown{
				width: 250px;
				display: block;
				text-align-last: center;
				color: rgb(22,167,30);
			}
			
			.value-custom{
				/* text-align: right; */
				color: rgb(22,167,30); 
			}
			
			/* DetectLand */
			.custom-form {
			      margin: 20px;
			      padding: 20px;
			      border: 1px solid #ccc;
			      border-radius: 5px;
			      width: 300px;
			}
			.custom-form label {
			      display: block;
			      margin-bottom: 10px;
			}
			.sensor-row {
			  margin-bottom: 10px;
			}
			.sensor-quantity{
				width: 150px;
			}
			.add-button {
			  cursor: pointer;
			}
			.button-visu{
				width: 100px;
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
				align-items: center;
				
			}
			.button-visu:hover{
				background-color: transparent;
				color: rgb(22,167,30);
				border: 2px solid rgb(0,191,99);
				font-size: 16px;
				align-items: center;
				justify-content: center;
				
				
			}
			.dropdown-custom{
				width: auto;
				min-width: 150px;
				max-width: 100%;
				height: 40px;
				border: 2px solid rgb(0,191,99);
				border-radius: 5px;
				outline: none;
				text-align-last: center;
				color: rgb(22,167,30);
			}
			
			.dropdown-custom:hover{
				border: 3px solid rgb(22,167,30);
			}
			
			.label-custom{
				/* display: flex; */
				/* flex-wrap:wrap; */
				margin-bottom: 10px;
				color: rgb(22,167,30);
			}
			.select-custom-visu{
				display: block;
			}
			.datavisu-button{
				width: 250px;
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
				align-items: center;
			}
			.datavisu-button:hover{
				background-color: transparent;
				color: rgb(22,167,30);
				border: 2px solid rgb(0,191,99);
				font-size: 16px;
				align-items: center;
				justify-content: center;
				
				
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
			.custom-dropdown{
				width: 250px;
				height: 40px;
				border: 2px solid rgb(154,240,115);
				border-radius: 5px;
				outline: none;
				box-shadow: 0 2px 4px rgb(203, 240, 187);
				/* display: block; */
				text-align-last: center;
				color: rgb(22,167,30);
			}
			
			.custom-dropdown:hover{
				border: 3px solid rgb(22,167,30);
			}
		</style>
	<body>
        <div>
		<div class="col-md-12 my-5 d-flex justify-content-center">
		        <h1 style="text-align: center;" class="custom-header">Data Visualization</h1>
		</div>
		
		    <div class="col-md-12 select-custom-visu" style="text-align: center;">
		        <label for="mySelect" style="margin-right: 10px;" class="label-custom">Select a Land:</label>
		        <select id="mySelect" style="margin-right: 20px;" class="custom-dropdown"></select>
		
		        <label for="mySelect1" style="margin-right: 10px;" class="label-custom">Select a Sensor Type:</label>
		        <select id="mySelect1" class="custom-dropdown"></select>
		
		        <label for="mySelect2" style="margin-right: 10px;" class="label-custom">Select a Sensors:</label>
		        <select id="mySelect2" class="custom-dropdown" ></select>
		
		        <label for="startDate">Start Date:</label>
		        <input type="date" class="custom-input" id="startDate" name="startDate" required>
		
		        <label for="endDate">End Date:</label>
		        <input type="date" class="custom-input" id="endDate" name="endDate" required >
		
		
		
		        <button class="datavisu-button" onclick="updateChart()">Update Chart</button>
		    </div>
    <div style="height: 1500px;width:1500px;">
    <canvas id="sensorChart" style="margin-left: 10%;margin-top:30px;"></canvas>
    </div>
        
    <script>
        $(document).ready(function () {
            addLabelLand();
            addLabelSensor();
            
            $("#mySelect, #mySelect1").on("change", function () {
        // Call addSensor function when the values change
            addSensor();
            });
            addSensor();
        });

        const addLabelLand = () => {
            $.post("all_lands.php", function (data) {
                var selectBox = document.getElementById('mySelect');
                // Add options to the select box
                var jsonArray = JSON.parse(data);
                if (Array.isArray(jsonArray)) {
                    jsonArray.forEach(function (item) {
                        var option = document.createElement('option');
                        option.value = item['Land_id'];
                        option.text = item['Location'];
                        selectBox.appendChild(option);
                    });
                } else {
                    console.error('Data is not an array:', data);
                }
            });

        };

        const addLabelSensor = () => {
            $.post("getSensors.php", function (data) {
                var selectBox = document.getElementById('mySelect1');
                // Add options to the select box
                data.forEach(function (item) {
                    var option = document.createElement('option');
                    option.value = item['Sensortype_id'];
                    option.text = item['Typename'];
                    selectBox.appendChild(option);
                });
            });
        };
        const addSensor = () => {
            const Land = document.getElementById('mySelect').value;
            const Sensor = document.getElementById('mySelect1').value;
            console.log(Land);
            console.log(Sensor);
            $.post("getSensor.php", { Land: Land, Sensor: Sensor }, function (data) {
                var selectBox = document.getElementById('mySelect2');
                // Add options to the select box
                data.forEach(function (item) {
                    var option = document.createElement('option');
                    option.value = item['Sensor_id'];
                    option.text = item['Location'];
                    selectBox.appendChild(option);
                });
            });
        };
        const updateChart = () => {
            // Retrieve selected options and date range
            var landId = document.getElementById('mySelect').value;
            var sensorTypeId = document.getElementById('mySelect1').value;
            var sensor = document.getElementById('mySelect2').value;
            var startDate = document.getElementById('startDate').value;
            var endDate = document.getElementById('endDate').value;
            
            if (window.myChart) {
    // Destroy the existing chart
    window.myChart.destroy();
}
            // Use Ajax to send the selected options and date range to PHP for data retrieval
            $.ajax({
                type: 'POST',
                url: 'updateChartData.php',
                data: {
                    landId: landId,
                    sensorTypeId: sensorTypeId,
                    sensor:sensor,
                    startDate: startDate,
                    endDate: endDate
                },
                success: function (data) {
                    // Parse the retrieved data and update the Chart.js chart
                    var chartData = JSON.parse(data);
                    updateChartWithData(chartData);
                },
                error: function (error) {
                    console.error('Error updating chart:', error);
                }
            });
        };

        const updateChartWithData = (chartData) => {
            var ctx = document.getElementById('sensorChart').getContext('2d');
            window.myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: chartData.map(item => item.date),
                    datasets: [{
                        label: 'Sensor Data',
                        borderColor: 'rgb(75, 192, 192)',
                        data: chartData.map(item => item.value),
                    }]
                },
                options: {
                    scales: {
                        x: {
                            type: 'time',
                            time: {
                                unit: 'day'
                            }
                        },
                        y: {
                            beginAtZero: true
                        }
                    }
                },
            
            });
        };
    </script>
</body>
</html>