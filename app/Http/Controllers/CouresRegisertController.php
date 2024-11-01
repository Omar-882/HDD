<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\courses;
use App\Models\payments;
use App\Models\registerCourses;
use DB;
Use Auth;
class CouresRegisertController extends Controller
{
    public function RegisterCourse(Request $request)
    {
        $CheckIfExist = registerCourses::where('course_id',$request->CourseID)
        ->where('user_id',$request->UserID)
        ->where('approval','pending')->first();
        if($CheckIfExist)
        {
            return response(['message'=>'You Already Registerd for this course awaiting approval'] , 200);
        }
        $user = User::find($request->UserID);
        if(!$user)
        {
            return response(['message'=>'User Not Found'] , 404);
        }
        $course = courses::find($request->CourseID);
        if(!$course)
        {
            return response(['message'=>'Course Not Found' ], 404);
        }
        $new = new registerCourses();
        $new->user_id = $user->id;
        $new->course_id = $course->id;
        $new->approval = "pending";
        $new->save();
        if(str_contains(url()->current(),"api"))
        {
        return response(['message'=>'Course Has beed Registered Awaiting Apporval'],200);
        }
        else
        {
            // Session::flash('Done , Awaiting Approval');
            return redirect()->back();
        }
    }
    public function GetAllPendings()
    {

        if(str_contains(url()->current(),"api"))
        {
        $user = Auth::user();
            if(!$user)
            {
             return response([
              'message' => 'Unauthorized'
             ], 401 );
            }
            $AllPendingApprovals = DB::table('users') ->join('register_course', 'users.id', '=', 'register_course.user_id')
            ->join('courses', 'register_course.course_id', '=', 'courses.id')
            ->select('register_course.id as RegisterationID','users.id as UserID' ,'courses.id as CourseID','users.F_name as user_name','users.L_name as user_Lastname', 'courses.c_name as course_name',
            'register_course.approval', 'register_course.created_at','register_course.updated_at')
            ->where('register_course.approval','pending')->get();
            return response(['data'=>$AllPendingApprovals] , 200);
        }
        else
        {
            $AllPendingApprovals = DB::table('users') ->join('register_course', 'users.id', '=', 'register_course.user_id')
            ->join('courses', 'register_course.course_id', '=', 'courses.id')
            ->select('register_course.id as RegisterationID','users.id as UserID' ,'courses.id as CourseID','users.F_name as user_name','users.L_name as user_Lastname', 'courses.c_name as course_name',
            'register_course.approval', 'register_course.created_at','register_course.updated_at')
            ->where('register_course.approval','pending')->get();
            return response(['data'=>$AllPendingApprovals] , 200);//change this to return view
        }
    }
    public function changeApprovalStatus(Request $request)
    {
        //this function update the register course approval status
        //and add new record in the payment table if the decision = approved
        //and update the user wallet according to the course price
        $CheckIfExist = registerCourses::where('course_id',$request->CourseID)
        ->where('user_id',$request->UserID)
        ->where('approval','pending')->first();
        if(!$CheckIfExist)
        {
            return response(['message'=>'Registeration Not Found'] , 404);
        }
        $user = User::find($request->UserID);
        if(!$user)
        {
            return response(['message'=>'User Not Found'] , 404);
        }
        $course = courses::find($request->CourseID);
        if(!$course)
        {
            return response(['message'=>'Course Not Found' ], 404);
        }
        $CheckIfExist->approval = $request->decision;
        $CheckIfExist->save();
        if(str_contains(url()->current(),"api"))
        {
            return response(['message'=>'Course Registeration Has Been '.$request->decision,'UserFirstName'=>$user->F_name,
            "UserLastName"=>$user->L_name ], 200);
        }
        else
        {
            return response(['message'=>'Course Registeration Has Been '.$request->decision,'UserFirstName'=>$user->F_name,
            "UserLastName"=>$user->L_name ], 200);//change this to return view
        }
    }
}
