@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-center align-items-center flex-column">
            <div class="col-md-8">
                @if(!Auth::check())
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-header">{{ __('Login') }}</div>

                                    <div class="card-body">
                                        <form method="POST" action="{{ route('login') }}">
                                            @csrf

                                            <div class="form-group row">
                                                <label for="name"
                                                       class="col-md-4 col-form-label text-md-right">{{ __('username') }}</label>

                                                <div class="col-md-6">
                                                    <input id="name" type="text"
                                                           class="form-control @error('name') is-invalid @enderror"
                                                           name="name" value="{{ old('name') }}" required
                                                           autocomplete="name" autofocus>

                                                    @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="password"
                                                       class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                                <div class="col-md-6">
                                                    <input id="password" type="password"
                                                           class="form-control @error('password') is-invalid @enderror"
                                                           name="password" required autocomplete="current-password">

                                                    @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="d-block text-center">
                                                <button type="submit" class="btn btn-primary">
                                                    {{ __('Login') }}
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                @endif
                @forelse($ads as $ad)
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between">
                                <a href="/{{ $ad->id }}">{{ __($ad->title) }}</a>
                                @if(auth()->id() == $ad->user_id)
                                    <div class="d-flex">
                                        <a class="btn btn-success btn-sm" title="Edit" href="/edit/{{$ad->id}}"><i
                                                class="fa fa-edit"></i></a>

                                        <form action="delete/{{ $ad->id }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button
                                                class="btn btn-danger btn-sm"
                                                type="submit">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="card-body">
                            {{ __($ad->description) }}
                        </div>
                    </div>
                    <br>
                @empty
                    <div class="card">
                        <div class="card-header">
                            Nothing to show yet
                        </div>
                    </div>
                @endforelse
            </div>
            {{ $ads->links() }}
        </div>
    </div>
@endsection
