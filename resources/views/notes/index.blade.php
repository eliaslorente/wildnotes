@extends('layouts.layout')

@section('content')

<div class="content">

  <div class="col-12 d-flex justify-content-center">
    <div class="card-deck">
      @foreach ($notes as $note)
          <div class="col-12 col-md-4 col-lg-3 mb-3">
            <div class="card">
              <div class="card-header">{{ $note->name }}</div>
              <div class="card-body text-dark">
                <p class="card-text">
                  {{ \Illuminate\Support\Str::limit(strip_tags($note->content), 90)}}
                </p>
                <a href="{{ route('notes.show', ['id' => $note->id]) }}">
                  <button type="button" class="btn btn-primary" name="button">
                    Ver
                  </button>
                </a>
              </div>
            </div>
          </div>
      @endforeach
    </div>
  </div>
  <span class="mt-2 d-flex justify-content-center">
    {{ $notes->links() }}
  </span>
</div>

{{--@include('notes.modals.editNote')
@if(($editNoteModal ?? '' != '' && $editNoteModal) || $errors->any())
  <script>
      $( document ).ready(function() {
        $('#editNoteModal').modal('show');
      });
  </script>
@endif--}}

@endsection
