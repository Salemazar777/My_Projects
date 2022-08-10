



@extends('admin.admin_master')
@section('content')

<script src="{{asset('admin/assets/js/handlebars.min-v4.7.7.js')}}"></script>
<script src="{{asset('admin/assets/js/jquery-3.6.0.min.js')}}"></script>
<div class="row">
<div class="col-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Daily Purchase Report</h4>

            <form method="GET" target="_balnk" action="{{route('daily.purchase.pdf')}}">
            @csrf
            <div class="row"> 
                <div class="col-sm-4">
                    <div class="md-3">  
                        <label for="" class="form-label">Start Date</label> 
                        <input type="date" name="start_date" placeholder="YY-MM-DD"  class="form-control" id="start_date">
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="md-3">  
                        <label for="" class="form-label">End Date</label> 
                        <input type="date" name="end_date" placeholder="YY-MM-DD"  class="form-control" id="end_date">
                    </div>
                </div>

                    <div class="col-sm-4">
                    <div class="md-3">  
                        <label for="" class="form-label" style="margin-top:13px;"></label> 
                        <button type="submit" class="btn btn-info form-control">Search<button>
                    </div>
                </div>
                </form>
    </div>
</div>
</div>            
</div>
<!--end col-->
</div>

@endsection
