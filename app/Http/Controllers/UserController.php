<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\UserRequest;
use App\Traits\UploadPassport;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    use UploadPassport;

    private $user;

    public function __construct()
    {
        $this->middleware('auth');
        $this->user = new User();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.index')
            ->withUsers(User::all())
            ->withCount(0);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('user.profile')
            ->withUser('user');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $user)
    {
        $data = $request->only([
            'last_name',
            'first_name',
            'position',
            'department',
            'job_description'
        ]);

        // check if new image
        if($request->hasFile('image')){
            $data['image'] = $this->hasImage($request,'passport',$user);
        }

        $user->update($data);

        //flash message
        session()->flash('success', 'Great! '. $request->first_name.' '.$request->last_name . ' has been updated successfully');
        // redirect the admin profile
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
