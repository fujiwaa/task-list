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
        <div class="card">
            <div class="card-body">
              <form action="{{ route('task.update', $task->id_task_list) }}" method="POST">
                @csrf
                @method('patch')
                <div class="mb-3 row">
                  <label for="nama_task" class="col-sm-2 col-form-label">Nama Task</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama_task" name="nama_task" value="{{ $task->nama_task }}">
                  </div>
                </div>

                <div class="mb-3 row">
                  <label for="id_status_task" class="col-sm-2 col-form-label">Status</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name="id_status_task" id="id_status_task">
                      @foreach ($status as $stat)
                      <option value="{{ $stat->id_status_task }}" {{ $task->id_status_task == $stat->id_status_task ? 'selected' : ''}}>{{ $stat->nama_status }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                
                <div class="mb-3 row">
                  <label for="id_user" class="col-sm-2 col-form-label">User</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name="id_user" id="id_user">
                      @foreach ($user as $us)
                      <option value="{{ $us->id_user }}" {{ $task->id_user == $us->id_user ? 'selected' : ''}}>{{ $us->nama_user }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>

                <button type="submit" class="btn btn-primary float-end">Edit</button>
              </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>