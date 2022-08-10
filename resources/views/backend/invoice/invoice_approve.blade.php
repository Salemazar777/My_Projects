


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
     @php
         $payment = App\Models\Payment::where('invoice_id',$invoice->id)->first();
     @endphp
<div class="row">
<div class="col-md-12">
<div class="card">
<div class="card-body">
    @if(Session::get('maximumapprove'))
    <div class="alert text-center alert-danger alert-dismissible fade show" role="alert">
        <i class="mdi mdi-block-helper me-2"></i>
             {{Session::get('maximumapprove')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>   
    @endif
    <div class="col-md-12">
        <div class=" d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Approve Invoice List</h4>
        </div>
    </div>
    <a href="{{route('invoice.pending.list')}}" class="btn btn-success btn-lg waves-effect waves-light" style="float: right" ><i class="ri-list-check">Pending Invoice List</i></a><br/><br/>
<h4 class="card-title">Invoice No: #{{$invoice->invoice_no}} - {{date('Y-m-d',strtotime($invoice->date))}}</h4>

<table id="datatable" class="table table-dark dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    <tbody>
        <tr>
            <td>Customer Info</td>
            <td>Name:<strong>{{$payment['customer']['name']}}</strong> </td>
            <td>Mobile:<strong>{{$payment['customer']['mobile_no']}}</strong></td>
            <td>Email:<strong>{{$payment['customer']['email']}}</strong></td>
        </tr>
        <tr>
            <td></td>
            <td colspan="3">
                Description : <strong>{{$invoice->description}}</strong>
            </td>
        </tr>
    </tbody>
</table>

    <form method="POST" action="{{route('approval.store',$invoice->id)}}">
        @csrf
        <table id="datatable" class="table text-center table-dark dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
            <thead>
                <tr>
                    <th>SI</th>
                    <th>Category</th>
                    <th>Product Name</th>
                    <th style="background-color: #8b008b">Current Stock</th>
                    <th>Quantity</th>
                    <th>Unit Price</th>
                    <th>Total Price</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $total_sum = '0';
                @endphp
                @foreach ($invoice['invoicedetails'] as $key => $details)
                <tr>

                    <input type="hidden" name="category_id[]" value="{{$details->category_id}}" />
                    <input type="hidden" name="product_id[]" value="{{$details->product_id}}" />
                    <input type="hidden" name="selling_qty[{{$details->id}}]" value="{{$details->selling_qty}}" />

                    <td>{{$key+1}}</td>
                    <td>{{$details['category']['name']}}</td>
                    <td>{{$details['product']['name']}}</td>
                    <td style="background-color: #8b008b">{{$details['product']['quantity']}}</td>
                    <td>{{$details->selling_qty}}</td>
                    <td>{{$details->unit_price}}</td>
                    <td>{{$details->selling_price}}</td>
                </tr> 
                @php
                    $total_sum += $details->selling_price;
                @endphp
                @endforeach
                <tr>
                    <td colspan="6">Sub Total</td>
                    <td>{{$total_sum}}</td>
                </tr>
                <tr>
                    <td colspan="6">Discount</td>
                    <td>{{$payment->discount_amount}}</td>
                </tr>
                <tr>
                    <td colspan="6">Paid Amount</td>
                    <td>{{$payment->paid_amount}}</td>
                </tr>
                <tr>
                    <td colspan="6">Due Amount</td>
                    <td>{{$payment->due_amount}}</td>
                </tr>
                <tr>
                    <td colspan="6">Grand Amount</td>
                    <td>{{$payment->total_amount}}</td>
                </tr>
            </tbody>
        </table>
        <button type="submit" class="btn btn-info">Invoice Approve</button>
    </form>
</div>
</div>
</div> <!-- end col -->
</div> <!-- end row -->
</div> <!-- container-fluid -->
</div>

@endsection