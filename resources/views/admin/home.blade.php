<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/admin.css">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-primary">
            <div class="container-fluid">
                <a class="navbar-brand text-white ms-5" href="#">CareCrafter</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item" >
                        <a class="nav-link active text-white" aria-current="page" href="{{ url('admin-home')}}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-white" aria-current="page" href="{{ url('admin.user-table')}}">User Table</a>
                    </li>
                    <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-link text-white text-decoration-none">Logout</button>
                    </form>
                    </li>
                </ul>
                </div>
            </div>
        </nav>
    </header>
    <main>
        <section>
            <div class="card " id="usercount">
                <div class="card-body">
                    <h5 class="card-title">USERS</h5>
                    <p class="card-text">Total Users: {{ $userCount }}</p>
                </div>
            </div>
            <div class="card" id="gendercount">
                <div class="card-body">
                    <h5>Users by Gender:</h2>
                        <ul>
                            @foreach ($userCountsByGender as $gender => $count)
                                <li>{{ $gender }}: {{ $count }}</li>
                            @endforeach
                        </ul>
                </div>
            </div>
            <div class="card " id="activeusercount">
                <div class="card-body">
                    <h5 class="card-title">ACTIVE USERS</h5>
                    <p>Number of active users: {{ $activeUsersCount }}</p>
                </div>
            </div>
        </section>
    </main>
        
   

</body>
</html>