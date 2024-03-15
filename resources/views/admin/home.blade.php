<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{('assets/css/admin.css')}}">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

</head>
<body>
	<header>
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
	</header>
	



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
						<canvas id="userStatistics" height="80px" width="120px"></canvas>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="myCharts">
					<div class="myChart">
						<h3>Features Statistics</h3>
						<canvas id="featuresChart" height="80px" width="120px"></canvas>
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
		// Fetch data from Laravel backend
		async function fetchData() {
			try {
				const response = await fetch('/admin.users-logged-in');
				if (!response.ok) {
					throw new Error('Failed to fetch data');
				}
				const data = await response.json();
				return data;
			} catch (error) {
				console.error('Error fetching data:', error);
				return {};
			}
		}

		async function fetchFeaturesStatistics() {
			try {
				const response = await fetch('/admin.users-features');
				if (!response.ok) {
					throw new Error('Failed to fetch data');
				}
				const data = await response.json();
				return data;
			} catch (error) {
				console.error('Error fetching features statistics:', error);
				return {};
			}
		}

		document.addEventListener('DOMContentLoaded', async function() {
			// Fetch data for the "Users Statistics" chart
			const userData = await fetchData();
			const userLabels = Object.keys(userData);
			const userValues = Object.values(userData);

			// Fetch data for the "Features Statistics" chart
			const featuresData = await fetchFeaturesStatistics();
			const featureLabels = ['Step Tracker', 'Sleep Tracker', 'Water Intake'];
			const featureValues = [
				featuresData.totalUsersInSteps,
				featuresData.totalUsersInSleeps,
				featuresData.totalUsersInWater
			];

			// Create the "Users Statistics" chart
			const userCtx = document.getElementById('userStatistics').getContext('2d');
			new Chart(userCtx, {
				type: 'bar',
				data: {
					labels: userLabels,
					datasets: [{
						label: 'Users Logged In',
						data: userValues,
						backgroundColor: 'rgba(54, 162, 235, 0.5)', // Blue color
						borderColor: 'rgba(54, 162, 235, 1)', // Border color
						borderWidth: 1
					}]
				},
				options: {
            		responsive: true, // Allow the chart to be responsive
					scales: {
						y: {
							beginAtZero: true,
							ticks: {
								precision: 0
							}
						}
					}
				}
			});

			// Create the "Features Statistics" chart
			const featureCtx = document.getElementById('featuresChart').getContext('2d');
			new Chart(featureCtx, {
				type: 'bar',
				data: {
					labels: featureLabels,
					datasets: [{
						label: 'Number of Users',
						data: featureValues,
						backgroundColor: ['rgba(255, 99, 132, 0.5)', 'rgba(255, 205, 86, 0.5)', 'rgba(54, 162, 235, 0.5)' ], // Colors for each segment
                		borderColor: ['rgba(255, 99, 132, 1)', 'rgba(255, 205, 86, 1)', 'rgba(54, 162, 235, 1)'],
						borderWidth: 1
					}]
				},
				options: {
            		responsive: true, // Allow the chart to be responsive
					scales: {
						y: {
							beginAtZero: true,
							ticks: {
								precision: 0
							}
						}
					}
				}
			});
		});

	</script>
</body>
</html>