<!-- resources/views/step-tracker/create.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Add New Step Goal</title>
</head>
<body>
    <h1>Add New Step Goal</h1>
    <form method="POST" action="{{ route('step-tracker.store') }}">
        @csrf
        <div class="form-group">
            <label for="current_steps_per_day">Current Steps Per Day:</label>
            <input type="text" name="current_steps_per_day" class="form-control" id="current_steps_per_day">
        </div>
        <div class="form-group">
            <label for="daily_goal">Daily Goal:</label>
            <input type="text" name="daily_goal" class="form-control" id="daily_goal">
        </div>
        <button type="submit" class="btn btn-primary">Set Daily Goal</button>
    </form>
</body>
</html>

