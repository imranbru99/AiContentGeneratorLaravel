@extends('admin.layouts.app')
@section('panel')
    <form action="{{ route('admin.category.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="name" class="control-label">Name:</label>
            <input type="text" name="name" id="name" class="form-control form-control-lg"
                value="{{ old('name') }}">
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>


        <div>
            <label for="description">Description</label>
            <textarea name="description" id="description">{{ old('description') }}</textarea>
            @error('description')
                <span>{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="image">Image</label>
            <input type="file" name="image" id="image">
            <img src="" alt="" id="preview-image" style="max-width: 300px; max-height: 300px;">
            @error('image')
                <span>{{ $message }}</span>
            @enderror
        </div>

        <button class="btn btn-primary" type="submit">Create Category</button>
    @endsection
    @push('script')
        <script>
            $(function() {
                // When a file is selected, show its preview image
                $('#image').change(function(event) {
                    var file = event.target.files[0];
                    var reader = new FileReader();
                    reader.onload = function(event) {
                        $('#preview-image').attr('src', event.target.result);
                    };
                    reader.readAsDataURL(file);
                });
            });
        </script>
    @endpush
