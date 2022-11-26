<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Contract\Auth;
use Kreait\Firebase\Contract\Firestore;
use Kreait\Laravel\Firebase\Facades\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Database;
use Kreait\Firebase\Value\Uid;
use App\Http\Helpers\FirebaseHelper;

class ArticleController extends Controller
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
        $articleRef = $database->collection('articles');
        $query = $articleRef->where('Active', '=', 'isActive');
        $documentRef = $query->documents();
        //$civilianUsers = $documentRef->snapshot();

        return view('pages.manage_articles', [
            'document' => $documentRef,
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
        $firestore = app('firebase.firestore');
        $database = $firestore->database();
        $data = [
            'Active' => 'isActive',
            'article_title' => $request->input('createArticleTitle'),
            'article_content' => $request->input('createArticleContent'),
        ];

        $database->collection('articles')->newDocument()->set($data);

        return redirect('article');
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
        $data = [
            'Active' => 'isActive',
            'article_content' => $request->input('updateArticleContent'),
            'article_title' => $request->input('updateArticleTitle'),
        ];

        $database->collection('articles')->document($id)->set($data);

        return redirect('article');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $firestore = app('firebase.firestore');
        $database = $firestore->database();
        $deletedoc = $database->collection('articles')->document($id)->delete();

        return redirect('article');
    }
}
