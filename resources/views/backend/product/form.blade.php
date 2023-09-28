<!-- Vertically Centered modal Modal -->

<form action="" method="post" id="dataForm">

    @csrf
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Vertically Centered
                    </h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="id">
                    <label for="name">Name</label>
                    <input class="form-control" type="text" name="name" id="name">
                    <label for="description">Description</label>
                    <textarea class="form-control" type="text" name="description" id="description"></textarea>
                    <label for="quantity">Quantity</label>
                    <input class="form-control" type="text" name="quantity" id="quantity">
                    <label for="price">price</label>
                    <input class="form-control" type="text" name="price" id="price">
                    <label for="discount">discount</label>
                    <input class="form-control" type="text" name="discount" id="discount">
                    <label for="discount_status">discount_status</label>
                    <input class="form-control" type="text" name="discount_status" id="discount_status">
                    <label for="category_id">Category</label>
                    <select name="category_id" id="category_id" class="form-select">
                        @foreach ($categories as $data)
                        <option value="{{$data->id}}">{{$data->name}}</option>

                        @endforeach
                    </select>
                    <label for="condition_id">Condition</label>
                    <select name="condition_id" id="condition_id" class="form-select">
                        @foreach ($conditions as $data)
                        <option value="{{$data->id}}">{{$data->name}}</option>

                        @endforeach
                    </select>
                    <label for="user_id">User</label>
                    <select name="user_id" id="user_id" class="form-select">
                        @foreach ($users as $data)
                        <option value="{{$data->id}}">{{$data->name}}</option>

                        @endforeach
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </button>
                    <button type="submit" id="saveBtn" class="btn btn-primary ml-1" data-bs-dismiss="modal">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Accept</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
