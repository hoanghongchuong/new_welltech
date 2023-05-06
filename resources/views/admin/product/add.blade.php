@extends('admin.layouts.admin')
@section('title')
    <title>{{$title}}</title>
@endsection
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
@endsection()
@section('content')
    <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="card card-listview card-primary card-outline">
            <div class="col-md-12">
                <div class="card-header-stick card-header">
                    <h3 class="card-title">Thêm mới sản phẩm</h3>
                    <div class="card-header-tools mb-1">
                        <button class="btn btn-primary btn-sm"><i class="fa fa-save"></i> Lưu</button>
                        <a href="{{route('product.index')}}" class="btn btn-default btn-sm"> <i class="fa fa-undo"></i>
                            Hủy bỏ</a>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Danh mục cha</label>
                                <select name="category_id" id="" class="form-control select2-init">
                                    <option value="">Chọn danh mục cha</option>
                                    {!! $htmlOption !!}
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Ảnh</label>
                                <input type="file" name="image">
                                @if($errors && $errors->first('image'))
                                    <span class="error">{{ $errors->first('image')}}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Ảnh chi tiết</label>
                                <input type="file" name="image_detail[]" multiple>

                                @if($errors && $errors->first('image_detail'))
                                    <span class="error">{{ $errors->first('image_detail')}}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="">Giá</label>
                                <input type="text" class="form-control" name="price">
                            </div>
                        </div>

                    </div>
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" href="#tab1" role="tab" data-toggle="tab">Tiếng việt</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#tab2" role="tab" data-toggle="tab">English</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#tab3" role="tab" data-toggle="tab">SEO</a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content mt-10">
                        <div role="tabpanel" class="tab-pane active" id="tab1">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Tên sản phẩm</label>
                                        <input type="text" placeholder="" class="form-control" value="" name="name_vi">
                                        @if($errors && $errors->first('name_vi'))
                                            <span class="error">{{ $errors->first('name_vi')}}</span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="">Mô tả</label>
                                        <textarea type="text" placeholder="" class="form-control"
                                                  name="description_vi"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Nội dung</label>
                                        <textarea type="text" placeholder="" id=""
                                                  class="form-control tinymce-editor-init" name="content_vi"
                                                  rows="12"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Hiển thị</label>
                                        <div class="icheck-primary d-inline">
                                            <input type="checkbox" id="checkboxPrimary2" checked name="status">
                                            <label for="checkboxPrimary2">
                                            </label>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab2">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Tên sản phẩm</label>
                                        <input type="text" placeholder="" class="form-control" name="name_en">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Mô tả</label>
                                        <input type="text" placeholder="" class="form-control" name="description_en">
                                    </div>

                                    {{--                                    <div class="form-group">--}}
                                    {{--                                        <label>Hiển thị</label>--}}
                                    {{--                                        <div class="icheck-primary d-inline">--}}
                                    {{--                                            <input type="checkbox" id="checkboxPrimary1" checked name="status_en">--}}
                                    {{--                                            <label for="checkboxPrimary1">--}}
                                    {{--                                            </label>--}}
                                    {{--                                        </div>--}}
                                    {{--                                    </div>--}}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Nội dung</label>
                                        <textarea type="text" placeholder="" class="form-control tinymce-editor-init"
                                                  rows="12" name="content_en"> </textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab3">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Seo title</label>
                                        <input type="text" placeholder="" class="form-control" name="seo_title">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Seo keyword</label>
                                        <input type="text" placeholder="" class="form-control" name="seo_keyword">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Seo description</label>
                                        <input type="text" placeholder="" class="form-control" name="seo_description">
                                    </div>


                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button class="btn btn-primary mb-2">Lưu</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </form>
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.9.6/tinymce.min.js"></script>
    <script src="{{asset('js/admin/cus.js')}}"></script>
@endsection()
