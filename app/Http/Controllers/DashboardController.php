<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomUser;
use App\Models\Skill;
use App\Models\Task;
use Auth;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function home(){
        return view('dashboard.home');
    }

    public function explore(){
        return view('dashboard.explore');
    }

    public function myskills(){
        $skills = Skill::where(
            'belongs_to',
            Auth::guard('customuser')->user()->username
        )->get();

        return view('dashboard.myskills',[
            'skills'=>$skills,
        ]);
    }

    public function createSkill(Request $request){
        // request includes title
        // validate
        $request->validate([
            'title' => ['required',
                        'string',
            ]
        ]);

        // save data for current user
        $skill = new Skill();
        $skill->title = $request->title;
        $skill->belongs_to = Auth::guard('customuser')->user()->username; // username of current logged in user

        $skill->save();

        return redirect(route('dashboard.myskills'));

    }

    public function skill($id){
        // returns the view for current user's skill which has the given id
        $current_skill = Skill::where(
                            'belongs_to',
                            Auth::guard('customuser')->user()->username)->where(
                            'id',
                            $id
        )->first();

        if($current_skill==null){
            return redirect(route('dashboard.myskills'));   // skill not found
        }

        // get the list of tasks which belongs to this particular skill
        $tasks = Task::where('skill_id',$current_skill->id)->orderby('updated_at',"DESC")->get();

        return view('dashboard.skill',[
            'skill' => $current_skill,
            'tasks' => $tasks,
        ]);

    }

    public function createTask(Request $request,$skill_id){
        // $request includes title, task_type

        // validate
        $request->validate([
            'title' => [
                'required',
                'string',
            ],
            'task_type' => [
                'required',
                'string',
                'in:basic,sub,app'
            ],
        ]);

        //
        $current_skill = Skill::where(
                    'belongs_to',
                    Auth::guard('customuser')->user()->username)->where(
                    'id',
                    $skill_id
        )->first();

        if($current_skill==null){
        return redirect(route('dashboard.myskills'));   // skill not found
        }

        // create task
        $task = new Task();
        $task->title = $request->title;
        $task->type = $request->task_type;
        $task->skill_id = $skill_id;

        $task->save();

        return redirect()->back();
        // return redirect(route('dashboard.skill',$id));
    }

    public function taskDetail($task_id){
        $task = Task::where("id",$task_id)->first();
        if($task==null){
            abort(404);
        }
        return $task->toArray();
    }
    public function taskPracticed(Request $request){
        // $request includes task_id

        // validate
        $request->validate([
            'task_id'=>[
                'required',
                'string',
                'exists:App\Models\Task,id',
            ]
        ]);

        // check if it has been a given amount of time since they last practiced
        $minutes = 2;
        $task = Task::where('id',$request->task_id);
        $task = $task->first();

        // do this except the first time
        if($task->practice_count>0){
            $task = Task::where('id',$request->task_id);
            $task = $task->where('updated_at','<=',Carbon::now()->subMinutes($minutes)->toDateTimeString());    // only those who are old
            $task = $task->first();
        }

        if($task==null){
            // try again later in some time
            return redirect()->back()->withErrors([
                'message'=>"you can only practice a task again after $minutes minutes",
            ]);
        }

        $task->practice_count+=1;
        $task->save();


        return redirect()->back();

    }
}
