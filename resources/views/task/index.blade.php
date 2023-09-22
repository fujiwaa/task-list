<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>List Task</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
  <body>

    <div class="container mt-5">
        <h1 class="text-center mb-5">List Task</h1>
        <a href="{{ route('task.create') }}" class="btn btn-primary mb-3">Add Task</a>
        @if (session('task-success'))
            <div class="alert alert-success" role="alert">
                {{ session('task-success') }}
            </div>
        @endif
        <div class="card">
            <div class="card-body">
                <table class="table">
                    <thead>
                        <th>No.</th>
                        <th>Nama Task</th>
                        <th>Status</th>
                        <th>User</th>
                    </thead>
                    <tbody>
                            @forelse ($task as $cl => $hasil)
                                <tr>
                                    <th>{{ $cl+1 }}</th>
                                    <td>{{ $hasil->nama_task }}</td>
                                    <td>{{ $hasil->Status->nama_status }}</td>
                                    <td>{{ $hasil->User->nama_user }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="10" align="center">Tidak ada data.</td>
                                </tr>
                            @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>