@extends('layouts.timLayout')

@include('partials.sidebar')

@section('content')

<div class="content">
  <div class="container-fluid">
    @foreach($notes->chunk(4) as $four)
    <div class="row">
      @foreach($four as $note)
      <div class="col-lg-3 col-md-6 col-sm-6 d-flex align-items-stretch">
        <div class="card card-stats">
          <div class="card-header card-header-{{ $note->color->class ?? '' }} card-header-icon">
            <div class="card-icon">
              <i class="material-icons">notes</i>
            </div>
            <p class="card-category">{{ $note->subject['name'] }}</p>
            <h3 class="card-title">
              {{ $note->name }}
            </h3>
            <div class="card-body">
              <span class="text-align-left" style="color:black">
                {{ \Illuminate\Support\Str::limit(strip_tags($note->content), 90)}}
              </span>
            </div>
            <a href="{{ route('notes.show', ['id' => $note->id]) }}">
              <button type="button" class="btn btn-primary py-2 px-1" name="button">
                <i class="material-icons" style="font-size:20px">visibility</i>
              </button>
            </a>
            <a href="{{ route('notes.edit', ['id' => $note->id]) }}">
              <button type="button" class="btn btn-primary py-2 px-1" name="button">
                <i class="material-icons" style="font-size:20px">edit</i>
              </button>
            </a>
            <a href="#">
              <button type="button" class="btn btn-primary py-2 px-1"
              data-target="#deleteNoteModal" data-toggle="modal" onclick="idToModal({{ $note->id }})">
                <i class="material-icons" style="font-size:20px">delete</i>
              </button>
            </a>
          </div>
          <div class="card-footer">
            @if(!$note->tags->isEmpty())
              <div class="stats">
                <i class="material-icons">label</i>
                    @foreach($note->tags as $tag)
                      <span>#{{ $tag->name }} </span>
                    @endforeach
              </div>
            @endif
          </div>
        </div>
      </div>
      @endforeach
    </div>
    @endforeach

    <span class="mt-2 d-flex justify-content-center">
      {{ $notes->links() }}
    </span>

    @include('notes.modals.deleteNoteModal')
  </div>
</div>

<script type="text/javascript">
    function idToModal(id) {
      $('#deleteNoteForm')[0].action = $('#deleteNoteForm')[0].action + "/" + id;
    }
</script>
@endsection
