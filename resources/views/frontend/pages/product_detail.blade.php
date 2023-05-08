@extends('frontend.index')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/slick.css')}}"/>
@endsection()
@section('content')
    <div class="banner">
        <img src="{{asset('frontend/images/banner_product.jpg')}}" alt="">

    </div>
    @include('frontend.layout.breadcrumb')

    <div class="section clearfix product-detail-box">
        <div class="container">
            <div class="row mt-30">
                <div class="col-md-7 col-sm-7 col-xs-12">
                    @if(count($product->productImages) > 0)
                        <div class="owl-slider owl-carousel">
                            @foreach($product->productImages as $k=> $item)
                                <div class="item img-slider"><img src="{{asset($item->alias)}}" alt="image"
                                                                  draggable="false"/>
                                </div>
                            @endforeach
                        </div>
                        <div class="thumbnails-wrapper">
                            @if(!empty($product->productImages))
                                @foreach($product->productImages as $k=> $item)
                                    <div class="thumbnail"><a href="#">
                                            <img src="{{asset($item->alias)}}" alt="image" draggable="false"/></a>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    @else
                        <div class="item img-slider"><img src="{{asset($product->image)}}" width="100%" alt="image" draggable="false"/>
                        </div>
                    @endif
                </div>
                <div class="col-md-5 col-sm-5 col-xs-12 box-right">
                    <h1 class="product-name-detail">{{$product['name_'.$lang]}}</h1>
                    <p class="product-price">
                        @if(!is_null($product) && $product['price'] > 0)
                            {{number_format($product['price'])}} VND
                        @else
                            {{trans('title_contact')}}
                        @endif
                    </p>
                    @if($product['description_'.$lang])
                    <div class="product-description">
                        {!! $product['description_'.$lang] !!}
                    </div>
                    @endif
                    <div class="tuvan">
                        <a href="#" class="btn btn-primary btn-lg">Tư Vấn</a>
                        <a href="tel:{{$setting['phone']}}" class="btn btn-primary btn-lg"><i class="fa fa-phone"
                                                                                              style="margin-right: 10px;"></i> {{$setting['phone']}}
                        </a>
                    </div>
                </div>

            </div>
            <div class="row detail-product">
                <div class="col-md-12">
                    <h3>{{trans('detail_product')}}</h3>
                    <div class="content-product">
                        {!! $product['content_'.$lang] !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('js')
    <script src="{{asset('frontend/js/slick.min.js')}}"></script>
    <script>
        // Init Slider
        $('.owl-slider').owlCarousel({
            items: 1,
            loop: true,
            autoplay: true,
            nav: false,
            dots: false,

        });
        // Pref add class active to 1st thumbnail via js
        $('.thumbnail').eq(0).addClass('active');
        // When slider autoplay or drag is true
        $('.owl-slider').on('changed.owl.carousel', function (event) {
            $('.thumbnail').removeClass('active');
            var sliders = 4;
            var currentItem = event.item.index - 2;
            if (currentItem >= sliders) {
                currentItem = 0;
            }
            $('.thumbnail').eq(currentItem).addClass('active');
        });
        // When thumbnail is clicked
        $('.thumbnail a').click(function (event) {
            event.preventDefault();
            $('.thumbnail').removeClass('active');
            var index = $('.thumbnail a').index(this);
            $('.thumbnail').eq(index).addClass('active');
            $('.owl-slider').trigger('to.owl.carousel', [index, 300, true]);
        });
    </script>
@endsection()
