<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Contract\Storage;
use Kreait\Firebase\Contract\Firestore;
use App\Mail\EmailSender;
use Exception;
use Illuminate\Support\Facades\Mail;

class VictimAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$auth = app('firebase.auth');
        //$user = $auth->getUserByEmail('sarioneiljohm@gmail.com');
        //$userid = $user->uid;

        $firestore = app('firebase.firestore');
        $database = $firestore->database();
        $userRef = $database->collection('civilian-users');
        $civilianUsers = $userRef->documents();

        return view('pages.manage_VictimAccounts', [
            'account' => $civilianUsers,
        ]);
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
        session(['viewVictimID' => $request->input('victimID')]);

        return redirect('manage_accountsvictimprofileview');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $firestore = app('firebase.firestore');
        $database = $firestore->database();
        $userRef = $database->collection('civilian-users');
        $idRef = $userRef->where($userRef->id(), '=', $id);
        $civilianUsers = $idRef->documents();

        return view('pages.manage_VictimAccounts', [
            'account' => $civilianUsers,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //VictimAcc/{VictimAcc}
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
        $firestore = app('firebase.firestore');
        $database = $firestore->database();

        $civilianUsers = $database->collection('civilian-users')->document($id);
        $victimRef = $civilianUsers->snapshot();
        if ($request->input('verification') != null)
        {
            $civilianUsers->update([
                ['path' => 'verification_status', 'value' => $request->input('verification')]
            ]);

            if ($request->input('AccountStatus') != null)
            {
                $civilianUsers->update([
                    ['path' => 'account_status', 'value' => $request->input('AccountStatus')]
                ]);
            }
        }
        elseif ($request->input('AccountStatus') != null)
        {
            $civilianUsers->update([
                ['path' => 'account_status', 'value' => $request->input('AccountStatus')]
            ]);
        }

        $victimEmail = $request->input('victim_email');
    
        if($request->input('verification') == 'Verified')
        {
            $mailData = [
          'subject' => 'Account Verification Update!',
          'body' => 'Hello Congrats your account is fully Verified you can now login and use the app.'
        ];
        try{
            Mail::to($victimRef['email'])->send(new EmailSender($mailData));
            //return response()->json(['Great']);
         }
         catch(Exception $th){
 
         }

        }

        if($request->input('verification') == 'Verification Failed')
        {
            $mailData = [
          'subject' => 'Account Verification Update!',
          'body' => 'Hello your Account failed the Verification Process Please re-register again and supply the correct information and requirements.'
        ];
        try{
            Mail::to($victimEmail)->send(new EmailSender($mailData));
            //return response()->json(['Great']);
         }
         catch(Exception $th){
 
         }

        }

        if($request->input('AccountStatus') == 'Not Banned'){
            $mailData = [
          'subject' => 'Account Status Update!',
          'body' => 'Hello your account has been unbanned you can now use again your account. Thank you.'

        ];
        try{
            Mail::to('admiralnenzsmc@gmail.com')->send(new EmailSender($mailData));
            //return response()->json(['Great']);
         }
         catch(Exception $th){
 
         }
        
        }

        if($request->input('AccountStatus') == 'Banned'){
            $mailData = [
          'subject' => 'Account Status Update!',
          'body' => 'Hello your account has been banned for misusage of the mobile application'

        ];
        try{
            Mail::to('admiralnenzsmc@gmail.com')->send(new EmailSender($mailData));
            //return response()->json(['Great']);
         }
         catch(Exception $th){
 
         }
        
        }
        if($request->input('AccountStatus') == 'Warning'){
            $mailData = [
          'subject' => 'Account Status Update!',
          'body' => 'Hello your account has been warned for misusage of the mobile application. Please use the mobile application wisely.'

        ];
        try{
            Mail::to('admiralnenzsmc@gmail.com')->send(new EmailSender($mailData));
            //return response()->json(['Great']);
         }
         catch(Exception $th){
 
         }
        
        }

        return redirect('VictimAcc');
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
