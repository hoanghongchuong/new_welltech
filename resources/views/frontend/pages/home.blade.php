@extends('frontend.index')
@section('content')
    <div class="banner">
        <img src="{{asset('frontend/images/banner.jpg')}}" alt="">

    </div>
    <div class="section clearfix tatsu-wrap">
        <div class="container ras-technology">
            <div class="row pdb-100 pdt-10">
                <div class="col-xs-12 col-md-6">
                    @if($aboutTech)
                        <div class="with-full">
                            <h2>{{$aboutTech['name_'.$lang]}}</h2>
                            <div class="des">
                                <p>{{$aboutTech['description_'.$lang]}}</p>
                            </div>
                            <p class="mt-30 col-xs-12 col-md-12 pdl-0"><a href="{{url('gioi-thieu')}}"
                                                                          class="read-more">{{trans('more_detail')}}</a>
                            </p>
                        </div>
                    @endif
                </div>
                <div class="col-xs-12 col-md-6">
                    <div class="box-img pdt-30">
                        <img src="{{$aboutTech->img_url}}" alt="">
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="section clearfix tatsu-wrap">
        <div class="container equipment">
            <div class="tac pdb-100">
                <h2>{{trans('product_new')}}</h2>
                <div class="tatsu-text-inner des">
                    {{--                    <p>Through strategic partnerships with some of the best aquaculture equipment producers across the world, Bloom Aqua provides everything you need for your aquaculture operation.</p>--}}
                </div>
                <div class="slider-equipment">
                    <div class="owl-carousel owl-carousel-product-home owl-theme">
                        @foreach($products as $eq)
                            <div class="item product-item">
                                <div class="box-img">
                                    <a href="{{url('san-pham/'.$eq->slug_vi.'.html')}}">
                                        <img src="{{$eq->img_url}}" alt="{{$eq['name_'.$lang]}}">
                                    </a>
                                </div>
                                <p><a href="{{url('san-pham/'.$eq->slug_vi.'.html')}}">{{$eq['name_'.$lang]}}</a></p>
                                @if(!empty($eq['price']) && $eq['price'] > 0)
                                    <div class="product-price">{{number_format($eq['price'])}} VND</div>
                                    @else
                                    <div class="product-price">{{trans('title_contact')}}</div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section clearfix tatsu-wrap" style="background: #f5f6fa">
        <div class="container">
            <h2 class="text-center" style="color: var(--main-color); text-transform: uppercase">{{trans('news')}}</h2>
            <div class="row pdb-100">
                @foreach($posts as $post)
                    <div class="col-xs-12 col-md-4 pdl-mobile-15 pdl-0">
                        <a href="{{url('bai-viet/'.$post->slug_vi.'.html')}}">
                            <div class="box-img">
                                <img src="{{$post->img_url}}" alt="">
                            </div>
                            <p class="title-block">{{$post['name_'.$lang]}}</p>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
