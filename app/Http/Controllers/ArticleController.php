<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Kreait\Firebase\Contract\Auth;
use Kreait\Firebase\Auth\SignInResult\SignInResult;
use Google\Cloud\Storage\StorageClient;
use Google\Cloud\Firestore\FirestoreClient;
use Kreait\Firebase\Contract\Firestore;
use Kreait\Laravel\Firebase\Facades\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Database;
use Kreait\Firebase\Value\Uid;

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

        $documentRef = $articleRef->documents();


        //$query = $articleRef->where('image', '=', 'empty');

        //if($query['image'])

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
        //initialize firebase
        $storage = app('firebase.storage');
        $firestore = app('firebase.firestore');

        $title = str_replace(' ', '', $request->input('createArticleTitle'));
        //store image in firebase storage
        $bucket = $storage->getBucket();

        //get the user-input image
        $imageArticle = $request->file('articleimage');

        //get the original name of the file
        $articleImageName = $imageArticle->getClientOriginalName();

        //store to temporary local folder
        $localfolder = public_path('storage-temp-folder') .'/';

        //create file path in storage
        $articlePath = [
            'name' => 'articles/' . $title . '/Article-Image.png',
        ];

        //upload barangay Logo in Storage
        if ($imageArticle->move($localfolder, $articleImageName)) {
            $imgfile = fopen($localfolder.$articleImageName, 'r');
            $bucket->upload($imgfile, $articlePath);
            //will remove from local laravel folder
            unlink($localfolder . $articleImageName);
        }


        //initialize database of firestore
        $database = $firestore->database();

        //store article data in fields
        $data = [
            'article_id'        => $title,
            'Active'            => 'isActive',
            'article_title'     => $request->input('createArticleTitle'),
            'article_content'   => $request->input('createArticleContent'),
            'image'             => 'empty',
            'source_link'       => 'empty',
        ];

        //save in firestore database
        $database->collection('articles')->document($title)->set($data);


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

        $articleRef = $database->collection('articles')->document($id);
        $articleRef->update([
                    ['path' => 'article_title', 'value' => $request->input('updateArticleTitle')],
                    ['path' => 'article_content', 'value' => $request->input('updateArticleContent')]
                ]);

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
