<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
{{--            <div class="col-sm-6">--}}
{{--                <h1 class="m-0 text-dark">{{$name . ' '. $key}}</h1>--}}
{{--            </div>--}}
            <div class="col-sm-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#">{{$name}}</a></li>
                    @if($key != '')
                    <li class="breadcrumb-item active">{{$key}}</li>
                    @endif
                </ol>
            </div>
        </div>
    </div>
</div>
