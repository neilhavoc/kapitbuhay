<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PoliceReviewDistressMessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!session()->has('userID') && !session()->has('policeName')) {
            return redirect('loginpage');
        }
        else {
            $firestore = app('firebase.firestore');

            $database = $firestore->database();
            $viewdisID = session('viewDistressID');

            $recordIDs = $database->collection('sos-distress-message')->document($viewdisID);
            $messageRef = $recordIDs->snapshot();

            if ($messageRef['status'] == 'Read' || $messageRef['status'] == 'Transferred' || $messageRef['status'] == 'Unread')
            {
                $disable = 'disabled';
            }
            else
            {
                $disable = 'false';
            }

            $victimRef = $database->collection('civilian-users')->document($messageRef['sender_userID']);
            $userRef = $victimRef->snapshot();

            return view('pages.police_reviewdistressmessage', [
                'message' => $messageRef,
                'disable' => $disable,
                'victim'  => $userRef
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

    public function poldistressStatus(Request $request, $id)
    {
        $firestore = app('firebase.firestore');
        $database = $firestore->database();
        $sosDistressRef = $database->collection('sos-distress-message')->document($id);;
        $sosRefID = $sosDistressRef->snapshot();

        $policeIDRef = $database->collection('police_accounts')->document($sosRefID['transfered_to']);;
        $policeRef = $policeIDRef->snapshot();

        date_default_timezone_set('Asia/Singapore');
            $date = date('m/d/Y h:i:s a', time());

        if ($request->input('disMesStatus') == 'Read')
        {
            $statUpdate = '<br><br>[' . $date . ']: ' . $policeRef['policeName'] .
                            ' Authorities is on the way' . $sosRefID['status_update_1'];
        }
        elseif ($request->input('disMesStatus') == 'Completed')
        {
            $statUpdate = '<br><br>[' . $date . ']: ' . $policeRef['policeName'] .
                            ' Authorities has arrived and responded to the scene.'  . $sosRefID['status_update_1'];
        }
        $sosDistressRef = $database->collection('sos-distress-message')->document($id);
        $sosDistressRef->update([
            ['path' => 'status', 'value' => $request->input('disMesStatus')],
            ['path' => 'status_update_1', 'value' => $statUpdate],
            ['path' => 'updated_by', 'value' => $policeRef['policeName']]
        ]);

        return redirect('police_distress');
    }

    public function reportAcc(Request $request, $id)
    {
        $firestore = app('firebase.firestore');
        $database = $firestore->database();

        $victimUserRef = $database->collection('civilian-users')->document($id);


        $strike = 0;

        if ($request->input('strike1') != null)
        {
            $strike = 1;
        }
        elseif ($request->input('strike2') != null)
        {
            $strike = 2;
        }
        elseif ($request->input('strike3') != null)
        {
            $strike = 3;
        }

        $victimUserRef->update([
            ['path' => 'strike', 'value' => $strike],
        ]);

        return redirect('police_reviewdistressmessage');
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
