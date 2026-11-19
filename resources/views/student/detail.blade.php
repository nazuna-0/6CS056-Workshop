<!DOCTYPE html>
<html>
<head><title>Student Details</title></head>
<body>
<h1>{{ $student->name }}</h1>

<p><strong>Email:</strong> {{ $student->email }}</p>
<p><strong>Phone:</strong> {{ $student->phone }}</p>
<p><strong>Address:</strong> {{ $student->address ?? '—' }}</p>
<p><strong>Date of Birth:</strong> {{ $student->date_of_birth ?? '—' }}</p>
<p><strong>Created:</strong> {{ $student->created_at }}</p>

<a href="/students/{{ $student->id }}/edit">Edit</a> |
<a href="/students">Back to Students</a>
</body>
</html>