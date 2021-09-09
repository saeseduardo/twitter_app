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
                    <form action="">
                        <div class="form-group row">
                            <div class="col-md-2">
                                <img src="{{ asset('img/user-default.jpeg') }}" alt="" class="img-thumbnail rounded float-start">
                            </div>
                            <div class="col-md-10">
                                <textarea name="" id="" cols="30" rows="3" maxlength="250" class="form-control @error('username') is-invalid @enderror"></textarea>

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </form>
                    <hr>
                    @foreach($tweets as $tweet)
                        <div class="card">
                            <div class="card-body">
                                {{ $tweet }} - This is some text within a card body.
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
