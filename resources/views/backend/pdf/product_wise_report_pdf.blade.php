



@extends('admin.admin_master')
@section('content')

<div class="row">
<div class="col-12">
<div class="card">
<div class="card-body">

<div class="row">
<div class="col-12">
    <div class="invoice-title">
        <h4 class="float-end font-size-16"><strong>Product Wise Stock Report</strong></h4>
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
                        <th><strong>Supplier Name</strong></th>
                        <th><strong>Unit</strong></th>
                        <th><strong>Category</strong></th>
                        <th><strong>Product Name</strong></th>
                        <th><strong>Stock</strong></th>
                        
                    </tr>
                    </thead>
                    <tbody>
                      
                    <tr>
                        <td> {{ $product['supplier']['name']}}</td>
                        <td> {{ $product['unit']['name']}}</td>
                        <td> {{ $product['category']['name']}}</td>
                        <td> {{ $product->name }} </td> 
                        <td> {{ $product->quantity }} </td>                         
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