<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Info</title>
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body class="p-4">

    <h3>Employee info</h3>
    
    <h4>Add new employees</h4>
    <form action="{{ route('store') }}" method="POST" class="mb-4">
        @csrf
        <div class="mb-2">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        
        <div class="mb-2">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-2">
            <label for="salary">Salary</label>
            <input type="number" name="salary" class="form-control" required min="0" step="0.01">
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
    </form>

 

    <table class="table table-bordered">
        <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Salary</th>
                <th>Delete</th>
                <th>Edit</th>
            </tr>
        </thead>
        <tbody>
        @foreach($employees as $employee)
           <tr>
             <td> {{$employee->id}} </td>
             <td> {{$employee->name }} </td>
             <td> {{$employee->email}} </td>
             <td> {{$employee->salary}} </td>
             <td>
                <form action="{{ route('delete', $employee->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
             </td>
             <td>
                <button type="button" class="btn btn-warning btn-sm" 
                        data-bs-toggle="modal" 
                        data-bs-target="#editModal"
                        data-id="{{ $employee->id }}"
                        data-name="{{ $employee->name }}"
                        data-email="{{ $employee->email }}"
                        data-salary="{{ $employee->salary }}">
                    Edit
                </button>
             </td>
           </tr> 
         @endforeach
        </tbody>
    </table>

    <!-- Simple Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="editForm" method="POST">
        @csrf
        @method('PUT')
        <div class="modal-body">
            <input type="hidden" name="id" id="edit_id">
            
            <label>Name</label>
            <input type="text" name="name" id="edit_name" class="form-control" required>

            <label>Email</label>
            <input type="email" name="email" id="edit_email" class="form-control" required>

            <label>Salary</label>
            <input type="number" name="salary" id="edit_salary" class="form-control" required min="0" step="0.01">
        </div>
        <div class="modal-footer p-2">
          <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary btn-sm">Update</button>
        </div>
      </form>
    </div>
  </div>
</div>


    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

    <!-- Fill Modal Data Dynamically -->
    <script>
        const editModal = document.getElementById('editModal');
        editModal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget;
            const id = button.getAttribute('data-id');
            const name = button.getAttribute('data-name');
            const email = button.getAttribute('data-email');
            const salary = button.getAttribute('data-salary');

            document.getElementById('edit_id').value = id;
            document.getElementById('edit_name').value = name;
            document.getElementById('edit_email').value = email;
            document.getElementById('edit_salary').value = salary;

            document.getElementById('editForm').action = "{{ url('update') }}/" + id;
        });
    </script>

</body>
</html>
