@extends('admin.layouts.admin')
@section('title')
    <title>Đổi mật khẩu</title>
@endsection

@section('content')
    <form action="{{route('change.pass')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="card card-listview card-primary card-outline">
            @include('flash-message')
            <div class="col-md-12">
                <div class="card-header-stick card-header">
                    <h3 class="card-title">Đổi mật khẩu</h3>

                </div>
            </div>
            <div class="col-md-6">
                <div class="card-body">
                    <div class="form-group">
                        <label for="">Mật khẩu mới</label>
                        <input type="text" placeholder="" class="form-control" name="new_password" value="">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-sm"><i class="fa fa-save"></i> Lưu</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
