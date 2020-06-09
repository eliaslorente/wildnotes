<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Note;
use App\User;
use App\Subject;
use App\Tag;
use App\Color;
use Auth;

class NoteController extends Controller
{

    private $subjects;
    private $tags;
    private $colors;

    public function __construct(Request $request)
    {
      $this->middleware(function ($request, $next) {
          $this->subjects = Subject::where('user_id', Auth::user()->id)->get();
          $this->tags = Tag::where('user_id', Auth::user()->id)->get();
          $this->colors = Color::all();

          return $next($request);
      });
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notes = Note::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(8);

        return view('notes.index', [
          'notes' => $notes,
          'subjects' => $this->subjects,
          'tags' => $this->tags,
          'colors' => $this->colors
        ]);
    }

    /**
     * Filter.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function filter(Request $request)
    {

        $allSubjects = Subject::select('id')->where('user_id', Auth::user()->id)->get();
        $allColors = Color::select('id')->get();

        $notes = Note::where(['user_id' => Auth::user()->id])
          ->whereIn('subject_id', $request->subjects ?? $allSubjects)
          ->whereIn('color_id', $request->colors ?? $allColors)
          ->orderBy('created_at', 'desc')->paginate(8);

        return view('notes.index', [
          'notes' => $notes,
          'subjects' => $this->subjects,
          'tags' => $this->tags,
          'colors' => $this->colors,
          //Mantiene seleccionados los checks
          'checkColors' => $request->colors,
          'checkSubjects' => $request->subjects
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $note = Note::where([
          'id' => $id,
          'user_id' => Auth::user()->id
        ])->first();

        if ($note != null) {
          return view('notes.show', ['note' => $note, 'editNoteModal' => true]);
        } else {
          return redirect('notes');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $note = Note::where([
          'id' => $id,
          'user_id' => Auth::user()->id
        ])->first();

        //dd($this->subjects[2]->name);

        if ($note != null) {
          return view('notes.edit', [
            'note' => $note,
            'subjects' => $this->subjects,
            'tags' => $this->tags,
            'colors' => $this->colors
          ]);
        } else {
          return redirect('notes');
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Note $note)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function destroy(Note $note)
    {
        //
    }
}
