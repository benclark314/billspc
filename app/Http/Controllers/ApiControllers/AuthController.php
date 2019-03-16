<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller;
use App\User;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

      public function register(Request $request)
      {
         $request->validate([
           'email'=>'required',
           'name'=>'required',
           'password'=>'required'
         ]);
        //$user=User::firstOrNew(['email'=>$request->email]); //new User();
        $user = new User();
        $user->email=$request->email;
        $user->name=$request->name;
        //$user->email=$request->email;
        $user->password=bcrypt($request->password);
        $user->save();

        $http = new Client;
        //'http://localhost/BillsPC/public/oauth/token'
        $response = $http->post(url('oauth/token'), [
           'form_params' => [
               'grant_type' => 'password',
               'client_id' => '2',
               'client_secret' => 'qd1jmOJjntYKvykQzZc88AByzKQuaXoJ7DUWVXcI',
               'username' => $request->email,
               'password' => $request->password,
               'scope' => '',
           ],
        ]);
        return response(['auth'=>json_decode((string) $response->getBody(), true),'user'=>$user]);
        //return json_decode((string) $response->getBody(), true);
      }

     public function login(Request $request)
     {
         $request->validate([
           'email'=>'required',
           'password'=>'required'
         ]);

         $user= User::where('email', $request->email)->first();

         if(!$user){
           return response(['status'=>'error','message'=>'User not found']);
         }
         if(Hash::check($request->password, $user->password)){
           $http= new Client;
          //'http://localhost/BillsPC/public/oauth/token'
           $response = $http->post(url('oauth/token'), [
              'form_params' => [
                  'grant_type' => 'password',
                  'client_id' => '2',
                  'client_secret' => 'qd1jmOJjntYKvykQzZc88AByzKQuaXoJ7DUWVXcI',
                  'username' => $request->email,
                  'password' => $request->password,
                  'scope' => '',
              ],
           ]);
           return response(['auth' => json_decode((string)$response->getBody(), true), 'user' => $user]);
         }else{
        	 return response(['message'=>'password not match','status'=>'error']);
         }
     }











    //
    //
    // public $successStatus = 200;
    // /**
    //  * login api
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function login()
    // {
    //     if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){
    //         $user = Auth::user();
    //         $success['token'] =  $user->createToken('MyApp')-> accessToken;
    //         return response()->json(['success' => $success], $this-> successStatus);
    //     }
    //     else{
    //         return response()->json(['error'=>'Unauthorised'], 401);
    //     }
    // }
    //
    // /**
    //  * Register api
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function register(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'name' => 'required',
    //         'email' => 'required|email',
    //         'password' => 'required',
    //         'c_password' => 'required|same:password',
    //     ]);
    //
    //     if ($validator->fails()) {
    //         return response()->json(['error'=>$validator->errors()], 401);
    //     }
    //
    //     $input = $request->all();
    //     $input['password'] = bcrypt($input['password']);
    //     $user = User::create($input);
    //     $success['token'] =  $user->createToken('MyApp')-> accessToken;
    //     $success['name'] =  $user->name;
    //     return response()->json(['success'=>$success], $this-> successStatus);
    // }
    //
    // /**
    //  * details api
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function details()
    // {
    //     $user = Auth::user();
    //     return response()->json(['success' => $user], $this-> successStatus);
    // }
    //











}
