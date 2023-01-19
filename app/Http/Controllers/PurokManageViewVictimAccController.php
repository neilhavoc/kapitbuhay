<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\EmailSender;
use Exception;
use Illuminate\Support\Facades\Mail;

class PurokManageViewVictimAccController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $firestore = app('firebase.firestore');

            $database = $firestore->database();
            $viewdisID = session('viewVictimID');

            $victimIDRef = $database->collection('civilian-users')->document($viewdisID);
            $victimRef = $victimIDRef->snapshot();

            if ($victimRef['purok_verification'] != 'Verified')
            {
                $accountdisable = 'disabled';
                $verifydisable = 'false';
            }
            elseif ($victimRef['purok_verification'] == 'Verified')
            {
                $accountdisable = 'false';
                $verifydisable = 'disabled';
            }
            else
            {
                $verifydisable = 'false';
            }

            return view('pages.purokmanage_AccountsViewVictim',[
                'victim' => $victimRef,
                'disable' => $accountdisable,
                'verifydisable' => $verifydisable,
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
            $civilianUsers->update([
                ['path' => 'purok_verification', 'value' => $request->input('verification')],
                ['path' => 'purok_approvedby', 'value' => session('purokLeaderName')]
            ]);

            if($request->input('verification') == 'Verified')
            {
                $mailData = [
                    'subject' => 'Account Verification Update!',
                    'body' => 'Hello your Account is now verified! You can now use your account in our website!'
                ];
            }
            elseif ($request->input('verification') == 'Verification Failed')
            {
                $mailData = [
                    'subject' => 'Account Verification Update!',
                    'body' => 'Hello your Account failed the Verification Process Please re-register again and supply the correct information and requirements.'
                ];
            }
        }

        try{
            Mail::to($victimRef['email'])->send(new EmailSender($mailData));
            //return response()->json(['Great']);
        }
            catch(Exception $th){

        }

        return redirect('purokmanage_VicAcc');
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
