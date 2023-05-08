@extends('frontend.index')
@section('content')
    <div class="banner">
        <img src="{{asset('frontend/images/lienhe.jpg')}}" alt="">

    </div>
    @include('frontend.layout.breadcrumb')

    <div class="section clearfix  pdb-100">
        <div class="container contact-content">
            <!--Section: Contact v.2-->
            <section class="mb-4">
                <div class="row">
                @include('flash-message')
                <!--Grid column-->
                    <div class="col-md-8 mb-md-0 mb-5">
                        <h2>{{trans('contact_user')}}</h2>
                        {{--                            <p class="des-contact">If you’re looking for specialised aquaculture consultancy or--}}
                        {{--                                have a question about what we do, get in touch with us here! We’ll be happy to help.</p>--}}
                        <form id="contact-form" name="contact-form" action="{{route('send.contact')}}" method="POST">
                        @csrf
                        <!--Grid row-->
                            <div class="row">

                                <!--Grid column-->
                                <div class="col-md-6">
                                    <div class="md-form mb-0">
                                        <input type="text" id="name" name="name" placeholder="{{trans('name')}}"
                                               class="form-control" required>
                                        <!--                                            <label for="name" class="">Your name</label>-->
                                    </div>
                                </div>
                                <!--Grid column-->

                                <!--Grid column-->
                                <div class="col-md-6">
                                    <div class="md-form mb-0">
                                        <input type="email" id="email" name="email" placeholder="email"
                                               class="form-control" required>
                                        <!--                                            <label for="email" class="">Your email</label>-->
                                    </div>
                                </div>
                                <!--Grid column-->

                            </div>
                            <!--Grid row-->

                            <!--Grid row-->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="md-form mb-0">
                                        <input type="text" id="subject" name="phone" placeholder="{{trans('phone')}}"
                                               required class="form-control">
                                        <!--                                            <label for="subject" class="">Subject</label>-->
                                    </div>
                                </div>
                            </div>
                            <!--Grid row-->

                            <!--Grid row-->
                            <div class="row">

                                <!--Grid column-->
                                <div class="col-md-12">

                                    <div class="md-form">
                                        <textarea type="text" id="message" name="content" rows="2" required
                                                  placeholder="{{trans("content_message")}}"
                                                  class="form-control md-textarea"></textarea>
                                    </div>

                                </div>
                            </div>
                            <!--Grid row-->
                            <div class="text-center text-md-left">
                                <div class="get-more-info btn-send-contact">
                                    <button type="submit" class="btn btn-primary">{{trans('send')}}</button>
                                </div>
                            </div>
                        </form>

                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-md-4 info-contact">
                        <div class="row">
                            <div class="col-xs-3 col-md-3">
                                <img src="{{asset('/frontend/images/icon_add.png')}}" alt="">
                            </div>
                            <div class="col-xs-9 col-md-9 contact-info">
                                <p>{{trans('contact_address')}}</p>
                                {{$setting["address_".$lang]}}
                            </div>
                        </div>
                        <div class="row mt-30">
                            <div class="col-xs-3 col-md-3">
                                <img src="{{asset('/frontend/images/icon_email.png')}}" alt="">
                            </div>
                            <div class="col-xs-9 col-md-9 contact-info">
                                <p>{{trans('email_us')}}</p>
                                {{$setting["email"]}}
                            </div>
                        </div>
                        {{--                            <ul class="list-unstyled mb-0">--}}
                        {{--                                <li><i class="fa fa-map-marker fa-2x"></i>--}}
                        {{--                                    <p>{{$setting["address_".$lang]}}</p>--}}
                        {{--                                </li>--}}

                        {{--                                <li><i class="fa fa-phone mt-4 fa-2x"></i>--}}
                        {{--                                    <p>{{$setting["phone"]}}</p>--}}
                        {{--                                </li>--}}

                        {{--                                <li><i class="fa fa-envelope mt-4 fa-2x"></i>--}}
                        {{--                                    <p>{{$setting["email"]}}</p>--}}
                        {{--                                </li>--}}
                        {{--                            </ul>--}}
                    </div>
                    <!--Grid column-->

                </div>

            </section>

        </div>
    </div>

@endsection
