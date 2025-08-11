<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>My Prescriptions</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<style>
		body { background: #f8f9fa; }
		.prescription-table { background: #fff; border-radius: 8px; box-shadow: 0 0 8px rgba(0,0,0,0.03); }
		.table th, .table td { vertical-align: middle; }
	</style>
</head>
<body>
	<div class="container py-5">
		<h2 class="mb-4 font-weight-bold text-primary">My Prescriptions</h2>
		<div class="prescription-table p-4">
			<table class="table table-bordered table-hover">
				<thead class="thead-light">
					<tr>
						<th>#</th>
						<th>Date</th>
						<th>Doctor</th>
						<th>Medicine</th>
						<th>Dosage</th>
						<th>Notes</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>1</td>
						<td>2025-08-01</td>
						<td>Dr. Smith</td>
						<td>Paracetamol</td>
						<td>500mg, 2x daily</td>
						<td>After meals</td>
					</tr>
					<tr>
						<td>2</td>
						<td>2025-07-15</td>
						<td>Dr. Lee</td>
						<td>Ibuprofen</td>
						<td>200mg, 1x daily</td>
						<td>With water</td>
					</tr>
					<!-- Add more rows as needed -->
				</tbody>
			</table>
		</div>
	</div>
</body>
</html>
