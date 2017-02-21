<!DOCTYPE html>

<head>
    <link rel="stylesheet" href="styles.css">
    <title>Graphs</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="Chart.js"></script>
    <script language="JavaScript">
        function displayLineChart() {
            var data = {
                labels: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10],
                datasets: [{
                        label: "Prime and Fibonacci",
                        fillColor: "rgba(220,220,220,0.2)",
                        strokeColor: "rgba(220,220,220,1)",
                        pointColor: "rgba(220,220,220,1)",
                        pointStrokeColor: "#fff",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(220,220,220,1)",
                        data: [2, 3, 5, 7, 11, 13, 17, 19, 23, 29]
                    },
                    {
                        label: "My Second dataset",
                        fillColor: "rgba(151,187,205,0.2)",
                        strokeColor: "rgba(151,187,205,1)",
                        pointColor: "rgba(151,187,205,1)",
                        pointStrokeColor: "#fff",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(151,187,205,1)",
                        data: [0, 1, 1, 2, 3, 5, 8, 13, 21, 34]
                    }
                ]
            };
            var ctx = document.getElementById("lineChart").getContext("2d");
            var options = {};
            var lineChart = new Chart(ctx).Line(data, options);
        }
    </script>
</head>

<body onload="displayLineChart();">
  <center>
    <div class="box">
        <canvas id="lineChart" height="450" width="800"></canvas>
    </div>
  </center>
</body>
