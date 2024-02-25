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
					<a href="#">
						<i class='bx bxs-group' ></i>
						<span class="text">Team</span>
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
						<button type="submit">
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
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu' ></i>
			<form action="#">
				<div class="form-input">
					<input type="search" placeholder="Search...">
					<button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
				</div>
			</form>
			<input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label>
			</a>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<section>
				<div class="head-title">
					<div class="left">
						<h1>Dashboard</h1>
					</div>
				</div>
	
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
							<p>{{ $userCountsByGender}}</p>
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
		const allSideMenu = document.querySelectorAll('#sidebar .side-menu.top li a');
		allSideMenu.forEach(item=> {
			const li = item.parentElement;

			item.addEventListener('click', function () {
				allSideMenu.forEach(i=> {
					i.parentElement.classList.remove('active');
				})
				li.classList.add('active');
			})
		});
		// TOGGLE SIDEBAR
		const menuBar = document.querySelector('#content nav .bx.bx-menu');
		const sidebar = document.getElementById('sidebar');

		menuBar.addEventListener('click', function () {
			sidebar.classList.toggle('hide');
		})

		const searchButton = document.querySelector('#content nav form .form-input button');
		const searchButtonIcon = document.querySelector('#content nav form .form-input button .bx');
		const searchForm = document.querySelector('#content nav form');

		searchButton.addEventListener('click', function (e) {
			if(window.innerWidth < 576) {
				e.preventDefault();
				searchForm.classList.toggle('show');
				if(searchForm.classList.contains('show')) {
					searchButtonIcon.classList.replace('bx-search', 'bx-x');
				} else {
					searchButtonIcon.classList.replace('bx-x', 'bx-search');
				}
			}
		})

		if(window.innerWidth < 768) {
			sidebar.classList.add('hide');
		} else if(window.innerWidth > 576) {
			searchButtonIcon.classList.replace('bx-x', 'bx-search');
			searchForm.classList.remove('show');
		}


		window.addEventListener('resize', function () {
			if(this.innerWidth > 576) {
				searchButtonIcon.classList.replace('bx-x', 'bx-search');
				searchForm.classList.remove('show');
			}
		})

		const switchMode = document.getElementById('switch-mode');

		switchMode.addEventListener('change', function () {
			if(this.checked) {
				document.body.classList.add('dark');
			} else {
				document.body.classList.remove('dark');
			}
		})

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