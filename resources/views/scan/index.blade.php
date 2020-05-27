@extends('layouts.layout')
@section('title', 'Escanear')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Escanear una imagen') }}</div>

                <div class="card-body">
                    <form role="form" method="POST" action="/escaner" enctype="multipart/form-data">

                        @csrf
                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('Subir imagen') }}</label>

                            <div class="col-md-6">
                                <input id="image" type="file" class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }}" name="image" value="{{ old('image') }}" required autofocus>

                                @if ($errors->has('image'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Enviar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@if(($imageUploadModal ?? '' != '' && $imageUploadModal) || $errors->any())
  @include('scan.modals.imageUpload')
  <script>
      $( document ).ready(function() {
        $('#imageUploadModal').modal('show');
      });
  </script>
@endif
@endsection
