
@extends('admin.admin_master')
@section('content')

<div class="row">
<div class="col-12">
<div class="card">
<div class="card-body">

    <h4 class="card-title">All Portfolio</h4>
    <p class="card-title-desc">
        All Portfolio shows data.
    </p>

    <div id="selection-datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
        <div class="row">
            <div class="col-sm-12 col-md-6">
            <div class="dataTables_length" id="selection-datatable_length">
                <label>Show <select name="selection-datatable_length" aria-controls="selection-datatable" class="custom-select custom-select-sm form-control form-control-sm form-select form-select-sm">
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select> entries</label>
            </div>
        </div>
        <div class="col-sm-12 col-md-6">
            <div id="selection-datatable_filter" class="dataTables_filter">
                <label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="selection-datatable"></label>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <table id="selection-datatable" class="table dt-responsive nowrap w-100 dataTable no-footer dtr-inline" role="grid" aria-describedby="selection-datatable_info" style="width: 938px;">
        <thead>
            <tr role="row">
                <th class="sorting_asc" tabindex="0" aria-controls="selection-datatable" rowspan="1" colspan="1" style="width: 140px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Si</th>

                <th class="sorting" tabindex="0" aria-controls="selection-datatable" rowspan="1" colspan="1" style="width: 222px;" aria-label="Position: activate to sort column ascending">Portfolio Name</th>

                <th class="sorting_asc" tabindex="0" aria-controls="selection-datatable" rowspan="1" colspan="1" style="width: 140px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Portfolio Title</th>

                <th class="sorting" tabindex="0" aria-controls="selection-datatable" rowspan="1" colspan="1" style="width: 222px;" aria-label="Position: activate to sort column ascending">Portfolio Image</th>

                <th class="sorting" tabindex="0" aria-controls="selection-datatable" rowspan="1" colspan="1" style="width: 104px;" aria-label="Office: activate to sort column ascending">Edit</th>

                <th class="sorting" tabindex="0" aria-controls="selection-datatable" rowspan="1" colspan="1" style="width: 104px;" aria-label="Office: activate to sort column ascending">Delete</th>
            </tr>
        </thead>
        <tbody>
            @php($i = 1)
                
            @foreach ($portfolio as $item)
            <tr class="even">
                <td class="sorting_1 dtr-control" tabindex="0">{{$i++}}</td>
                <td class="sorting_1 dtr-control" tabindex="0">{{$item->portfolio_name}}</td>
                <td class="sorting_1 dtr-control" tabindex="0">{{$item->portfolio_title}}</td>
                <td><img height="50px;" width="50px;" src="{{asset('image/portfolio/'.$item->portfolio_image)}}" /></td>
                <td><a class="btn btn-info sm" href="{{route('edit.portfolio',$item->id)}}">Edit</a></td>
                <td><a class="btn btn-danger sm" href="{{route('delete.portfolio',$item->id)}}">Delete</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div></div>
<div class="row">
    <div class="col-sm-12 col-md-5">
        <div class="dataTables_info" id="selection-datatable_info" role="status" aria-live="polite">Showing 41 to 50 of 57 entries<span class="select-info"><span class="select-item">2 rows selected</span><span class="select-item"></span><span class="select-item"></span></span></div></div><div class="col-sm-12 col-md-7">
            <div class="dataTables_paginate paging_simple_numbers" id="selection-datatable_paginate">
                <ul class="pagination pagination-rounded">
                    <li class="paginate_button page-item previous" id="selection-datatable_previous"><a href="#" aria-controls="selection-datatable" data-dt-idx="0" tabindex="0" class="page-link">
                        <i class="mdi mdi-chevron-left"></i></a>
                    </li>
                        <li class="paginate_button page-item "><a href="#" aria-controls="selection-datatable" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item "><a href="#" aria-controls="selection-datatable" data-dt-idx="2" tabindex="0" class="page-link">2</a></li><li class="paginate_button page-item "><a href="#" aria-controls="selection-datatable" data-dt-idx="3" tabindex="0" class="page-link">3</a></li><li class="paginate_button page-item "><a href="#" aria-controls="selection-datatable" data-dt-idx="4" tabindex="0" class="page-link">4</a></li><li class="paginate_button page-item active"><a href="#" aria-controls="selection-datatable" data-dt-idx="5" tabindex="0" class="page-link">5</a></li><li class="paginate_button page-item "><a href="#" aria-controls="selection-datatable" data-dt-idx="6" tabindex="0" class="page-link">6</a></li><li class="paginate_button page-item next" id="selection-datatable_next">
                            <a href="#" aria-controls="selection-datatable" data-dt-idx="7" tabindex="0" class="page-link">
                            <i class="mdi mdi-chevron-right">
                                </i>
                            </a>
                        </li>
                    </ul>
                </div>
                </div>
            </div>
        </div>
</div> <!-- end card body-->
</div> <!-- end card -->
</div><!-- end col-->
</div>

@endsection