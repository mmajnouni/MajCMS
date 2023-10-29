<x-admin-master>
    @section('content')
    <h1>Create Post</h1>
        <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('post')
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" aria-describedby="" placeholder="Enter title">
                <div>
                    @error('title')
                    <span>{{$message}}</span>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="file"><b>Featured Image Post</b></label>
                <input type="file" name="post_image" class="form-control-file" id="post_image" aria-describedby="" placeholder="">
                <div class="span">
                    Supported image format: jpg,jpeg,png,webp <br/>Max Image Size: 6000 KB
                </div>
            </div>

            <div class="form-group">

                <x-forms.tinymce-editor/>
                <div>
                    @error('body')
                    <span>{{$message}}</span>
                    @enderror
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    @endsection
</x-admin-master>
