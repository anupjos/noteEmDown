<?php

namespace App\Http\Controllers;

use Auth;
use Hash;
use Session;
use Request;
use Redirect;
use App\User;
use App\Task;
use App\Stage;

/**
 * Home Controller that contains all the methods for and from the dashboard
 */
class HomeController extends Controller
{
	/** get method to view the dashboard **/
	public function getDashboard()
	{
		$stages = $nextStages = Stage::where('user_id', '=', Auth::user()->id)->get();
		$allTasks = Task::where('user_id', '=', Auth::user()->id)->get();

		return view('dashboard', compact('allTasks','stages','nextStages'));
	}

	/** get method to create a new stage **/
	public function getCreateStage()
	{
		return view('createStage');
	}

	/** post method to create a new Stage **/
	public function postCreateStage()
	{
		$input = Request::all();
		Stage::create(
			[
				'user_id' 	=> Auth::user()->id,
				'name'		=> isset($input['name']) ? $input['name'] : NULL,
				'color' 	=> isset($input['color']) ? $input['color'] : NULL
			]);
		return Redirect::to('/dashboard');
	}

	/** get method to create a new task **/
	public function getCreateTask()
	{
		$stages = Stage::where('user_id', '=', Auth::user()->id)->pluck('name', 'id');
		return view('createTask', compact('stages'));
	}

	/** post method to create a new task **/
	public function postCreateTask()
	{
		$input = Request::all();
		Task::create([
				'user_id' 		=> Auth::user()->id,
				'name'			=> isset($input['name']) ? $input['name'] : NULL,
				'stage_id' 		=> isset($input['stage_id']) ? $input['stage_id'] : NULL,
				'description' 	=> isset($input['description']) ? $input['description'] : NULL,
				'due_date' 		=> isset($input['due_date']) ? $input['due_date'] : NULL
			]);
		return Redirect::to('/dashboard');
	}

	/** ajax call to change the stage of a task **/
	public function postChangeStage(){
		$input = Request::all();

		if(!isset($input['stageId']) || !isset($input['taskId'])){
			return ['code' => 'error', 'message' => 'Oops, something went wrong. Please try again.'];
		}

		Task::find($input['taskId'])->update(['stage_id' => $input['stageId']]);
		return ['code' => 'success', 'message' => 'Successful'];
	}

	/** method to delete a task **/
	public function postDeleteTask(){
		$input = Request::all();

		if(!isset($input['id'])){
			return ['code' => 'error', 'message' => 'Oops, something went wrong. Please try again.'];
		}

		Task::find($input['id'])->delete();
		return ['code' => 'success', 'message' => 'Successful'];
	}

	/** get method for settings page **/
	public function getSettings()
	{
		$user = User::find(Auth::user()->id);
		if(!$user){
			return Redirect::back('/logout');
		}
		return view('settings', compact('user'));
	}

	/** post method for settings page **/
	public function postSettings()
	{
		$input = Request::all();
		$user = User::find(Auth::user()->id);

		if(isset($input['new_password']) && isset($input['old_password'])){
			if (Hash::check($input['old_password'], $user->password)) {
				$user->password = $input['new_password'];
			}else{
				Session::flash('error_message', 'The current password you have entered is incorrect.');
				return Redirect::back();
			}
		}
		if(isset($input['name'])){
			$user->name = $input['name'];
		}
		if(isset($input['email'])){
			$user->email = $input['email'];
		}
		$user->save();

		Session::flash('success_message', 'Saved changes successfully !!');
		return Redirect::back();
	}

	/** Method to delete the account - removes the user and all the stages and tasks created by the user **/
	public function getAccountDelete(){
		$user = User::find(Auth::user()->id);
		
		Task::where('user_id', '=', $user->id)->delete();
		Stage::where('user_id', '=', $user->id)->delete();
		User::where('id', '=', $user->id)->delete();
		auth()->logout();
		
		return Redirect::to('/login');
	}
}