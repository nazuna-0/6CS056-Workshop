<!DOCTYPE html>
<html>
<head><title>Edit Course</title></head>
<body>
<h1>Edit Course</h1>

@if($errors->any())
    <div style="color:red">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="/courses/{{ $course->id }}" method="POST">
    @csrf
    @method('PUT')

    <div>
        <label for="name">Name</label>
        <input type="text" id="name" name="name" value="{{ old('name', $course->name) }}">
    </div><br>

    <div>
        <label for="description">Description</label>
        <textarea id="description" name="description">{{ old('description', $course->description) }}</textarea>
    </div><br>

    <div>
        <label for="duration">Duration (weeks)</label>
        <input type="number" id="duration" name="duration" value="{{ old('duration', $course->duration) }}" min="1">
    </div><br>

    <div>
        <label for="fee">Fee</label>
        <input type="number" step="0.01" id="fee" name="fee" value="{{ old('fee', $course->fee) }}" min="0">
    </div><br>

    <div>
        <label for="difficulty">Difficulty</label>
        <select id="difficulty" name="difficulty">
            @foreach(['Easy', 'Medium', 'Hard'] as $level)
                <option value="{{ $level }}" {{ old('difficulty', $course->difficulty) == $level ? 'selected' : '' }}>
                    {{ $level }}
                </option>
            @endforeach
        </select>
    </div><br>

    <div>
        <label>
            <input type="checkbox" name="is_active" value="1" {{ old('is_active', $course->is_active) ? 'checked' : '' }}>
            Active
        </label>
    </div><br>

    <button type="submit">Update Course</button>
</form>

<br>
<a href="/courses">Back to Courses</a>
</body>
</html>