<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/admin.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

</head>
<body>
	<main>
		<!-- SIDEBAR -->
		<section id="sidebar">
			<a href="#" class="brand">
				<i class='bx bxs-smile'></i>
				<span class="text">AdminCrafter</span>
			</a>
			<ul class="side-menu top">
				<li class="active">
					<a href="{{ route('admin.home')}}">
						<i class='bx bxs-dashboard' ></i>
						<span class="text">Dashboard</span>
					</a>
				</li>
				<li>
					<a href="{{ route('admin.user.table')}}">
						<i class='bx bxs-doughnut-chart' ></i>
						<span class="text">User Table</span>
					</a>
				</li>
				<li>
					<a href="{{ route('admin.user.feedbacks')}}">
						<i class='bx bxs-group' ></i>
						<span class="text">User Feedbacks</span>
					</a>
				</li>
				<li>
					<form id="logoutForm" action="{{ route('logout') }}" method="POST">
						@csrf
						<button type="submit" class="btn btn-link text-decoration-none ms-4">Logout</button>
					</form>
				</li>
			</ul>
		</section>
		<!-- SIDEBAR -->
	</main>
	



	<!-- CONTENT -->
	<section id="content">
		<section>
			<nav>
				<div class="head-title">
						<div class="left">
							<h1>Dashboard</h1>
						</div>
					</div>
			</nav>
     </section>

		<!-- MAIN -->

		<div class="row">
			<div class="col-md-6">
				<div class="myCharts">
					<div class="myChart">
						<h3>Users Statistics</h3>
						<canvas id="barchart1" height="80px" width="120px"></canvas>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="myCharts">
					<div class="myChart">
						<h3>Users Statistics</h3>
						<canvas id="barchart2" height="80px" width="120px"></canvas>
					</div>
				</div>
			</div>
		</div>


		<main>
			<section>
				<ul class="box-info">
					<li>
						<i class='bx bxs-calendar-check' ></i>
						<span class="text">
							<p>{{ $userCount}}</p>
							<h3>Total Users</h3>
						</span>
					</li>
					<li>
						<i class='bx bxs-group' ></i>
						<span class="text">
							<p>{{ $activeUsersCount}}</p>
							<h3>Online Users</h3>
						</span>
					</li>
					<li>
						<i class='bx bxs-dollar-circle' ></i>
						<span class="text">
							<p>{{ $unactiveUsersCount}}</p>
							<h3>Offline Users</h3>
						</span>
					</li>
					<li class="box-info-item">
						<i class='bx bxs-calendar-check'></i>
						<div class="text">
							<div class="male-data">
								<p>{{ $userCountsByMaleGender}}</p>
								<h3>Male</h3>
							</div>
							<div class="female-data">
								<p>{{ $userCountsByFemaleGender}}</p>
								<h3>Female</h3>
							</div>
						</div>
					</li>
				</ul>
			</section>
		</main>
	

	<!-- script js for graphs -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
	<script>
		async function fetchStepsDataWeekly() {
			try {
				const response = await fetch('/chartDataStepsWeekly');
				if (!response.ok) {
					throw new Error('Failed to fetch weekly steps data');
				}
				return await response.json();
			} catch (error) {
				console.error('Error fetching weekly steps data:', error);
				return [];
			}
		}
	
	
		document.addEventListener('DOMContentLoaded', async function() {
			const weeklyStepsData = await fetchStepsDataWeekly();
		
			const weeklyLabels = [];
			const weeklyValues = [];
	
			weeklyStepsData.forEach(entry => {
				weeklyLabels.push(entry.label);
				weeklyValues.push(entry.value);
			});
	
	
			const ctx1 = document.getElementById('barchart1').getContext('2d');
			new Chart(ctx1, {
				type: 'bar',
				data: {
					labels: weeklyLabels,
					datasets: [{
						label: 'Users Login',
						data: weeklyValues,
						borderWidth: 3
					}]
				},
				options: {
					scales: {
						y: {
							beginAtZero: true
						}
					}
				}
			});

			const ctx2 = document.getElementById('barchart2').getContext('2d');
			new Chart(ctx2, {
				type: 'bar',
				data: {
					labels: weeklyLabels,
					datasets: [{
						label: 'Users Login',
						data: [10, 20, 30, 40, 50, 60, 70],
						borderWidth: 3,
						backgroundColor: [
							'rgb(15, 99, 32)',
							'rgb(54, 162, 15)',
							'rgb(255, 205, 86)',
							'rgb(25, 5, 86)',
							'rgb(115, 225, 86)',
						],
					}],
				},
				options: {
					scales: {
						y: {
							beginAtZero: true
						}
					}
				}
			});
		});
	</script>
</body>
</html>