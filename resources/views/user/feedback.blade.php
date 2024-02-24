<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Interface</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/user.css">
</head>
<body>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 sidebar d-flex flex-column justify-content-center align-items-center">
                    <img src="{{ asset('download.jpg') }}" alt="Profile Picture" class="profile-picture mt-3">
                </a>

                <h4 class="text-center mt-3 ">Juan Enrile</h4>

                <ul class="nav flex-column mt-3 text-center">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('user.home')}}">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.feedback')}}">Feedbacks</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('admin.user-table.{id}.edit') }}">Edit Account</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('welcome') }}">Logout</a>
                    </li>
                </ul>
        </div>
        
        <div class="col-md-9 ms-5 mt-5 content-container">
            <h2>Feedback Form</h2>
            <form method="post">
                @csrf
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="message">Message:</label>
                    <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="js/user.js"></script>

</body>
</html>
