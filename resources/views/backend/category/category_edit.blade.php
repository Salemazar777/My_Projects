@extends('admin.admin_master')
@section('content')

<div class="row">
<div class="col-lg-12">
<div class="card">
<div class="card-body">
    <h4 class="card-title">Category</h4>
    <form method="POST" action="{{route('category.update')}}" >
        @csrf
        <input type="hidden" value="{{$category->id}}" name="id"/>
        <div class="live-preview">            
            <div class=" col-md-12">
            <label for="oldpassword" class="form-label">Category Name</label>
            <input type="text" value="{{$category->name}}" name="name" class="form-control" id="oldpassword">
                @error('name')
                    <p style="color: red;">  {{$message}} </p>
                @enderror
        </div><br/>
        <input value="Update Category" type="submit" class="btn btn-success btn-animation waves-effect waves-light" data-text="Update Category">
    </form>
</div>
</div>
</div>
<!--end col-->
</div>

@endsection





