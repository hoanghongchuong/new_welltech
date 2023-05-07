@extends('frontend.index')
@section('content')
    <div class="banner">
        <img src="{{asset('frontend/images/banner_about.jpg')}}" alt="">

    </div>
    @include('frontend.layout.breadcrumb')

    <div class="section clearfix  pdb-100">
        <div class="container about-content">
            <div class="row mt-4">
               <div class="col-md-12">
                   {!! $post['content_'.$lang] !!}
               </div>

            </div>
        </div>
    </div>

@endsection
