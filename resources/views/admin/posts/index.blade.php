<x-admin-master>
    @section('content')
        
        @if(Session('message'))
       <div class="alert alert-danger"> {{Session('message')}}</div>
       @elseif(Session('post-create-message'))
       <div class="alert alert-success">{{Session('post-create-message')}}</div>
       @elseif(Session('post-update-message'))
       <div class="alert alert-success">{{Session('post-update-message')}}</div>
        @endif
        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">All Posts</h6>
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
                      <th>Delete</th>
                      
                    </tr>
                  </thead>
                
                  <tbody>
                    @foreach($posts as $post)
                    <tr>
                        <td>{{$post->id}}</td>
                        <td>{{$post->user->name}}</td>
                        <td><a href="{{route('post.edit', $post->id)}}">{{$post->title}}</a></td>
                        <td><img height="40px" src="{{$post->post_image}}" alt=""></td>
                        <td>{{$post->created_at->diffForHumans()}}</td>
                        <td>{{$post->updated_at->diffForHumans()}}</td>
                        <td>
                            <form action="{{route('post.destroy', $post->id)}}" method="post" >
                              @csrf
                              @method('DELETE')
                              <button class="btn btn-danger" type="submit" >Delete</button>
                            </form>
                        </td>
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