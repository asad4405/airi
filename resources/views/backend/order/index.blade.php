@extends('layouts.backend_master')
@section('title')
    Order
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3>Order Lists</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>SL</th>
                            <th>Order ID</th>
                            <th>Total</th>
                            <th>Order Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        @forelse ($orders as $order)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $order->order_id }}</td>
                                <td>{{ $order->total + $order->charge }} Taka</td>
                                <td>{{ $order->order_date }}</td>
                                @if ($order->status == 0)
                                    <td class="badge bg-secondary">Placed</td>
                                @elseif ($order->status == 1)
                                    <td class="badge bg-primary">Processing</td>
                                @elseif ($order->status == 2)
                                    <td class="badge bg-warning">Shipping</td>
                                @elseif ($order->status == 3)
                                    <td class="badge bg-warning">Ready for Deliver</td>
                                @elseif ($order->status == 4)
                                    <td class="badge bg-success">Delivered</td>
                                @elseif ($order->status == 5)
                                    <td class="badge bg-danger">Canceled</td>
                                @endif
                                <td>
                                    <form action="{{ route('order.status.update',$order->id) }}" method="POST">
                                        @csrf
                                        <div class="dropdown">
                                            <button class="btn dropdown-toggle" type="button" data-toggle="dropdown"
                                                aria-expanded="false">
                                                Change Status </button>
                                            <div class="dropdown-menu">
                                                <button name="status" value="0"
                                                    style="background: #{{ $order->status == 0 ? 'ddd' : '' }}"
                                                    class="dropdown-item">Placed</button>
                                                <button name="status" value="1"
                                                    style="background: #{{ $order->status == 1 ? 'ddd' : '' }}"
                                                    class="dropdown-item">Processing</button>
                                                <button name="status" value="2"
                                                    style="background: #{{ $order->status == 2 ? 'ddd' : '' }}"
                                                    class="dropdown-item">Shipping</button>
                                                <button name="status" value="3"
                                                    style="background: #{{ $order->status == 3 ? 'ddd' : '' }}"
                                                    class="dropdown-item">Ready For Deliver</button>
                                                <button name="status" value="4"
                                                    style="background: #{{ $order->status == 4 ? 'ddd' : '' }}"
                                                    class="dropdown-item">Delivered</button>
                                                <button name="status" value="5"
                                                    style="background: #{{ $order->status == 5 ? 'ddd' : '' }}"
                                                    class="dropdown-item">Cancel</button>
                                            </div>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        @empty
                        @endforelse
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
