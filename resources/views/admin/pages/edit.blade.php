@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="fade-in">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <form action="{{ route('admin.pages.update', [$page]) }}" method="POST" class="">
                        @csrf
                        @method('PUT')

                        <div class="card-header">{{ __('Edit Page') }}</div>

                        <div class="card-body">

                            @if (session('message'))
                            <div class="alert alert-success">{{ session('message') }}</div>
                            @endif

                            <div class="tab-content rounded-bottom">
                                <div class="tab-pane p-3 active preview" role="tabpanel" id="preview-1252">
                                    <div class="mb-3">
                                        <label for="title" class="form-label">{{ __('Title') }}</label>
                                        <input type="text" value="{{ $page->title }}"
                                            class="form-control @error('title') is_invalid  @enderror" name="title"
                                            id="title">
                                        @error('title') <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="content" class="form-label">{{ __('Content') }}</label>
                                        <textarea class="form-control @error('content') is_invalid  @enderror"
                                            name="content" id="task-textarea" rows="5">{{ $page->content }}</textarea>
                                        @error('content') <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-auto"></div>
                                    <button class="btn btn-outline-primary mb-3" type="submit">{{ __('Save Page')
                                        }}</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    ClassicEditor
        .create( document.querySelector( '#task-textarea' ) )
        .catch( error => {
            console.error( error );
        } );
</script>

@endsection
