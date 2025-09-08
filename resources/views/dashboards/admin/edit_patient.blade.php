<form method="POST" action="/admin/patients/edit/{{ $patient->id }}">
    @csrf
    <label>Name:</label>
    <input type="text" name="name" value="{{ $patient->name }}"><br>
    <label>Email:</label>
    <input type="email" name="email" value="{{ $patient->email }}"><br>
    <label>Gender:</label>
    <input type="text" name="gender" value="{{ $patient->gender }}"><br>
    <button type="submit">Update Patient</button>
</form>