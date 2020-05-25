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

    //show the upload form
    public function store(Request $request) {
        $note = new Note;
        //dd($request->name);
        $note->user_id = Auth::user()->id;
        $note->name = $request->name;
        $note->content = $request->content;
        $note->save();

        return view('scan.index');
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

        //echo json_encode(["description" => $response->responses[0]->textAnnotations[0]->description]);
        $users = new User;
        $users = $users::all();

        return view('scan.index')->with(['scan' => $response->responses[0]->textAnnotations[0]->description,
          'imageUploadModal' => true]);
      }
    }
}
