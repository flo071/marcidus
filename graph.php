<!DOCTYPE html>

<head>
    <link rel="stylesheet" href="styles.css">
    <title>Graphs</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="Chart.js"></script>
    <script language="JavaScript">
        function displayLineChart() {
            var data = {
                labels: [1, 2, 3, 4, 5, 6, 7],
                datasets: [{
                        label: "Inside",
                        fillColor: "rgba(124,220,220,0.2)",
                        strokeColor: "rgba(124,220,220,1)",
                        pointColor: "rgba(124,220,220,1)",
                        pointStrokeColor: "#fff",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(124,220,220,1)",
                        data: [17, 23, 75, 32, 65, 5, 100]
                    },
                    {
                          label: "Outside",
                          fillColor: "rgba(124,220,220,0.2)",
                          strokeColor: "rgba(124,124,220,1)",
                          pointColor: "rgba(124,124,220,1)",
                          pointStrokeColor: "#fff",
                          pointHighlightFill: "#fff",
                          pointHighlightStroke: "rgba(124,124,220,1)",
                          data: [100, 5, 65, 32, 75, 23, 17]
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
        <canvas id="lineChart" height="450" width="800"></canvas></div>
  </center>
</body>
