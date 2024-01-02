<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomUser;
use App\Models\Skill;
use App\Models\Task;
use Auth;

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
        $tasks = Task::where('skill_id',$current_skill->id)->get();

        return view('dashboard.skill',[
            'skill' => $current_skill,
            'tasks' => $tasks,
        ]);

    }
}
