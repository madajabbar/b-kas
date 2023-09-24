
<div class="tab-pane fade" id="orders" role="tabpanel" aria-labelledby="orders-tab">
    <div class="card">
        <div class="card-header">
            <h3>Orders</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Order</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Total</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{$order->order_id}}</td>
                                <td>
                                    {{\Carbon\Carbon::parse($order->created_at)->format('d F Y')}}
                                </td>
                                <td>{{$order->status}}</td>
                                <td>
                                    Rp. {{$order->total_payment}} for {{count($order->orderDetail)}}
                                    item
                                </td>
                                <td>
                                    <a href="#" class="btn btn-fill-out btn-sm">View</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
