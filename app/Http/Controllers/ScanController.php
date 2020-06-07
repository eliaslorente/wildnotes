<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Google\Cloud\Vision\V1\ImageAnnotatorClient;
use GoogleCloudVision\GoogleCloudVision;
use GoogleCloudVision\Request\AnnotateImageRequest;
use App\User;
use App\Note;
use App\Subject;
use App\Tag;
use Auth;

class ScanController extends Controller
{
    private $tags;
    private $subjects;

    public function __construct(Request $request)
    {
      $this->middleware(function ($request, $next) {
          $this->tags = Tag::where('user_id', Auth::id())->get();
          $this->subjects = Subject::where('user_id', Auth::id())->get();

          return $next($request);
      });
    }

    public function index() {

        return view('scan.index', [
          'tags' => $this->tags,
          'subjects' => $this->subjects
        ]);
    }

    public function store(Request $request) {

        $request->validate([
          'title' => 'required',
          'content' => 'required'
        ],
        [
          'title.required' => 'Es necesario escribir un titulo a la nota',
          'content.required' => 'Es necesario escribir una nota',
        ]);

        $note = new Note;
        $note->user_id = Auth::user()->id;
        $note->name = $request->title;
        $note->content = $request->content;
        $request->subject != null ? $note->subject_id = $request->subject : '';
        $note->save();

        $note->tags()->sync($request->tags);

        return view('scan.index')->with([
          'success' => 'La nota ha sido guardada correctamente',
          'tags' => $this->tags,
          'subjects' => $this->subjects
      ]);
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

        return view('scan.index')->with([
          'scan' => $response->responses[0]->textAnnotations[0]->description,
          'imageUploadModal' => true,
          'tags' => $this->tags,
          'subjects' => $this->subjects
        ]);
      }
    }
}
