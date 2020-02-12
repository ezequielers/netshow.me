@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">

        <div class="col-md-8">
            <div style="padding-top: 20px">
                @include('partials.flash_message')
            </div>
        </div>
        
        <div class="col-md-8">

            <div class="card">
                <div class="card-header">{{ __('global.title_contact') }}</div>

                <div class="card-body">

                    <form method="POST" action="{{ route("contacts.store") }}" enctype="multipart/form-data">
                        @csrf
                        <input id="visitor" type="hidden" name="visitor" value="{{ request()->ip() }}">

                        <div class="form-group row {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('global.name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row {{ $errors->has('email') ? 'has-error' : '' }}">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('global.email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" placeholder="seu.melhor@email.com.br" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row {{ $errors->has('phone') ? 'has-error' : '' }}">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('global.phone') }}</label>

                            <div class="col-md-6">
                                <input id="phone" type="phone" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}" required data-mask="phone">

                                @if ($errors->has('phone'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row {{ $errors->has('message') ? 'has-error' : '' }}">
                            <label for="message" class="col-md-4 col-form-label text-md-right">{{ __('global.message') }}</label>

                            <div class="col-md-6">
                                <textarea id="message" name="message" class="form-control ">{{ old('message', isset($room) ? $room->message : '') }}</textarea>
                                @if($errors->has('message'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('message') }}</strong>
                                    </span>
                                @endif

                            </div>
                        </div>


                        <div class="form-group row {{ $errors->has('file') ? 'has-error' : '' }}">
                            <label for="file" class="col-md-4 col-form-label text-md-right">{{ __('global.file') }}</label>

                            <div class="col-md-6">

                                <input id="file" name="file" type="file" class="form-control-file">

                                @if($errors->has('file'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('file') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary"> {{ __('global.send') }} </button>
                                <button type="reset" class="btn btn-secondary"> {{ __('global.clear') }} </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
