@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-center align-items-center flex-column">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            {{ __($ad->title) }}
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
                    <div class="card-footer">
                        Author name: {{ $ad->users->name }}
                        <br>
                        Creation date: {{ $ad->created_at }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
