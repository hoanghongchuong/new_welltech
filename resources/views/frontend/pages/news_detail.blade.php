@extends('frontend.index')
@section('content')
    <div class="banner">
        <img src="{{asset('frontend/images/banner01.jpg')}}" alt="">

    </div>
    @include('frontend.layout.breadcrumb')
    <div class="section clearfix">
        <div class="container">
            <div class="row mt-30 pdb-100">
                <div class="content-about clearfix">
                    <div class="col-xs-12 col-md-6  pdb-15">
                        <h2 class="title-service">{{$news['name_'.$lang]}}</h2>
                        <div class="border-bot"><hr></div>
                        <div class="content-detail">
                            {!! $news['content_'.$lang]  !!}
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-6">
                        <div class="box-img">
                            <img src="{{$news->image_vi}}" alt="">
                        </div>
                    </div>
                </div>
                <div class="get-more-info clearfix col-md-12">
                    <a href="/lien-he">{{trans('get_more_information')}}</a>
                </div>
            </div>
        </div>
    </div>

@endsection
