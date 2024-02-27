<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Users Data</title>
    <link rel="stylesheet" href="css/register.css">
</head>
<body>
    <div class="container">
        @if (session('status'))
            <div class="alert alert">{{session('status')}}</div>
        @endif
        <div class="title">
            <h4>Update User Data 
                <a href="{{ url('admin.user-table')}}" class="back">Back</a>
            </h4>
        </div>
        <div class="content">
            <form action="{{ url('admin.user-table/'.$users->id.'/edit') }}" method="POST">
                @csrf
                @method('PUT')

                <div class="user-details">
                    <div class="input-box">
                        <span class="details">Name</span>
                        <input type="text" class="form-control form-control-sm" name="name" value="{{ $users->name }}" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Email</span>
                        <input type="email" class="form-control form-control-sm" name="email" value="{{ $users->email }}" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Birthday</span>
                        <input type="date" class="form-control form-control-sm" name="birthday" value="{{ $users->birthday }}" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Gender</span>
                        <input type="text" id="gender" class="form-control form-control-sm" name="gender" value="{{ $users->gender }}" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Height</span>
                        <input type="text" class="form-control form-control-sm" name="height" value="{{ $users->height }}"required>
                    </div>
                    <div class="input-box">
                        <span class="details">Weight</span>
                        <input type="text" class="form-control form-control-sm" name="weight"value="{{ $users->weight }}" required>
                    </div>

                    <div class="button">
                        <input type="submit" value="Update">
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>