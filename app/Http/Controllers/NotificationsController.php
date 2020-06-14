<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Note;
use App\Notification;
use App\Subject;
use Auth;

class NotificationsController extends Controller
{
  private $notifications;
  private $notifCount;

  public function __construct(Request $request)
  {
    $this->middleware(function ($request, $next) {
        $this->notifications = Notification::where('userOwner_id', Auth::user()->id)->get();
        $this->notifCount = count($this->notifications);
        return $next($request);
    });
  }

  public function index()
  {
      return view('notifications.index', [
        'notifications' => $this->notifications,
        'notifCount' => $this->notifCount
      ]);
  }

  public function search(Request $request)
  {
      $user = User::where('email', $request->email)->first();
      $notes = Note::where('user_id', Auth::user()->id)->get();

      if ($user != null ) {
        return view('notifications.index')->with([
          'notifications' => $this->notifications,
          'notifCount' => $this->notifCount,
          'userShare' => $user,
          'notes' => $notes
      ]);
      } else {
        return view('notifications.index', [
          'notifications' => $this->notifications,
          'empty' => true
        ]);
      }
  }

  public function sendNotes(Request $request)
  {
      $notes = Note::where(
        'user_id', Auth::user()->id)
        ->whereIn('id', $request->notes)->get();

      foreach($notes as $note) {
          $notif = new Notification;
          $notif->userOwner_id = $request->userShare;
          $notif->note_id = $note->id;
          $notif->user_id = Auth::user()->id;
          $notif->save();
      }

      return view('notifications.index', [
        'notifications' => $this->notifications,
        'notifCount' => $this->notifCount,
        'success' => 'Se ha enviado la notificacion correctamente'
      ]);

  }

  private function createNote(Notification $notification) {
    $note = Note::where('id', $notification->note_id)->first();
    if($note->subject_id != null) {
      $subject = Subject::where('id', $note->subject_id)->first();
      $newSubject = new Subject;
      $newSubject->user_id = Auth::user()->id;
      $newSubject->name = $subject->name;
      $newSubject->save();
    }
    $newNote = new Note;
    $newNote->name = $note->name;
    $newNote->content = $note->content;
    $newNote->user_id = Auth::user()->id;
    $newNote->subject_id = $newSubject->id ?? null;
    $newNote->color_id = $note->color_id ?? null;
    $newNote->save();
  }

  public function action(Request $request)
  {
    $success = 'La acción ha sido completada con éxito';
    if(isset($request->notificationId) && ($request->accept || $request->reject)) {
      $notification = Notification::where('id', $request->notificationId)->first();
      
      if($request->accept) {
        $this->createNote($notification);
        $success = 'La nota se ha creado correctamente';
      }
      if($request->reject) {
        $success = 'La notificación ha sido eliminada correctamente';
      }
      $notification->delete();
    }

    if ($request->acceptAll || $request->rejectAll) {
      $notifications = Notification::where([
        'userOwner_id' => Auth::user()->id
        ])->get();

      foreach($notifications as $notification) {
        if ($request->acceptAll) {
          $this->createNote($notification);
          $success = 'Se han creado todas las notas correctamente';
        }
        else if ($request->rejectAll) {
          $success = 'Se han eliminado todas las notificaciones correctamente';
        }
        $notification->delete();
      }
    }

    return redirect()->action('NotificationsController@index')->with([
      'success' => $success,
      'notifCount' => $this->notifCount
    ]);
  }

}
