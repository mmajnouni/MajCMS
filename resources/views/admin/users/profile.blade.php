<x-admin-master>
    @section('content')
        <h2>User Profile: {{$user->name}}</h2>

        @if(Session('message'))
            <div class="alert alert-success">{{Session('message')}} </div>
        @endif

            <div class="row">
                <div class="col-sm-6">
                    <form action="{{route('user.profile.update', $user)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <img class="img-profile rounded-circle" src="{{$user->avatar}}" height="300">
                        </div>
                        <div class="form-group">
                            <input type="file" name="avatar">
                        </div>
                        <div class="form-group">
                            <label for="username">User Name</label>
                            <input type="text" name="username" value="{{$user->username}}" class="form-control" id="username" placeholder="">
                        @error('username')
                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
                        @enderror
                        </div>
                        <div class="form-group">
                            <label for="name">name</label>
                            <input type="text" name="name" value="{{$user->name}}" class="form-control" id="name" placeholder="">
                            @error('name')
                            <div class="alert alert-danger">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" name="email" value="{{$user->email}}" class="form-control" id="email" placeholder="">
                            @error('email')
                            <div class="alert alert-danger">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" id="password" value="" placeholder="">
                            @error('password')
                            <div class="alert alert-danger">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="passwordconfirmation">Password Confirmation</label>
                            <input type="password" name="password_confirmation" class="form-control" id="passwordconfirmation" value="" placeholder="">
                        </div>
                        @error('password_confirmation')
                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
                        @enderror
                    <button class="btn btn-primary" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Roles</h6>
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
                                @foreach($roles as $role)
                                    <tr>
                                        <td><input type="checkbox"
                                            @foreach($user->roles as $user_role)
                                                @if($user_role->slug == $role->slug)
                                                    checked
                                                @endif
                                            @endforeach
                                            ></td>
                                        <td>{{$role->id}}</td>
                                        <td>{{$role->name}}</td>
                                        <td>{{$role->slug}}</td>
                                        <td>
                                            <form action="{{route('user.role.attach', $user)}}" method="post">
                                                @csrf
                                                @method('put')
                                                <input type="hidden" name="role" value="{{$role->id}}">
                                            <button class="btn btn-primary"
                                            @if($user->roles->contains($role))
                                                disabled
                                            @endif
                                            >Attach</button>
                                            </form>
                                        </td>
                                        <td>
                                            <form action="{{route('user.role.detach', $user)}}" method="post">
                                                @csrf
                                                @method('put')
                                                <input type="hidden" name="role" value="{{$role->id}}">
                                                <button class="btn btn-danger"
                                                        @if(!$user->roles->contains($role))
                                                        disabled
                                                        @endif
                                                >detach</button>
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
    @endsection
</x-admin-master>


