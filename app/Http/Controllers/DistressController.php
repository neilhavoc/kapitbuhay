<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DistressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $firestore = app('firebase.firestore');
        $database = $firestore->database();
        $distressRef = $database->collection('sos-distress-message');
        $messageRef = $distressRef->documents();

        return view('pages.manage_distress', [
            'message' => $messageRef,
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
        $firestore = app('firebase.firestore');
        $database = $firestore->database();
        $distressRef = $database->collection('sos-distress-message');
        $idRef = $distressRef->where($distressRef->id(), '=', $id);
        $messageRef = $idRef->documents();

        return view('pages.manage_distress', [
            'message' => $messageRef,
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
