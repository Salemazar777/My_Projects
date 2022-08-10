


@extends('admin.admin_master')
@section('content')

<div class="page-content">
<div class="container-fluid">
    {{-- <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Invoice All</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
     --}}
<div class="row">
<div class="col-12">
<div class="card">
<div class="card-body">
    @if(Session::get('deletedata'))
    <div class="alert text-center alert-success alert-dismissible fade show" role="alert">
        <i class="mdi mdi-block-helper me-2"></i>
             {{Session::get('deletedata')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>   
    @endif
    @if(Session::get('alldata'))
    <div class="alert text-center alert-success alert-dismissible fade show" role="alert">
        <i class="mdi mdi-block-helper me-2"></i>
             {{Session::get('alldata')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>   
    @endif
    @if(Session::get('approve'))
    <div class="alert text-center alert-success alert-dismissible fade show" role="alert">
        <i class="mdi mdi-block-helper me-2"></i>
             {{Session::get('approve')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>   
    @endif
    <a href="{{route('invoice.add')}}" class="btn btn-success w-lg waves-effect waves-light" style="float: right" >Add Invoice</a><br/><br/>
<h4 class="card-title">Invoice All Data </h4>
<table id="datatable" class="table text-center table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    <thead>
    <tr>
        <th>Sl</th>
        <th>Customer Name</th>
        <th>Invoice No</th>
        <th>Date</th>
        <th>Description</th>
        <th width="10%">Amount</th>
        <th>Status</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
        @foreach($allData as $key => $item)
    <tr>
        <td> {{ $key+1}} </td>
        <td> {{ $item['payment']['customer']['name'] }}</td>
        <td># {{ $item->invoice_no }} </td> 
        <td> {{ date('Y-m-Y',strtotime($item->date))}}</td>
        <td> {{ $item->description }} </td>
        <td>
            ${{ $item['payment']['total_amount']}}
        </td>  
         <td>
            @if ($item->status == '0')
                    <span class="btn btn-warning">Pending</span>
                @elseif($item->status == '1')
                    <span class="btn btn-success">Approved</span>
            @endif
        </td> 
         <td>
            @if($item->status == '0' )
                <a href="{{route('invoice.approve',$item->id)}}" class="btn btn-dark sm" title="Approved Data"><i class="ri-checkbox-circle-line"></i> </a>
                <a href="{{route('invoice.delete',$item->id)}}" class="btn btn-danger sm" title="Delete Data"><i class=" ri-delete-bin-2-line"></i> </a>
            @endif
        </td> 
    </tr>
    @endforeach
    </tbody>
</table>
    </div>
</div>
</div> <!-- end col -->
</div> <!-- end row -->
</div> <!-- container-fluid -->
</div>

@endsection