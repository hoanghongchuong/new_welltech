@extends('admin.layouts.admin')
@section('title')
    <title>{{$title}}</title>
@endsection
@section('content')
    <div class="card card-listview card-primary card-outline">
        <div class="card-header border-transparent">
            {{--            <div class="card-tools">--}}
            <a href="{{route('product.create')}}" class="btn btn-primary btn-sm">Thêm mới</a>
            {{--            </div>--}}
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover text-nowrap m-0">
                    <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th>Danh mục</th>
                        <th scope="col">Tên tiếng việt</th>
                        <th scope="col">Tên tiếng anh</th>
                            <th scope="col">Ảnh</th>
                        <th scope="col">Ngày tạo</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $item)
                        <tr>
                            <th scope="row">{{$item->id}}</th>
                            <td>'sdf</td>
                            <td>
                                {{$item->name_vi}} <br>
                                <a href=" {{url('san-pham/'.$item->slug_vi.'.html')}}"
                                   title=""> {{url('san-pham/'.$item->slug_vi.'.html')}}</a>

                            </td>
                            <td>{{$item->name_en}}</td>
                                <td>
                                    <div class="box-img">
                                        <img src="{{asset($item->image)}}" alt="">
                                    </div>
                                </td>
                            <td>{{$item->created_at}}</td>
                            <td style="display: flex; align-items: center">
                                <a href="{{route('product.edit', $item->id)}}" class="mr-1 btn btn-primary btn-sm"><i class="fa fa-edit"></i> Sửa</a>
                                <a href="javascript:;" class="btn action-delete btn-delete btn btn-danger btn-sm"
                                   data-url="{{route('product.delete', $item->id)}}"><i class="fa fa-trash"></i> Xóa</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="clearfix pb-3">{{$products->links('admin.elements.pagination')}}</div>

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
