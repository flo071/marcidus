<!DOCTYPE html>

<head>
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <link rel="stylesheet" href="material.css">
    <script defer src="material.js"></script>
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
                        fillColor: "rgba(124,124,220,0.2)",
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
    <a href="index.html"><button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect"> < </button></a><br><br>
    <center>
        <div class="box">
            <canvas id="lineChart" height="450" width="800"></canvas></div>
        <div class="legend">
            <p style="color: #7ddddd">Inside</p>
            <p style="color: #7d7ddd">Outside</p>
        </div>
        <div class="list">
            <table summary="Luftfeuchtigkeit" cellpadding="1" cellspacing="10">
                <thead>
                    <tr>
                        <th class="d">Day</th>
                        <th class="i">Inside</th>
                        <th class="o">Outside</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="d">1</td>
                        <td class="i">17</td>
                        <td class="o">100</td>
                    </tr>
                    <tr>
                        <td class="d">2</td>
                        <td class="i">23</td>
                        <td class="o">5</td>
                    </tr>
                    <tr>
                        <td class="d">3</td>
                        <td class="i">75</td>
                        <td class="o">65</td>
                    </tr>
                    <tr>
                        <td class="d">4</td>
                        <td class="i">32</td>
                        <td class="o">32</td>
                    </tr>
                    <tr>
                        <td class="d">5</td>
                        <td class="i">65</td>
                        <td class="o">75</td>
                    </tr>
                    <tr>
                        <td class="d">6</td>
                        <td class="i">5</td>
                        <td class="o">23</td>
                    </tr>
                    <tr>
                        <td class="d">7</td>
                        <td class="i">100</td>
                        <td class="o">17</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </center>
</body>
