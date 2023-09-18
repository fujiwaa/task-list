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
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                            @forelse ($task as $cl => $hasil)
                                <tr>
                                    <th>{{ $cl+1 }}</th>
                                    <td>{{ $hasil->nama_task }}</td>
                                    <td>{{ $hasil->status_task }}</td>
                                    <td>{{ $hasil->User->nama_user}}</td>
                                    <td>
                                        <form action="{{ route('task.destroy', $hasil->id_task_list) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <a href="{{ route('task.edit', $hasil->id_task_list) }}" class="btn btn-success btn-sm">Edit</a>
                                            <button class="btn btn-danger btn-sm">Hapus</button>
                                        </form>
                                    </td>
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

        <h1 class="text-center mt-5 mb-5">List User</h1>
        <a href="{{ route('user.create') }}" class="btn btn-primary mb-3">Add User</a>
        @if (session('user-success'))
            <div class="alert alert-success" role="alert">
                {{ session('user-success') }}
            </div>
        @endif
        <div class="card">
            <div class="card-body">
                <table class="table">
                    <thead>
                        <th>No.</th>
                        <th>Nama User</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                            @forelse ($user as $cl => $hasil)
                                <tr>
                                    <th>{{ $cl+1 }}</th>
                                    <td>{{ $hasil->nama_user }}</td>
                                    <td>
                                        <form action="{{ route('user.destroy', $hasil->id_user) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <a href="{{ route('user.edit', $hasil->id_user) }}" class="btn btn-success btn-sm">Edit</a>
                                            <button class="btn btn-danger btn-sm">Hapus</button>
                                        </form>
                                    </td>
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