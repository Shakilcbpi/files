<!DOCTYPE html>
<html>
<head>
    <title>Static CRUD Example</title>
</head>
<body>
    <h1>Static CRUD Demo</h1>

    <!-- CREATE FORM -->
    <h2>Create New Employee</h2>
      <form action="{{ route('store') }}" method="POST" style="margin-bottom:20px;">
        @csrf
        <input type="text" name="name" placeholder="Enter name" required>
        <input type="email" name="email" placeholder="Enter email" required>
        <button type="submit">Create</button>
    </form>

    <!-- LIST POSTS -->
    <h2>All Posts</h2>
    <table border="1" width="100%" cellpadding="10" cellspacing="5">
        <thead>
            <tr>
                <th>ID</th>
                <th>name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
           @foreach($employees as $employee)
            <tr>
                <td>{{$employee->id}}</td>
                <td>{{$employee->name}}</td>
                <td>{{$employee->email}}</td>
                <td>
                    <a href="#">Edit</a>  
                    <form action="{{route('delete',$employee->id)}}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure to delete this employee?')">Delete</button>
                    </form>
                </td>
            </tr> 
           @endforeach
        </tbody>
    </table>
</body>
</html>
