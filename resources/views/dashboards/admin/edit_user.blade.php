<form method="POST" action="/admin/users/edit/{{ $user->id }}">
    @csrf
    <label>Name:</label>
    <input type="text" name="name" value="{{ $user->name }}"><br>
    <label>Email:</label>
    <input type="email" name="email" value="{{ $user->email }}"><br>
    <label>Role:</label>
    <input type="text" name="role" value="{{ $user->role }}"><br>
    <button type="submit">Update User</button>
</form>