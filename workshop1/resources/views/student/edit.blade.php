<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Student</title>
</head>
<body>
    <h1>Edit Student</h1>

    @if ($errors->any())
        <ul style="color: red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="/students/{{ $student->id }}" method="POST">
        @csrf
        @method('PUT')

        <p>
            <label>Name:</label><br>
            <input type="text" name="name"
                   value="{{ old('name', $student->name) }}" required>
        </p>

        <p>
            <label>Email:</label><br>
            <input type="email" name="email"
                   value="{{ old('email', $student->email) }}" required>
        </p>

        <p>
            <label>Course:</label><br>
            <input type="text" name="course"
                   value="{{ old('course', $student->course) }}" required>
        </p>

        <p>
            <label>Phone:</label><br>
            <input type="text" name="phone"
                   value="{{ old('phone', $student->phone) }}" required>
        </p>

        <p>
            <label>Address:</label><br>
            <textarea name="address">{{ old('address', $student->address) }}</textarea>
        </p>

        <p>
            <label>Date of Birth:</label><br>
            <input type="date" name="date_of_birth"
                   value="{{ old('date_of_birth', $student->date_of_birth) }}">
        </p>

        <button type="submit">Update Student</button>
    </form>

    <p><a href="/students">Back to Students</a></p>
</body>
</html>
