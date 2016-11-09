<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Socialite;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $guard = 'user';
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:user', ['except' => ['logout', 'isAuth']]);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function registerValidator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
//            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    /**
     * Handle a login request to the application.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request){

        $credentials = $this->getCredentials($request);

        if (Auth::guard('user')->attempt($credentials, $request->has('remember'))) {
            return response()->json(['status' =>'ok', 'user' => Auth::guard('user')->user()->toArray()]);
        }
        else{
            return response()->json(['status' =>'error']);
        }
    }

    /**
     * Handle a registration request for the application.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request){

        $validator = $this->registerValidator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $user = $this->create($request->all());

        Auth::guard('user')->login($user);

        return response()->json(['status' =>'ok', 'user' => Auth::guard('user')->user()->toArray()]);
    }

    public function isAuth(){
        if(Auth::guard('user')->check()){
            return response()->json(['status' => 1, 'user' => Auth::guard('user')->user()->toArray()]);
        }
        else{
            return response()->json(['status' => 0]);
        }
    }

    /**
     * Log the user out of the application.
     * 
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(){
        
        Auth::guard('user')->logout();

        return response()->json(['status' =>'ok']);
    }

    /**
     * Redirect the user to the FACEBOOK authentication page.
     *
     * @return Response
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from FACEBOOK.
     *
     * @return Response
     */
    public function handleProviderCallback($provider)
    {
        $data = Socialite::driver($provider)->user();

        $user = User::where('username', $data->id)->first();

        if($user){
            Auth::guard('user')->login($user);
            return redirect('/#');
        }
        else{
            $u = User::create(['name' => $data->name,  'username' => $data->id, 'email' => $data->email]);
            Auth::guard('user')->login($u);
            return redirect('/#');
        }
    }
}
