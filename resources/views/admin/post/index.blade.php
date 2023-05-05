@extends('admin.layouts.admin')
@section('title')
    <title>Bài viết</title>
@endsection
@section('content')
    <div class="card card-listview card-primary card-outline">
        <div class="card-header border-transparent">
{{--            <div class="card-tools">--}}
                <a href="/admin/post/create?type={{$type}}" class="btn btn-primary btn-sm">Thêm mới</a>
{{--            </div>--}}
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover text-nowrap m-0">
                    <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Tên tiếng việt</th>
                        <th scope="col">Tên tiếng anh</th>
                        @if($type !='about')
                            <th scope="col">Ảnh</th>
                        @endif
                        <th scope="col">Ngày tạo</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($posts as $item)
                        <tr>
                            <th scope="row">{{$item->id}}</th>
                            <td>
                                {{$item->name_vi}} <br>
                                @if($type=='service')
                                    <a href=" {{url('dich-vu/'.$item->slug_vi.'.html')}}"
                                       title=""> {{url('dich-vu/'.$item->slug_vi.'.html')}}</a>
                                @endif
                                @if($type=='post')
                                    <a href=" {{url('bai-viet/'.$item->slug_vi.'.html')}}"
                                       title=""> {{url('bai-viet/'.$item->slug_vi.'.html')}}</a>
                                @endif
                                @if($type=='about')
                                    <a href=" {{url('gioi-thieu/'.$item->slug_vi.'.html')}}"
                                       title=""> {{url('gioi-thieu/'.$item->slug_vi.'.html')}}</a>
                                @endif
                                @if($type=='equipment')
                                    <a href=" {{url('trang-thiet-bi/'.$item->slug_vi.'.html')}}"
                                       title=""> {{url('trang-thiet-bi/'.$item->slug_vi.'.html')}}</a>
                                @endif
                            </td>
                            <td>{{$item->name_en}}</td>
                            @if($type !='about')
                                <td>
                                    <div class="box-img">
                                        <img src="{{asset($item->image_vi)}}" alt="">
                                    </div>
                                </td>
                            @endif
                            <td>{{$item->created_at}}</td>
                            <td>
                                <a href="/admin/post/edit/{{$item->id}}?type={{$type}}" class="mr-1"><i class="fa fa-edit"></i> Sửa</a>
                                <a href="javascript:;" class="btn action-delete btn-delete"
                                   data-url="{{route('post.delete', $item->id)}}"><i class="fa fa-trash"></i> Xóa</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="clearfix pb-3">{{$posts->links('admin.elements.pagination')}}</div>

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
