@extends('layouts.app')

@section('content')
   	<div class="row stageHolder">
   		@if($allTasks && count($allTasks) > 0)
	   		@foreach($stages as $stage)
			   	<div class="col-sm justify-content-sm-center">
			   		{{-- set stage card border & header color --}}
			   		<div class="card text-center cardColor" style="--c: {{ $stage->color }}">
						<div class="card-header cardColor" style="--c: {{ $stage->color }}">
							
								<span class="float-left"><a href="javascript:void(0)" class="stagehandle btn btn-default text-dark"><i class="fas fa-arrows-alt"></i> </a></span>
								<h5 class="stageText">{{ $stage->name }}</h5>
					
						</div>
						<div class="card-body stage-card-body" id="stageCard-{{ $stage->id }}" style="--c: {{ $stage->color }}">
							<div class="row">
								<div class="col-sm-12 ml-auto mr-auto taskHolder">
									@foreach($allTasks as $task)
										@if($task->stage_id == $stage->id)
							   			<div class="card taskCard-{{ $task->id }} text-center bg-light border-{{ $stage->color }}">
							   				<div class="row">
								   				<div class="col-sm-6 text-left">
								   					<a href="javascript:void(0)" class="taskhandle btn btn-default text-dark"><i class="fas fa-arrows-alt"></i> </a>
								   				</div>
								   				<div class="col-sm-6 text-right">
								   					<a href="javascript:void(0)" id="deleteTaskBtn" class="btn btn-default text-danger" data-taskId = {{ $task->id }}><i class="fas fa-times"></i> Delete</a>
								   				</div>
								   			</div>
							   				
											<div class="card-body">
												<div class="text-dark font-weight-bold">
												  {{ $task->name }}
												</div>
												<p class="card-text">{{ $task->description }}</p>
												<!-- Dropdown to select the next Stage  -->
												<div class="btn-group">
												  	<button type="button" class="btn btn-default dropdown-toggle text-success" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												   	Move to
												  	</button>
												  	<div class="dropdown-menu">
												  		@foreach($nextStages as $nextStage)
													  		@if($nextStage->id != $task->stage_id)
														    	<button class="dropdown-item changeStage" data-taskId = {{ $task->id }} data-stageId={{ $nextStage->id }}>{{ $nextStage->name }}</button>
														    @endif
													    @endforeach
													</div>
												</div>
											</div>
											
											<div class="card-footer">
												Created : {{ $task->created_at->diffForHumans() }}<br>
												{{--  {{ date('j F Y', strtotime($task->due_date)) }} --}}
												@php($dueDate = \Carbon\Carbon::parse($task->due_date))
												@if ($dueDate->isPast())
												    Due On : <span class="text-danger"> {{ $dueDate->diffForHumans() }}</span>
												@else
													Due On : {{ $dueDate->diffForHumans() }}
												@endif
											</div>
											
										</div>
										@endif
									@endforeach
								</div>
							</div>
						</div>
			   		</div>
			   	</div>
	   		@endforeach
	   	@else
	   		{{-- starting stage/ when there are no tasks in DB --}}
	   		<div class="mx-auto mt-5 p-1 text-center">
	   			<h4>Let's start adding new tasks.</h4>
	   			<h5><a href="/task/create" class="btn btn-outline-success">Create Task</a></h5>
	   		</div>
   		@endif
   	</div>
@endsection

@section('script')
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>

	<script>
	    $(document).ready(function(){
	    	//temporarily drag and drop card vertically within the same stage card
	        $('.taskHolder').sortable({
	            axis: "y",
	            handle: '.taskhandle'
	        });

	        //temporarily drag and drop card horizontally
	        $('.stageHolder').sortable({
	            axis: "x",
	            handle: '.stagehandle'
	        });

	    });

	    //ajax call to change the state to the selected one from the dropdown
	    $('.changeStage').click(function(){
		    var toStage = $(this).attr("data-stageId");
		    var taskId = $(this).attr("data-taskId");
		    $.ajax({
              	url: '/ajax/stage/change',
              	type: 'POST',
              	data: {
              		'stageId':toStage,
              		'taskId':taskId
              		},
              	success:function(response){
                	if(response.code == 'success'){
                		$('#stageCard-'+toStage).prepend($('.taskCard-'+taskId));
                	}
              	}
           });
		});

	    //ajax call to delete a task when clicked on the task button
		$('#deleteTaskBtn').click(function(){
		    var taskId = $(this).attr("data-taskId");
		    $.ajax({
              	url: '/ajax/task/delete',
              	type: 'POST',
              	data: {
              		'id':taskId
              		},
              	success:function(response){
                	$('.taskCard-'+taskId).remove();
              	}
           });
		});


	</script>
@endsection  
   