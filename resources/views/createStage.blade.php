@extends('layouts.app')

@section('content')
    	<div class="row justify-content-sm-center">
	    	<div class="col-sm-4 align-self-center">
	    		{!! Form::open(['role' => 'form']) !!}
			    
			    		<!-- Name Field -->
					    <div class="form-group row mt-5">
							<label class="col-sm-4 col-form-label"><strong>Stage Name</strong></label>
					        <div class="col-sm-8">
					        	{!! Form::text('name', NULL, ['class' => 'form-control', 'required' => 'required', 'autofocus' => 'autofocus']) !!}
					        </div>
					    </div>

					    <!-- Colour Field -->
					    <div class="form-group row">
							<label class="col-sm-4 col-form-label"><strong>Colour</strong></label>
							<div class="col-sm-8 mx-auto">
								{!! Form::text('color', NULL, ['class' => 'form-control colorpicker', 'required' => 'required', 'id'=> 'color-picker-size']) !!}
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
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.3.3/js/bootstrap-colorpicker.min.js"></script> 
	<script> 
	    // $('.colorpicker').colorpicker();
	    $(function () {
              $('#color-picker-size').colorpicker({
                  customClass: 'custom-size',
                  sliders: {
                      saturation: {
                          maxLeft: 250,
                          maxTop: 250
                      },
                      hue: {
                          maxTop: 250
                      },
                      alpha: {
                          maxTop: 250
                      }
                  }
              });
          });
	</script>
@endsection