@extends('admin.admin_master')
@section('content')

<div class="row">
<div class="col-12">
<div class="card">
<div class="card-body">

<div class="row">
<div class="col-12">
    <div class="invoice-title">
        <h4 class="float-end font-size-16"><strong>Invoice No: # {{$payment['invoice']['invoice_no']}}</strong></h4>
        <h3>
            <img src="{{asset('admin/assets/images/logo-sm.png')}}" alt="logo" height="24"/>
        </h3>
    </div>
    <hr>
    
    <div class="row">
        <div class="col-6 mt-4">
            <address>
                <strong>Salem Khan Shopping Mall:</strong><br>
                Herat, Afghanistan<br>
                salemkhan007@gmail.com
            </address>
        </div>
        <div class="col-6 mt-4 text-end">
            <address>
                <strong>Invoice Date:</strong><br>
                {{$payment['invoice']['date']}}<br><br>
            </address>
        </div>
    </div>
</div>
</div>

<div class="row">
<div class="col-12">
    <div>
        <div class="p-2">
            <h3 class="font-size-16"><strong>Customer Payment Report</strong></h3>
        </div>
        <div class="">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th><strong>Customer Name</strong></th>
                        <th><strong>customer Mobile</strong></th>
                        <th><strong>Address</strong>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <!-- foreach ($order->lineItems as $line) or some such thing here -->
                    
                    <tr>
                        <td>{{$payment['customer']['name']}}</td>
                        <td>{{$payment['customer']['mobile_no']}}</td>
                        <td>{{$payment['customer']['email']}}</td>  
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div> <!-- end row -->







<div class="row">
<div class="col-12">
    <div>
        <div class="p-2">
            <h3 class="font-size-16"><strong>Customer Invoice</strong></h3>
        </div>
        <div class="">
            <div class="table-responsive">
                <table class="table text-center">
                    <thead>
                    <tr>
                        <th><strong>SI</strong></th>
                        <th><strong>Category Name</strong></th>
                        <th><strong>Product Name</strong></th>
                        <th><strong>Current Stock</strong></th>
                        <th><strong>Quantity</strong></th>
                        <th><strong>Unit Price</strong></th>
                        <th><strong>Total Price</strong></th>
                    </tr>
                    </thead>
                    <tbody>
                        @php
                        $total_sum = '0';
                        $invoice_details = App\Models\Invoicedetail::where('invoice_id',$payment->invoice_id)->get();
                        @endphp
                    @foreach ($invoice_details as $key => $details)
                    
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$details['category']['name']}}</td>
                        <td>{{$details['product']['name']}}</td>
                        <td>{{$details['product']['quantity']}}</td>
                        <td>{{$details->selling_qty}}</td>
                        <td>{{$details->unit_price}}</td>
                        <td>{{$details->selling_price}}</td>                            
                    </tr>
                        @php
                            $total_sum += $details->selling_price;
                        @endphp
                    @endforeach
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><strong>Subtotal</strong></td>
                        <td class="">${{ $total_sum}}</td>
                    </tr>
                    <tr>
                        <td class="no-line"></td>
                        <td class="no-line"></td>
                        <td class="no-line"></td>
                        <td class="no-line"></td>
                        <td class="no-line"></td>
                        <td class="no-line ">
                            <strong>Discount Amount</strong></td>
                        <td class="no-line">${{$payment->discount_amount}}</td>
                    </tr>
                    <tr>
                        <td class="no-line"></td>
                        <td class="no-line"></td>
                        <td class="no-line"></td>
                        <td class="no-line"></td>
                        <td class="no-line"></td>
                        <td class="no-line ">
                            <strong>Paid Amount</strong></td>
                        <td class="no-line">${{$payment->paid_amount}}</td>
                    </tr>
                    <tr>
                        <td class="no-line"></td>
                        <td class="no-line"></td>
                        <td class="no-line"></td>
                        <td class="no-line"></td>
                        <td class="no-line"></td>
                        <td class="no-line ">
                            <strong>Due Amount</strong></td>
                        <td class="no-line">${{$payment->due_amount}}</td>
                    </tr>
                    <tr>
                        <td class="no-line"></td>
                        <td class="no-line"></td>
                        <td class="no-line"></td>
                        <td class="no-line"></td>
                        <td class="no-line"></td>
                        <td class="no-line">
                            <strong>Grand Amount</strong></td>
                        <td class="no-line"><h4 class="m-0">${{$payment->total_amount}}</h4></td>
                    </tr>

                    <tr>
                       <td colspan="7" style="font-weight: bold;">Paid Summary</td> 
                    </tr>

                    <tr>
                        <td colspan="4" style="font-weight: bold;">Date</td> 
                        <td colspan="3" style="font-weight: bold;">Amount</td> 
                    </tr>

                    @php
                        $payment_details = App\Models\Paymentdetail::where('invoice_id',$payment->invoice_id)->get();
                    @endphp
                    @foreach ($payment_details as $item)
                        <tr>
                            <td colspan="4" style="font-weight: bold;">{{date('d-m-Y',strtotime($item->date))}}</td> 
                            <td colspan="3" style="font-weight: bold;">{{$item->current_paid_amount}}</td> 
                        </tr>
                    @endforeach
                    
                    </tbody>
                </table>
            </div>

            <div class="d-print-none">
                <div class="float-end">
                    <a href="javascript:window.print()" class="btn btn-success waves-effect waves-light"><i class="ri-printer-fill"></i></a>
                    <a href="#" class="btn btn-primary waves-effect waves-light ms-2">Download</a>
                </div>
            </div>
        </div>
    </div>

</div>
</div> <!-- end row -->





</div>
</div>
</div> <!-- end col -->
</div> <!-- end row -->

@endsection