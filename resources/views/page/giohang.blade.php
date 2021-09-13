@extends('master')
@section('content')	
	<div class="inner-header">
		<div class="container">
			
			<div class="pull-left">
				<h6 class="inner-title">
					@if(Session::has('kiemtra'))
						<div >{{ Session::get('kiemtra') }}</div>
					@endif
				</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="index.html">Home</a> / <span>Shopping Cart</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	
	<div class="container">
		<div id="content">
			
			<div class="table-responsive">
				<!-- Shop Products Table -->
				<table class="shop_table beta-shopping-cart-table" cellspacing="0">
					<thead>
						<tr>
							<th class="product-name">Product</th>
							<th class="product-price">Price</th>
							<th class="product-status">Status</th>
							<th class="product-quantity">Qty.</th>
							<th class="product-subtotal">Total</th>
							<th class="product-quantity">Thêm</th>
							<th class="product-remove">Remove</th>
						</tr>
					</thead>
					<tbody>
				@foreach($product as $pr)
				@endforeach
					@foreach($data as $item)
						<tr class="cart_item">
							<td class="product-name">
								<div class="media">
									<img class="pull-left" src="source/image/product/{{ $item->options->img}}" alt="" height="50px">
									<div class="media-body">
									<p>
										{{$item->name}}
									</p>
										
									
									</div>
								</div>
							</td>

							<td class="product-price">
							
							@if($item->options->khuyenmai==1)
								<span class="amount">{{ number_format((double)($item->price)) }}VNĐ</span>
							@elseif($item->options->khuyenmai==2)
							<span class="amount">{{ number_format((double)($item->price)) }}VNĐ</span>
							@elseif($item->options->khuyenmai==3)
							<span class="amount">{{ number_format((double)($item->price)) }}VNĐ</span>
							@else
							<span class="amount">{{ number_format((double)($item->price)) }}VNĐ</span>
							@endif
							</td>

							<td class="product-status">
								In Stock
							</td>

							<td class="product-quantity">
										
									<p>{{ $item->qty}}</p>								
							</td>

							<td class="product-subtotal">
							@if($item->options->khuyenmai==1)
								<span class="amount">{{ number_format((double)($item->price)*($item->qty)) }}VNĐ</span>
							@elseif($item->options->khuyenmai==2)
							<span class="amount">{{ number_format((double)($item->price)*($item->qty)) }}VNĐ</span>
							@elseif($item->options->khuyenmai==3)
							<span class="amount">{{ number_format((double)($item->price)*($item->qty)) }}VNĐ</span>
							@else
							<span class="amount">{{ number_format((double)($item->price)*($item->qty)) }}VNĐ</span>
							@endif

							</td>

						
							@if($item->qty>$pr->soluong)
							<td class="product-quantity" href="{{ route('kiemtra')}}">
							<a href="{{ route('kiemtra')}}">+</a>

							
							</td>
							@else
							<td class="product-quantity" href="{{ route('Muahang',[$item->id])}}">
							<a href="{{ route('Muahang',[$item->id])}}">+</a>				
							</td>							
							@endif
							<td class="product-remove">
								<a href="{{ route('xoa',$item->rowId) }}" class="remove" title="Remove this item"><i class="fa fa-trash-o"></i></a>
							</td>
						</tr>
						
						@endforeach

					

					</tbody>

					<tfoot>
						<tr>
							<td colspan="6" class="actions">
							@if($total>0)					
								<button   class="beta-btn primary" name="proceed"><a href="{{ route('dathang') }}">Đặt Hàng</a> <i class="fa fa-chevron-right"></i></button>
							@else
							@endif
							</td>
						</tr>
					</tfoot>
					
						<tr>
							<td colspan="6" class="actions">					
								<button   class="beta-btn primary" name="proceed"><a href="{{asset('b/all')}}">Xóa Hết</a> <i class="fa fa-chevron-right"></i></button>
							</td>
						</tr>
					
				
					
					
				</table>
				<!-- End of Shop Table Products -->
			</div>


			<!-- Cart Collaterals -->
			<div class="cart-collaterals">


		
				<div class="cart-totals pull-right">
					<div class="cart-totals-row"><h5 class="cart-total-title">Tổng Tiền</h5></div>
					<div class="cart-totals-row"><h5 class="cart-total-title">{{$total}}</h5></div>
				
				
				
				{{-- <div class="cart-totals-row"><span>Cart Subtotal:</span> {{$total}}</span></div>
								</div>

				<div class="clearfix"></div> --}}
			</div>
			<!-- End of Cart Collaterals -->
			<div class="clearfix"></div>

		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection