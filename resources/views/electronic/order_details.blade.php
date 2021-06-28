@extends('layouts.master')
@section('title')
<title> Order Details</title>
@endsection

@section('content')
<div class="page-content px-2">
    <div class="holder breadcrumbs-wrap mt-0">
        <div class="container">
            <ul class="breadcrumbs">
                <li><a href="{{route('electronic.account_details')}}"><span>My account</span></a></li>
                <li><a href="{{route('electronic.account_order_history')}}"><span>Order history</span></a></li>
                <li><span>Order Details</span></li>
            </ul>
        </div>
    </div>

    <div class="holder">
        <div class="container">
            <div class="border border-dark">
				<table class="table">
			      	<thead >
			          	<tr >
			            	<th class="table-info text-center">Order Detail</th>
			          	</tr>
			      	</thead>
				    <tbody> <!--- Order info head---- -->
			            <tr>
			            	<td><b>Shipping Address :</b> <i> <span > {{$order->shipping_address}}</span> </i> </td>
			            </tr>
                        <tr>
			            	<td><b>Billing Address :</b> <i> <span > {{$order->billing_address}} </span> </i> </td>
			            </tr>
			            <tr class="row pl-2">
			                <td class="col-9">
			                  	<b><span>Order ID: </span></b>{{$order->order_number}}<br>
			                  	<b><span>Order time and date: </span></b><h7>{{$order->created_at}}</h7>
			                </td>
			                <td class="col-5">
			                  	<b><span>Store:</span></b><a href="#"> {{$order->shop_name}}</a><br>
			                  	<b><span>Status:</span></b> {{$order->order_status}}
			                </td>
			                <td class="col-4">
			                  	<b><span>Order Amount: </span></b>{{$order->grand_total +0}}<br>
                                <b><span>Payment Mode: </span></b>{{$order->payment_method}}
			                </td>
			            </tr> 
                        <!-- /order-info-head -->
                        @foreach($order_details as $order_detail)
                            @foreach($products as $product)
                                @if($order_detail->inventory_id == $product->id)
                                    <tr > <!-- ----Order info body---- -->
                                        <td class="row">
                                            <div class="col-4 product-img-wrap">
                                                <img src="{{$img_url}}{{$product->img_path}}" alt="{{$product->name}}" >
                                            </div>
                                            
                                            <div class="col-6 product-info">
                                                <h3><a href="" >{{$product->name}}</a></h3>
                                                <div>
                                                    <span>$ {{$order_detail->unit_price +0}}</span> x <span>{{$order_detail->quantity}}</span>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <h5> Total</h5>
                                                <span>$ {{$order_detail->unit_price * $order_detail->quantity +0}}</span>
                                            </div>
                                        </td>
                                    </tr>
                                    @break
                                @endif
                            @endforeach
                        @endforeach <!-- /.order-body --> 
                    @if($order->order_status_id == 1 || $order->order_status_id == 2 || $order->order_status_id == 3 || $order->order_status_id == 4)
                    <tr>
                        <td>      
                            <div class="row ml-2 d-md-flex justify-content-md-end">
                                <a col-6 href="{{route('cancel_order',$order->id)}}" class="btn btn-danger col-auto" title="cancel the order"><i> Cancel Order </i></a>&emsp;
                                <a href="#" class="btn btn-link col-auto" title="under process try later" >Open Dispute</a>
                            </div>
                        </td>
                    </tr>
                    @endif
			        </tbody>
				</table>
            </div>
        </div>       
    </div>
</div>
@endsection