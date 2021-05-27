<div class="form-group row">
    <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('title') }}</label>

    <div class="col-md-6">
        <input id="title" type="text" class="form-control" name="title" autofocus>
    </div>
</div>

<div class="form-group row">
    <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('description') }}</label>

    <div class="col-md-6">
        <textarea id="description" class="form-control" name="description"></textarea>
    </div>
</div>


<div class="form-group row">
    <label for="author_name" class="col-md-4 col-form-label text-md-right">{{ __('Author name') }}</label>

    <div class="col-md-6">
        <input id="author_name" type="text" class="form-control" name="author_name" value="{{ $user_name }}">
    </div>
</div>
