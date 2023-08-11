@extends('admin.layouts.app')
@section('panel')
    <div class="cmn-section">
        <div class="container">
            <div class="col-md-12">
                <div class="row justify-content-center">
                    <form method="POST" action="{{ route('admin.post.generate.topic') }}">
                        @csrf
                        <div class="row">
                            <label for="keyword">Keyword:</label>
                            <input type="text" name="keyword" placeholder="Type a topic" value="{{old('keyword')}}" required>
                        </div>
                        <button type="submit" class="btn btn-outline-success mx-auto">
                            <span>Generate a New Post</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
