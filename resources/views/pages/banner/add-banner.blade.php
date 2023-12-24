<form role="form" action="{{ route('banner.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row justify-content-center">
        <div class="col-lg-8 mt-2">
            <label for="">Enter Banner Title : </label>
        </div>
        <div class="col-lg-8">
            <div class="form-group">
                <input class="form-control" type="text" name='title' id="title" placeholder="Add Title">
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
