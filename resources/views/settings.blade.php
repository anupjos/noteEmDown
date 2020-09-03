@extends('layouts.app')

@section('content')
   	<div class="row justify-content-sm-center">
   		<div class="col-sm-4">
   			<div class="card">
				<div class="card-header text-center bg-transparent">
					<i class="fas fa-user text-success"></i> Profile
				</div>
				<div class="card-body">
					{!! Form::open(['role' => 'form']) !!}
		            <!-- User Name Field -->
		            <div class="form-group">
		            	<label for="name">Name:</label>
		               	<input type="text" value="{{ $user->name }}" class="form-control" id="name" name="name">
		            </div>

     				<!-- User Name Field -->
		            <div class="form-group">
		                <label for="email">Email:</label>
		                <input type="email" value="{{ $user->email }}" class="form-control" id="email" name="email">
		            </div>
		        </div>
		    </div>
		</div>

		<div class="col-sm-4">
   			<div class="card">
				<div class="card-header text-center bg-transparent">
					<i class="fas fa-lock text-warning"></i> Security
				</div>
				<div class="card-body">
					<!-- Current Password Field -->
		            <div class="form-group">
		            	<label for="old_password">Current Password:</label>
			            <input type="password" class="form-control" id="old_password" name="old_password">
		            </div>
		            <!-- New Password Field -->
		            <div class="form-group">
		            	<label for="new_password">New Password:</label>
			            <input type="password" class="form-control" id="new_password" name="new_password">
		            </div>
		    	</div>
			</div>
		</div>
		<div class="col-sm-4">
   			<div class="card">
				<div class="card-header text-center bg-transparent">
					<i class="fas fa-user-slash text-danger"></i> Delete Account
				</div>
				<div class="card-body">
		            <!-- Account Delete -->
		            <div class="form-group">
		            	<label for="delete">If you wish to delete your account, you will no longer be able to reaccess any data you have saved till now.</label>
			            <a href="/account/delete" class="text-danger delete">Delete Now</a>
		            </div>
		    	</div>
			</div>
		</div>
	</div>
		            
	<div class="row justify-content-sm-center"> 
		<!-- Submit Button -->
		<div class="form-group text-center p-2">
		    {!! Form::submit('Save', ['class' => 'btn btn-success']) !!}
		</div>
		{!! Form::close() !!}		
   	</div>
@endsection

@section('script')

@endsection  
   