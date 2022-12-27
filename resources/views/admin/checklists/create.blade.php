@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="fade-in">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <form action="{{ route('admin.checklist_groups.checklists.store', $checklistGroup) }}" method="POST"
                        class="">
                        @csrf

                        <div class="card-header">{{ __('New Checklist in') }} {{ $checklistGroup->name }}</div>

                        <div class="card-body">
                            <div class="tab-content rounded-bottom">
                                <div class="tab-pane p-3 active preview" role="tabpanel" id="preview-1252">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">{{ __('Name') }}</label>
                                        <input type="text" class="form-control @error('name') is_invalid  @enderror"
                                            name="name" id="name" placeholder="{{ __('Cheklist Name') }}">
                                        @error('name') <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-auto"></div>
                                    <button class="btn btn-outline-primary mb-3" type="submit">{{ __('Save') }}</button>
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
