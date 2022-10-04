<?php

namespace App\Http\Controllers;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserLoginRequest;
use Illuminate\Http\Request;
use Validator;
use App\Models\User;
use Auth;
class UserController extends Controller
{
   /**
 * Store a new blog post.
 *
 * @param  \App\Http\Requests\UserRequest  $request
 * @return Illuminate\Http\Response
 */  public function register(UserRequest $request)
    {
     
                $input=$request->all();
            $input['password']=bcrypt($input['password']);
           $user=User::create($input);
            $success['token']=$user->createtoken('MyApp')->plainTextToken;
            $response=[
                'success'=>true,
                'data'=>$success,
                'message'=>'user added'
            ];
 return response()->json($response,200);


        
    }
    public function login(UserLoginRequest $req)
    {
        if (Auth::attempt(['email' => $req->email, 'password' => $req->password]))
        {$user=Auth::User();
            $success['token']=$user->createtoken('MyApp')->plainTextToken;
           
            $success['name']=$user->name;
            $response=[
                'success'=>true,
                'data'=>$success,
                'message'=>'user logged in'
            ];
 return response()->json($response,200);
        }
 else
 {
    $response=[
        'success'=>false,
      
        'message'=>'user not authorised',
    ];
return response()->json($response,400);

 }
        }
    
}
