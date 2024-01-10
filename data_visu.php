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
<body>
    <div class="col-md-12 my-5 d-flex justify-content-center">
        <h1 style="text-align: center;" class="custom-header">Data Visualization</h1>
    </div>

    <div class="col-md-12 select-custom-visu" style="text-align: center;">
        <label for="mySelect" style="margin-right: 10px;" class="label-custom">Select a Land:</label>
        <select id="mySelect" style="margin-right: 20px;" class="dropdown-custom"></select>

        <label for="mySelect1" style="margin-right: 10px;" class="label-custom">Select a Sensor Type:</label>
        <select id="mySelect1" class="dropdown-custom"></select>

        <label for="startDate">Start Date:</label>
        <input type="date" id="startDate" name="startDate" required>

        <label for="endDate">End Date:</label>
        <input type="date" id="endDate" name="endDate" required>

        <button onclick="updateChart()">Update Chart</button>
    </div>

    <canvas id="sensorChart" width="400" height="200"></canvas>

    <script>
        $(document).ready(function () {
            addLabelLand();
            addLabelSensor();
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

        const updateChart = () => {
            // Retrieve selected options and date range
            var landId = document.getElementById('mySelect').value;
            var sensorTypeId = document.getElementById('mySelect1').value;
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
                }
            });
        };
    </script>
</body>
</html>
