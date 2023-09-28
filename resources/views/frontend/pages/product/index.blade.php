@extends('frontend.layouts.app')
@section('css')
    <style>
        /* Custom CSS for paginator colors */
        .pagination .page-item .page-link {
            color: #c7ea46;
            /* Change to your desired color */
        }

        .pagination .page-item.active .page-link {
            background-color: #c7ea46;
            /* Change to your desired active link color */
            border-color: white;
            /* Change to your desired active link color */
            color: white;
            /* Change to your desired active link text color */
        }
    </style>
@endsection

@section('content')
    <!-- START SECTION SHOP -->
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="row align-items-center mb-4 pb-1">
                        <div class="col-12">
                            <div class="product_header">
                                <div class="product_header_right">
                                    <div class="products_view">
                                        <a href="javascript:Void(0);" class="shorting_icon grid active"><i
                                                class="ti-view-grid"></i></a>
                                        <a href="javascript:Void(0);" class="shorting_icon list"><i
                                                class="ti-layout-list-thumb"></i></a>
                                    </div>
                                    <div class="custom_select">
                                        <select class="form-control form-control-sm">
                                            <option value="">
                                                Showing
                                            </option>
                                            <option value="9">9</option>
                                            <option value="12">
                                                12
                                            </option>
                                            <option value="18">
                                                18
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row shop_container">
                        @foreach ($product as $data)
                            <div class="col-md-4 col-6">
                                @include('frontend.layouts.util.product')
                            </div>
                        @endforeach
                    </div>
                    <div class="row">
                        <div class="col-12">
                            {{ $product->links() }}
                        </div>
                    </div>
                </div>
                @include('frontend.pages.product.sidebar')
            </div>
        </div>
    </div>
    <!-- END SECTION SHOP -->
@endsection


@section('js')
    <script>
        $(document).ready(function() {
            $.get('/api/category', function(data) {
                var widgetCategory = $('#widgetCategory');
                data.forEach(function(category) {
                    var form = $('<form>')
                        .attr('action', ' ') // Set your desired action URL here
                        .attr('method', 'GET');

                    var categoryInput = $('<input>')
                        .attr('type', 'hidden')
                        .attr('name', 'category_id') // Use the appropriate input name
                        .val(category.slug); // Use the category ID or relevant identifier
                    var submitButton = $('<button>')
                        .addClass('btn categories_name border-none')
                        .attr('type', 'submit')
                        .text(category.name);

                    form.append(categoryInput, submitButton);
                    var categoryItem = $('<li>').append(form);
                    widgetCategory.append(categoryItem);
                });
            });
        });
    </script>

    <!-- jquery-ui -->
@endsection
