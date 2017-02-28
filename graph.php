<!DOCTYPE html>

<head>
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <link rel="stylesheet" href="material.css">
    <script defer src="material.js"></script>
    <title>Graphs</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8"/>
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
          <table border="1">
            <tr>
              <td>Time</td>
              <td>Location</td>
              <td>Sensor ID</td>
              <td>Inside</td>
              <td>Outside</td>
              <td>Unit</td>
            </tr>
            <?php
              $link= mysqli_connect("localhost","root","mysql","Luftfeuchtigkeit");
              mysqli_set_charset($link,"utf8");
              $sql = "SELECT sta_name, sen_id, mk_einheit, md_messwert_i, md_messwert_o, md_timestamp
FROM tbl_standort, tbl_messkat, tbl_sensoren, tbl_messdaten
WHERE md_sen_id_fk = sen_id
AND sta_id = sen_sta_id_fk
AND mk_id = md_mk_id_fk";
              $result = mysqli_query($link,$sql);

              while($row=mysqli_fetch_array($result))
          		{
                echo "<tr>";
                echo "<td>".$row["md_timestamp"]."</td>";
                echo "<td>".$row["sta_name"]."</td>";
                echo "<td>".$row["sen_id"]."</td>";
                  echo "<td>".$row["md_messwert_i"]."</td>";
                //echo "<br>";
                echo "<td>".$row["md_messwert_o"]."</td>";
                echo "<td>".$row["mk_einheit"]."</td>";
                //echo "<br>";
                echo "</tr>";
          		}
            ?>
          </table>
        </div>
    </center>
</body>
