

    @extends('admin.admin_master')
    @section('content')
    <script src="{{asset('admin/assets/js/jquery-3.6.0.min.js')}}"></script>
    <div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Supplier and Product Wise Report</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
        
    <div class="row">
        <div class="col-12">
           <div class="card">
              <div class="card-body">
                <div class="row">
                    <div class="col-md-12 text-center">

                        <strong>Supplier  Wise Report</strong>
                        <input type="radio" name="supplier_product_wise" value="supplier_wise" class="search_value" />
                            &nbsp;&nbsp;
                        <strong>Product  Wise Report</strong>
                        <input type="radio" name="supplier_product_wise" value="product_wise" class="search_value" />
                            
                        
                    </div>
                </div>
        
                <div class="show_supplier" style="display:none;">
                    <form method="GET" target="_blank" action="{{route('supplier.wise.pdf')}}">
                        <div class="row">
                            <div class="col-sm-8">
                                <label class="col-sm-2 col-form-label">Supplier Name</label>
                                 <select name="supplier_id" class="form-select select2" aria-label="Default select example">
                                        <option value="">Select Supplier</option>
                                    @foreach ($suppliers as $supp)
                                        <option value="{{$supp->id}}">{{$supp->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-4" style="padding-top:35px;">
                                <button type="submit" class="btn btn-primary">Search</button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="show_product" style="display:none;">
                    <form method="GET" target="_blank" action="{{route('product.wise.pdf')}}">
                        <div class="row">
                            <div class="col-md-4">
                            <div class=" md-3">
                                <label class="form-label">Category Name</label>
                                    <select id="category_id" name="category_id" class="form-select form-control" aria-label="Default select example">
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
                                    <select id="product_id" name="product_id" class="form-select" aria-label="Default select example">
                                        <option selected="">Select Product</option>
                                    </select>
                                </div>
                            </div><br/><br/>
                            <div class="col-sm-4" style="padding-top:35px;">
                                <button type="submit" class="btn btn-primary">Search</button>
                            </div>
                        </div>
                    </form>
                </div>


             </div>
         </div>
      </div> <!-- end col -->
    </div> <!-- end row -->
  </div> <!-- container-fluid -->
</div>

    <script type="text/javascript">
     $(document).on('change','.search_value',function() {
        var search_value = $(this).val();
        if (search_value == 'supplier_wise') {
            $('.show_supplier').show();
        }else{
            $('.show_supplier').hide();
        }
     });
</script>

   <script type="text/javascript">
     $(document).on('change','.search_value',function() {
        var search_value = $(this).val();
        if (search_value == 'product_wise') {
            $('.show_product').show();
        }else{
            $('.show_product').hide();
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



@endsection