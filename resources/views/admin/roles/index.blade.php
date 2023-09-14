<x-admin-master>
    @section('content')
        Roles
    <div class="row">
        <div class="sm-col-3">
       <form action="" method="post" enctype="multipart/form-data">
             @csrf
             <div class="form-group">
              <label for="name">Name</label>
             <input type="text" name="name" class="form-control" id="name" placeholder="">
              </div>
           <button class="btn btn-primary btn-block">Create</button>
      </form>
        </div>

        <div class="col-sm9">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="usersTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>UserName</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Avatr</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Delete</th>

                        </tr>
                        </thead>

                        <tbody>

                            <tr>
                                <td>
                                </td>

                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endsection
</x-admin-master>
