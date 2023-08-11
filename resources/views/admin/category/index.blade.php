@extends('admin.layouts.app')
@section('panel')
    <div class="container">
        <div class="row justify-center">
            <table>
                <thead>
                    <tr>
                        <th>Sr</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Action</th>
                        <th>Image</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($categories as $category)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $category->name }}</td>
                            <td>
                                @if ($category->status == 0)
                                    <a href="{{ route('admin.category.status', $category->id) }}" class="btn btn-danger">Non
                                        published</a>
                                @elseif ($category->status == 1)
                                    <a href="{{ route('admin.category.status', $category->id) }}"
                                        class="btn btn-success">Published</a>
                                @endif
                            </td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary">Actions</button>
                                    <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                        id="dropdown-toggle">
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <div class="dropdown-menu" id="dropdown-menu">
                                        <a class="btn btn-warning"
                                            href="{{ route('admin.category.edit', $category->id) }}">Edit</a>
                                        <form action="{{ route('admin.category.delete', $category->id) }}" method="POST">
                                            @csrf
                                            @method('POST')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                            <td>
                                @if ($category->image)
                                    <a href="#" class="show-image" data-src="{{ asset($category->image) }}">
                                        <img src="{{ asset($category->image) }}" alt="{{ $category->name }}" width="50">
                                    </a>
                                @else
                                    No image
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="text-center">There is no Category<a href="{{ route('admin.category.create') }}">
                                    Create a new </a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Popup image container -->
    <div id="popup-image-container">
        <div id="popup-image-wrapper">
            <img src="" alt="" id="popup-image">
            <button id="close-popup"><i class="fas fa-times"></i></button>
        </div>
    </div>
@endsection

@push('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-J5rqjK5+0I0X5v5OyCyJGGtXYSoZifnudE7j+ZpAtCWCtB/WkVKg9QGByohy/B+2Q7bRlUMYdO7VZfplZZ4g7A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        #popup-image-container {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 9999;
        }

        #popup-image-wrapper {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            max-width: 80%;
            max-height: 80%;
            background-color: white;
            border-radius: 5px;
            padding: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
            overflow: hidden;
        }

        #popup-image {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        #close-popup {
            position: absolute;
            top: 5px;
            right: 5px;
            background-color: transparent;
            color: white;
            border: none;
            cursor: pointer;
        }
    </style>
@endpush

@push('script')
    <!-- jQuery library -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#dropdown-toggle').on('click', function() {
                $('#dropdown-menu').toggleClass('show');
            });
        });
    </script>

    <script>
        $(function() {
            // When the small image is clicked, show the popup with the big image
            $('.show-image').click(function(event) {
                event.preventDefault();
                var src = $(this).data('src');
                $('#popup-image').attr('src', src);
                $('#popup-image-container').show();
            });

            // When the popup close button is clicked, hide the popup
            $('#close-popup').click(function() {
                $('#popup-image-container').hide();
            });
        });
    </script>
@endpush
