<form method="POST" action="/admin/doctors/edit/{{ $doctor->id }}">
    @csrf
    <label>Name:</label>
    <input type="text" name="name" value="{{ $doctor->name }}"><br>
    <label>Email:</label>
    <input type="email" name="email" value="{{ $doctor->email }}"><br>
    <label>Specialty:</label>
    <input type="text" name="specialty" value="{{ $doctor->specialty }}"><br>
    <button type="submit">Update Doctor</button>
</form>