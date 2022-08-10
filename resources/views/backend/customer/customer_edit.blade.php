
@extends('admin.admin_master')
@section('content')
<script src="{{asset('admin/assets/js/jquery-3.6.0.min.js')}}"></script>
<div class="row">
<div class="col-lg-12">
<div class="card">
<div class="card-body">
    <h4 class="card-title">Customer Add</h4>
    
    <form method="POST" action="{{route('customer.update')}}" enctype="multipart/form-data" >
        @csrf
        <input type="hidden" value="{{$customer->id}}" name="id" />
        <div class="live-preview">            
            <div class=" col-md-12">
            <label for="oldpassword" class="form-label">Customer Name</label>
            <input type="text" value="{{$customer->name}}" name="name" placeholder="Enter Name" class="form-control" id="oldpassword">
                @error('name')
                    <p style="color: red;">  {{$message}} </p>
                @enderror
        </div><br/>
        <div class="live-preview">            
            <div class=" col-md-12">
            <label for="oldpassword" class="form-label">Customer Mobile Number</label>
            <input type="text" value="{{$customer->mobile_no}}" name="mobile_no" placeholder="Enter Mobile Number" class="form-control" id="oldpassword">
                @error('mobile_no')
                    <p style="color: red;">  {{$message}} </p>
                @enderror
        </div><br/>
        <div class="live-preview">            
            <div class=" col-md-12">
            <label for="oldpassword" class="form-label">Customer Email</label>
            <input type="email" value="{{$customer->email}}" name="email" placeholder="Enter Email" class="form-control" id="oldpassword">
                @error('email')
                    <p style="color: red;">  {{$message}} </p>
                @enderror
        </div><br/>
        <div class="live-preview">            
            <div class=" col-md-12">
            <label for="oldpassword" class="form-label">Customer Address</label>
            <input type="text" value="{{$customer->address}}" name="address" placeholder="Enter Address" class="form-control" id="oldpassword">
                @error('address')
                    <p style="color: red;">  {{$message}} </p>
                @enderror
        </div><br/>
        <div class="col-md-12" style="margin: 20px 0px;">
            <div class="input-group">
                <label class="input-group-text" for="image">Customer Image</label>
                <input type="file" name="image" class="form-control" id="image">
            </div>
            @error('image')
              <p style="color: red;">  {{$message}} </p>
            @enderror
        </div>
          <div style="margin-bottom:20px;" class="mt-4 mt-md-0 ">
              <img class="rounded  avatar-xl" id="showimage" alt="200x200" src="{{asset('image/customer/'.$customer->customer_image)}}" data-holder-rendered="true">
          </div>
        <input value="Add Customer" type="submit" class="btn btn-success btn-animation waves-effect waves-light" data-text="Add Customer">
    </form>
</div>
</div>
</div>
<!--end col-->
</div>


<script type="text/javascript">
    $(document).ready(function() {
        $('#image').change(function(e) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#showimage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        })
    })
</script>
@endsection





