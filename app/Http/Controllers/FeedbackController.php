<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests\Feedbackrequest;
use App\Models\user;
use App\Models\feedback;
class FeedbackController extends Controller
{
    public function store(Feedbackrequest $req)
    {  
     
        if (Auth::check()) {
            $user=User::find(Auth::id());
            $input['body']=$req->body;
            $input['user_id']=$user->id;
        
         
         $success['name']=$user->name;
         $success['email']=$user->email;
         $success['body']=$req->body;
            feedback::create($input);    
            
            $response=[
                'success'=>true,
                'data'=>$success,
                'message'=>'feedback added   klk'
            ];
 return response()->json($response,200);   
         }
         else{
            $response=[
                'success'=>true,
               
                'message'=>'feedback not added need to log in first'
            ];
 return response()->json($response,400);  
         }

    }
}
