

@extends('admin.admin_master')
@section('content')

<div class="row">
<div class="col-12">
<div class="card">
<div class="card-body">

<div class="row">
<div class="col-12">
    <div class="invoice-title">
        <h4 class="float-end font-size-16"><strong>Stock Report</strong></h4>
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
            <h3 class="font-size-16"><strong>Stock</strong></h3>
        </div>
        <div class="">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th><strong>SI</strong></th>
                        <th><strong>Supplier Name</strong></th>
                        <th><strong>Unit</strong></th>
                        <th><strong>Category</strong></th>
                        <th><strong>Product Name</strong></th>
                        <th><strong>In Quantity</strong></th>
                        <th><strong>Out Quantity</strong></th>
                        <th><strong>Stock</strong></th>
                    </tr>
                    </thead>
                    <tbody>
                      
                    @foreach ($allData as $key => $item)
                    @php
                        $buying_total = App\Models\Purchase::where('category_id',$item->category_id)->where('product_id',$item->id)->where('status','1')->sum('buying_qty');
                        $selling_total = App\Models\Invoicedetail::where('category_id',$item->category_id)->where('product_id',$item->id)->where('status','1')->sum('selling_qty');
                    @endphp
                    <tr>
                        <td> {{ $key+1}} </td>
                        <td> {{ $item['supplier']['name']}}</td>
                        <td> {{ $item['unit']['name']}}</td>
                        <td> {{ $item['category']['name']}}</td>
                        <td> {{ $item->name }}</td>
                        <td> {{ $buying_total }}</td>
                        <td> {{ $selling_total }}</td> 
                        <td> {{ $item->quantity }}</td>                         
                    </tr>
                    @endforeach 
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