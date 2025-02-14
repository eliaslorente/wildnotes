<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Note;
use App\User;
use App\Subject;
use App\Tag;
use App\Color;
use App\Notification;
use Auth;

class NoteController extends Controller
{
    private $subjects;
    private $tags;
    private $colors;

    private $notifications;
    private $notifCount;

    public function __construct(Request $request)
    {
      $this->middleware(function ($request, $next) {
          $this->subjects = Subject::where('user_id', Auth::user()->id)->get();
          $this->tags = Tag::where('user_id', Auth::user()->id)->get();
          $this->colors = Color::all();

          $this->notifications = Notification::where('userOwner_id', Auth::user()->id)->get();
          $this->notifCount = count($this->notifications);

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
          'colors' => $this->colors,
          'notifCount' => $this->notifCount
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
          'notifCount' => $this->notifCount,
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
          return view('notes.show', [
            'note' => $note,
            'editNoteModal' => true,
            'subjects' => $this->subjects,
            'tags' => $this->tags,
            'colors' => $this->colors,
            'notifCount' => $this->notifCount
          ]);
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

        if ($note != null) {
          return view('notes.edit', [
            'note' => $note,
            'subjects' => $this->subjects,
            'tags' => $this->tags,
            'colors' => $this->colors,
            'notifCount' => $this->notifCount
          ]);
        } else {
          return redirect('notes');
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      //dd($request->subject);
      $request->validate([
        'title' => 'required',
        'content' => 'required'
      ],
      [
        'title.required' => 'Es necesario escribir un titulo a la nota',
        'content.required' => 'Es necesario escribir una nota',
      ]);

      $note = Note::find($id);
      $note->name = $request->title;
      $note->content = $request->content;
      $note->subject_id = $request->subject != null ? $request->subject : null;
      $note->color_id = $request->color != null ? $request->color : null;
      $note->save();

      $note->tags()->sync($request->tags);

      return redirect()->action(
          'NoteController@show', ['id' => $note->id]
      )->with([
        'success' => 'La nota se ha editado correctamente',
        'notifCount' => $this->notifCount
      ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $note = Note::find($id);
        $note->delete();

        return back()->with([
          'success' => 'Se ha eliminado la nota con éxito',
          'notifCount' => $this->notifCount
        ]);
    }
}
