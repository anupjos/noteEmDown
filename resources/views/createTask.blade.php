@extends('layouts.app')

@section('content')

    <div class="row justify-content-sm-center">
    	<div class="col-sm-6 align-self-center">
	    	{!! Form::open(['role' => 'form']) !!}
			<!-- Name Field -->
			<div class="form-group row mt-3">
			    <label class="col-sm-2 col-form-label"><strong>Task Name</strong></label>
			    <div class="col-sm-10">
			    	{!! Form::text('name', NULL, ['class' => 'form-control', 'required' => 'required', 'autofocus' => 'autofocus']) !!}
				</div>
			</div>

			<!-- Description Field -->
			<div class="form-group row">
			    <label class="col-sm-2 col-form-label"><strong>Description</strong></label>
			    <div class="col-sm-10">
			    	{!! Form::textarea('description', NULL, ['class' => 'form-control', 'required' => 'required']) !!}
			    </div>
			</div>
			
			<!-- Stage Field -->
			<div class="form-group row">
			    <label class="col-sm-2 col-form-label"><strong>Stage</strong></label>
			    <div class="col-sm-4 mt-10">
			        @if(!$stages || count($stages) == 0)
			        	<a href="/stage/create" class="text-success form-control border-0 bg-transparent required">+ Add New</a> 
			        @else
			        	{!! Form::select('stage_id', $stages, NULL, ['class' => 'form-control', 'required' => 'required']) !!}
			        @endif
			    </div>
			</div>

			<!-- Due Date Field -->
			<div class="form-group row">
			    <label class="col-sm-2 col-form-label"><strong>Due On</strong></label>
			    <div class="col-sm-4">
			    	{!! Form::input('date','due_date', date('Y-m-d'), ['class' => 'form-control', 'required' => 'required']) !!}
			    </div>
			</div>

			<!-- Submit Button -->
			<div class="form-group text-center p-2">
			    {!! Form::submit('Create', ['class' => 'btn btn-success']) !!}
			    <a href="/dashboard" class="btn btn-secondary ml-3">Cancel</a>
			</div>

			{!! Form::close() !!}
    	</div>  
    </div>  

@endsection

@section('script')
	<script>
		
	</script>
@endsection