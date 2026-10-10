<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Course</title>
</head>
<body>
    <h1>Edit Course</h1>

    @if($errors->any())
        <ul style="color:red">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('courses.update', $course) }}" method="POST">
        @csrf
        @method('PUT')

        <p>
            <label>Course Name:</label><br>
            <input type="text" name="name"
                   value="{{ old('name', $course->name) }}" required>
        </p>

        <p>
            <label>Description:</label><br>
            <textarea name="description">{{ old('description', $course->description) }}</textarea>
        </p>

        <p>
            <label>Duration (weeks):</label><br>
            <input type="number" name="duration"
                   value="{{ old('duration', $course->duration) }}"
                   min="1" required>
        </p>

        <p>
            <label>Fee:</label><br>
            <input type="number" name="fee"
                   value="{{ old('fee', $course->fee) }}"
                   min="0" step="0.01" required>
        </p>

        <p>
            <label>Difficulty:</label><br>
            <select name="difficulty" required>
                @foreach(['Easy', 'Medium', 'Hard'] as $level)
                    <option value="{{ $level }}"
                        {{ old('difficulty', $course->difficulty) == $level ? 'selected' : '' }}>
                        {{ $level }}
                    </option>
                @endforeach
            </select>
        </p>

        <p>
            <label>
                <input type="checkbox" name="is_active" value="1"
                    {{ old('is_active', $course->is_active) ? 'checked' : '' }}>
                Active course
            </label>
        </p>

        <button type="submit">Update Course</button>
    </form>

    <p><a href="{{ route('courses.index') }}">Back to Courses</a></p>
</body>
</html>
