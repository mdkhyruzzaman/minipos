<?php

namespace App\Http\Controllers;

use App\User;
use App\Group;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['users'] = User::all();
        return view('users.users', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['groups']   = Group::listForSelect();
        $this->data['mode']     = 'create';
        $this->data['headline'] = 'Add New User';

        return view('users.form', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {
        $data = $request->all();
        if(User::create($data)) {
            Session::flash('message', 'Created New User.');
        }

        return redirect()->to('users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->data['user'] = User::FindOrFail($id);
        $this->data['tab_manu'] = 'user_info';
        return view('users.show',$this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->data['groups']   = Group::listForSelect();
        $this->data['user']     = User::FindOrFail($id);
        $this->data['mode']     = 'edit';
        $this->data['headline'] = 'Update Information';

        return view('users.form',$this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        $data           = $request->all();
        $user           = User::Find($id);

        $user->group_id = $data['group_id'];
        $user->name     = $data['name'];
        $user->phone    = $data['phone'];
        $user->email    = $data['email'];
        $user->address  = $data['address'];
        $user->save();

        return redirect()->to('users')->with(['message'=>'Updated Successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);

        return redirect()->to('users')->with(['message'=>'Deleted Successfully']);
    }
}