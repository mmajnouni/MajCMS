<x-admin-master>
    @section('content')
        <h1>All Posts</h1>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Owner</th>
                      <th>Title</th>
                      <th>Image</th>
                      <th>Created At</th>
                      <th>Updated At</th>
                      
                    </tr>
                  </thead>
                
                  <tbody>
                    @foreach($posts as $post)
                    <tr>
                        <td>{{$post->id}}</td>
                        <td>{{$post->user->name}}</td>
                        <td>{{$post->title}}</td>
                        <td><img height="40px" src="{{$post->post_image}}" alt=""></td>
                        <td>{{$post->created_at->diffForHumans()}}</td>
                        <td>{{$post->updated_at->diffForHumans()}}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
    @endsection

    @section('scripts')
      <!-- Page level plugins -->
  <script src="{{asset('js/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('js/datatables/dataTables.bootstrap4.min.js')}}"></script>

  <!-- Page level custom scripts -->
  <script src="{{asset('js/datatables-demo.js')}}"></script>
    @endsection
</x-admin-master>