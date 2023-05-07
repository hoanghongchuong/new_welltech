<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/')}}">{{trans('home')}}</a></li>
                @if (!empty($breadcrumbData))
                    @foreach($breadcrumbData AS $itemBreadcrumb)
                        @if (isset($itemBreadcrumb['active']) && $itemBreadcrumb['active'] == 'active')
                            <li class="breadcrumb-item active">{{ $itemBreadcrumb['title'] }}</li>
                        @else
                            <li class="breadcrumb-item"><a href="{{ $itemBreadcrumb['link'] }}">{{ $itemBreadcrumb['title'] }}</a></li>
                        @endif
                    @endforeach
                @else
                    <li class="breadcrumb-item active">{{ $title }}</li>
                @endif
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
</div><!-- /.container-fluid -->
