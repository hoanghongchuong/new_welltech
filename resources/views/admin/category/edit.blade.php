@extends('admin.layouts.admin')
@section('title')
    <title>Category</title>
@endsection
@section('content')
    <form action="{{route('categories.update', $category->id)}}" method="post">
        {{csrf_field()}}
        <input type="hidden" value="{{$type}}" name="type">
        <div class="card card-listview card-primary card-outline">
            <div class="col-md-12">
                <div class="card-header-stick card-header">
                    <h3 class="card-title">Cập nhật danh mục</h3>

                </div>
            </div>
            <div class="col-md-12">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Danh mục cha</label>
                                <select name="parent_id" id="" class="form-control">
                                    <option value="0">Chọn danh mục cha</option>
                                    {!! $htmlOption !!}
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Tên tiếng việt <code>*</code></label>
                                <input type="text" placeholder="Tên danh mục" class="form-control" name="name_vi" value="{{$category->name_vi}}">
                                @if($errors && $errors->first('name_vi'))
                                    <span class="error">{{ $errors->first('name_vi')}}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="">Tên tiếng anh</label>
                                <input type="text" placeholder="category" class="form-control" name="name_en" value="{{$category->name_en}}">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary btn-sm"><i class="fa fa-save"></i> Lưu</button>
                                <a href="{{route('categories.index')}}" class="btn btn-default btn-sm"> <i class="fa fa-undo"></i> Hủy bỏ</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </form>
@endsection
