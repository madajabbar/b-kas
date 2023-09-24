<div class="modal fade subscribe_popup" id="image-popup" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="ion-ios-close-empty"></i></span>
                </button>
                <div class="login_register_wrap section">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col">
                                <div class="padding_eight_all bg-white">
                                    <div class="heading_s1">
                                        <h3>Image</h3>
                                    </div>
                                    <form method="POST" action="{{ route('user.product.image') }}"  enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group mb-3">
                                            <input type="hidden" name="id" value="{{$product->id ?? ''}}">
                                            <input id="image" type="file"
                                                class="form-control"
                                                name="image" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*">
                                        </div>
                                        <div class="form-group mb-3">
                                            <button type="submit" class="btn btn-fill-out btn-block"
                                                name="login">Save Image</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
