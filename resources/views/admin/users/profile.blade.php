<x-admin-master>
    @section('content')
        <h2>User Profile: {{$user->name}}</h2>
            <div class="row">
                <div class="col-sm-6">
                    <form action="" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for=""></label>
                            <input type="text" name="" class="form-control" id="" placeholder="">
                        </div>

                        <div class="form-group">
                            <label for=""></label>
                            <input type="text" name="" class="form-control" id="" placeholder="">
                        </div>
                    <button class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
    @endsection
</x-admin-master>


