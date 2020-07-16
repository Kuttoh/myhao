<?php

namespace App\Http\Controllers\Auth;

use App\Client;
use App\County;
use App\FinancialInstitution;
use App\Gender;
use App\PropertyDeveloper;
use App\Role;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Request;
use Laracasts\Flash\Flash;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    public function preRegister()
    {
        $categories = Role::all();

        return view('auth.pre_register', ['categories' => $categories]);
    }

    public function index()
    {
        $counties = County::pluck('name', 'id');

        $genders = Gender::pluck('name', 'id');

        return view('auth.register', [
            'counties' => $counties,
            'genders' => $genders,
            ]);
    }

    public function indexDev()
    {
        return view('auth.pre_dev');
    }

    public function indexFinancier()
    {
        return view('auth.pre_financier');
    }

    public function registerClientUser()
    {
        $input = Request::all();

        $role = Role::where('slug', 'client')->first();

        $user = User::create([
            'username' => strtolower($input['lastname']),
            'role_id' => $role->id,
            'email' => $input['email'],
            'password' => bcrypt($input['password']),
        ]);

        $input = Arr::prepend($input, $user->id, 'user_id');

        $this->createClient($input);

        Flash::success('Account created successfully');

        return redirect('/login');
    }

    public function createClient($input)
    {
        $input = Arr::except($input, ['_token', 'password']);
        $client = new Client();
        $client->fill($input);
        $client->save();
    }

    public function registerPropertyDeveloper()
    {
        $input = Request::all();

        $role = Role::where('slug', 'property_developer')->first();

        $user = User::create([
            'username' => strtolower($input['name']),
            'role_id' => $role->id,
            'email' => $input['email'],
            'password' => bcrypt($input['password']),
        ]);

        $input = Arr::prepend($input, $user->id, 'user_id');

        $this->createPropertyDeveloper($input);

        Flash::success('Account created successfully');

        return redirect('/login');
    }

    public function createPropertyDeveloper($input)
    {
        $input = Arr::except($input, ['_token', 'password', 'username']);
        $developer = new PropertyDeveloper();
        $developer->fill($input);
        $developer->save();
    }

    public function registerFinancialInstitution()
    {
        $input = Request::all();

        $role = Role::where('slug', 'financial_institution')->first();

        $user = $this->corporateUser($input, $role);

        $input = Arr::prepend($input, $user->id, 'user_id');

        $this->createFinancialInstitution($input);

        Flash::success('Account created successfully');

        return redirect('/login');
    }

    public function createFinancialInstitution($input)
    {
        $input = Arr::except($input, ['_token', 'password', 'username']);
        $institution = new FinancialInstitution();
        $institution->fill($input);
        $institution->save();
    }

    public function corporateUser($input, $role)
    {
        $user =  User::create([
            'username' => strtolower($input['username']),
            'role_id' => $role->id,
            'email' => $input['email'],
            'password' => bcrypt($input['password']),
        ]);

        return $user->fresh();
    }
}
