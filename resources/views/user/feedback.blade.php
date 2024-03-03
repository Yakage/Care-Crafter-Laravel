<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>User Interface</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/user.css">
    <style>
        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background-color: #f8f9fa;
            margin: 0;
        }

        .top-nav {
            background-color: #ffffff;
            padding: 10px;
            width: 100%;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between; /* Align items on the ends */
            position: absolute; /* Position fixed at the top */
            top: 0; /* Set top to 0 to stick to the top */
        }

        .top-nav h1 {
            margin: 0;
            padding-left: 20px; /* Add padding for better visibility */
        }

        .top-nav .nav-link {
            color: black; /* Set text color to black */
            text-decoration: none; /* Remove underline */
        }

        .content-container {
            text-align: center;
            background-color: #fff;
            padding: 50px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            width: 120%;
            max-width: 600px;
            margin-top: 150px; /* Adjusted margin for better visibility */
            margin-bottom: 100px;
        }

        form {
            width: 100%;
            max-width: 400px;
            margin: 0 auto;
        }

        .form-group label {
            text-align: left;
            display: block;
            margin-bottom: 0.5rem;
        }

        .btn-primary {
            width: 100%;
            margin-top: 10px; /* Added margin for better spacing */
        }
    </style>
</head>

<body>

    <div class="top-nav">
        <h1>CareCrafter</h1>
        <a class="nav-link" href="#">Home</a>
    </div>

    <div class="content-container">
        <h2>Feedback Form</h2>
        <form method="post">
            @csrf
            <div class="form-group">
                <label for="message">Message:</label>
                <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        @if (session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="js/user.js"></script>

</body>

</html>
