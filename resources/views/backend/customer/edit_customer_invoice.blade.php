@extends('admin.admin_master')
@section('content')
<script src="{{asset('admin/assets/js/jquery-3.6.0.min.js')}}"></script>
<div class="row">
<div class="col-12">
<div class="card">
<div class="card-body">
    @if(Session::get('max_amount'))
    <div class="alert text-center alert-danger alert-dismissible fade show" role="alert">
        <i class="mdi mdi-block-helper me-2"></i>
             {{Session::get('max_amount')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>   
    @endif
    <a href="{{route('credit.customer')}}" class="btn btn-success w-lg waves-effect waves-light" style="float: right" ><i class="ri-file-list-2-line">Back</i></a><br/><br/>

<div class="row">
<div class="col-12">
    <div>
        <div class="p-2">
            <h3 class="font-size-16"><strong>Customer Invoice ( Invoice No: #{{ $payment['invoice']['invoice_no'] }} ) </strong></h3>
        </div>
        <div class="">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th><strong>Customer Name</strong></th>
                        <th><strong>customer Mobile</strong></th>
                        <th><strong>Address</strong></th>
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

    <form method="POST" action="{{route('customer.update.invoice',$payment->invoice_id)}}">
        @csrf

    <div>
        <div class="p-2">
            <h3 class="font-size-16"><strong>Customer Invoice</strong></h3>
        </div>
        <div class="">
            <div class="table-responsive">
                <table class="table">
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
                        <td class="no-line">
                        <strong>Due Amount</strong></td>
                        <input type="hidden" name="new_paid_amount" value="{{$payment->due_amount}}" />
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
                    </tbody>
                </table>
            </div>

            <div class="row">
                <div class="form-group col-md-3">
                    <label>Paid Status</label>
                    <select name="paid_status" id="paid_status" class="form-select">
                        <option value="">Select Status</option>
                        <option value="full_paid">Full Paid</option>
                        <option value="partial_paid">Parial Paid</option>
                    </select>
                    <input type="text" name="paid_amount" id="paid_amount" style="display: none;" class="form-control paid_amount" placeholder="Enter Paid Amount"/>
                </div>

                <div class="form-group col-md-3">
                    <div class="md-3">  
                        <label for="" class="form-label"> Date</label> 
                            <input type="date" placeholder="YYYY-MM-DD" name="date"  class="form-control" id="date">
                    </div>
                </div>

                <div class="form-group col-md-3">
                    <div class="md-3" style="padding-top: 25px;">  
                        <button type="submit" class="btn btn-info">Invoice Update</button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</form>
</div>
</div> <!-- end row -->

</div>
</div>
</div> <!-- end col -->
</div> <!-- end row -->

<script type="text/javascript">
    $(document).on('change','#paid_status',function() {
       var paid_status = $(this).val();
       if (paid_status == 'partial_paid') {
           $('.paid_amount').show();
       }else{
           $('.paid_amount').hide();
       }
    });
</script>

@endsection