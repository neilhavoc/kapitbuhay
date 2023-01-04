<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\EmailSender;
use Exception;
use Illuminate\Support\Facades\Mail;

class ManageAccountsVictimProfileViewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!session()->has('adminID')) {
            return redirect('loginpage');
        }
        else {
            $firestore = app('firebase.firestore');

            $database = $firestore->database();
            $viewdisID = session('viewVictimID');

            $victimIDRef = $database->collection('civilian-users')->document($viewdisID);
            $victimRef = $victimIDRef->snapshot();

            if ($victimRef['verification_status'] != 'Verified')
            {
                $accountdisable = 'disabled';
                $verifydisable = 'false';
            }
            elseif ($victimRef['verification_status'] == 'Verified')
            {
                $accountdisable = 'false';
                $verifydisable = 'disabled';
            }
            else
            {
                $verifydisable = 'false';
            }

            return view('pages.manage_AccountsViewVictimProfile',[
                'victim' => $victimRef,
                'disable' => $accountdisable,
                'verifydisable' => $verifydisable,
            ]);
        }
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
    public function update(Request $request, $id)
    {
        $firestore = app('firebase.firestore');
        $database = $firestore->database();

        $civilianUsers = $database->collection('civilian-users')->document($id);
        $victimRef = $civilianUsers->snapshot();

        if ($request->input('verification') != null)
        {
            $mailData = [
                'subject' => 'Account Verification Update!',
                'body' => 'Hello your Account failed the Verification Process Please re-register again and supply the correct information and requirements.'
            ];

            if($request->input('verification') == 'Verified')
            {
                $civilianUsers->update([
                    ['path' => 'verification_status', 'value' => $request->input('verification')]
                ]);
            }
            elseif ($request->input('verification') == 'Verification Failed')
            {
                $civilianUsers->update([
                    ['path' => 'verification_status', 'value' => $request->input('verification')]
                ]);
            }
        }

        try{
            Mail::to($victimRef['email'])->send(new EmailSender($mailData));
            //return response()->json(['Great']);
        }
            catch(Exception $th){

        }

        return redirect('VictimAcc');
    }

    public function updateAccStatus(Request $request, $id)
    {
        $firestore = app('firebase.firestore');
        $database = $firestore->database();

        $civilianUsers = $database->collection('civilian-users')->document($id);
        $victimRef = $civilianUsers->snapshot();


        if ($request->input('AccountStatus') != null)
        {
            $civilianUsers->update([
                ['path' => 'account_status', 'value' => $request->input('AccountStatus')]
            ]);

            if($request->input('AccountStatus') == 'Not Banned'){
                $mailData = [
                    'subject' => 'Account Status Update!',
                    'body' => 'Hello your account has been unbanned you can now use again your account. Thank you.'
                ];
            }
            elseif ($request->input('AccountStatus') == 'Banned'){
                $mailData = [
                    'subject' => 'Account Status Update!',
                    'body' => 'Hello your account has been banned for misusage of the mobile application'
                ];
            }
            elseif ($request->input('AccountStatus') == 'Warning'){
                $mailData = [
                    'subject' => 'Account Status Update!',
                    'body' => 'Hello your account has been warned for misusage of the mobile application. Please use the mobile application wisely.'
                ];
            }
        }

        try{
            Mail::to($victimRef['email'])->send(new EmailSender($mailData));
            //return response()->json(['Great']);
        }
            catch(Exception $th){

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
