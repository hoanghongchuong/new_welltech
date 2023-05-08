@extends('frontend.index')
@section('content')
    <div class="banner">
        <img src="{{asset('frontend/images/banner_product.jpg')}}" alt="">

    </div>
    @include('frontend.layout.breadcrumb')

    <div class="section clearfix  pdb-100">
        <div class="container equipment-content">
            <div class="row mt-30">
{{--                    <div class="col-md-3 col-xs-12">--}}
{{--                        <ul class="list-category">--}}
{{--                            @foreach($categories as $cate)--}}
{{--                            <li class=""><a href="">{{$cate['name_'.$lang]}}</a></li>--}}
{{--                            @endforeach--}}
{{--                        </ul>--}}
{{--                    </div>--}}
                <div class="col-md-12">
                   <div class="category-list">
                       @foreach($categories as $category)
                           <a href="{{route('product.index', ['cate' => $category['slug_vi']])}}" class="category-name @if($category['slug_vi'] == $cate) active @endif"> {{$category['name_'.$lang]}}</a>
                       @endforeach
                   </div>
                </div>
                    <div class="col-md-12 col-xs-12">
                        <div class="row">
                            @foreach($products as $item)
                                <div class="col-md-4 col-xs-6 col-sm-3 product-item">
                                    <div class="card">
                                        <div class="box-img">
                                            <div class="item-box">
                                                <a href="{{url('san-pham/'.$item->slug_vi.'.html')}}" class="vk-project-item__img"><img src="{{$item->image}}" alt=""></a>
                                            </div>
                                        </div>
                                        <div class="" style="padding: 0 10px">
                                            <p class="product-name"><a href="{{url('san-pham/'.$item->slug_vi.'.html')}}">{{$item['name_'.$lang]}}</a></p>
                                            @if(!is_null($item['price']) && $item['price'] > 0)
                                                <div class="product-price">{{number_format($item['price'])}} VND</div>
                                            @else
                                                <div class="product-price">{{trans('title_contact')}}</div>
                                            @endif
                                        </div>
                                    </div>

                                </div>
                            @endforeach
                        </div>
                    </div>
                <div class="clearfix pagination">
                    {!! $products->links() !!}
                </div>
            </div>
        </div>
    </div>

@endsection
