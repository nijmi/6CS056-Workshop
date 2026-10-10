<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Course Details</title>
</head>
<body>
    <h1>Course Details</h1>

    <p><strong>ID:</strong> {{ $course->id }}</p>
    <p><strong>Name:</strong> {{ $course->name }}</p>
    <p><strong>Duration:</strong> {{ $course->duration }} weeks</p>
    <p><strong>Fee:</strong> {{ $course->fee }}</p>
    <p><strong>Difficulty:</strong> {{ $course->difficulty }}</p>
    <p><strong>Status:</strong>
        {{ $course->is_active ? 'Active' : 'Inactive' }}
    </p>

    <a href="{{ route('courses.edit', $course->id) }}">Edit Course</a>
    |
    <a href="{{ route('courses.index') }}">Back to Courses</a>
</body>
</html>
