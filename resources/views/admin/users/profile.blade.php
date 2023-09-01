<x-admin-master>
    @section('content')
        <h2>User Profile: {{$user->name}}</h2>
            <div class="row">
                <div class="col-sm-6">
                    <form action="{{route('user.profile.update', $user)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <img class="img-profile rounded-circle" src="{{$user->avatar}}">
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
                            <input type="password" name="password" class="form-control" id="password" placeholder="">
                            @error('password')
                            <div class="alert alert-danger">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="passwordconfirmation">Password Confirmation</label>
                            <input type="password" name="password_confirmation" class="form-control" id="passwordconfirmation" placeholder="">
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
    @endsection
</x-admin-master>


