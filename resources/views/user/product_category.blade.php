@extends('user.layout.master')

@section('title')
<title>Home</title>
@endsection

@section('content')
<div class="mt-40 mb-40">
	<div class="ps-page--shop">
		<div class="ps-container">
			<div class="ps-layout--shop">
				<div class="ps-layout__left">
					<div class="screen-darken"></div>
					<div class="ps-layout__left-container">
						<div class="ps-filter__header d-block d-xl-none">
							<h3>Filter Products</h3><a class="ps-btn--close ps-btn--no-boder" href="#"></a>
						</div>
						<div class="ps-layout__left-content">
							<form action="" data-action="https://martfury.botble.com/products" method="GET" id="products-filter-form">
								<aside class="widget widget_shop">
									<h4 class="widget-title">Product Categories</h4>
									<ul class="ps-list--categories">
										@foreach($categorydata as $category)
										<li class="@if($category->subCategoryName->count()>0) menu-item-has-children @endif">
											<a href="https://martfury.botble.com/product-categories/electronics">{{ $category->title }}</a>
											@if($category->subCategoryName->count()>0)
											<span class="sub-toggle"><i class="icon-angle"></i></span>
											<ul class="sub-menu">
												@foreach($category->subCategoryName as $subcategory)
												<li><a href="https://martfury.botble.com/product-categories/consumer-electronic">{{ $subcategory->title }}</a></li>
												@endforeach
											</ul>
											@endif
										</li>
										@endforeach
									</ul>
								</aside>
								<aside class="widget widget_shop">
									<h4 class="widget-title">By Brands</h4>
									<figure class="ps-custom-scrollbar" data-height="250">
										@foreach($branddata as $key=>$brand)
										<div class="ps-checkbox">
											<input class="form-control product-filter-item" type="checkbox" name="brands[]" id="brand-{{$key}}" value="1">
											<label for="brand-{{$key}}"><span><span class="d-inline-block">{{ $brand->first()->brandName->title }}</span> </span></label>
										</div>

										@endforeach
									</figure>
								</aside>
								<aside class="widget widget_shop">
									<h4 class="widget-title">By Price</h4>
									<div class="widget__content nonlinear-wrapper">
										<div class="nonlinear noUi-target noUi-ltr noUi-horizontal" data-min="0" data-max="50000"></div>
										<div class="ps-slider__meta">
											<div data-current-exchange-rate="1"></div>
											<input class="product-filter-item product-filter-item-price-0" name="min_price" data-min="0" value="0" type="hidden">
											<input class="product-filter-item product-filter-item-price-1" name="max_price" data-max="50000" value="50000" type="hidden">
											<span class="ps-slider__value">
												<span class="ps-slider__min">0</span> Rupees</span> -
												<span class="ps-slider__value"><span class="ps-slider__max">50000</span> Rupees
											</span>
										</div>
									</div>
								</aside>
								<input type="hidden" name="sort-by" class="product-filter-item" value="">
								<input type="hidden" name="layout" class="product-filter-item" value="">
							</form>
						</div>
					</div>
				</div>
				<div class="ps-layout__right">
					<div class="ps-shopping ps-tab-root">
						<div class="row bg-light py-2 mb-3">
							<div class="col-12 col-sm-6 col-md-3 d-xl-none px-2 px-sm-3">
								<div class="header__filter d-xl-none mx-auto mb-3 mb-sm-0">
									<button id="products-filter-sidebar" type="button">
										<i class="icon-equalizer"></i><span class="ml-2">Filter</span>
									</button>
								</div>
							</div>
							<div class="col-12 col-md-3 col-xl-6 d-none d-md-block">
								<div class="products-found pt-2">
									<strong>2</strong><span class="ml-1">Products found</span>
								</div>
							</div>
							<div class="col-12 col-sm-6 px-2 px-sm-3">
								<div class="d-flex justify-content-center justify-content-sm-end">
									<select class="ps-select ps-select-shop-sort select2-hidden-accessible" data-placeholder="Sort Items" data-select2-id="1" tabindex="-1" aria-hidden="true">
										<option value="default_sorting" data-select2-id="3">Default</option>
										<option value="date_asc">Oldest</option>
										<option value="date_desc">Newest</option>
										<option value="price_asc">Price: low to high</option>
										<option value="price_desc">Price: high to low</option>
										<option value="name_asc">Name: A-Z</option>
										<option value="name_desc">Name: Z-A</option>
									</select>
									<div class="ps-shopping__view ml-2">
										<ul class="prodducts-layout mb-0 p-0">
											<li class="active"><a href="#grid" data-layout="grid"><i class="icon-grid"></i></a></li>
											<li><a href="#list" data-layout="list"><i class="icon-list4"></i></a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<div class="ps-tabs ps-products-listing">
							<input type="hidden" name="page" data-value="1">
							<div class="ps-shopping-product">
								<div class="row">
									@foreach($productdata as $product)
										<div class="col-xl-2 col-lg-4 col-md-4 col-sm-6 col-6 ">
											<div class="ps-product">
												@include('user.layout.product-item')
											</div>
										</div>
									@endforeach
								</div>
							</div>
							<div class="ps-pagination">
							</div> </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection

@section('modal')

<div class="modal fade" id="product-quickview" tabindex="-1" role="dialog" aria-labelledby="product-quickview" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content"><span class="modal-close" data-dismiss="modal"><i class="icon-cross2"></i></span>
			<article class="ps-product--detail ps-product--fullwidth ps-product--quickview">
			</article>
			</div>
		</div>
	</div>

@endsection