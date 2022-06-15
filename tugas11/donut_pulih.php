<?php
include('koneksi.php');
$covid = mysqli_query($koneksi,"select * from tb_covid");
while($row = mysqli_fetch_array($covid)){
	$nama_negara[] = $row['country'];
	
	$query = mysqli_query($koneksi,"select sum(new_recovered) as new_recovered from tb_covid where id_country ='".$row['id_country']."'");
	$row = $query->fetch_array();
	$jumlah_pulih[] = $row['new_recovered'];
}
?>
<!doctype html>
<html>

<head>
	<title>Total Data Pulih </title>
	<script type="text/javascript" src="Chart.js"></script>
    <style>
       #canvas-holder{
                width: 50%;
                margin: 15px auto;
            }
    </style>
</head>

<body>
    <center><h3>Total Data Pulih</h3></center>
	<div id="canvas-holder" style="width:50%">
		<canvas id="chart-area"></canvas>
	</div>
	<script>
		var config = {
			type: 'doughnut',
			data: {
				datasets: [{
					data:<?php echo json_encode($jumlah_pulih); ?>,
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(222, 184, 135, 0.2)',
					'rgba(80, 160, 86, 0.2)',
					'rgba(90, 99, 80, 0.2)',
					'rgba(320, 100, 235, 0.2)',
					'rgba(165, 42, 42, 0.2)',
					'rgba(250, 69, 1, 0.2)',
					'rgba(95, 158, 160, 0.2)'
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(222, 184, 135, 1)',
					'rgba(80, 160, 86, 1)',
					'rgba(90, 99, 80, 1)',
					'rgba(320, 100, 235, 1)',
					'rgba(165, 42, 42, 1)',
					'rgba(250, 69, 1, 1)',
					'rgba(95, 158, 160, 1)'
					],
					label: 'Presentase Penjualan Barang'
				}],
				labels: <?php echo json_encode($nama_negara); ?>},
			options: {
				responsive: true
			}
		};

		window.onload = function() {
			var ctx = document.getElementById('chart-area').getContext('2d');
			window.myPie = new Chart(ctx, config);
		};

		document.getElementById('randomizeData').addEventListener('click', function() {
			config.data.datasets.forEach(function(dataset) {
				dataset.data = dataset.data.map(function() {
					return randomScalingFactor();
				});
			});

			window.myPie.update();
		});

		var colorNames = Object.keys(window.chartColors);
		document.getElementById('addDataset').addEventListener('click', function() {
			var newDataset = {
				backgroundColor: [],
				data: [],
				label: 'New dataset ' + config.data.datasets.length,
			};

			for (var index = 0; index < config.data.labels.length; ++index) {
				newDataset.data.push(randomScalingFactor());

				var colorName = colorNames[index % colorNames.length];
				var newColor = window.chartColors[colorName];
				newDataset.backgroundColor.push(newColor);
			}

			config.data.datasets.push(newDataset);
			window.myPie.update();
		});

		document.getElementById('removeDataset').addEventListener('click', function() {
			config.data.datasets.splice(0, 1);
			window.myPie.update();
		});
	</script>
</body>

</html>