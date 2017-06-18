@extends('layouts.app')

@section('title', 'Course Feedback')

@section('content')
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                @yield('title')
                <div class="pull-right">
                    <!-- <div class="btn-group btn-group-xs">
                        <a href="{{ route('subscriptions.new') }}" type="button" class="btn btn-default">Add subscription</a>
                        <a href="{{ route('subscriptions.export', 'csv') }}" type="button" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Export all subscriptions to CSV"><i class="fa fa-table" aria-hidden="true"></i></a>
                        <a href="{{ route('subscriptions.export', 'xlsx') }}" type="button" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Export all subscriptions to XLSX"><i class="fa fa-file-excel-o" aria-hidden="true"></i></a>
                    </div> -->
                </div>
            </div>
            <div class="panel-body">
                <iframe src="https://docs.google.com/forms/d/e/1FAIpQLSeFnKpcLDItm459CQDskCHyLn3blxd-TooCRQzv8CmcVaadFQ/viewform?embedded=true" width="760" height="500" frameborder="0" marginheight="0" marginwidth="0">Loading...</iframe>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script>
        $(".chosen-select").chosen({
            allow_single_deselect: true
        });
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
@endsection
