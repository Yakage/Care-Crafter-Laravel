<!-- resources/views/step-tracker/index.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Step Tracker</title>
</head>
<body>
    <h1>Step Tracker</h1>
    <a href="{{ route('step-tracker.create') }}">Add New Step Goal</a>
    <table>
        <thead>
            <tr>
                <th>Daily Goal</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($stepTrackers as $stepTracker)
                <tr>
                    <td>{{ $stepTracker->daily_goal }}</td>
                    <td>
                        <a href="{{ route('step-tracker.show', $stepTracker) }}">View</a>
                        <a href="{{ route('step-tracker.edit', $stepTracker) }}">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
