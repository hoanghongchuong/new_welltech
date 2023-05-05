<div class="container-fluid">
    <div class="row">
        <?php /* <div class="col-sm-6">
            <h1 class="m-0">{{ $title }}</h1>
        </div><!-- /.col --> */?>
        <div class="col-sm-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
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
