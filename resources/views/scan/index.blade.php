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
                                <button type="submit" class="btn btn-primary" style="background-color: #9c27b0; border-color: #9c27b0">
                                    Enviar
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
                    <button type="button" class="btn btn-primary" name="button" style="background-color: #9c27b0; border-color: #9c27b0"
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
@if(($imageUploadModal ?? '' != '' && $imageUploadModal) || $errors->any())
  <script>
      $( document ).ready(function() {
        $('#imageUploadModal').modal('show');
      });
  </script>
@endif
@endsection
