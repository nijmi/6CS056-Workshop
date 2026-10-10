<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Course</title>
</head>
<body>
    <h1>Add New Course</h1>

    @if($errors->any())
        <ul style="color:red">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('courses.store') }}" method="POST">
        @csrf

        <p>
            <label>Course Name:</label><br>
            <input type="text" name="name"
                   value="{{ old('name') }}" required>
        </p>

        <p>
            <label>Description:</label><br>
            <textarea name="description">{{ old('description') }}</textarea>
        </p>

        <p>
            <label>Duration (weeks):</label><br>
            <input type="number" name="duration"
                   value="{{ old('duration') }}" min="1" required>
        </p>

        <p>
            <label>Fee:</label><br>
            <input type="number" name="fee"
                   value="{{ old('fee') }}" min="0" step="0.01" required>
        </p>

        <p>
            <label>Difficulty:</label><br>
            <select name="difficulty" required>
                <option value="">Select difficulty</option>
                <option value="Easy">Easy</option>
                <option value="Medium">Medium</option>
                <option value="Hard">Hard</option>
            </select>
        </p>

        <p>
            <label>
                <input type="checkbox" name="is_active" value="1" checked>
                Active course
            </label>
        </p>

        <button type="submit">Save Course</button>
    </form>

    <p><a href="{{ route('courses.index') }}">Back to Courses</a></p>
</body>
</html>
