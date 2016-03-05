<?php

namespace App\Http\Controllers;

use Log;
use Illuminate\Http\Request;
use Storage;

use App\Document;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;

class SubmitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        if (Auth::check()) {
            return view('pages.submit', ['submitted' => false]);
        } else {
            return redirect()->action('Auth\AuthController@getLogin');
        }
    }

    /**
     * Save an entry
     *
     * @return Response
     */
    public function save(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'description' => 'required',
        ]);

        if (Storage::move('.tmp/' . $request->filename, 'files/' . $request->filename)) {
            $document = new Document;

            $document->title = $request->title;
            $document->description =$request->description;
            $document->course = $request->course;
            $document->professor = $request->professor;
            $document->filename = $request->filename;
            $document->approved = false;

            $document->save();
        }

        return 'fuck';
    }

    /**
     * Uploads a PDF file to the system
     *
     * @param  Request  $request
     * @return Response
     */
    public function upload(Request $request)
    {
        $image = $request->file('pdf');

        $destinationPath =  storage_path('app/.tmp');
        $extension = $image->getClientOriginalExtension();

        if ($image->isValid() && $extension == 'pdf') {
            $filename = preg_replace('!\s+!', '_', pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME)) . '-' . time() . '.' . $extension;
            $request->file('pdf')->move($destinationPath, $filename);
            return $filename;
        } else {
            return 415;
        }
    }
}
