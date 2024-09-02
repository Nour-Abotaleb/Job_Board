<form method="POST" action="{{ route('profile.update') }}">
    @csrf
    <input type="text" name="name" value="{{ old('name', $candidate->name) }}" required>
    <input type="email" name="email" value="{{ old('email', $candidate->email) }}" required>
    <textarea name="skills">{{ old('skills', $candidate->skills) }}</textarea>
    <button type="submit">Update Profile</button>
</form>
