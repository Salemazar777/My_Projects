

@extends('admin.admin_master')
@section('content')

<div class="page-content">
<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Purchase Pending</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
    
<div class="row">
<div class="col-12">
<div class="card">
<div class="card-body">
    <a href="{{route('purchase.add')}}" class="btn btn-success w-lg waves-effect waves-light" style="float: right" >Add Purchase</a><br/><br/>
<h4 class="card-title">Purchase All Pending Data </h4>
<table id="datatable" class="table text-center table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    <thead>
    <tr>
        <th>Sl</th>
        <th>Purchase No</th>
        <th>Date</th>
        <th>Supplier</th>
        <th>Category</th>
        <th>Quantity</th>
        <th>Product Name</th> 
        <th>Status</th> 
        <th width="10%">Action</th>
          
    </tr>
    </thead>
    <tbody>
        @foreach($allData as $key => $item)
    <tr>
        <td> {{ $key+1}} </td>
        <td> {{ $item->purchase_no }} </td> 
        <td> {{ $item->date}}</td>
        <td> {{ $item['supplier']['name']}}</td>
        <td> {{ $item['category']['name']}}</td>
        <td> {{ $item->buying_qty}}</td>
        <td> {{ $item['product']['name']}}</td>
        <td>
            @if($item->status == '0' )
                <span class="btn btn-warning">Pending</span></td>
            @elseif ($item->status == '1' )
                <span class="btn btn-success">Approved</span></td>
            @endif
        <td>
            @if($item->status == '0' )
            <a href="{{route('purchase.approve',$item->id)}}" class="btn btn-danger sm" title="Approved" id="ApproveBtn"><i class="fas fa-trash-alt"></i>Approve </a>
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