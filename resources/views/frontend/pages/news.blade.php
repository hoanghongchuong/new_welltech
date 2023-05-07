@extends('frontend.index')
@section('content')
    <div class="banner">
        <img src="{{asset('frontend/images/banner_about.jpg')}}" alt="">

    </div>
    @include('frontend.layout.breadcrumb')
    <div class="section clearfix  pdb-100">
        <div class="container equipment-content">
            {{--            <div class="row mt-30">--}}
            {{--                <h4 class="tac">We’re pleased to offer a range of quality products, including:</h4>--}}
            {{--            </div>--}}
            <div class="row mt-30">
                <div class="list-item d-flex">
                    @foreach($news as $item)
                        <div class="box-item">
                            <div class="box-img">
                                <div class="item-box">
                                    <a href="{{url('tin-tuc/'.$item->slug_vi.'.html')}}" class="vk-project-item__img"><img src="{{$item->image_vi}}" alt=""></a>
                                </div>
                            </div>
                            <p class="name-equipment"><a href="{{url('tin-tuc/'.$item->slug_vi.'.html')}}">{{$item['name_'.$lang]}}</a></p>
                        </div>
                    @endforeach

                </div>

            </div>
        </div>
    </div>

@endsection
