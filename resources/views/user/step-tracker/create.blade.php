<!-- resources/views/step-tracker/create.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Add New Step Goal</title>
</head>
<body>
    <h1>Add New Step Goal</h1>
    <form action="{{ route('step-tracker.store') }}" method="POST">
        @csrf
        <label for="daily_goal">Daily Goal</label>
        <input type="number" id="daily_goal" name="daily_goal">
        <button type="submit">Submit</button>
    </form>
</body>
</html>

