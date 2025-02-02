<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\crud;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Http\Middleware\Authlogin;
class UserController extends Controller
{
    public function login()
    {

        return view('login');

    }
    public function login_ck(Request $request)
    {
        $rules = [
            'name' => 'required',
            'password' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $user = crud::where('name', $request->name)
            ->where('password', $request->password)
            ->first();

        if (!$user) {
            return redirect()->back()->withInput()->with('error', 'Invalid Username or password');
        } else {
            Session::put('name', $user->name);
            return redirect()->route('index');
        }
    }
    public function index()
    {
        return view('register');
    }
    public function insert(Request $request)
    {
        $rules = [
            'name' => 'required|unique:reg_user',
            'password' => 'required',
        ];
    
        $validator = Validator::make($request->all(), $rules);
    
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }
    
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $path = public_path('photo');
        
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move($path, $image_name);
        
           
            $request['photo'] = $image_name;
        }
        $data = new crud();
        $data->name = $request->name;
        $data->phno = $request->phno;
        $data->gender = $request->gender;
        $data->address = $request->address;

        $data->password = $request->password;
        $data->photo = $image_name; 
        $data->save();
        return redirect('login')->with('success', 'data inserted successfully');
    }
    
    public function update($id, Request $request)
    {
        $data = crud::findOrFail($id);

        $rules = [
            'name' => 'required|unique:crud',

            'phno' => 'required|string|max:15', // Modify the max length as per your requirement
        ];

        $validator = Validator::make($request->all(), $rules);


        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $path = public_path('photo');


            $image_name = time() . '.' . $image->getClientOriginalExtension();

            $image->move($path, $image_name);
          
        }
        $data->name = $request->name;
        $data->phno = $request->phno;
        $data->gender = $request->gender;
        $data->address = $request->address;

        $data->password = $request->password;
        
        $data->photo = $image_name; 
        $data->save();
        return redirect('dashboard')->with('success', 'data updated successfully');
    }
    public function dashbord()
    {
        $data = crud::get();
        return view('dashboard', ['data' => $data]);

    }
    public function view($id)
    {

        $data = crud::findOrFail($id);

        return view('view', ['data' => $data]);
    }
    public function edit($id)
    {

        $data = crud::findOrFail($id);

        return view('edit', ['data' => $data]);
    }

    public function delete($id)
    {
        $data = crud::findOrFail($id);
        $data->delete();
        return redirect('dashbord')->with('success', 'data deleted successfully');

    }

    public function logout(Request $request) {
        Session::flush();
        return redirect('/login');
      }
}
