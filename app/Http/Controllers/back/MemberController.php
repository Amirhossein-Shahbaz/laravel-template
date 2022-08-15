<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use PHPUnit\Framework\MockObject\Rule\MethodName;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        $users = User::orderBy('id', 'DESC')->get();
        return view('back.users.users', compact('users'));
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
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('back.users.profile', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        // $messages = [
        //     'name.required' => 'Please fill name field',
        //     'name.string' => 'Please enter string as name',
        //     'name.max' => 'Please enter less character for name',
        //     'email.required' => 'Please fill email field',
        //     'email.email' => 'Please enter correct email',
        //     'email.max' => 'Please enter less character for email',
        //     'phone.required' => 'Please fill phone field',
        // ];

        if (!empty($request->password)) {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255'],
                'password' => ['min:8'],
                'phone' => ['required'],
            ]);
            $password = Hash::make($request->password);
            $user->password = $password;
        } else {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255'],
                'phone' => ['required'],
            ]);
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;

        $user->save();
        $mes = 'Update has been done successfully';
        return redirect()->route('users', compact('user'))->with('message', $mes);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, User $user)
    {
        $user->delete();
        $mes = 'Delete has been done successfully';
        return redirect()->route('users', compact('user'))->with('message', $mes);
    }

    public function updatestatus(User $user)
    {
        // $Status = $user->status;
        if ($user->status == 1) {
            $user->status = 0;
        } else {
            $user->status = 1;
        }
        $user->save();
        $mes = 'Status has been changed successfully';
        return redirect()->route('users', compact('user'))->with('message', $mes);
    }
}
