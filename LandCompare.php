<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
		<meta name="viewport" content="width=device-width, initial-scale=1"/>
		<title>LandCompare</title>
		<link rel="stylesheet" href="style.css" type="text/css"/>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

	</head>
	<body>
		<div class="OutsideBox">
			<header class="custom-header">
			  <h1>Land Compare</h1>
			</header>
			<section>
				<div class="select-land">
				  <div class="land-selector">
				    <select id="dropdown1">

				    </select>
					<select id="sensors1">

					</select>
					<select id="sensor1">

					</select>
				    <div class="image-container">
				    </div>
				    <div class="value-display">
						<div class="value-div">
							<p class="value-custom">Value:</p>
							<p id="avg1"></p>
						</div>
						<div class="value-div">
							<p class="value-custom"></p>
							<p class="selected-value"></p>
						</div>
						<div class="value-div">
							<p class="value-custom"></p>
							<p class="selected-value"></p>
						</div>
						<div class="value-div">
							<p class="value-custom"></p>
							<p class="selected-value"></p>
						</div>
						<div class="value-div">
							<p class="value-custom"></p>
							<p class="selected-value"></p>
						</div>
				    </div>
				  </div>
				  <div class="land-selector">
				    <select id="dropdown2">

				    </select>
					<select id="sensors2">

					</select>
					<select id="sensor2">

					</select>
				    <div class="image-container">
				    </div>
				    <div class="value-display">
				    <div class="value-div">
				    	<p class="value-custom">Value:</p>
				    	<p id='avg2'></p>
				    </div>
				    <div class="value-div">
				    	<p class="value-custom"></p>
				    	<p class="selected-value"></p>
				    </div>
				    <div class="value-div">
				    	<p class="value-custom"></p>
				    	<p class="selected-value"></p>
				    </div>
				    <div class="value-div">
				    	<p class="value-custom"></p>
				    	<p class="selected-value"></p>
				    </div>
				    <div class="value-div">
				    	<p class="value-custom"></p>
				    	<p class="selected-value"></p>
				    </div>
				    </div>
				  </div>
				</div>
			</section>
			<footer class="dashboard-footer">
			  <button id="submitButton1">Compute For Left Land</button>
			  <button id="submitButton2">Compute For Right Land</button>
			</footer>
		</div>
		<script>
			// document.querySelectorAll('.dropdown').forEach(function(dropdown) {
			//   const selectedImage = dropdown.parentElement.querySelector('.selected-image');
			//   const selectedValue = dropdown.parentElement.querySelector('.selected-value');
			//   const valueDisplay = dropdown.parentElement.querySelector('.value-display');
			  
			//   dropdown.addEventListener('change', function() {
			//     const selectedOption = dropdown.value;
			//     if (selectedOption === 'option1') {
			//       selectedImage.src = '../img/land_1.png';
			//       selectedValue.textContent = '111';
			//     } else if (selectedOption === 'option2') {
			//       selectedImage.src = '../img/land_2.png';
			//       selectedValue.textContent = '222';
			//     }
			//     valueDisplay.style.display = 'block';
			//   });
			// });
			
			$(document).ready(function () {
            addLebelLand1();
			addLebelLand2();
			addLabelSensors1();
			addLabelSensors2();
			$("#dropdown1, #sensors1").on("change", function () {
        // Call addSensor function when the values change
			addLabelSensor1();
            });
			$("#dropdown2, #sensors2").on("change", function () {
        // Call addSensor function when the values change
			addLabelSensor2();
            });
			});
			const addLebelLand1 = () => {
            {$.post("all_lands.php",function (data)
                {
                    var selectBox1 = document.getElementById('dropdown1');
                    // Add options to the select box
                    var jsonArray = JSON.parse(data);
                    if (Array.isArray(jsonArray)) {
                    jsonArray.forEach(function(item) {
                    var option = document.createElement('option');
                    option.value = item['Land_id'];
                    option.text = item['Location'];
                    selectBox1.appendChild(option);
                    });
                  }
                  else {
                    console.log(typeof data); 
                    console.error('Data is not an array:', data);
                  }
            }
            )}
        }
		const addLebelLand2 = () => {
            {$.post("all_lands.php",function (data)
                {
                    var selectBox1 = document.getElementById('dropdown2');
                    // Add options to the select box
                    var jsonArray = JSON.parse(data);
                    if (Array.isArray(jsonArray)) {
                    jsonArray.forEach(function(item) {
                    var option = document.createElement('option');
                    option.value = item['Land_id'];
                    option.text = item['Location'];
                    selectBox1.appendChild(option);
                    });
                  }
                  else {
                    console.log(typeof data); 
                    console.error('Data is not an array:', data);
                  }
            }
            )}
        }
		const addLabelSensors1 = () => {
            {$.post("getSensors.php",function (data)
                {
                    var selectBox = document.getElementById('sensors1');
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
		const addLabelSensors2 = () => {
            {$.post("getSensors.php",function (data)
                {
                    var selectBox = document.getElementById('sensors2');
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
		const addLabelSensor1 = () => {
            const Land = document.getElementById('dropdown1').value;
            const Sensor = document.getElementById('sensors1').value;
            console.log(Land);
            console.log(Sensor);
            $.post("getSensor.php", { Land: Land, Sensor: Sensor }, function (data) {
                var selectBox = document.getElementById('sensor1');
                // Add options to the select box
                data.forEach(function (item) {
                    var option = document.createElement('option');
                    option.value = item['Sensor_id'];
                    option.text = item['Location'];
                    selectBox.appendChild(option);
                });
            });
        };
		const addLabelSensor2 = () => {
            const Land = document.getElementById('dropdown2').value;
            const Sensor = document.getElementById('sensors2').value;
            console.log(Land);
            console.log(Sensor);
            $.post("getSensor.php", { Land: Land, Sensor: Sensor }, function (data) {
                var selectBox = document.getElementById('sensor2');
                // Add options to the select box
                data.forEach(function (item) {
                    var option = document.createElement('option');
                    option.value = item['Sensor_id'];
                    option.text = item['Location'];
                    selectBox.appendChild(option);
                });
            });
        };
document.querySelectorAll('.dropdown').forEach(function(dropdown) {
  const selectedImage = dropdown.parentElement.querySelector('.selected-image');
  const selectedValues = dropdown.parentElement.querySelectorAll('.selected-value');

  dropdown.addEventListener('change', function() {
    const selectedOption = dropdown.value;
    const options = dropdown.querySelectorAll('option');
    options.forEach(function(option, index) {
      if (option.value === selectedOption) {
        if (index === 0) {
          selectedImage.src = '../img/land_1.png';
        } else if (index === 1) {
          selectedImage.src = '../img/land_2.png';
        }

        selectedValues.forEach(function(value) {
          if (index === 0) {
            value.textContent = '111';
          } else if (index === 1) {
            value.textContent = '222';
          }
        });
      }
    });
    valueDisplay.style.display = 'block';
  });
});


$("#submitButton1").click(function () {
            // Get the selected values from the dropdowns
            var optionValue = $("#dropdown1").val();
            var chartTypeValue = $("#sensors1").val();
			var chart = $("#sensor1").val();
            // Construct the query
            var query = "SELECT avg(value) FROM sensordata JOIN sensors ON sensordata.Sensor_id = sensors.Sensor_id WHERE sensors.Land_id";

            // Append the selected values to the query (adjust the query based on your needs)
            if (optionValue) {
                query += "  = '" + optionValue + "'";
            }

            if (chartTypeValue) {
                query += "and sensors.Sensor_typeid=" + chartTypeValue;
            }
			if(chart)
			{
				query += " and sensors.Sensor_id=" + chart;
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
                    var avgElement = document.getElementById('avg1');
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
		$("#submitButton2").click(function () {
            // Get the selected values from the dropdowns
            var optionValue = $("#dropdown2").val();
            var chartTypeValue = $("#sensors2").val();
			var chart = $("#sensor2").val();
            // Construct the query
            var query = "SELECT avg(value) FROM sensordata JOIN sensors ON sensordata.Sensor_id = sensors.Sensor_id WHERE sensors.Land_id";

            // Append the selected values to the query (adjust the query based on your needs)
            if (optionValue) {
                query += "  = '" + optionValue + "'";
            }

            if (chartTypeValue) {
                query += "and sensors.Sensor_typeid=" + chartTypeValue;
            }
			if(chart)
			{
				query += " and sensors.Sensor_id=" + chart;
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
                    var avgElement = document.getElementById('avg2');
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
		</script>
	</body>
</html>