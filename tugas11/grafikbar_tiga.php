<?php
include('koneksi.php');
$label = ["India","Korea Selatan","Turkey","Vietnam","Japan","Iran","Indonesia","Malaysia","Thailand","Indonesia"];

for($id = 1;$id <= 10;$id++)
{
    $query = mysqli_query($koneksi,"select sum(total_deaths) as total_deaths from tb_covid where id_country='$id'");
	$row = $query->fetch_array();
	$jumlah_meninggal[] = $row['total_deaths'];
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Grafik Data Meninggal</title>
	<script type="text/javascript" src="Chart.js"></script>
	<style>
       #canvas-holder{
                width: 50%;
                margin: 15px auto;
            }
    </style>
</head>
<body>
<center><h3>Grafik Data Meninggal</h3></center>
	<div id="canvas-holder" style="width: 800px;height: 800px">
		<canvas id="myChart"></canvas>
	</div>
    <script>
		var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: <?php echo json_encode($label); ?>,
				datasets: [
                {
                    label: 'Jumlah Meninggal',
                    backgroundColor: 'brown',
					data: <?php echo json_encode($jumlah_meninggal); ?>,
					borderWidth: 1
                }]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
	</script>
</body>
</html>

	