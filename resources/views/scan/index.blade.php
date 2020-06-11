@extends('layouts.layout')
@section('title', 'Escanear')

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Escanear una nota</div>

                <div class="card-body">
                    <form role="form" method="POST" action="/escaner" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">

                            <div class="col-md-12">
                                <input id="image" type="file" class="form-control-file {{ $errors->has('image') ? ' is-invalid' : '' }}" name="image" value="{{ old('image') }}" required autofocus>

                                @if ($errors->has('image'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-wild">
                                    Crear
                                </button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-2 text-center">
            <div class="card">
                <div class="card-header">Crear una nota</div>

                <div class="card-body">
                    <button type="button" class="btn btn-wild" name="button"
                    data-toggle="modal" data-target="#imageUploadModal">Crear Nota</button>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center mt-5">

    </div>
</div>
</div>
@include('scan.modals.imageUpload')
@include('scan.modals.tagModal')
<script>
  function createSubject() {
    $("#subjectModal").modal('hide');//ocultamos el modal
    $("#selectSubject").append(new Option($('#subjectName')[0].value, $('#subjectName')[0].value));
    $("#selectSubject option:last").attr("selected", "selected");
    //$('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
    //$('.modal-backdrop').remove();//eliminamos el backdrop del modal
  }
</script>
@if(($imageUploadModal ?? '' != '' && $imageUploadModal) || $errors->any())
  <script>
      $( document ).ready(function() {
        $('#imageUploadModal').modal('show');
      });
  </script>
@endif
@endsection
