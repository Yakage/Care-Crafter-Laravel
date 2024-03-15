<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Users Data</title>
    <link rel="stylesheet" href="{{secure_asset('assets/css/register.css')}}">
</head>
<body>
    <div id="messageDialog" class="dialog">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif  
        @if(session()->has('error'))
            <div class="alert alert-danger">{{session('error')}}</div>
        @endif
        @if(session()->has('success'))
            <div class="alert alert-success">{{session('success')}}</div>
        @endif
    </div>
    <div class="container">
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
                        <span class="details">Birthday</span>
                        <input type="date" class="form-control form-control-sm" name="birthday" value="{{ $users->birthday }}" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Gender</span>
                            <select class="form-control form-control-sm" name="gender" required>
                                <option value="male">male</option>
                                <option value="female">female</option>
                            </select>
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
                        <input type="submit" value="Update" style="margin-left: 250px">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="js/loginandregister.js"></script>
</body>
</html>