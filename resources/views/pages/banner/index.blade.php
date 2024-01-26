@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1 class="page-title">My Banner List</h1>
            </div>

            <div class="col-lg-12 mb-3">
                <a onclick="add()" href="javascript:void(0)" type="button" class="btn btn-secondary btn-sm"><i
                        class="fa fa-plus-circle"></i> Add New Banner</a>
            </div>
            <div class="col-lg-12 mt-5">
                <table class="table table-bordered border-dark table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Image</th>
                            <th scope="col">Status</th>
                            <th scope="col">Created Date</th>
                            <th scope="col">Completed Date</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($banners as $key => $banner)
                            <tr>
                                <th scope="row">{{ ++$key }}</th>
                                <td>{{ $banner->title }}</td>
                                <td>
                                    @if ($banner->images)
                                        <img src="{{ config('images.access_path') }}/{{ $banner->images->name }}"
                                            alt="" class="banner-table">
                                    @endif
                                </td>
                                <td>
                                    @if ($banner->status == 0)
                                        <span class="badge bg-warning">Draft</span>
                                    @else
                                        <span class="badge bg-success">Publish</span>
                                    @endif
                                </td>
                                <td>{{ $banner->created_at->format('Y-m-d H:i:s') }}</td>
                                <td>{{ $banner->updated_at->format('Y-m-d H:i:s') }}</td>
                                <td class="d-flex align-items-center">
                                    <a href="{{ route('banner.delete', $banner->id) }}" class="btn btn-danger btn-sm"><i
                                            class="fa fa-trash-alt"></i></a>
                                    @if ($banner->status == 0)
                                        <a href="{{ route('banner.status', $banner->id) }}"
                                            class="btn btn-success btn-sm"><i class="fa-regular fa-circle-check"></i>
                                            Publish</a>
                                    @else
                                        <a href="{{ route('banner.status', $banner->id) }}"
                                            class="btn btn-warning btn-sm"><i class="fa-regular fa-circle-check"></i>
                                            Draft</a>
                                    @endif
                                    <a href="javascript:void(0)" class="btn btn-dark btn-sm"><i class="fa-solid fa-pencil"
                                            data-bs-toggle="modal" data-bs-target="#bannerAdd"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Add Banner Modal -->
    <div class="modal fade" id="bannerAdd" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="bannerAddLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="bannerAddLabel">Add New Banner</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="bannerAddContent">
                    <form role="form" action="{{ route('banner.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row justify-content-center">
                            <div class="col-lg-8 mt-2">
                                <label for="">Enter Banner Title : </label>
                            </div>
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <input class="form-control" type="text" name='title' id="title"
                                        placeholder="Add Title">
                                </div>
                                <div class="form-group mt-5">
                                    <input class="form-control dropify" type="file" name='images' id="images"
                                        placeholder="Add Banner" accept="image/png, image/gif, image/jpeg, image/jpg">
                                </div>
                            </div>
                            <div class="mt-4 text-center col-lg-8">
                                <button type="submit" class="btn btn-dark btn-sm">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End of the Add Banner Modal -->
@endsection

@push('css')
    <style>
        .page-title {
            margin-top: 10vh;
            font-size: 2rem;
            color: rgb(0, 130, 111);
        }

        .btn {
            /*space between two icons */
            margin-left: 20px;
        }

        .banner-table {
            max-height: 3rem;
            max-width: 5rem;
        }

        .dropify-message p {
            color: rgb(153, 135, 218);
            font-size: 20px;
        }
    </style>
@endpush

@push('js')
    <script>
        $('.dropify').dropify();
    </script>
@endpush

@push('js')
    <script>
        function add() {
            $('#bannerAdd').modal('show');
        }
    </script>
@endpush
