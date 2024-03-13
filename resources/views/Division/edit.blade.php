@extends('layouts.header')
@section('title','Edit Division')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <i class="fas fa-pencil-alt"></i>
                        Edit Division
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ url('/admin/division/update') }}" enctype="multipart/form-data">
                            @csrf
                            @if (count($errors) > 0)
                                <div class = "alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name*') }}</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $division->name }}" required autocomplete="name" autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>
                                <div class="col-md-6">
                                    <input id="image" type="file" name="image">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="description" class="col-md-3 col-form-label text-md-right">{{ __('Description*') }}</label>
                                <div class="col-md-8">
                                    <textarea name="description" id="description" required>{{ $division->description }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="meta_title" class="col-md-4 col-form-label text-md-right">{{ __('Meta Title*') }}</label>
                                <div class="col-md-6">
                                    <input id="meta_title" type="text" class="form-control @error('meta_title') is-invalid @enderror" name="meta_title" value="{{ $division->meta_title }}" required autocomplete="meta_title" autofocus>
                                    @error('meta_title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="meta_keyword" class="col-md-4 col-form-label text-md-right">{{ __('Meta Keyword*') }}</label>
                                <div class="col-md-6">
                                    <input id="meta_keyword" type="text" class="form-control @error('meta_keyword') is-invalid @enderror" name="meta_keyword" value="{{ $division->meta_keyword }}" required autocomplete="meta_keyword" autofocus>
                                    @error('meta_keyword')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="meta_description" class="col-md-4 col-form-label text-md-right">{{ __('Meta Description*') }}</label>
                                <div class="col-md-6">
                                <textarea id="meta_description" type="text" class="form-control" name="meta_description" required>{{ $division->meta_description }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="slug" class="col-md-4 col-form-label text-md-right">{{ __('Slug*') }}</label>
                                <div class="col-md-6">
                                    <input id="slug" type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" value="{{ $division->slug }}" required autocomplete="slug" autofocus>
                                    @error('slug')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <input type="hidden" name="did" id="did" value="{{ $division->id }}">
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-outline-primary">
                                        Edit Division
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
@section('JS')
<script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'description',{           
        fullPage: true,
        allowedContent: true,
        autoGrow_onStartup: true,
        enterMode: CKEDITOR.ENTER_BR});
</script>
@endsection