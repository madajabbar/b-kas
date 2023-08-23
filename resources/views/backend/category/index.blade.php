@extends('backend.layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('dist/assets/css/pages/fontawesome.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('dist/assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('dist/assets/css/pages/datatables.css') }}" />
@endsection
@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>DataTable Jquery</h3>
                    <p class="text-subtitle text-muted">
                    </p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="index.html">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                DataTable Jquery
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <!-- Basic Tables start -->
        <section class="section">
            <div class="card">
                <div class="card-header">Jquery Datatable</div>
                <div class="card-body">
                    <table class="table" id="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Product</th>
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
                ajax: "{{ route('category.table') }}",
                columns: [{
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'product',
                        name: 'product'
                    },
                    {
                        data: 'action',
                        name: 'action'
                    },
                ]
            });
        });
    </script>
@endsection
