<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Chart.js Histogram</title>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/simple-statistics@7.1.1/dist/simple-statistics.min.js"></script>

  <style>
    canvas {
      -moz-user-select: none;
      -webkit-user-select: none;
      -ms-user-select: none;
    }
  </style>
</head>
<body>
  <canvas id="histogramChart" width="400" height="400"></canvas>

  <script>
    // Sample data (replace this with your data)

// Make sure 'simple-statistics' is included before this script

fetch('getData.php')
  .then(response => response.json())
  .then(data => {
    // Assign the fetched data to the global variable
    var globalData = data;
    console(globalData);
    createChart(globalData);
  })
  .catch(error => {
    console.error('Error:', error);
  });

// You can access globalData outside of the fetch function
function createChart(globalData) {
  var P = [];
  var N = [];
  for (var i in globalData) {
    P.push(globalData[i].P);
    N.push(globalData[i].N);
  }

  // Calculate mean and standard deviation using simple-statistics

  var stdDev = ss.standardDeviation(P);

  // Create an array of x values for the normal distribution
  var xValues = Array.from({ length: 100 }, (_, i) => mean - 3 * stdDev + (i / 100) * 6 * stdDev);

  // Calculate corresponding y values for the normal distribution
  var yValues = xValues.map(x => ss.normalDistribution(mean, stdDev)(x));

  // Create histogram chart
  var ctx = document.getElementById('histogramChart').getContext('2d');
  var histogramChart = new Chart(ctx, {
    type: 'line', // Use line type for normal distribution
    data: {
      labels: xValues,
      datasets: [{
        label: 'Normal Distribution',
        data: yValues,
        fill: false,
        borderColor: 'rgba(75, 192, 192, 1)',
        borderWidth: 2
      }]
    },
    options: {
      scales: {
        x: {
          type: 'linear',
          position: 'bottom'
        },
        y: {
          beginAtZero: true
        }
      }
    }
  });
}

  </script>
</body>
</html>
