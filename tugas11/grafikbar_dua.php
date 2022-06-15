<?php
include('koneksi.php');
$label = ["India","Korea Selatan","Turkey","Vietnam","Japan","Iran","Indonesia","Malaysia","Thailand","Indonesia"];

for($id = 1;$id <= 10;$id++)
{
    $query = mysqli_query($koneksi,"select sum(new_cases) as new_cases from tb_covid where id_country='$id'");
	$row = $query->fetch_array();
	$kasus_baru[] = $row['new_cases'];

    $query = mysqli_query($koneksi,"select sum(new_recovered) as new_recovered from tb_covid where id_country='$id'");
	$row = $query->fetch_array();
	$baru_pulih[] = $row['new_recovered'];
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Grafik Data Baru</title>
	<script type="text/javascript" src="Chart.js"></script>
	<style>
       #canvas-holder{
                width: 50%;
                margin: 15px auto;
            }
    </style>
</head>
<body>
	<center><h3>Grafik Data Baru</h3></center>
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
                    label: 'Jumlah Kasus Baru',
                    backgroundColor: 'orange',
					data: <?php echo json_encode($kasus_baru); ?>,
					borderWidth: 1
                },
                {
                    label: 'Jumlah Pulih',
                    backgroundColor: 'yellow',
					data: <?php echo json_encode($baru_pulih); ?>,
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

	