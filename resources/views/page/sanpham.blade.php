@extends('master')
@section('content')	
	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Sản Phẩm {{$chitiet->name  }}</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="index.html">Home</a> / <span>Product</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>

	<div class="container">
		<div id="content">
			<div class="row">
				<div class="col-sm-9">

					<div class="row">
						<div class="col-sm-4">
							<img src="source/image/product/{{ $chitiet->image }}" alt="" height="250px">
						</div>
						<div class="col-sm-8">
							<div class="single-item-body">
								<p class="single-item-title">{{ $chitiet->name }}</p>
								<p class="single-item-price">
									@if( $chitiet->promotion_price==0)
									<span class="flash-sale">{{number_format($chitiet->unit_price)  }}VNĐ</span>
									@else
									<span class="flash-del">{{ number_format($chitiet->unit_price) }}VNĐ</span>
									<span class="flash-sale">{{number_format( $chitiet->promotion_price) }}VNĐ</span>
									@endif									
								</p>
							</div>

							<div class="clearfix"></div>
							<div class="space20">&nbsp;</div>

							<div class="single-item-desc">
								<p></p>
							</div>
							<div class="space20">&nbsp;</div>

							<p>Options:</p>
							<div class="single-item-options">

								<a class="add-to-cart" href="{{ route('Muahang',[$chitiet->id]) }}"><i class="fa fa-shopping-cart"></i></a>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>

					<div class="space40">&nbsp;</div>
					<div class="woocommerce-tabs">
						<ul class="tabs">
							<li><a href="#tab-description">Description</a></li>
							<li><a href="#tab-reviews">Reviews (0)</a></li>
						</ul>

						<div class="panel" id="tab-description">
							<p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet.</p>
							<p>Consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequaturuis autem vel eum iure reprehenderit qui in ea voluptate velit es quam nihil molestiae consequr, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur? </p>
						</div>
						<div class="panel" id="tab-reviews">
							<p>No Reviews</p>
						</div>
					</div>
					<div class="space50">&nbsp;</div>
					<div class="beta-products-list">
						<h4>Related Products</h4>

						<div class="row">
							@foreach($spcungloai as $sp)
							<div class="col-sm-4">
								<div class="single-item">
									<div class="single-item-header">
										<a href="{{route('sanpham',$sp->id) }}"><img src="source/image/product/{{ $sp->image }}" alt="" height="250px"></a>
									</div>
									<div class="single-item-body">
										<p class="single-item-title">{{ $sp->name }}</p>
										<p class="single-item-price">
											@if( $sp->promotion_price==0)
											<span class="flash-sale">{{number_format($sp->unit_price)  }}VNĐ</span>
											@else
											<span class="flash-del">{{ number_format($sp->unit_price) }}VNĐ</span>
											<span class="flash-sale">{{number_format( $sp->promotion_price) }}VNĐ</span>
											@endif											
										</p>
									</div>
									<div class="single-item-caption">
										<a class="add-to-cart pull-left" href="product.html"><i class="fa fa-shopping-cart"></i></a>
										<a class="beta-btn primary" href="product.html">Details <i class="fa fa-chevron-right"></i></a>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
							@endforeach
							<div class="row">{{ $spcungloai->links() }}</div>

						</div>
					</div> <!-- .beta-products-list -->
				</div>
				<div class="col-sm-3 aside">
					<div class="widget">
						<h3 class="widget-title">Sản Phẩm Mới</h3>
						<div class="widget-body">
							<div class="beta-sales beta-lists">
							@foreach($sanphammoi as $sp)
								@if($sp->soluong<=0)
									<div class="media beta-sales-item">
									<a class="pull-left" href="{{route('trangchu')}}"><img src="source/image/product/{{ $sp->image }}" alt="" height="250px"></a>
									<div class="media-body">
										<p class="single-item-title">{{ $sp->name }}</p>
										<span class="beta-sales-price">
										<span class="flash-sale">{{number_format($sp->unit_price)  }}VNĐ</span>												
										</span>
									</div>
								</div>
								@else
								<div class="media beta-sales-item">
									<a class="pull-left" href="{{ route('sanpham',$sp->id)}}"><img src="source/image/product/{{ $sp->image }}" alt="" height="250px"></a>
									<div class="media-body">
										<p class="single-item-title">{{ $sp->name }}</p>
										<span class="beta-sales-price">
											
											  <span class="flash-sale">{{number_format($sp->unit_price)  }}VNĐ</span>
																						
										</span>
									</div>
								</div>
								@endif
							@endforeach
							</div>
						</div>
					</div> <!-- best sellers widget -->
					<div class="widget">
						<h3 class="widget-title">Sản Phẩm Khuyến Mãi</h3>
						<div class="widget-body">
							@foreach($sanphamkhuyenmai as $sp)
								@if($sp->soluong<=0)
									<div class="media beta-sales-item">
									<a class="pull-left" href="{{route('trangchu')}}"><img src="source/image/product/{{ $sp->image }}" alt="" height="250px"></a>
									<div class="media-body">
										<p class="single-item-title">{{ $sp->name }}</p>
										<span class="beta-sales-price">
										<span class="flash-sale">{{number_format($sp->unit_price)  }}VNĐ</span>												
										</span>
									</div>
								</div>
								@else
								<div class="media beta-sales-item">
									<a class="pull-left" href="{{ route('sanpham',$sp->id)}}"><img src="source/image/product/{{ $sp->image }}" alt="" height="250px"></a>
									<div class="media-body">
										<p class="single-item-title">{{ $sp->name }}</p>
										<span class="beta-sales-price">
											
											  <span class="flash-sale">{{number_format($sp->unit_price)  }}VNĐ</span>
																						
										</span>
									</div>
								</div>
								@endif
							@endforeach
							</div>
						</div>
					</div> <!-- best sellers widget -->
				</div>
			</div>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection