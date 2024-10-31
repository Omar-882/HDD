<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\courses;
use Auth;
class CoursesController extends Controller
{
    public function index(){

        if(str_contains(url()->current(),"api"))
        {
        $user = Auth::user();
            if(!$user)
            {
             return response([
              'message' => 'Unauthorized'
             ], 401 );
            }
            $cors=courses::paginate(15);
            return response($cors , 200);
        }
        else
        {
            $cors=courses::paginate(15);
            return view('courses',['c'=>$cors]);
        }


    }

    public function add(Request $requset){
        if(str_contains(url()->current(),"api"))//api part
        {
            $user = Auth::user();
            if(!$user)
            {
            return response([
            'message' => 'Unauthorized'
            ], 401 );
            }
            else
            {
                $cors=new courses();
                    $cors->c_name=$requset->c_name;
                    $cors->descrption=$requset->des;
                    $cors->price=$requset->price;
                    $cors->save();
                    return response(['message'=>'New Course has been added'] , 200);
            }
        }
            else//Web part
            {
                $cors=new courses();
                $cors->c_name=$requset->c_name;
                $cors->descrption=$requset->des;
                $cors->price=$requset->price;
                $cors->save();
                return redirect('/courses');
                return response(['message'=>'New Course has been added'] , 200);

        }

    }
    public function show (Request $requset){
        if(str_contains(url()->current(),"api"))//api part
        {
        $user = Auth::user();
            if(!$user)
            {
             return response([
              'message' => 'Unauthorized'
             ], 401 );
            }
            $cors = courses::find($requset->id);
            if(!$cors)
            {
                return response([
                    'message' => 'Not Found'
                   ], 404 );
            }
            return response($cors , 200);
        }
        else//Web part
        {
            $cors = courses::findorfail($requset->id);
            return view('courseProfile',["cors"=>$cors]);
        }


    }


    public function update (Request $requset){
        if(str_contains(url()->current(),"api"))//api part
        {
            $user = Auth::user();
            if(!$user)
            {
            return response([
            'message' => 'Unauthorized'
            ], 401 );
            }
            else
            {
            $cors = courses::find($requset->id);
             if(!$cors)
               {
                   return response([
                       'message' => 'Not Found'
                      ], 404 );
               }
               else
               {
                $cors->c_name=$requset->c_name;
                $cors->descrption=$requset->des;
                $cors->price=$requset->price;
                $cors->is_deleted=$requset->isDeleted;
                $cors->save();
                return response([
                    'message'=>'Coures Has Been Edited',
                    'data'=>$cors
                ],200);
               }
            }
        }
            else//web part
            {
                $cors = courses::findorfail($requset->id);
                $cors->c_name=$requset->c_name;
                $cors->descrption=$requset->des;
                $cors->price=$requset->price;
                $cors->is_deleted=$requset->isDeleted;
                $cors->save();
                return redirect()->back();
            }


    }




}
