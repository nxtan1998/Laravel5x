@extends('master')
@section('content')
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title"> </h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="index.html">Home</a> / <span></span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-3">
						<ul class="aside-menu">
							@foreach($loai as $sp)
							<li><a href="{{ route('loaisanpham',$sp->id) }}">{{ $sp->name }}</a></li>
							@endforeach
						</ul>
					</div>
					<div class="col-sm-9">
						<div class="beta-products-list">
							<h4>{{ $ten->name }}</h4>
							<div class="beta-products-details">
								<p class="pull-left">Tìm Thấy {{ count($sp_theoloai) }} Sản Phẩm</p>
								<div class="clearfix"></div>
							</div>

							<div class="row">
								@foreach($sp_theoloai as $new)
																<div class="col-sm-3">
									<div class="single-item">
										@if($new->soluong<=0)
											<div class="ribbon-wrapper"><div class="ribbon sale">Hết Hàng</div></div>
											<div class="single-item-header">
												<a href="{{ route('trangchu') }}"><img src="source/image/product/{{ $new->image }}" alt="" height="250px"></a>
											</div>
											<div class="single-item-body">
												<p class="single-item-title">{{ $new->name }}</p>
												<p class="single-item-price">
													@if($new->unit==1)
													<span class="flash-del">{{ number_format($new->unit_price) }}VNĐ</span>
													<span class="flash-sale">Giảm 10%</span>
													@elseif($new->unit==2)
													<span class="flash-del">{{ number_format($new->unit_price) }}VNĐ</span>
													<span class="flash-sale">Giảm 20%</span>
													@elseif($new->unit==3)
													<span class="flash-del">{{ number_format($new->unit_price) }}VNĐ</span>
													<span class="flash-sale">Giảm 30%</span>
													@else
													<span class="flash-del">{{ number_format($new->unit_price) }}VNĐ</span>
													@endif
												</p>
											</div>
											@else
											<div class="single-item-header">
												<a href="{{ route('sanpham',$new->id) }}"><img src="source/image/product/{{ $new->image }}" alt="" height="250px"></a>
											</div>
											<div class="single-item-body">
												<p class="single-item-title">{{ $new->name }}</p>
												<p class="single-item-price">
													@if($new->unit==1)
													<span class="flash-del">{{ number_format($new->unit_price) }}VNĐ</span>
													<span class="flash-sale">{{ number_format((double)($new->unit_price)*0.9) }}VNĐ</span>
													<div class="ribbon-wrapper"><div class="ribbon sale">Giảm 10%</div></div>
													@elseif($new->unit==2)
													<span class="flash-del">{{ number_format($new->unit_price) }}VNĐ</span>
													<span class="flash-sale">{{ number_format((double)($new->unit_price)*0.8) }}VNĐ</span>
													<div class="ribbon-wrapper"><div class="ribbon sale">Giảm 20%</div></div>
													@elseif($new->unit==3)
													<span class="flash-del">{{ number_format($new->unit_price) }}VNĐ</span>
													<span class="flash-sale">{{ number_format((double)($new->unit_price)*0.7) }}VNĐ</span>
													<div class="ribbon-wrapper"><div class="ribbon sale">Giảm 30%</div></div>
													@else
													<span class="flash-sale">{{ number_format($new->unit_price) }}VNĐ</span>
													@endif
												</p>
											</div>
											<div class="single-item-caption">
										
											<a class="add-to-cart pull-left" href="{{ route('Muahang',[$new->id])}}"><i class="fa fa-shopping-cart"></i></a>
										
										
											
											<a class="beta-btn primary" href="product.html">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>

										@endif

										
									</div>
								</div>
								@endforeach
								
								

							</div>
							<div class="row">{{ $sanphamkhac->links() }}</div>
						</div> <!-- .beta-products-list -->

						<div class="space50">&nbsp;</div>

						<div class="beta-products-list">
							<h4>Sản Phẩm Khác</h4>
							<div class="beta-products-details">
								<p class="pull-left">Tìm Thấy {{ count($sanphamkhac) }} Sản Phẩm</p>
								<div class="clearfix"></div>
							</div>
							<div class="row">
						@foreach($sanphamkhac as $new)
															<div class="col-sm-3">
									<div class="single-item">
										@if($new->soluong<=0)
											<div class="ribbon-wrapper"><div class="ribbon sale">Hết Hàng</div></div>
											<div class="single-item-header">
												<a href="{{ route('trangchu') }}"><img src="source/image/product/{{ $new->image }}" alt="" height="250px"></a>
											</div>
											<div class="single-item-body">
												<p class="single-item-title">{{ $new->name }}</p>
												<p class="single-item-price">
													@if($new->unit==1)
													<span class="flash-del">{{ number_format($new->unit_price) }}VNĐ</span>
													<span class="flash-sale">Giảm 10%</span>
													@elseif($new->unit==2)
													<span class="flash-del">{{ number_format($new->unit_price) }}VNĐ</span>
													<span class="flash-sale">Giảm 20%</span>
													@elseif($new->unit==3)
													<span class="flash-del">{{ number_format($new->unit_price) }}VNĐ</span>
													<span class="flash-sale">Giảm 30%</span>
													@else
													<span class="flash-del">{{ number_format($new->unit_price) }}VNĐ</span>
													@endif
												</p>
											</div>
											@else
											<div class="single-item-header">
												<a href="{{ route('sanpham',$new->id) }}"><img src="source/image/product/{{ $new->image }}" alt="" height="250px"></a>
											</div>
											<div class="single-item-body">
												<p class="single-item-title">{{ $new->name }}</p>
												<p class="single-item-price">
													@if($new->unit==1)
													<span class="flash-del">{{ number_format($new->unit_price) }}VNĐ</span>
													<span class="flash-sale">{{ number_format((double)($new->unit_price)*0.9) }}VNĐ</span>
													<div class="ribbon-wrapper"><div class="ribbon sale">Giảm 10%</div></div>
													@elseif($new->unit==2)
													<span class="flash-del">{{ number_format($new->unit_price) }}VNĐ</span>
													<span class="flash-sale">{{ number_format((double)($new->unit_price)*0.8) }}VNĐ</span>
													<div class="ribbon-wrapper"><div class="ribbon sale">Giảm 20%</div></div>
													@elseif($new->unit==3)
													<span class="flash-del">{{ number_format($new->unit_price) }}VNĐ</span>
													<span class="flash-sale">{{ number_format((double)($new->unit_price)*0.7) }}VNĐ</span>
													<div class="ribbon-wrapper"><div class="ribbon sale">Giảm 30%</div></div>
													@else
													<span class="flash-sale">{{ number_format($new->unit_price) }}VNĐ</span>
													@endif
												</p>
											</div>
											<div class="single-item-caption">
										
											<a class="add-to-cart pull-left" href="{{ route('Muahang',[$new->id])}}"><i class="fa fa-shopping-cart"></i></a>
										
										
											
											<a class="beta-btn primary" href="product.html">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>

										@endif

										
									</div>
								</div>
								
						@endforeach
								<div class="row">{{ $sanphamkhac->links() }}</div>

							</div>
							<div class="space40">&nbsp;</div>
							
						</div> <!-- .beta-products-list -->
					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection
