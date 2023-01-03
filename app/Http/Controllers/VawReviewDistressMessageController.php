<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VawReviewDistressMessageController extends Controller
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
            $viewdisID = session('viewDistressID');

            $recordIDs = $database->collection('sos-distress-message')->document($viewdisID);
            $messageRef = $recordIDs->snapshot();

            $policeRef = $database->collection('police_accounts');
            $polRef = $policeRef->documents();

            if ($messageRef['status'] == 'Unread' || $messageRef['status'] == 'Read' || $messageRef['status'] == 'Transferred')
            {
                $disable = 'disabled';
            }
            else
            {
                $disable = 'false';
            }
            return view('pages.vaw_reviewdistressmessage', [
                'message' => $messageRef,
                'disable' => $disable,
                'police'  => $polRef
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

    //A custom function to update the distress message
    public function distressStatus(Request $request, $id)
    {
        $firestore = app('firebase.firestore');
        $database = $firestore->database();
        $sosDistressRef = $database->collection('sos-distress-message')->document($id);;
        $sosRefID = $sosDistressRef->snapshot();

        date_default_timezone_set('Asia/Singapore');
            $date = date('m/d/Y h:i:s a', time());

        if ($request->input('disMesStatus') == 'Read')
        {
            $statUpdate = '<br><br>[' . $date . ']: Barangay ' . $sosRefID['receiving_Brgy'] .
                            ' Authorities is on the way' . $sosRefID['status_update_1'];
        }
        elseif ($request->input('disMesStatus') == 'Transferred')
        {
            $statUpdate = '<br><br>[' . $date . ']: Barangay ' . $sosRefID['receiving_Brgy'] .
                            ' Authorities has transferred the message to your nearest Police Station'  . $sosRefID['status_update_1'];
        }
        elseif ($request->input('disMesStatus') == 'Completed')
        {
            $statUpdate = '<br><br>[' . $date . ']: Barangay ' . $sosRefID['receiving_Brgy'] .
                            ' Authorities has arrived and responded to the scene.'  . $sosRefID['status_update_1'];
        }
        $sosDistressRef = $database->collection('sos-distress-message')->document($id);
        $sosDistressRef->update([
            ['path' => 'status', 'value' => $request->input('disMesStatus')],
            ['path' => 'status_update_1', 'value' => $statUpdate],
            ['path' => 'updated_by', 'value' => 'Barangay ' . $sosRefID['receiving_Brgy']]
        ]);

        return redirect('vaw_distressmessage');
    }

    public function transferDistress(Request $request, $id)
    {
        $firestore = app('firebase.firestore');
        $database = $firestore->database();
        $sosDistressRef = $database->collection('sos-distress-message')->document($id);

        $sosDistressRef->update([
            ['path' => 'transfered_from', 'value' => session('brgyName')],
            ['path' => 'transfered_to', 'value' => $request->input('transferDistress')]
        ]);

        return redirect('vaw_distressmessage');
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
        //
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
