<?php
    include('koneksi.php');
    $india = mysqli_query($koneksi, "select * from tb_covid where country='India'");
    $korsel = mysqli_query($koneksi, "select * from tb_covid where country='Korea Selatan'");
    $turkey = mysqli_query($koneksi, "select * from tb_covid where country='Turkey'");
    $vietnam = mysqli_query($koneksi, "select * from tb_covid where country='Vietnam'");
    $japan = mysqli_query($koneksi, "select * from tb_covid where country='Japan'");
    $iran = mysqli_query($koneksi, "select * from tb_covid where country='Iran'");
    $indo = mysqli_query($koneksi, "select * from tb_covid where country='Indonesia'");
    $malay = mysqli_query($koneksi, "select * from tb_covid where country='Malaysia'");
    $thai = mysqli_query($koneksi, "select * from tb_covid where country='Thailand'");
    $israel = mysqli_query($koneksi, "select * from tb_covid where country='Israel'");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Grafik Data Covid</title>
    <script src="Chart.js"></script>
    <style>
        .container {
            width: 1400px;
            height: 625px;
            }
    </style>
</head>

<body>
    <center><h2>Grafik Data Covid</h2></center>
    <div class="container">
        <canvas id="linechart" width="100" height="100"></canvas>
    </div>

</body>
</html>

<script  type="text/javascript">
var ctx = document.getElementById("linechart").getContext("2d");
var data = {
            labels: ["New Case","Total Death","New Death","Total Recover","New Recover"],
            datasets: [
                {
                    label: "India",
                    fill: false,
                    lineTension: 0.1,
                    backgroundColor: "#FF007F",
                    borderColor: "#FF007F",
                    pointHoverBackgroundColor: "#FF007F",
                    pointHoverBorderColor: "#FF007F",
                    data: [<?php while ($p = mysqli_fetch_array($india)) { echo '"' . $p['new_cases'] . '","' . $p['total_deaths'] . '","' . $p['new_deaths'] . '","' . $p['total_recoverd'] . '","' . $p['new_recovered'] . '",';}?>]
                },
                {
                    label: "Korea Selatan",
                    fill: false,
                    lineTension: 0.1,
                    backgroundColor: "#800000",
                    borderColor: "#800000",
                    pointHoverBackgroundColor: "#800000",
                    pointHoverBorderColor: "#800000",
                    data: [<?php while ($p = mysqli_fetch_array($korsel)) { echo '"' . $p['new_cases'] . '","' . $p['total_deaths'] . '","' . $p['new_deaths'] . '","' . $p['total_recoverd'] . '","' . $p['new_recovered'] . '",';}?>]
                },
                {
                    label: "Turkey",
                    fill: false,
                    lineTension: 0.1,
                    backgroundColor: "#FF7F00",
                    borderColor: "#FF7F00",
                    pointHoverBackgroundColor: "#FF7F00",
                    pointHoverBorderColor: "##FF7F00",
                    data: [<?php while ($p = mysqli_fetch_array($turkey)) { echo '"' . $p['new_cases'] . '","' . $p['total_deaths'] . '","' . $p['new_deaths'] . '","' . $p['total_recoverd'] . '","' . $p['new_recovered'] . '",';}?>]
                },
                {
                    label: "Vietnam",
                    fill: false,
                    lineTension: 0.1,
                    backgroundColor: "#808000",
                    borderColor: "#808000",
                    pointHoverBackgroundColor: "#808000",
                    pointHoverBorderColor: "#808000",
                    data: [<?php while ($p = mysqli_fetch_array($vietnam)) { echo '"' . $p['new_cases'] . '","' . $p['total_deaths'] . '","' . $p['new_deaths'] . '","' . $p['total_recoverd'] . '","' . $p['new_recovered'] . '",';}?>]
                },
                {
                    label: "Japan",
                    fill: false,
                    lineTension: 0.1,
                    backgroundColor: "#808080",
                    borderColor: "#808080",
                    pointHoverBackgroundColor: "#808080",
                    pointHoverBorderColor: "#808080",
                    data: [<?php while ($p = mysqli_fetch_array($japan)) { echo '"' . $p['new_cases'] . '","' . $p['total_deaths'] . '","' . $p['new_deaths'] . '","' . $p['total_recoverd'] . '","' . $p['new_recovered'] . '",';}?>]
                },
                {
                    label: "Iran",
                    fill: false,
                    lineTension: 0.1,
                    backgroundColor: "#FFC0CB",
                    borderColor: "#FFC0CB",
                    pointHoverBackgroundColor: "#FFC0CB",
                    pointHoverBorderColor: "#FFC0CB",
                    data: [<?php while ($p = mysqli_fetch_array($iran)) { echo '"' . $p['new_cases'] . '","' . $p['total_deaths'] . '","' . $p['new_deaths'] . '","' . $p['total_recoverd'] . '","' . $p['new_recovered'] . '",';}?>]
                },
                {
                    label: "Indonesia",
                    fill: false,
                    lineTension: 0.1,
                    backgroundColor: "#F87474",
                    borderColor: "#F87474",
                    pointHoverBackgroundColor: "#F87474",
                    pointHoverBorderColor: "#F87474",
                    data: [<?php while ($p = mysqli_fetch_array($indo)) { echo '"' . $p['new_cases'] . '","' . $p['total_deaths'] . '","' . $p['new_deaths'] . '","' . $p['total_recoverd'] . '","' . $p['new_recovered'] . '",';}?>]
                },
                {
                    label: "Malaysia",
                    fill: false,
                    lineTension: 0.1,
                    backgroundColor: "#000080",
                    borderColor: "#000080",
                    pointHoverBackgroundColor: "#000080",
                    pointHoverBorderColor: "#000080",
                    data: [<?php while ($p = mysqli_fetch_array($malay)) { echo '"' . $p['new_cases'] . '","' . $p['total_deaths'] . '","' . $p['new_deaths'] . '","' . $p['total_recoverd'] . '","' . $p['new_recovered'] . '",';}?>]
                },
                {
                    label: "Thailand",
                    fill: false,
                    lineTension: 0.1,
                    backgroundColor: "#FFA07A",
                    borderColor: "#FFA07A",
                    pointHoverBackgroundColor: "#FFA07A",
                    pointHoverBorderColor: "#FFA07A",
                    data: [<?php while ($p = mysqli_fetch_array($thai)) { echo '"' . $p['new_cases'] . '","' . $p['total_deaths'] . '","' . $p['new_deaths'] . '","' . $p['total_recoverd'] . '","' . $p['new_recovered'] . '",';}?>]
                },
                {
                    label: "Israel",
                    fill: false,
                    lineTension: 0.1,
                    backgroundColor: "#000000",
                    borderColor: "#000000",
                    pointHoverBackgroundColor: "#000000",
                    pointHoverBorderColor: "#000000",
                    data: [<?php while ($p = mysqli_fetch_array($israel)) { echo '"' . $p['new_cases'] . '","' . $p['total_deaths'] . '","' . $p['new_deaths'] . '","' . $p['total_recoverd'] . '","' . $p['new_recovered'] . '",';}?>]
                }
                ]
        };

var myBarChart = new Chart(ctx, {
            type: 'line',
            data: data,
            options: {
            responsive:true,
            maintainAspectRatio: false,
            legend: {
            display: true
            },
            barValueSpacing: 10,
            scales: {
            yAxes: [{
                ticks: {
                    min: 0,
                }
            }],
            xAxes: [{
                    gridLines: {
                        color: "rgba(0, 0, 0, 0)",
                        }
                    }]
            }
        }
        });
</script>