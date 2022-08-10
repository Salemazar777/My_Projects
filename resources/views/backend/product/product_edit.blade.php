
@extends('admin.admin_master')
@section('content')

<div class="row">
<div class="col-lg-12">
<div class="card">
<div class="card-body">
<h4 class="card-title">Edit Product</h4>

<form method="POST" action="{{route('product.update')}}" >
    @csrf
    <input type="hidden" name="id" value="{{$product->id}}" />
    <div class="live-preview">            
        <div class=" col-md-12">
        <label for="oldpassword" class="form-label">Product Name</label>
        <input type="text" value="{{$product->name}}" name="name" placeholder="Enter Name" class="form-control" id="oldpassword">
            @error('name')
                <p style="color: red;">  {{$message}} </p>
            @enderror
    </div><br/>
    <div class="live-preview">
        <div class="col-md-12">
            <label class="col-sm-2 col-form-label">Supplier Name</label>
            <select name="supplier" class="form-select" aria-label="Default select example">
                <option selected="">Select Supplier</option>
                @foreach ($supplier as $supp)
                    <option value="{{$supp->id}}" {{$supp->id === $product->supplier_id ? 'selected' : ''}}>{{$supp->name}}</option>
                @endforeach
            </select>
        </div>
        @error('supplier')
        <p style="color: red;">  {{$message}} </p>
        @enderror
    </div><br/>
    <div class="live-preview">
        <div class="col-md-12">
            <label class="col-sm-2 col-form-label">Unit Name</label>
            <select name="unit" class="form-select" aria-label="Default select example">
                <option selected="">Select Unit</option>
                @foreach ($unit as $uni)
                    <option value="{{$uni->id}}" {{$uni->id === $product->unit_id ? 'selected' : ''}}>{{$uni->name}}</option>
                @endforeach
            </select>
        </div>
        @error('unit')
            <p style="color: red;">  {{$message}} </p>
        @enderror
    </div><br/>
    <div class="live-preview">
        <div class="col-md-12">
            <label class="col-sm-2 col-form-label">Category Name</label>
            <select name="category" class="form-select" aria-label="Default select example">
                <option selected="">Select Category</option>
                @foreach ($category as $cate)
                    <option value="{{$cate->id}}" {{$cate->id === $product->category_id ? 'selected' : ''}}>{{$cate->name}}</option>
                @endforeach
            </select>
        </div>
        @error('category')
            <p style="color: red;">  {{$message}} </p>
        @enderror
    </div><br/>
    
    <input value="Update Product" type="submit" class="btn btn-success btn-animation waves-effect waves-light" data-text="Update Product">
</form>
</div>
</div>
</div>
<!--end col-->
</div>

@endsection





