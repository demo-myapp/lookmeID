@extends('layouts.client')

@section('title')
<title>Lookme.id - Pusat Belanja Online</title>
@endsection

@section('drop-category')
<div class="col-lg-3">
  <div class="all-category">
    <h3 class="cat-heading"><i class="fa fa-bars" aria-hidden="true"></i>CATEGORIES</h3>
    <ul class="main-category">
      <li><a href="#">New Arrivals <i class="fa fa-angle-right" aria-hidden="true"></i></a>
        <ul class="sub-category">
          <li><a href="#">accessories</a></li>
          <li><a href="#">best selling</a></li>
          <li><a href="#">top 100 offer</a></li>
        </ul>
      </li>
      <li><a href="#">accessories</a></li>
    </ul>
  </div>
</div>
@endsection

@section('content')
<!-- Slider Area -->
<section class="hero-slider">
  <!-- Single Slider -->
  <div class="single-slider">
    <div class="container">
      <div class="row no-gutters">
        <div class="col-lg-9 offset-lg-3 col-12">
          <div class="text-inner">
            <div class="row">
              <div class="col-lg-7 col-12">
                <div class="hero-text">
                  <h1><span>UP TO 50% OFF </span>Shirt For Man</h1>
                  <p>Maboriosam in a nesciung eget magnae <br> dapibus disting tloctio in the find it pereri <br> odiy
                    maboriosm.</p>
                  <div class="button">
                    <a href="#" class="btn">Shop Now!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--/ End Single Slider -->
</section>
<!--/ End Slider Area -->

<!-- Start Most Popular -->
<div class="product-area most-popular section">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="section-title">
          <h2>Hot Item</h2>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="owl-carousel popular-slider">

          <!-- Start Single Product -->
          @forelse ($products as $product)
          <div class="single-product">
            <div class="product-img">
              <a data-toggle="modal" id="set-detail" data-target="#detail-modal" data-name="{{ $product->name }}"
                data-price="@currency($product->price)"
                data-img_prod="{{ asset('storage/products/' . $product->image) }}">
                <img class="img-fluid" src="{{ asset('storage/products/' . $product->image) }}"
                  alt="{{ $product->name }}">
                <img class="hover-img" src="https://via.placeholder.com/550x750" alt="#">
                <span class="out-of-stock">Hot</span>
              </a>
              <div class="button-head">
                <div class="product-action">
                  <a data-toggle="modal" data-target="#exampleModal" href="#"><i class=" ti-eye"></i><span>Quick
                      View</span></a>
                </div>
                <div class="product-action-2">
                  <a title="Add to cart" href="#">Add to cart</a>
                </div>
              </div>
            </div>
            <div class="product-content">
              <h3><a data-toggle="modal" data-target="#  " href="#">{{ $product->name }}</a></h3>
              <div class="product-price">
                <span class="old">$60.00</span>
                <span>@currency($product->price)</span>
              </div>
            </div>
          </div>
          @empty
          <h3 class="text-center">There is no Product Yet!</h3>
          @endforelse
          <!-- End Single Product -->

        </div>
      </div>
    </div>
  </div>
</div>
<!-- End Most Popular Area -->

<!-- Start Shop Services Area -->
<section class="shop-services section home">
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-6 col-12">
        <!-- Start Single Service -->
        <div class="single-service">
          <i class="ti-rocket"></i>
          <h4>Free shiping</h4>
          <p>Orders over $100</p>
        </div>
        <!-- End Single Service -->
      </div>
      <div class="col-lg-3 col-md-6 col-12">
        <!-- Start Single Service -->
        <div class="single-service">
          <i class="ti-reload"></i>
          <h4>Free Return</h4>
          <p>Within 30 days returns</p>
        </div>
        <!-- End Single Service -->
      </div>
      <div class="col-lg-3 col-md-6 col-12">
        <!-- Start Single Service -->
        <div class="single-service">
          <i class="ti-lock"></i>
          <h4>Sucure Payment</h4>
          <p>100% secure payment</p>
        </div>
        <!-- End Single Service -->
      </div>
      <div class="col-lg-3 col-md-6 col-12">
        <!-- Start Single Service -->
        <div class="single-service">
          <i class="ti-tag"></i>
          <h4>Best Peice</h4>
          <p>Guaranteed price</p>
        </div>
        <!-- End Single Service -->
      </div>
    </div>
  </div>
</section>
<!-- End Shop Services Area -->

<!-- Modal -->
<div class="modal fade" id="detail-modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="ti-close"
            aria-hidden="true"></span></button>
      </div>
      <div class="modal-body">
        <div class="row no-gutters">
          <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
            <!-- Product Slider -->
            <div class="product-gallery">
              <div id="img_prod"></div>
              <div id="img_prod"></div>
              <div id="img_prod"></div>
              {{-- <div class="quickview-slider-active">
                <div id="img_prod" class="single-slider">
                </div>
                <div class="single-slider">
                  <img src="https://via.placeholder.com/569x528" alt="#">
                </div>
                <div class="single-slider">
                  <img src="https://via.placeholder.com/569x528" alt="#">
                </div>
                <div class="single-slider">
                  <img src="https://via.placeholder.com/569x528" alt="#">
                </div>
              </div> --}}
            </div>
            <!-- End Product slider -->
          </div>
          <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
            <div class="quickview-content">
              <h2 id="name"></h2>
              <div class="quickview-ratting-review">
                <div class="quickview-ratting-wrap">
                  <div class="quickview-ratting">
                    <i class="yellow fa fa-star"></i>
                    <i class="yellow fa fa-star"></i>
                    <i class="yellow fa fa-star"></i>
                    <i class="yellow fa fa-star"></i>
                    <i class="fa fa-star"></i>
                  </div>
                  <a href="#"> (1 customer review)</a>
                </div>
                <div class="quickview-stock">
                  <span><i class="fa fa-check-circle-o"></i> in stock</span>
                </div>
              </div>
              <h3 id="price"></h3>
              <div class="quickview-peragraph">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia iste laborum ad impedit pariatur
                  esse optio tempora sint ullam autem deleniti nam in quos qui nemo ipsum numquam.</p>
              </div>
              <div class="size">
                <div class="row">
                  <div class="col-lg-6 col-12">
                    <h5 class="title">Size</h5>
                    <select>
                      <option selected="selected">s</option>
                      <option>m</option>
                      <option>l</option>
                      <option>xl</option>
                    </select>
                  </div>
                  <div class="col-lg-6 col-12">
                    <h5 class="title">Color</h5>
                    <select>
                      <option selected="selected">orange</option>
                      <option>purple</option>
                      <option>black</option>
                      <option>pink</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="quantity">
                <!-- Input Order -->
                <div class="input-group">
                  <div class="button minus">
                    <button type="button" class="btn btn-primary btn-number" disabled="disabled" data-type="minus"
                      data-field="quant[1]">
                      <i class="ti-minus"></i>
                    </button>
                  </div>
                  <input type="text" name="quant[1]" class="input-number" data-min="1" data-max="1000" value="1">
                  <div class="button plus">
                    <button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="quant[1]">
                      <i class="ti-plus"></i>
                    </button>
                  </div>
                </div>
                <!--/ End Input Order -->
              </div>
              <div class="add-to-cart">
                <a href="#" class="btn">Add to cart</a>
                <a href="#" class="btn min"><i class="ti-heart"></i></a>
                <a href="#" class="btn min"><i class="fa fa-compress"></i></a>
              </div>
              <div class="default-social">
                <h4 class="share-now">Share:</h4>
                <ul>
                  <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                  <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                  <li><a class="youtube" href="#"><i class="fa fa-pinterest-p"></i></a></li>
                  <li><a class="dribbble" href="#"><i class="fa fa-google-plus"></i></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Modal end -->
@endsection

@section('script')
<script>
  $(document).ready(function() {
    $(document).on('click', '#set-detail', function() {
      var name = $(this).data('name');
      var img_prod = $(this).data('img_prod');
      var price = $(this).data('price');
      $('#name').text(name);
      $('#img_prod').html('<img src="' + img_prod + '"/>')
      $('#price').text(price);
    })
  })
</script>
@endsection