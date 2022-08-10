

@extends('admin.admin_master')
@section('content')

<script src="{{asset('admin/assets/js/handlebars.min-v4.7.7.js')}}"></script>
<script src="{{asset('admin/assets/js/jquery-3.6.0.min.js')}}"></script>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                  <h4 class="card-title">Add Invoice</h4>
                <div class="row">
                    <div class="col-md-4">
                    <div class="md-3">  
                        <label for="" class="form-label"> Date</label> 
                            <input type="date" name="date"  class="form-control" id="date">
                        </div>
                    </div><br/><br/>
                    <div class=" col-md-4">
                    <div class="md-3">   
                        <label for="" class="form-label">Purchase No</label>
                            <input type="text" name="purchase_no"  class="form-control" id="purchase_no">
                        </div>
                    </div><br/><br/>
                    <div class="col-md-4">
                    <div class="md-3">
                        <label class="form-label">Supplier Name</label>
                            <select id="supplier_id" name="supplier_name" class="form-control form-select select2" aria-label="Default select example">
                                <option selected="">Select Supplier</option>
                            @foreach ($supplier as $supp)
                                <option value="{{$supp->id}}">{{$supp->name}}</option>
                            @endforeach
                            </select>
                        </div>
                    </div><br/><br/>
                    <div class="col-md-4">
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
                    <div class="col-md-4">
                    <div class=" md-3">
                        <label class="form-label">Product Name</label>
                            <select id="product_id" name="product_name" class="form-select" aria-label="Default select example">
                                <option selected="">Select Product</option>
                            @foreach ($product as $pro)
                                <option value="{{$pro->id}}">{{$pro->name}}</option>
                            @endforeach
                            </select>
                        </div>
                    </div><br/><br/>
                    <div style="margin-top: 30px;" class=" col-md-4">
                     <div class=" md-3">
                <i class="mdi mdi-plus-circle-outline btn btn-success btn-sm addeventmore btn-animation waves-effect waves-light">Add More</i>
           
            </div>
        </div>
      </div>
   </div>
  <!-- --------------------------------------------------------------------- -->
    
    <div class="card-body">
        <form method="POST" action="{{route('purchase.store')}}">
            @csrf
            <table class="table-sm text-center table-bordered" width="100%" style="border-color:#ddd;">
                <thead>
                    <tr>
                        <th>Category</th>
                        <th>Product Name</th>
                        <th>PSC/KG</th>
                        <th>Unit Price</th>
                        <th>Description</th>
                        <th>Total Price</th>
                        <th>Delete</th>                  
                    </tr>
                </thead>
                <tbody id="addrow" class="addrow">

                </tbody>
                <tbody>
                    <tr>
                        <td colspan="5"></td>
                        <td>
                            <input type="text" name="estimated_amount" value="0" id="estimated_amount" class="form-control estimated_amount" readonly style="background-color:#ddd;" />
                        </td>
                        <td></td>
                    </tr>
                </tbody>
            </table><br/>
            <div class="form-group">
                <button type="submit" class="btn btn-info" id="storeButton">Purchase Store</button>
            </div>
        </form>
    </div>
    </div>
    <!--end col-->
</div>

   
<script id="document-template" type="text/x-handlebars-template">

    <tr class="delete_add_more_item" id="delete_add_more_item">
        <input type="hidden" name="date[]" value="@{{date}}" />
        <input type="hidden" name="purchase_no[]" value="@{{purchase_no}}" />
        <input type="hidden" name="supplier_id[]" value="@{{supplier_id}}" />

        <td>
            <input type="hidden" name="category_id[]" value="@{{category_id}}" />
            @{{category_name}}
        </td>
        <td>
            <input type="hidden" name="product_id[]" value="@{{product_id}}" />
            @{{product_name}}
        </td>
        <td>
            <input type="number" min="1" class="form-control buying_qty text-right" name="buying_qty[]"  />
        </td>
        <td>
            <input type="number" class="form-control unit_price text-right" name="unit_price[]"  />
        </td>
        <td>
            <input type="text" class="form-control" name="description[]" value="" />
        </td>
        <td>
            <input type="number" readonly class="form-control buying_price text-right" name="buying_price[]" value="0" />
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
            var purchase_no = $('#purchase_no').val();
            var supplier_id = $('#supplier_id').val();
            var category_id = $('#category_id').val();
            var category_name = $('#category_id').find('option:selected').text();
            var product_id = $('#product_id').val();
            var product_name = $('#product_id').find('option:selected').text();

            var source = $("#document-template").html();
            var template = Handlebars.compile(source);
            var date = {
                date:date,
                purchase_no:purchase_no,
                supplier_id:supplier_id,
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
        $(document).on('keyup','.unit_price','.buying_qty',function() {
            var unit_price = $(this).closest("tr").find("input.unit_price").val();
            var buying_qty = $(this).closest("tr").find("input.buying_qty").val();
            var total = unit_price * buying_qty;
            $(this).closest("tr").find("input.buying_price").val(total);
            totalAmountPrice();
        });
        //Calculate sum of amount in invoice
        function totalAmountPrice() {
            var sum = 0;
            $(".buying_price").each(function() {
                var value = $(this).val();
                if ( value.length != 0) {
                    sum +=parseFloat(value);
                }
            });
            $("#estimated_amount").val(sum);
        }

    });
</script>

<script type="text/javascript">
    $(function() {
        $(document).on('change','#supplier_id',function() {
           var supplier_id = $(this).val();
           $.ajax({
                url:"{{route('get-category')}}",
                type: "GET",
                data:{supplier_id:supplier_id},
                success:function(data) {
                    var html = '<option value="">Select Category</option>';
                    $.each(data,function(key,v) {
                        html += '<option value=" '+ v.category_id +' ">'+ v.category.name +'</option>';                     
                    });
                    
                    $('#category_id').html(html);
                }
           }) 
        });
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
@endsection
