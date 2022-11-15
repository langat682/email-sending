<?php

namespace App\Http\Controllers;

use App\Models\User;

use App\Notifications\SendEmailNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{
    public function index()
    {

        $users = User::latest()->paginate(5);

        return view('users.index',compact('users'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    // send Email

    public function emailView($id) {
        $data = User::find($id);
        return view('users.send_email_view', compact('data'));
    }

    // send email to each users

    public function storeSingleEmail(Request $request, $id)
    {

        $user = User::find($id);
        $details = array();

        $details['greeting'] = $request->greeting;
        $details['body'] = $request->body;
        $details['actiontext'] = $request->actiontext;
        $details['actionurl'] = $request->actionurl;
        $details['endtext'] = $request->endtext;

        Notification::send($user, new SendEmailNotification($details));

        return redirect()->to('/users');
    }


    public function emailViewAll()
    {
        return view('users.send_email_all');
    }

    public function storeAllUserEmail(Request $request)
    {

        $users = User::all();
        $details = array();
        $details['greeting'] = $request->greeting;
        $details['body'] = $request->body;
        $details['actiontext'] = $request->actiontext;
        $details['actionurl'] = $request->actionurl;
        $details['endtext'] = $request->endtext;

        foreach($users as $user) {
            Notification::send($user, new SendEmailNotification($details));
        }
        return redirect()->to('/users');
    }

    //update

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $user->update($request->all());

        return redirect()->route('users.index')
                        ->with('success','User updated successfully');
    }
    //store
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        User::create($request->all());

        return redirect()->route('users.index')
                        ->with('success','User created successfully.');
    }

    //create
    public function create()
    {
        return view('users.create');
    }

    //show
    public function show($id)
    {
        return view('users.show', [
            'users' => User::findOrFail($id)
        ]);

        // return view('users.show')->with('users', $user);
    }

    //edit
    public function edit(User $user)
    {
        return view('users.edit',compact('user'));
    }

    //destroy
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')
                        ->with('success','User deleted successfully');
    }
}

