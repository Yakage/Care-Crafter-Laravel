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
            <div class="container mt-5">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
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
                                            <td>Age</td>
                                            <td>Height</td>
                                            <td>Weight</td>
                                            <td>Gender</td>
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
                                            <td>{{$items->age}}</td>
                                            <td>{{$items->height}}</td>
                                            <td>{{$items->weight}}</td>
                                            <td>{{$items->gender}}</td>
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