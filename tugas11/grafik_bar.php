<?php
include('koneksi.php');
$label = ["India","Korea Selatan","Turkey","Vietnam","Japan","Iran","Indonesia","Malaysia","Thailand","Indonesia"];

for($id = 1;$id <= 10;$id++)
{
	$query = mysqli_query($koneksi,"select sum(total_recoverd) as total_recoverd from tb_covid where id_country='$id'");
	$row = $query->fetch_array();
	$jumlah_covid[] = $row['total_recoverd'];

	$query = mysqli_query($koneksi,"select sum(new_cases) as new_cases from tb_covid where id_country='$id'");
	$row = $query->fetch_array();
	$kasus_baru[] = $row['new_cases'];

    $query = mysqli_query($koneksi,"select sum(new_recovered) as new_recovered from tb_covid where id_country='$id'");
	$row = $query->fetch_array();
	$baru_pulih[] = $row['new_recovered'];

	$query = mysqli_query($koneksi,"select sum(total_deaths) as total_deaths from tb_covid where id_country='$id'");
	$row = $query->fetch_array();
	$jumlah_meninggal[] = $row['total_deaths'];

	$query = mysqli_query($koneksi,"select sum(new_deaths) as new_deaths from tb_covid where id_country='$id'");
	$row = $query->fetch_array();
	$baru_meninggal[] = $row['new_deaths'];
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Grafik Data Total</title>
	<script type="text/javascript" src="Chart.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
	<style>
       #canvas-holder{
                width: 50%;
                margin: 15px auto;
            }
    </style>
</head>
<body>
	<center><h3>Grafik Data Total</h3></center>
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
					label: 'Jumlah Penderita Covid',
                    backgroundColor: 'pink',
					data: <?php echo json_encode($jumlah_covid); ?>,
					borderWidth: 1
				},  
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
                },
				{
                    label: 'Jumlah Meninggal',
                    backgroundColor: 'brown',
					data: <?php echo json_encode($jumlah_meninggal); ?>,
					borderWidth: 1
                }, 
				{
                    label: 'Jumlah Baru Meninggal',
                    backgroundColor: 'grey',
					data: <?php echo json_encode($baru_meninggal); ?>,
					borderWidth: 1
                }]
			},
			options: {
				responsive:true,
                maintainAspectRatio: false,
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:false
						}
					}]
				}
			}
		});
	</script>
</body>
</html>

	