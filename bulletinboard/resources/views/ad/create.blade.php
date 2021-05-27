@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create ad</div>

                    <div class="card-body">
                        @if($errors->any())
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                    <li class="text-red-500 list-none">
                                        {{ $error }}
                                    </li>
                                @endforeach
                            </div>
                        @endif
                        <form method="POST" action="/">
                            @csrf
                            <div class="form-group row">
                                <label for="title"
                                       class="col-md-4 col-form-label text-md-right">Title</label>

                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control" name="title" autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description"
                                       class="col-md-4 col-form-label text-md-right">Description</label>

                                <div class="col-md-6">
                                    <textarea id="description" class="form-control" name="description"></textarea>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="author_name"
                                       class="col-md-4 col-form-label text-md-right">Author name</label>

                                <div class="col-md-6">
                                    <input id="author_name" type="text" class="form-control" name="author_name"
                                           value="{{ $user_name }}">
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Create
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
