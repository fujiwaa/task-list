<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>List User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
  <body>

    <div class="container mt-5">
        <h1 class="text-center mb-5">List User</h1>
        <a href="{{ route('user.create') }}" class="btn btn-primary mb-3">Add User</a>
        <div class="card">
            <div class="card-body">
              <form action="{{ route('user.update', $user->id_user) }}" method="POST">
                @csrf
                @method('patch')
                <div class="mb-3 row">
                  <label for="nama_user" class="col-sm-2 col-form-label">Nama user</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama_user" name="nama_user" value="{{ $user->nama_user }}">
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