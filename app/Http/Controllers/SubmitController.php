<?php

namespace App\Http\Controllers;

use Log;
use Illuminate\Http\Request;

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
            'name' => 'required|max:255',
            'description' => 'required',
        ]);

        $document = new Document;

        $document->name = $request->name;
        $document->description =$request->description;
        $document->course = $request->course;
        $document->professor = $request->professor;

        $document->save();
//view('pages.welcome', ['submitted' => true]);
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

        $destinationPath = '.tmp/';
        $extension = $image->getClientOriginalExtension();

        if ($image->isValid() && $extension == 'pdf') {
            $filename = preg_replace('!\s+!', '_', pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME)) . '-' . time() . '.' . $extension;
            $request->file('pdf')->move($destinationPath, $filename);
            return 200;
        } else {
            return 415;
        }
    }
}
