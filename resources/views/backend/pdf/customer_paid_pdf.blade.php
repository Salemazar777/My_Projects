
@extends('admin.admin_master')
@section('content')

<div class="row">
<div class="col-12">
<div class="card">
<div class="card-body">

<div class="row">
<div class="col-12">
    <div class="invoice-title">
        <h4 class="float-end font-size-16"><strong>Customer Paid Report</strong></h4>
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
            
        </div>
        <div class="">
            <div class="table-responsive">
                <table class="table text-center">
                    <thead>
                    <tr>
                        <th><strong>SI</strong></th>
                        <th><strong>Customer Name</strong></th>
                        <th><strong>Invoice No</strong></th>
                        <th><strong>Date</strong></th>
                        <th><strong>Due Amount</strong></th>
                        
                    </tr>
                    </thead>
                    <tbody>
                        @php
                        $total_due = '0';
                    @endphp
                    @foreach ($allData as $key => $item)
                    
                    <tr>
                        <td> {{ $key+1}} </td>
                        <td> {{ $item['customer']['name'] }} </td> 
                        <td> {{ $item['invoice']['invoice_no'] }} </td>
                        <td> {{ Date('d-m-Y',strtotime($item['invoice']['date'])) }} </td>
                        <td> {{ $item->due_amount }} </td>                  
                    </tr>
                        @php
                            $total_due += $item->due_amount;
                        @endphp
                    @endforeach
                    <tr>
                        <td class="no-line"></td>
                        <td class="no-line"></td>
                        <td class="no-line"></td>
                        <td class="no-line">
                            <strong>Grand Due Amount</strong></td>
                        <td class="no-line"><h4 class="m-0">${{$total_due}}</h4></td>
                    </tr>
                    </tbody>
                </table>
            </div>
            @php
            $date = new DateTime('now',new DateTimeZone('Asia/Kabul'));   
           @endphp
           <i>Printing Time : {{$date->format('F j, Y, g:i a')}}</i>
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