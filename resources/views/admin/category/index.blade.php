@extends('admin.layouts.admin')
@section('title')
    <title>Category</title>
@endsection
@section('content')
    <div class="card card-listview card-primary card-outline">
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
        @endif
        <div class="card-header border-transparent">
            {{--            <div class="card-tools">--}}
            <a href="{{route('categories.create')}}" class="btn btn-primary btn-sm">Thêm mới</a>
            {{--            </div>--}}
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover text-nowrap m-0">
                    <thead>
                    <tr>
                        <th scope="col">Stt</th>
                        <th scope="col">Tên</th>
                        <th scope="col">Tên tiếng anh</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Ngày tạo</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($listCategory as $key => $item)
                        <tr>
                            <th scope="row">{{$key + 1}}</th>
                            <td>{{$item->name_vi}}</td>
                            <td>{{$item->name_en}}</td>
                            <td>{{$item->slug_vi}}</td>
                            <td>{{$item->created_at}}</td>
                            <td>
                                <a href="categories/edit/{{$item->id}}" class="mr-1 btn btn-primary btn-sm"><i
                                        class="fa fa-edit"></i> Sửa</a>
                                <a href="javascript:;" class="btn action-delete btn-delete btn btn-danger btn-sm"
                                   data-url="{{route('categories.delete', $item->id)}}"><i class="fa fa-trash"></i> Xóa</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="clearfix pb-3">{{$listCategory->links('admin.elements.pagination')}}</div>
@endsection
@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).on('click', '.action-delete', function (e) {
            e.preventDefault();
            let urlRequest = $(this).attr('data-url');
            let that = $(this);
            Swal.fire({
                title: 'Bạn có chắc muốn xóa?',
                text: "Bạn sẽ không khôi phục lại được!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ok!',
                cancelButtonText: 'Hủy!',
            }).then((result) => {
                console.log(result);
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'GET',
                        url: urlRequest,
                        success: function (data) {
                            if (data.code == 200) {
                                that.parent().parent().remove();
                            }
                        },
                        error: function (err) {

                        }
                    });
                    Swal.fire(
                        'Đã Xóa thành công!',
                    )
                }
            })
        })
    </script>
@endsection
