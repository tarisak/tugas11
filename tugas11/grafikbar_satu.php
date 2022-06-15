<?php
include('koneksi.php');
$label = ["India","Korea Selatan","Turkey","Vietnam","Japan","Iran","Indonesia","Malaysia","Thailand","Indonesia"];

for($id = 1;$id <= 10;$id++)
{
    $query = mysqli_query($koneksi,"select sum(total_cases) as total_cases from tb_covid where id_country='$id'");
	$row = $query->fetch_array();
	$jumlah_kasus[] = $row['total_cases'];

	$query = mysqli_query($koneksi,"select sum(total_recoverd) as total_recoverd from tb_covid where id_country='$id'");
	$row = $query->fetch_array();
	$jumlah_covid[] = $row['total_recoverd'];
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Grafik Data Total</title>
	<script type="text/javascript" src="Chart.js"></script>
</head>
<body>
	<div style="width: 800px;height: 800px">
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
                    label: 'Jumlah Kasus',
                    backgroundColor: 'blue',
					data: <?php echo json_encode($jumlah_kasus); ?>,
					borderWidth: 1
                },
                {
					label: 'Jumlah Penderita Covid',
                    backgroundColor: 'pink',
					data: <?php echo json_encode($jumlah_covid); ?>,
					borderWidth: 1
				}, 
               ]
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

	