

@extends('admin.admin_master')
@section('content')

<div class="row">
<div class="col-12">
<div class="card">
<div class="card-body">

<div class="row">
<div class="col-12">
    <div class="invoice-title">
        <h4 class="float-end font-size-16"><strong>Daily Purchase Report</strong></h4>
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
                
            </address>
        </div>
    </div>
</div>
</div>

<div class="row">
<div class="col-12">
    <div>
        <div class="p-2">
            <h3 class="font-size-16"><strong>Daily Purchase Report: <span class="btn btn-info">{{date('d-m-Y',strtotime($start_date))}}</span> - <span class="btn btn-success">{{date('d-m-Y',strtotime($end_date))}}</span></strong></h3>
        </div>
     
    </div>
</div>
</div> <!-- end row -->

<div class="row">
<div class="col-12">
    <div>
        <div class="p-2">
            
        </div>
        <div class="">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th><strong>SI</strong></th>
                        <th><strong>Purchase No</strong></th>
                        <th><strong>Date</strong></th>
                        <th><strong>Product Name</strong></th>
                        <th><strong>Quantity</strong></th>
                        <th><strong>Unit Price</strong></th>
                        <th><strong>Total Price</strong></th>
                    </tr>
                    </thead>
                    <tbody>
                        @php
                        $total_sum = '0';
                    @endphp
                    @foreach ($allData as $key => $item)
                    
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$item->purchase_no}}</td>
                        <td>{{date('d-m-Y',strtotime($item->date))}}</td>
                        <td>{{$item['product']['name']}}</td>
                        <td>{{$item->buying_qty}} {{ $item['product']['unit']['name'] }}</td>
                        <td>{{$item->unit_price}}</td>
                        <td>{{$item->buying_price}}</td>                         
                    </tr>
                        @php
                            $total_sum += $item->buying_price;
                        @endphp
                    @endforeach
                    <tr>
                        <td class="no-line"></td>
                        <td class="no-line"></td>
                        <td class="no-line"></td>
                        <td class="no-line"></td>
                        <td class="no-line">
                            <strong>Grand Amount</strong></td>
                        <td class="no-line"><h4 class="m-0">${{$total_sum}}</h4></td>
                    </tr>
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