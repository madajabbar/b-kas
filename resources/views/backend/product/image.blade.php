@extends('backend.layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('dist/assets/css/pages/fontawesome.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('dist/assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('dist/assets/css/pages/datatables.css') }}" />
@endsection
@section('content')
    <div class="page-heading">

        @include('backend.layouts.page-title')

        @include('backend.product.image-form')
        <!-- Basic Tables start -->
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <button type="button" class="btn btn-outline-primary block input" data-bs-toggle="modal"
                        data-bs-target="#exampleModalCenter">
                        Add Data
                    </button>
                </div>
                <div class="card-body">
                    <table class="table" id="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Link</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        <!-- Basic Tables end -->
    </div>
@endsection
@section('js')
    <script src="{{ asset('dist/assets/extensions/jquery/jquery.min.js') }}"></script>
    <script src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>
    <script src="{{ asset('dist/assets/js/pages/datatables.js') }}"></script>

    <script>
        $(function() {
            var table = $('.table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('product-image.index') }}",
                    data: function(data) {
                        data.product_id = "{{ $product_id }}";
                        return data;
                    }
                },
                columns: [{
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'link',
                        name: 'link'
                    },
                    {
                        data: 'action',
                        name: 'action'
                    },
                ]
            });
        });
    </script>
    <script>
        $('body').on('click', '.input', function() {
            $('#name').val('');
            $('#saveBtn').html("Save");
        })
        $('body').on('click', '.edit', function() {
            var data_id = $(this).data('id');
            $.get("{{ route('product-image.index') }}" + '/' + data_id + '/edit', function(data) {
                $('#exampleModalCenterTitle').html("Edit");
                $('#saveBtn').html("edit");
                $('#exampleModalCenter').modal('show');
                $('#product_id').val(data.id);
                $('#name').val(data.name);
                $('#link').val(data.link);
            })
        });
        $('body').on('click', '.delete', function() {
            var data_id = $(this).data('id');
            console.log(data_id);
            Swal.fire({
                title: 'Do you want to save delete this condition?',
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: 'Yes',
                denyButtonText: `No`,
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    var csrfToken = $('meta[name="csrf-token"]').attr('content'); // Get CSRF token
                    $.ajax({
                        cache: false,
                        headers: {
                            'X-CSRF-TOKEN': csrfToken // Include CSRF token in the request headers
                        },
                        contentType: false,
                        processData: false,
                        url: "{{ route('product-image.destroy', '') }}" + "/" + data_id,
                        type: 'DELETE',
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        success: function(data) {
                            $('#exampleModalCenter').modal('hide');
                            $('#saveBtn').html('success');
                            // $('#name').val('');
                            Swal.fire({
                                icon: 'success',
                                title: 'Data berhasil dihapus',
                            })
                            reloadDatatable();
                        },
                        error: function(data) {
                            console.log('Error:', data);
                            Swal.fire({
                                icon: 'error',
                                title: 'Terjadi Error!',
                            })
                            $('#saveBtn').html('Error');
                        }
                    })
                    Swal.fire('Saved!', '', 'success')
                } else if (result.isDenied) {
                    Swal.fire('Changes are not saved', '', 'info')
                }
            })
        });
        $(function() {
            $('#saveBtn').click(function(e) {
                e.preventDefault();
                $(this).html('Sending..');
                var myform = document.getElementById('dataForm');
                var formData = new FormData(myform);
                $.ajax({
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    url: "{{ route('product-image.store') }}",
                    type: "POST",
                    dataType: 'json',
                    success: function(data) {
                        $('#exampleModalCenter').modal('hide');
                        $('#saveBtn').html('success');
                        Swal.fire({
                            icon: 'success',
                            title: 'Data berhasil dimasukan',
                        })
                        reloadDatatable();
                    },
                    error: function(data) {
                        console.log('Error:', data);
                        Swal.fire({
                            icon: 'error',
                            title: 'Terjadi Error!',
                        })
                        $('#saveBtn').html('Error');
                    }
                });
            });
        });
    </script>
    <script>
        function reloadDatatable() {
            $('.table').DataTable().ajax.reload();
        }
    </script>
@endsection
