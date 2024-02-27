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
			</ul>
			<ul class="side-menu">
				<li>
					<a href="#">
						<i class='bx bxs-cog' ></i>
						<span class="text">Settings</span>
					</a>
				</li>
				<li>
					<form id="logoutForm" action="{{ route('logout') }}" method="POST">
						@csrf
						<button type="submit" class="logout">
							<a href="">
								<i class='bx bxs-cog'></i>	
								<span class="text">Logout</span>
							</a>
						</button>
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
		<main>
			<section>
				<ul class="box-info">
					<li>
						<i class='bx bxs-calendar-check' ></i>
						<span class="text">
							<h3>Total Users</h3>
							<p>{{ $userCount}}</p>
						</span>
					</li>
					<li>
						<i class='bx bxs-group' ></i>
						<span class="text">
							<h3>Online Users</h3>
							<p>{{ $activeUsersCount}}</p>
						</span>
					</li>
					<li>
						<i class='bx bxs-dollar-circle' ></i>
						<span class="text">
							<h3>Offline Users</h3>
							<p>{{ $unactiveUsersCount}}</p>
						</span>
					</li>
					<li>
						<i class='bx bxs-calendar-check' ></i>
						<span class="text">
							<h3>Total Users by Gender</h3>
							<h3>Male</h3>
							<p>{{ $userCountsByMaleGender}}</p>
							<h3>Female</h3>
							<p>{{ $userCountsByFemaleGender}}</p>
						</span>
					</li>
				</ul>
			</section>

			<section>
				<canvas id="myChart"></canvas>
			</section>

			
		</main>

		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script>
		const xValues = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday","Saturday", "Sunday"];
		const yValues = [20, 20, 20, 20, 20];

		new Chart("myChart", {
		type: "bar",
		data: {
			labels: xValues,
			datasets: [{
			backgroundColor: "#b1eafa",
			data: yValues
			}]
		},
		options: {
			legend: {display: false},
			title: {
				display: true,
				text: "User Statistics",
				fontSize: 36,
				fontFamily: "poppins, sans-serif"
				
			}
		}
		});
	</script>
</body>
</html>