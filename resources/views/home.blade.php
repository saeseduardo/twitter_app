@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Inicio') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="post">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-2">
                                <img src="{{ asset('img/user-default.jpeg') }}" alt="" class="img-thumbnail rounded float-start">
                            </div>
                            <div class="col-md-10">
                                <textarea name="message" id="message" cols="30" rows="3" maxlength="250" required class="form-control @error('message') is-invalid @enderror"></textarea>

                                @error('message')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </form>
                    <hr>
                    @foreach($tweets as $tweet)
                        <div class="card">
                            <div class="card-body">
                                <div class="col-md-2">
                                    <div class="col-md-2">
                                        <img src="{{ asset('img/user-default.jpeg') }}" alt="" class="img-thumbnail rounded float-start">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <p>{{ $tweet }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
