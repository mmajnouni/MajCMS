<x-admin-master>
    @section('content')
        Roles
    <div class="row">

            @if(Session('message'))
            <div class="alert alert-success">{{Session('message')}} </div>
            @endif

    </div>
    <div class="row">
        <div class="col-sm-3">

       <form action="" method="post" enctype="multipart/form-data">
             @csrf
             <div class="form-group">
              <label for="name">Name</label>
   <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="">
                 <div>
                     @error('name')
                     <span>{{$message}}</span>
                     @enderror
                 </div>
              </div>

           <button class="btn btn-primary btn-block">Create</button>
      </form>
        </div>

        <div class="col-sm-9">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="usersTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Delete</th>

                       </tr>
                        </thead>

                        <tbody>
                            @foreach($roles as $role)
                            <tr>
                                <td>{{$role->id}}</td>
                                <td><a href="{{route('role.edit', $role->id)}}">{{$role->name}}</a></td>
                                <td>{{$role->slug}}</td>
                                <td>
                                    <form action="{{route('role.destroy', $role->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" >Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endsection
</x-admin-master>
