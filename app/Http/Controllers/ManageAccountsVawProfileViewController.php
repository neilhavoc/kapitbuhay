<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\EmailSender;
use Exception;
use Illuminate\Support\Facades\Mail;

class ManageAccountsVawProfileViewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!session()->has('userID') && !session()->has('brgyName')) {
            return redirect('loginpage');
        }
        else {
            $firestore = app('firebase.firestore');

            $database = $firestore->database();
            $viewdisID = session('viewVawID');

            $vawIDRef = $database->collection('barangay_accounts')->document($viewdisID);
            $vawRef = $vawIDRef->snapshot();

        return view('pages.manage_AccountsViewVawProfile',[
            'vaw' => $vawRef,
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

        $civilianUsers = $database->collection('barangay_accounts')->document($id);

        if ($request->input('verification') != null)
        {
            $civilianUsers->update([
                ['path' => 'verification_status', 'value' => $request->input('verification')]
            ]);

            if ($request->input('accountStatus') != null)
            {
                $civilianUsers->update([
                    ['path' => 'account_status', 'value' => $request->input('accountStatus')]
                ]);
            }
        }
        elseif ($request->input('accountStatus') != null)
        {
            $civilianUsers->update([
                ['path' => 'account_status', 'value' => $request->input('accountStatus')]
            ]);
        }

        $mailData = [
            'subject' => 'KapitBuhat Test Email',
            'body' => 'Email SAMPLE NI'

          ];

        try{
            Mail::to('admiralnenzsmc@gmail.com')->send(new EmailSender($mailData));
            //return response()->json(['Great']);
         }
         catch(Exception $th){

         }
        return redirect('VawAcc');
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
