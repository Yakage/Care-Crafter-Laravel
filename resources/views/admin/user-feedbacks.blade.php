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
                <li>
                    <a href="{{ route('admin.user.table')}}">
                        <i class='bx bxs-doughnut-chart' ></i>
                        <span class="text">User Table</span>
                    </a>
                </li>
                <li class="active">
                    <a href="{{ route('admin.user.feedbacks')}}">
                        <i class='bx bxs-group' ></i>
                        <span class="text">User Feedbacks</span>
                    </a>
                </li>
                <li>
                    <form id="logoutForm" action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit">
                            <a href="">
                                <span class="text text-decoration-none">Logout</span>
                            </a>
                        </button>
                    </form>
                </li>
            </ul>
        </section>
    </header>
    <main id="content">
        <h1>Feedback</h1>

        @if (session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Message</th>
                    <th>Submitted by</th>
                    <th>Submitted at</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($feedbacks as $feedback)
                    <tr>
                        <td>{{ $feedback->message }}</td>
                        <td>
                            @if ($feedback->user)
                                {{ $feedback->user->name }}
                            @else
                            -
                        @endif
                        </td> 
                    <td>{{ $feedback->created_at->format('d-M-Y H:i') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    
    </main>

        
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>