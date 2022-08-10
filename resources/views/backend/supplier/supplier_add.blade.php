@extends('admin.admin_master')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Add Supplier</h4>
                <form method="POST" action="{{route('supplier.store')}}" >
                    @csrf
                    <div class="live-preview">            
                        <div class=" col-md-12">
                        <label for="oldpassword" class="form-label">Supplier Name</label>
                        <input type="text" name="name" placeholder="Enter Name" class="form-control" id="oldpassword">
                            @error('name')
                                <p style="color: red;">  {{$message}} </p>
                            @enderror
                    </div><br/>
                    <div class="live-preview">            
                        <div class=" col-md-12">
                        <label for="oldpassword" class="form-label">Supplier Mobile Number</label>
                        <input type="text" name="mobile_no" placeholder="Enter Mobile Number" class="form-control" id="oldpassword">
                            @error('mobile_no')
                                <p style="color: red;">  {{$message}} </p>
                            @enderror
                    </div><br/>
                    <div class="live-preview">            
                        <div class=" col-md-12">
                        <label for="oldpassword" class="form-label">Supplier Email</label>
                        <input type="email" name="email" placeholder="Enter Email" class="form-control" id="oldpassword">
                            @error('email')
                                <p style="color: red;">  {{$message}} </p>
                            @enderror
                    </div><br/>
                    <div class="live-preview">            
                        <div class=" col-md-12">
                        <label for="oldpassword" class="form-label">Supplier Address</label>
                        <input type="text" name="address" placeholder="Enter Address" class="form-control" id="oldpassword">
                            @error('address')
                                <p style="color: red;">  {{$message}} </p>
                            @enderror
                    </div><br/>
                    <input value="Add Supplier" type="submit" class="btn btn-success btn-animation waves-effect waves-light" data-text="Add Supplier">
                </form>
            </div>
        </div>
    </div>
<!--end col-->
</div>

@endsection





