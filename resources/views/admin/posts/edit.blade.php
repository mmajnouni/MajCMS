<x-admin-master>
    @section('content')
    <h1>Edit Post</h1>
              <form action="{{route('post.update', $post->id)}}" method="post" enctype="multipart/form-data">

                          @csrf
                          @method('PATCH')
                          <div class="form-group">
                              <label for="title">Title</label>
                              <input type="text" name="title" value="{{$post->title}}" class="form-control" id="title" aria-describedby="" placeholder="Enter title">
                          </div>
                          <div class="form-group">
                            <div><img src="{{$post->post_image}}" width="50%" alt=""></div>
                              <label for="file">File</label>
                              <input type="file" name="post_image" class="form-control-file" id="post_image" aria-describedby="" placeholder="">
                          </div>
                  <div class="form-group">
                      <textarea name="body" id="body" cols="30" rows="10" class="form-control">{{$post->body}}</textarea>
                  </div>

                          <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
    @endsection
</x-admin-master>
