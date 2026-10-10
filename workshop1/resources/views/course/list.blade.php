<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Course Management</title>
</head>
<body>
    <h1>Course Management System</h1>

    @if(session('success'))
        <p style="color: green">{{ session('success') }}</p>
    @endif

    <p><a href="{{ route('courses.create') }}">Add New Course</a></p>
    <p><a href="/students">Student Management</a></p>

    <table border="1" cellpadding="8">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Duration</th>
                <th>Fee</th>
                <th>Difficulty</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($courses as $course)
                <tr>
                    <td>{{ $course->id }}</td>
                    <td>{{ $course->name }}</td>
                    <td>{{ $course->duration }} weeks</td>
                    <td>{{ $course->fee }}</td>
                    <td>{{ $course->difficulty }}</td>
                    <td>{{ $course->is_active ? 'Active' : 'Inactive' }}</td>
                    <td>
                        <a href="{{ route('courses.show', $course) }}">View</a>
                        |
                        <a href="{{ route('courses.edit', $course) }}">Edit</a>

                        <form action="{{ route('courses.destroy', $course) }}"
                              method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                onclick="return confirm('Delete this course?')">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">No courses found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
