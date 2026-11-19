<!DOCTYPE html>
<html>
<head><title>Course Details</title></head>
<body>
<h1>{{ $course->name }}</h1>

<p><strong>Description:</strong> {{ $course->description ?? '—' }}</p>
<p><strong>Duration:</strong> {{ $course->duration }} weeks</p>
<p><strong>Fee:</strong> {{ $course->fee }}</p>
<p><strong>Difficulty:</strong> {{ $course->difficulty }}</p>
<p><strong>Active:</strong> {{ $course->is_active ? 'Yes' : 'No' }}</p>
<p><strong>Created:</strong> {{ $course->created_at }}</p>

<a href="/courses/{{ $course->id }}/edit">Edit</a> |
<a href="/courses">Back to Courses</a>
</body>
</html>