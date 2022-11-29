<?php

namespace App\Http\Controllers;

use App\Models\User;

use App\Notifications\SendEmailNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{
    protected $mail;


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
            $details['name'] = $request->name;
            $details['email'] = $request->email;
            $details['subject'] = $request->subject;
            $details['text'] = $request->text;

        if ($this->isOnline()){
            $mail_data=[
            'recipient'=>'weslylangat69@gmail.com',
            'fromEmail'=>$request->email,
            'fromName'=>$request->name,
            'subject'=>$request->subject,
            'body'=>$request->body,
            ];

            \Mail::send('email-template',$mail_data, function($message) use ($mail_data){

            $message->to($mail_data['recipient'])
                    ->from($mail_data['fromEmail'],$mail_data['fromName'])
                    ->subject($mail_data['subject']);

                });
            }
            else{
            return redirect()->to('/users');
            }
    }

    public function isOnline($site = "https://youtube.com/")
    {
    if(@fopen($site, "r")){

    return true;
    }else{
    return false;
    }

    }

    public function emailViewAll()
    {
        return view('users.send_email_all');
    }


    public function storeAllUserEmail(Request $request)
    {

        $users = User::all();
        $details = array();
        $details['Name'] = $request->name;
        $details['Email'] = $request->email;
        $details['subject'] = $request->subject;
        $details['message'] = $request->message;

        foreach($users as $user) {
            Notification::send($user, new SendEmailNotification($details));
        }



        return redirect()->to('/users');
    }

    //update

    public function update(Request $request, User $id)
    {
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');

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
    public function edit($id)
    {
       $user = User::find($id);
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

