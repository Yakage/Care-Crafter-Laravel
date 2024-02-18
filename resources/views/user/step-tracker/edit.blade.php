<!-- resources/views/step-tracker/edit.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Edit Step Goal</title>
</head>
<body>
    <h1>Edit Step Goal</h1>
    <form action="{{ route('step-tracker.update', $stepTracker) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="daily_goal">Daily Goal</label>
        <input type="number" id="daily_goal" name="daily_goal" value="{{ $stepTracker->daily_goal }}">
        <button type="submit">Submit</button>
    </form>
</body>
</html>

