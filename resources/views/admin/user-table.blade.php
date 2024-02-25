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
        <section id="sidebar">
            <a href="#" class="brand">
                <i class='bx bxs-smile'></i>
                <span class="text">AdminCrafter</span>
            </a>
            <ul class="side-menu top">
                <li class="">
                    <a href="{{ route('admin.home')}}">
                        <i class='bx bxs-dashboard' ></i>
                        <span class="text">Dashboard</span>
                    </a>
                </li>
                <li class="active">
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
    </header>
    <main id="content">
        <section>
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
        </section>
        <section>
            <div class="container mt-5 ms-auto">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                <h4>  Users Data Table
                                    <a href="{{ url('admin.user-table.create')}}" class="btn btn-primary float-end">Add Users</a>
                                </h4>
                            </div>
                            <div class="card-body">

                                <table class="table table -bordered table-striped">
                                    <thead>
                                        <tr>
                                            <td>ID</td>
                                            <td>Name</td>
                                            <td>Email</td>
                                            <td>Birthday</td>
                                            <td>Gender</td>
                                            <td>Height</td>
                                            <td>Weight</td>
                                            <td>Role</td>
                                            <td>Status</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $items)
                                        <tr>
                                            <td>{{$items->id}}</td>
                                            <td>{{$items->name}}</td>
                                            <td>{{$items->email}}</td>
                                            <td>{{$items->birthday}}</td>
                                            <td>{{$items->gender}}</td>
                                            <td>{{$items->height}}</td>
                                            <td>{{$items->weight}}</td>
                                            <td>{{$items->role}}</td>
                                            <td>{{$items->status}}</td>
                                            <td>
                                                <a href="{{ url('admin.user-table.'.$items->id.'.edit')}}" class="btn btn-success mx-2">Edit</a>
                                                <a 
                                                href="{{ url('admin.user-table.'.$items->id.'.delete')}}" 
                                                class="btn btn-success mx-2"
                                                onclick="return confirm('Are you Sure?')">Delete</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

        
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>