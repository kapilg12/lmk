<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Role;
use App\User;
use App\Office;
use App\Country;
use Auth;
use DB;
use Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = User::orderBy('id', 'DESC')->paginate(5);
        //dd($data);
        return view('users.index', compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::where('id','!=',1)->lists('display_name', 'id');
        /*$offices = Office::with(['children','states','states.countries'])->where('parent_id',null)->orderBy('id', 'DESC')->get();*/
        $globalOffices = Country::with(['states','states.offices','states.offices.children'])->get();
        //dd($globalOffices);
        return view('users.create', compact('roles','globalOffices'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd(array($request->input('roles'), $request->all()));
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required',
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $input['options']['country'] = isset($input['country'])?$input['country']:'';
        $input['options']['state'] = isset($input['state'])?$input['state']:'';
        $input['options']['allowedOffices'] = $input['allowedOffices'];

        $user = User::create($input);
        $user->attachRole($input['roles']);

        return redirect()->route('users.index')
            ->with('success', 'User created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::where('id','!=',1)->lists('display_name', 'id');
        $userRole = $user->roles->lists('id', 'id')->toArray();
        $globalOffices = Country::with(['states','states.offices','states.offices.children'])->get();
        return view('users.edit', compact('user', 'roles', 'userRole','globalOffices'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'same:confirm-password',
            'roles' => 'required',
        ]);

        $input = $request->all();
        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            $input = array_except($input, array('password'));
        }

        $user = User::find($id);

        $input['options']['country'] = isset($input['country'])?$input['country']:'';
        $input['options']['state'] = isset($input['state'])?$input['state']:'';
        $input['options']['allowedOffices'] = $input['allowedOffices'];
        
        $user->update($input);
        DB::table('role_user')->where('user_id', $id)->delete();

        foreach ($request->input('roles') as $key => $value) {
            $user->attachRole($value);
        }

        return redirect()->route('users.index')
            ->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('users.index')
            ->with('success', 'User deleted successfully');
    }

    public function login()
    {
        return view('users.login');
    }
    public function postLogin(Request $request)
    {
        if (Auth::attempt(array('email' => $request['email'], 'password' => $request['password']))) {
            $user = Auth::user();            
            return redirect('dashboard');
        }else{
            return redirect()->route('login')->with('warning','Please enter correct username/password');
        }
    }
    public function getLogout()
    {
        Auth::logout();
        return redirect()->intended('/login');
    }
}
