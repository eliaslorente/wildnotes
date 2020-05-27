<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Google\Cloud\Vision\V1\ImageAnnotatorClient;
use GoogleCloudVision\GoogleCloudVision;
use GoogleCloudVision\Request\AnnotateImageRequest;
use App\User;
use App\Note;
use Auth;

class ScanController extends Controller
{

    //show the upload form
    public function index(){
        return view('scan.index');
    }


    public function store(Request $request) {

        $request->validate([
          'title' => 'required',
          'content' => 'required'
        ],
        [
          'title.required' => 'Es necesario escribir un titulo a la nota',
          'content.required' => 'Es necesario escribir una nota',
        ]
      );

        $note = new Note;
        $note->user_id = Auth::user()->id;
        $note->name = $vaildated->title;
        $note->content = $vaildated->content;
        $note->save();

        return view('scan.index')->with('success', 'El apunte ha sido guardado correctamente');
    }


    public function annotateImage(Request $request) {
      if($request->file('image')) {
        //convert image to base64
        $image = base64_encode(file_get_contents($request->file('image')));

        //prepare request
        $request = new AnnotateImageRequest();
        $request->setImage($image);
        $request->setFeature("TEXT_DETECTION");
        $gcvRequest = new GoogleCloudVision([$request],  env('GOOGLE_CLOUD_KEY'));
        //send annotation request
        $response = $gcvRequest->annotate();

        $users = new User;
        $users = $users::all();

        return view('scan.index')->with(['scan' => $response->responses[0]->textAnnotations[0]->description,
          'imageUploadModal' => true]);
      }
    }
}
