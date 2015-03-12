@extends('app')
@section('title')
    OmniWeb - Create Campaign
@stop
@section('content')
 
 <div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create a new Campaign</div>
                <div class="panel-body">
                    

                    @if(Session::has('message'))
                        <p class="alert alert-info">{{ Session::get('message') }}</p>
                    @endif
                    <form class="form-horizontal" action="{{route('addentry', [])}}" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group">
                            <label class="col-md-4 control-label">Campaign Name</label>
                            <div class="col-md-6">
                                <input type="text"  name="campaignName" id="campaignName"  >
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Start Date</label>
                            <div class="col-md-6">
                               <input type="date" name="startDate" id="startDate" value="" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">End Date</label>
                            <div class="col-md-6">
                               <input type="date" name="endDate" id="endDate" value="" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">The file that needs to be send for campaign : </label>
                            <div class="col-md-6">                               
                                     <input type="file" name="filefield" id="filefield">       
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary" style="margin-right: 15px;">
                                    Create Campaign
                                </button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection