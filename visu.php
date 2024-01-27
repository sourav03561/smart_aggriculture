<!DOCTYPE html>
<html>
		<head>
			<meta charset="UTF-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
			<meta name="viewport" content="width=device-width, initial-scale=1"/>
			<title>DataAnalysis</title>
			<link rel="stylesheet" href="../css/style.css" type="text/css"/>
			<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
			<style>
	*{
		margin: 0px;
		padding: 0px;
		font-family: "arial black";
	}
	body{
		width: 100%;
		height: 100%;
		display: flex;
		justify-content: space-between;
	/* 	background-color: plum; */
	}
	
	/* login register */
	.leftBox{
		flex: 0 0 43%;
		float: left;
		background-color:rgb(92,230,29);
	}
	.rightBox{
		flex: 0 0 57%;
		height: 100vh;
		float: right;
		/* background-color: aliceblue; */
	}
	
	.form-container{
		padding: 50px;
		display: flex;
		justify-content: center;
		align-items: center;
	
	}
	.img-container{
		flex: 1;
		display: flex;
		justify-content: center;
		align-items: center;
		overflow: hidden;
		background-color: white;
	}
	.img-container img{
		max-width: 100%;
		max-height: 100%;
		width: auto;
	}
	.title{
		text-align: center;
		color: white;
	}
	.text{
		text-align: left;
		color: white;
	}
	p.text{
		font-size: 15px;
		font-weight: 600;
		font-family: Arial, Helvetica, sans-serif;
		margin:10;
	}
	.content{
		padding-left: 3px;
		font-size: 15px;
		font-weight: 600;
		font-family: Arial, Helvetica, sans-serif;
		text-align: left;
		color: white;
		margin:0;
		
		
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
		display: flex;
	}
/* 	.custom-row-visu{
		display: flex;
		justify-content: center;
		align-items: center;
		flex-wrap: wrap;
	} */
	        </style>
		</head>
		<body>
	    <div class="leftContainer">
				<div class="navbar">
					<img src="logo.png"/>
					<a href="home.php" target="contentFrame">Home</a>
					<a href="AboutUs.html" target="contentFrame">About Us</a>
					<a href="LandCompare.php" target="contentFrame">Profile</a>
					<a href="signout.php">Sign out</a>
				</div>
	    <div class="container-fluid w-75" style="margin: auto;">
	    <div class="row custom-row-visu">
	        <div class="col-md-12 my-5 d-flex justify-content-center">
	            <h1 style="text-align: center;" class="custom-header">Data Filterization</h1>
	        </div>
	
	        <div class="col-md-12 select-custom-visu" style="text-align: center;">
	            <label for="mySelect" style="margin-right: 10px;" class="label-custom">Select an Land:</label>
	            <select id="mySelect" style="margin-right: 20px;" class="dropdown-custom"></select>
	        
	            <label for="mySelect1" style="margin-right: 10px;" class="label-custom">Select a sensor Type:</label>
	            <select id="mySelect1" class="dropdown-custom"></select>

				<label for="mySelect2" style="margin-right: 10px;" class="label-custom">Select a Sensors:</label>
        		<select id="mySelect2" class="dropdown-custom"></select>
	        </div>
	        
	        <div style="display: flex; justify-content: center; align-items: center; text-align: center;">
	            <div style="margin-right: 10px;">
	                <button id="submitButton" class="button-visu">Avg</button>
	            </div>
	            <div style="margin-right: 10px;">
	                <button id="submitButton1" class="button-visu">Max</button>
	            </div>
	            <div>
	                <button id="submitButton2" class="button-visu">Min</button>
	            </div>
	        </div>

	        <h1 id='avg'></h1>
	        <div></div>
	        <div class="col-md-12 d-inline-flex justify-content-center align-items-center" >
	            <canvas id="graph" width="150px" height="150px" style="margin-bottom: 20px;position:absolute;margin-top:410px;left: 190px;"></canvas>
	            <canvas id="graph1" width="150px" height="150px"style="margin-bottom: 20px;position:absolute;margin-top:410px;left: 190px;"></canvas>
	            <canvas id="graph2" width="150px" height="150px"style="margin-bottom: 20px;position:absolute;margin-top:410px;left: 190px;"></canvas>
	            <canvas id="graph3" width="150px" height="150px" style="margin-bottom: 20px;position:absolute;margin-top:410px;left: 190px;"></canvas>
	        </div>
	        
	    </div>
	</div>
	</div>
	<div class="rightContainer">
				<h1 class="dashboard-title">Harvesting<br />Tomorrow</h1>
				<h1 class="dashboard-title">Smart<br />Agriculture</h1>
				<h1 class="dashboard-title">Sensor<br />Solutions</h1>
			</div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js" integrity="sha512-ElRFoEQdI5Ht6kZvyzXhYG9NqjtkmlkfYk0wr6wHxU9JEHakS7UJZNeml5ALk+8IKlU6jDgMabC3vkumRokgJA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        
        $(document).ready(function () {
            addLebelLand();
            addLabelSensor();
			$("#mySelect, #mySelect1").on("change", function () {
        // Call addSensor function when the values change
            addSensor();
            });
            addSensor();
            $("#submitButton").click(function () {
            // Get the selected values from the dropdowns
            var optionValue = $("#mySelect").val();
            var chartTypeValue = $("#mySelect1").val();

            // Construct the query
            var query = "SELECT avg(value) FROM sensordata JOIN sensors ON sensordata.Sensor_id = sensors.Sensor_id WHERE sensors.Land_id";

            // Append the selected values to the query (adjust the query based on your needs)
            if (optionValue) {
                query += "  = '" + optionValue + "'";
            }

            if (chartTypeValue) {
                query += "and sensors.Sensor_typeid=" + chartTypeValue;
            }

            // Now you can use the 'query' variable to send to the server or perform other actions
            console.log("Final Query: ", query);

            // Example: You can send the query to the server using AJAX
             $.ajax({
                 url: 'your_php_script.php',
                 method: 'POST',
                 data: { query: query },
                success: function(response) {
                    // Handle the server response
                    var avgElement = document.getElementById('avg');
                    console.log(response);
                      var jsonObject = JSON.parse(response);
                      var jsonArray = response;

                      // Extract the value
                      var avgValue = jsonObject[0]["avg(value)"];

                      // Convert the value to a number if needed
                      var numericValue = parseFloat(avgValue);
                      avgElement.innerText = numericValue.toFixed(2);
                      // Use the extracted value
                      console.log(numericValue);
                 },
                error: function(error) {
                     console.error(error);
                }
             });
        });
        




        $("#submitButton1").click(function () {
            // Get the selected values from the dropdowns
            var optionValue = $("#mySelect").val();
            var chartTypeValue = $("#mySelect1").val();
			var sensor = $("#mySelect2").val();
            // Construct the query
            var query = "SELECT max(value) FROM sensordata JOIN sensors ON sensordata.Sensor_id = sensors.Sensor_id WHERE sensors.Land_id";

            // Append the selected values to the query (adjust the query based on your needs)
            if (optionValue) {
                query += "  = '" + optionValue + "'";
            }

            if (chartTypeValue) {
                query += " and sensors.Sensor_typeid=" + chartTypeValue;
            }
			if(sensor)
			{
				query += " and sensors.Sensor_id=" + sensor;
			}

            // Now you can use the 'query' variable to send to the server or perform other actions
            console.log("Final Query: ", query);

            // Example: You can send the query to the server using AJAX
             $.ajax({
                 url: 'your_php_script.php',
                 method: 'POST',
                 data: { query: query },
                success: function(response) {
                    // Handle the server response
                    var avgElement = document.getElementById('avg');
                    console.log(response);
                      var jsonObject = JSON.parse(response);
                      var jsonArray = response;

                      // Extract the value
                      var maxValue = jsonObject[0]["max(value)"];

                      // Convert the value to a number if needed
                      var numericValue = parseFloat(maxValue);
                      avgElement.innerText = numericValue.toFixed(2);
                      // Use the extracted value
                      console.log(numericValue);
                 },
                error: function(error) {
                     console.error(error);
                }
             });
        });




        $("#submitButton2").click(function () {
            // Get the selected values from the dropdowns
            var optionValue = $("#mySelect").val();
            var chartTypeValue = $("#mySelect1").val();

            // Construct the query
            var query = "SELECT min(value) FROM sensordata JOIN sensors ON sensordata.Sensor_id = sensors.Sensor_id WHERE sensors.Land_id";

            // Append the selected values to the query (adjust the query based on your needs)
            if (optionValue) {
                query += "  = '" + optionValue + "'";
            }

            if (chartTypeValue) {
                query += "and sensors.Sensor_typeid=" + chartTypeValue;
            }

            // Now you can use the 'query' variable to send to the server or perform other actions
            console.log("Final Query: ", query);

            // Example: You can send the query to the server using AJAX
             $.ajax({
                 url: 'your_php_script.php',
                 method: 'POST',
                 data: { query: query },
                success: function(response) {
                    // Handle the server response
                    var avgElement = document.getElementById('avg');
                    console.log(response);
                      var jsonObject = JSON.parse(response);
                      var jsonArray = response;

                      // Extract the value
                      var minValue = jsonObject[0]["min(value)"];

                      // Convert the value to a number if needed
                      var numericValue = parseFloat(minValue);
                      avgElement.innerText = numericValue.toFixed(2);
                      // Use the extracted value
                      console.log(numericValue);
                 },
                error: function(error) {
                     console.error(error);
                }
             });
        });
        });
       
    var selectedValue=null;
    document.getElementById('mySelect').addEventListener('change', function() {
    selectedValue = this.value;
    //showGraph(selectedValue);
    destroyCharts();
    });
    document.getElementById('mySelect1').addEventListener('change', function() {
    //showGraph(selectedValue);
    destroyCharts();
    });
    const addLebelLand = () => {
            {$.post("all_lands.php",function (data)
                {
                    var selectBox = document.getElementById('mySelect');
                    // Add options to the select box
                    var jsonArray = JSON.parse(data);
                    if (Array.isArray(jsonArray)) {
                    jsonArray.forEach(function(item) {
                    var option = document.createElement('option');
                    option.value = item['Land_id'];
                    option.text = item['Location'];
                    selectBox.appendChild(option);
                    console.log(selectBox.value);
                    });
                  }
                  else {
                    console.log(typeof data); 
                    console.error('Data is not an array:', data);
                  }
            }
            )}
        }
        const addLabelSensor = () => {
            {$.post("getSensors.php",function (data)
                {
                    var selectBox = document.getElementById('mySelect1');
                    // Add options to the select box
                    
                    data.forEach(function(item) {
                    var option = document.createElement('option');
                    option.value = item['Sensortype_id'];
                    option.text = item['Typename'];
                    selectBox.appendChild(option);
                    console.log(selectBox.value);
                    });
                 
            }
            )}
        }

       /* function destroyCharts(...chartIds) {
            chartIds.forEach(chartId => {
                var existingChart = Chart.getChart(chartId);
                if (existingChart) {
                    existingChart.destroy();
                }
            });
        }


        const showGraph = (userInputValue) => {
            {
                $.post("getResult.php",function (data)
                {
                    var selectBox = document.getElementById('mySelect');
                    var selectedValue = selectBox.value; 
                    var selectBox1 = document.getElementById('mySelect1');
                    var selectedValue1 = selectBox1.value; 
                    var P = [];
                    var N = [];
                    var K = [];
                    var temp = [];
                    var humidity = [];
                    var ph = [];
                    var rain = [];

                    data = data.filter(data=>data['label']==userInputValue);
                    console.log(data)
                    

                    for (var i in data) {
                        
                        P.push(parseInt(data[i].P, 10));
                        N.push(data[i].N);
                        K.push(data[i].K);
                        temp.push(data[i].temperature);
                        humidity.push(data[i].humidity);
                        ph.push(data[i].ph);
                        rain.push(data[i].rainfall);
                        
                    }

                    destroyCharts('graph', 'graph1', 'graph2', 'graph3');

                        // Function to group data into ranges

                    var bins_N = [0, 10, 20, 30, 40, 50, 60,80,90,100];
                    var binCounts_N = Array.from({ length: bins_N.length - 1 }, () => 0);

                    N.forEach(value => {
                    for (let i = 0; i < bins_N.length - 1; i++) {
                            if (value >= bins_N[i] && value < bins_N[i + 1]) {
                            binCounts_N[i]++;
                            break;
                    }
                    }
                    });



                    var bins_P = [0, 10, 20, 30, 40, 50, 60];
                    var binCounts_P = Array.from({ length: bins_P.length - 1 }, () => 0);
                        P.forEach(value => {
                        for (let i = 0; i < bins_P.length - 1; i++) {
                            if (value >= bins_P[i] && value < bins_P[i + 1]) {
                            binCounts_P[i]++;
                            break;
                        }
                    }
                });



                var bins_ph = [0, 7, 14];
                var binCounts_ph = Array.from({ length: bins_ph.length - 1 }, () => 0);

                ph.forEach(value => {
                for (let i = 0; i < bins_ph.length - 1; i++) {
                if (value >= bins_ph[i] && value < bins_ph[i + 1]) {
                binCounts_ph[i]++;
                break;
                }
                    }
                });
                var bins_temp = [0, 10, 20, 30, 40];
                var binCounts_temp = Array.from({ length: bins_temp.length - 1 }, () => 0);

                temp.forEach(value => {
                for (let i = 0; i < bins_temp.length - 1; i++) {
                if (value >= bins_temp[i] && value < bins_temp[i + 1]) {
                binCounts_temp[i]++;
                break;
                }
                    }
                });



                if(selectedValue1=='temp')
                {
                var ctx3 = document.getElementById('graph3').getContext('2d');
                
                var myChart = new Chart(ctx3, {
                type: 'bar',
                data: {
                labels: bins_temp.slice(0, -1).map((start, index) => `${start}-${bins_temp[index + 1]}`),
                datasets: [{
                    label: 'temp',
                    data: binCounts_temp,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
                },
        options: {
            maintainAspectRatio: false,
            scales: {
                y: {
                beginAtZero: true
                }
                }
            }
            });
                }

                if(selectedValue1=='PH')
                {
                var ctx2 = document.getElementById('graph2').getContext('2d');
                console.log(binCounts_ph)
// Create the chart
                var myChart = new Chart(ctx2, {
                type: 'bar',
                data: {
                labels: bins_ph.slice(0, -1).map((start, index) => `${start}-${bins_ph[index + 1]}`),
                datasets: [{
                    label: 'PH',
                    data: binCounts_ph,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
                },
        options: {
            maintainAspectRatio: false,
            scales: {
                y: {
                beginAtZero: true
                }
                }
            }
            });
            }
            if(selectedValue1=='N')
                {
                var ctx1 = document.getElementById('graph1').getContext('2d');

                // Create the chart
                var myChart = new Chart(ctx1, {
                type: 'bar',
                data: {
                labels: bins_N.slice(0, -1).map((start, index) => `${start}-${bins_N[index + 1]}`),
                datasets: [{
                label: 'N',
                data: binCounts_N,
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
                }]
                },
                options: {
                maintainAspectRatio: false,
                scales: {
                y: {
                beginAtZero: true
                }
                }
                }
                });
            }
            if(selectedValue1=='P')
                {
                // Get the canvas element
                var ctx = document.getElementById('graph').getContext('2d');

                // Create the chart
                var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                labels: bins_P.slice(0, -1).map((start, index) => `${start}-${bins_P[index + 1]}`),
                datasets: [{
                label: 'P',
                data: binCounts_P,
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
                }]
                },
                options: {
                maintainAspectRatio: false,
                scales: {
                y: {
                beginAtZero: true
                }
                }
                }
                });
            }
                

                
                });

               
                }
            }
        
        */
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
    </script>
</body>
</html>