<x-admin-master>
    @section('content')
        <div class="row">
        <div class="col-sm-3">
            @if(session('Role-Update'))
                <div class="alert alert-success">{{session('Role-Update')}}</div>
            @endif
       <h2> Edit Role: {{$role->name}}</h2>
        <form action="{{route('role.update', $role->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="role">Name</label>
                <input type="text" name="role" class="form-control" value="{{$role->name}}" id="role" placeholder="">
            </div>

            <button class="btn btn-primary">Update</button>
        </form>
        </div>
        </div>
    @if($permissions->isNotEmpty())
        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Permissions</h6>
                    </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="usersTable" width="100%" cellspacing="0">
                            <thead>

                            <tr>
                                <th>Options</th>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Attach</th>
                                <th>Detach</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($permissions as $permission)
                                <tr>
                                    <td>
                                        <input type="checkbox"
                                        @foreach($role->permissions as $role_permission)
                                        @if($role_permission->slug == $permission->slug)
                                            checked
                                        @endif
                                        @endforeach
                                        >
                                    </td>
                                <td>{{$permission->id}}</td>
                                <td>{{$permission->name}}</td>
                                <td>{{$permission->slug}}</td>
                                <td>    <form action="{{route('role.permission.attach', $role)}}" method="post">
                                        @csrf
                                        @method('put')
                                        <input type="hidden" name="permission" value="{{$permission->id}}">
                                        <button class="btn btn-primary"
                                                @if($role->permissions->contains($permission))
                                                disabled
                                            @endif
                                        >Attach</button>
                                    </form>
                                </td>
                                    <td>    <form action="{{route('role.permission.detach', $role)}}" method="post">
                                            @csrf
                                            @method('put')
                                            <input type="hidden" name="permission" value="{{$permission->id}}">
                                            <button class="btn btn-danger"
                                                    @if(!$role->permissions->contains($permission))
                                                    disabled
                                                @endif
                                            >Detach</button>
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
        </div>
    @endif
    @endsection
</x-admin-master>
