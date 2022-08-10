

@extends('admin.admin_master')
@section('content')

<script src="{{asset('admin/assets/js/handlebars.min-v4.7.7.js')}}"></script>
<script src="{{asset('admin/assets/js/jquery-3.6.0.min.js')}}"></script>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                @if(Session::get('select_item'))
                <div class="alert text-center alert-danger alert-dismissible fade show" role="alert">
                    <i class="mdi mdi-block-helper me-2"></i>
                         {{Session::get('select_item')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>   
                @endif
                @if(Session::get('paid_amount'))
                <div class="alert text-center alert-danger alert-dismissible fade show" role="alert">
                    <i class="mdi mdi-block-helper me-2"></i>
                         {{Session::get('paid_amount')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>   
                @endif
                  <h4 class="card-title">Add Invoice</h4>
                <div class="row">
                    <div class="col-sm-1">
                        <div class="">  
                            <label for="" class="form-label">Invoice</label> 
                                <input type="text" value="{{$invoice_no}}" readonly name="invoice_no"  class="form-control" id="invoice_no" style="background-color:#ddd;">
                            </div>
                        </div><br/><br/>
                    <div class="col-sm-2">
                    <div class="md-3">  
                        <label for="" class="form-label"> Date</label> 
                            <input type="date" value="{{$date}}" name="date"  class="form-control" id="date">
                        </div>
                    </div><br/><br/>
                    <div class="col-md-3">
                    <div class=" md-3">
                        <label class="form-label">Category Name</label>
                            <select id="category_id" name="category_name" class="form-select form-control" aria-label="Default select example">
                            <option selected="">Select Category</option>
                            @foreach ($category as $cate)
                                <option value="{{$cate->id}}">{{$cate->name}}</option>
                            @endforeach
                            </select>
                        </div>
                    </div><br/><br/>
                    <div class="col-md-3">
                    <div class=" md-3">
                        <label class="form-label">Product Name</label>
                            <select id="product_id" name="product_id" class="form-select" aria-label="Default select example">
                                <option selected="">Select Product</option>
                            </select>
                        </div>
                    </div><br/><br/>
                    <div class="col-sm-1">
                        <div class="md-3">  
                            <label for="" class="form-label"> Stock(PIC/KG)</label> 
                                <input type="text" readonly name="current_stock_qty"  class="form-control" id="current_stock_qty" style="background-color:#ddd;">
                            </div>
                        </div><br/><br/>
                    <div style="margin-top: 30px;" class="col-md-2">
                     <div class=" md-3">
                <i class="mdi mdi-plus-circle-outline btn btn-success btn-sm addeventmore btn-animation waves-effect waves-light">Add More</i>
           
            </div>
        </div>
      </div>
   </div>
  <!-- --------------------------------------------------------------------- -->
    
    <div class="card-body">
        <form method="POST" action="{{route('invoice.store')}}">
            @csrf
            <table class="table-sm text-center table-bordered" width="100%" style="border-color:#ddd;">
                <thead>
                    <tr>
                        <th>Category</th>
                        <th>Product Name</th>
                        <th width="7%">PSC/KG</th>
                        <th width="10%">Unit Price</th>
                        <th width="15%">Total Price</th>
                        <th width="7%">Action</th>
                                          
                    </tr>
                </thead>
                <tbody id="addrow" class="addrow">

                </tbody>
                <tbody>
                    <tr>
                        <td colspan="4">Discount</td>
                        <td>
                            <input type="text" name="discount_amount" id="discount_amount" placeholder="Discount Amount" class="form-control estimated_amount"  />
                        </td>        
                    </tr>
                    <tr>
                        <td colspan="4">Grand Total</td>
                        <td>
                            <input type="text" name="estimated_amount" value="0" id="estimated_amount" class="form-control estimated_amount" readonly style="background-color:#ddd;" />
                        </td>        
                    </tr>
                </tbody>
            </table><br/><br/>
            <div class="form-row">
                <div class="form-group">
                    <textarea name="description" class="form-control" id="description" placeholder="Write Description Here"></textarea>
                </div>
            </div><br>
            <div class="row">
                <div class="form-group col-md-3">
                    <label>Paid Status</label>
                    <select name="paid_status" id="paid_status" class="form-select">
                        <option value="">Select Status</option>
                        <option value="full_paid">Full Paid</option>
                        <option value="full_due">Full Due</option>
                        <option value="partial_paid">Parial Paid</option>
                    </select>
                    <input type="text" name="paid_amount" id="paid_amount" style="display: none;" class="form-control paid_amount" placeholder="Enter Paid Amount"/>
                </div>
                <div class="form-group col-md-9">
                    <label>Customer Name</label>
                        <select name="customer_id" id="customer_id" class="form-select">
                            <option value="">Select Customer</option>
                            @foreach ($customer as $cust)
                                 <option value="{{$cust->id}}">{{$cust->name}} - ({{$cust->mobile_no}})</option>
                            @endforeach
                            <option value="0">New Customer</option>
                        </select>
                </div>
            </div><br>
        {{-- end row --}}<br>

            {{-- Hide Add Customer Form --}}

            <div class="row new_customer" style="display: none;">
                <div class="form-group col-md-4">
                    <input type="text" name="name" id="name"  class="form-control" placeholder="Enter Customer Name"/>
                </div>
                <div class="form-group col-md-4">
                    <input type="text" name="mobile_no" id="mobile_no"  class="form-control" placeholder="Enter Customer Mobile"/>
                </div>
          
                <div class="form-group col-md-4">
                    <input type="email" name="email" id="email"  class="form-control" placeholder="Enter Customer Email"/>
                </div>
        </div>
            {{-- End Hide Add Customer Form --}}
            <div style="margin-top: 7px;" class="form-group">
                <button type="submit" class="btn btn-info" id="storeButton">Invoice Store</button>
            </div>
        </form>
    </div>
    </div>
    <!--end col-->
</div>

   
<script id="document-template" type="text/x-handlebars-template">

    <tr class="delete_add_more_item" id="delete_add_more_item">
        <input type="hidden" name="date" value="@{{date}}" />
        <input type="hidden" name="invoice_no" value="@{{invoice_no}}" />
        <td>
            <input type="hidden" name="category_id[]" value="@{{category_id}}" />
            @{{category_name}}
        </td>
        <td>
            <input type="hidden" name="product_id[]" value="@{{product_id}}" />
            @{{product_name}}
        </td>
        <td>
            <input type="number" min="1" class="form-control selling_qty text-right" name="selling_qty[]"  />
        </td>
        <td>
            <input type="number" class="form-control unit_price text-right" name="unit_price[]"  />
        </td>
        <td>
            <input type="number" readonly class="form-control selling_price text-right" name="selling_price[]" value="0" />
        </td>
        <td>
            <i class="btn btn-danger btn-sm mdi mdi-close-thick removeeventmore"></i> 
        </td>
    </tr>

</script>

<script type="text/javascript">
    $(document).ready(function() {
        $(document).on("click",".addeventmore",function() {
           
            var date = $('#date').val();
            var invoice_no = $('#invoice_no').val();
            var category_id = $('#category_id').val();
            var category_name = $('#category_id').find('option:selected').text();
            var product_id = $('#product_id').val();
            var product_name = $('#product_id').find('option:selected').text();

            var source = $("#document-template").html();
            var template = Handlebars.compile(source);
            var date = {
                date:date,
                invoice_no:invoice_no,
                category_id:category_id,
                category_name:category_name,
                product_id:product_id,
                product_name:product_name,
            };
            var html = template(date);
            $('#addrow').append(html);
        });
        $(document).on('click','.removeeventmore',function(event) {
            $(this).closest('.delete_add_more_item').remove(); 
            totalAmountPrice();
        });
        $(document).on('keyup','.unit_price','.selling_qty',function() {
            var unit_price = $(this).closest("tr").find("input.unit_price").val();
            var selling_qty = $(this).closest("tr").find("input.selling_qty").val();
            var total = unit_price * selling_qty;
            $(this).closest("tr").find("input.selling_price").val(total);
            $("#discount_amount").trigger('keyup');
        });

        $(document).on('keyup','#discount_amount',function() {
            totalAmountPrice();
        });
        //Calculate sum of amount in invoice
        function totalAmountPrice() {
            var sum = 0;
            $(".selling_price").each(function() {
                var value = $(this).val();
                if ( value.length != 0) {
                    sum +=parseFloat(value);
                }
            });
            var discount_amount = parseFloat($('#discount_amount').val());
            if (!isNaN(discount_amount) && discount_amount.length != 0) {
                    sum -=parseFloat(discount_amount);
                }
            $("#estimated_amount").val(sum);
        }

    });
</script>

<script type="text/javascript">
    $(function() {
        $(document).on('change','#category_id',function() {
           var category_id = $(this).val();
           $.ajax({
                url:"{{route('get-product')}}",
                type: "GET",
                data:{category_id:category_id},
                success:function(data) {
                    var html = '<option value="">Select Product</option>';
                    $.each(data,function(key,v) {
                        html += '<option value=" '+ v.id +' ">'+ v.name +'</option>';                     
                    });
                    
                    $('#product_id').html(html);
                }
           }) 
        });
    });
</script>

<script type="text/javascript">
    $(function() {
        $(document).on('change','#product_id',function() {
           var product_id = $(this).val();
           $.ajax({
                url:"{{route('check-product-stock')}}",
                type: "GET",
                data:{product_id:product_id},
                success:function(data) {
                    
                     $('#current_stock_qty').val(data);

                }
           }) 
        });
    });
</script>

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

<script type="text/javascript">
    $(document).on('change','#customer_id',function() {
       var customer_id = $(this).val();
       if (customer_id == '0') {
           $('.new_customer').show();
       }else{
           $('.new_customer').hide();
       }
    });
</script>

@endsection
