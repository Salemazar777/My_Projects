
@extends('admin.admin_master')

@section('content')

<div class="row">
<div class="col-lg-12">
<div class="card">
<div class="card-body">
    <h4 class="card-title">Unit</h4>
    <form method="POST" action="{{route('unit.store')}}" >
        @csrf
        <div class="live-preview">            
            <div class=" col-md-12">
            <label for="oldpassword" class="form-label">Unit Name</label>
            <input type="text" name="name" placeholder="Enter Name" class="form-control" id="oldpassword">
                @error('name')
                    <p style="color: red;">  {{$message}} </p>
                @enderror
        </div><br/>
        <input value="Add Unit" type="submit" class="btn btn-success btn-animation waves-effect waves-light" data-text="Add Unit">
    </form>
</div>
</div>
</div>
<!--end col-->
</div>

@endsection





