<!DOCTYPE html>

<?php
$link= mysqli_connect("localhost","root","mysql","Luftfeuchtigkeit");
mysqli_set_charset($link,"utf8");
$sql = "SELECT sta_name, sen_id, mk_einheit, md_messwert, md_timestamp
  FROM tbl_standort, tbl_messkat, tbl_sensoren, tbl_messdaten
  WHERE md_sen_id_fk = sen_id
  AND sta_id = sen_sta_id_fk
  AND mk_id = md_mk_id_fk";
$result = mysqli_query($link,$sql);

$i=0;
$chart_labels = "labels: [";
while($row=mysqli_fetch_array($result))
{
  $i++;
  $md_data[$row["sta_name"]][$row["sen_id"]] .= $row["md_messwert"].',';
  $chart_labels .= "'".date('Y-m-d H:i', round(strtotime($row["md_timestamp"])/600)*600)."',";
}




$chart_labels = rtrim($chart_labels, ',');
$chart_labels .= "]";


$chart_data = "datasets: [";
$r = 0;
$g = 150;
$b = 100;

foreach ($md_data as $sta_name => $sen_id)
{
  foreach ($sen_id as $key => $value)
  {
    $color = $r.','.$g.','.$b;
          $chart_data .= '{label: "'.$key.'",';
          $chart_data .= 'fillColor: "rgba('.$color.', 0.2)",';
          $chart_data .= 'strokeColor: "rgb('.$color.')",';
          $chart_data .= 'pointColor: "rgba('.$color.',1)",';
          $chart_data .= 'pointStrokeColor: "#fff",';
          $chart_data .= 'pointHighlightFill: "#fff",';
          $chart_data .= 'pointHighlightStroke: "rgba(124,220,220,1)",';
          $chart_data .= 'data: ['.rtrim($value,',').']},';
        $r = $r+10;
        //$g = $g+25;
        $b = $b+60;
        if ($r > 250) $r = 50;
        if ($g > 250) $g = 150;
        if ($b > 250) $b = 0;
  }
}
$chart_data = rtrim($chart_data, ',');

$chart_data .= "]";

?>
<head>
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <link rel="stylesheet" href="material.css">
    <script defer src="material.js"></script>
    <title>Graphs</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8" />
    <script src="Chart.js"></script>
    <link href="icons.css" rel="stylesheet">
</head>

<body onload="displayLineChart();">
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer
          mdl-layout--fixed-header">
        <header class="mdl-layout__header">
            <div class="mdl-layout__header-row">
                <div class="mdl-layout-spacer"></div>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable
                mdl-textfield--floating-label mdl-textfield--align-right">
                    <label class="mdl-button mdl-js-button mdl-button--icon" for="fixed-header-drawer-exp">
        <i class="material-icons">search</i>
      </label>
                    <div class="mdl-textfield__expandable-holder">
                        <input class="mdl-textfield__input" type="text" name="sample" id="fixed-header-drawer-exp">
                    </div>
                </div>
            </div>
        </header>
        <div class="mdl-layout__drawer">
            <a class="mdl-layout-title" href="index.html"><img src="favicon.ico" alt="Icon" width="25" height="25">Marcidus</a>
            <nav class="mdl-navigation">
                <a class="mdl-navigation__link" href="hardware.html">Hardware &amp; Software</a>
                <a class="mdl-navigation__link" href="graph.php">Graph</a>
                <a class="mdl-navigation__link" href="create.html">Creators</a>
            </nav>
        </div>
        <main class="mdl-layout__content">
            <div class="page-content">
                <center>
                    <div class="box">
                        <canvas id="lineChart" height="250" width="500"></canvas></div>
                    <script language="JavaScript">
                        function displayLineChart() {
                            var data = {
                                <?php echo $chart_labels; ?>,
                                <?php echo $chart_data; ?>
                            };
                            var ctx = document.getElementById("lineChart").getContext("2d");
                            var options = {};
                            var lineChart = new Chart(ctx).Line(data, options);
                        }

                    </script>
                    <div class="list">
                        <table border="1">
                            <tr>
                                <td>Time</td>
                                <td>Location</td>
                                <td>Value</td>
                                <td>Unit</td>
                            </tr>
                            <?php
                      $link= mysqli_connect("localhost","root","mysql","Luftfeuchtigkeit");
                      mysqli_set_charset($link,"utf8");
                      $sql = "SELECT sta_name, sen_id, mk_einheit, md_messwert, md_timestamp
                              FROM tbl_standort, tbl_messkat, tbl_sensoren, tbl_messdaten
                              WHERE md_sen_id_fk = sen_id
                              AND sta_id = sen_sta_id_fk
                              AND mk_id = md_mk_id_fk";
                      $result = mysqli_query($link,$sql);

                      while($row=mysqli_fetch_array($result))
                  		{
                        echo "<tr>";
                        echo "<td>";
                        echo date('Y-m-d H:i', round(strtotime($row["md_timestamp"])/600)*600);
                        echo "</td>";
                        echo "<td>".$row["sta_name"]."</td>";
                        echo "<td>".$row["md_messwert"]."</td>";
                        echo "<td>".$row["mk_einheit"]."</td>";
                        echo "</tr>";
                  		}
                    ?>
                        </table>
                    </div>

                </center>
            </div>
        </main>
    </div>
</body>
