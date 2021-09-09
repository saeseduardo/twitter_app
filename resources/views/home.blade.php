@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary">{{ __('Inicio') }}</div>

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
                                <div id="contador" style="float: right;">0/250</div>
                            </div>
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </div>
                    </form>
                    <hr>
                    @foreach($tweets as $tweet)
                        <div class="card card-hover mb-1">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-2">
                                        <img src="{{ asset('img/user-default.jpeg') }}" alt="" class="img-thumbnail rounded float-start">
                                    </div>
                                    <div class="col-md-8">
                                        <p><b>{{ $tweet->user->name }}</b> <samp>@</samp>{{ $tweet->user->username }} - {{ $tweet->created_at->diffForHumans(now()) }}</p>
                                        <p class="text-justify">{{ $tweet->message }}</p>
                                    </div>
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
