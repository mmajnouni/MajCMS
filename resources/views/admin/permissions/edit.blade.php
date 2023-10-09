<x-admin-master>
    @section('content')
        Edit: {{$permission->name}}
        <div class="row">
            <div class="col-sm-6">
                @if(session('Permission-Update'))
                    <div class="alert alert-success">{{session('Permission-Update')}}</div>
                @endif
                <h2> Edit Permission: {{$permission->name}}</h2>
                <form action="{{route('permissions.update', $permission->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="role">Name</label>
                        <input type="text" name="permission" class="form-control" value="{{$permission->name}}" id="role" placeholder="">
                    </div>

                    <button class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>


    @endsection
</x-admin-master>
