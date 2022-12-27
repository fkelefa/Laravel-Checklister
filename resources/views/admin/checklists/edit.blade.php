@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="fade-in">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <form
                        action="{{ route('admin.checklist_groups.checklists.update', [$checklistGroup, $checklist]) }}"
                        method="POST" class="">
                        @csrf
                        @method('PUT')

                        <div class="card-header">{{ __('Edit Checklist') }}</div>

                        <div class="card-body">
                            <div class="tab-content rounded-bottom">
                                <div class="tab-pane p-3 active preview" role="tabpanel" id="preview-1252">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">{{ __('Name') }}</label>
                                        <input type="text" value="{{ $checklist->name }}"
                                            class="form-control @error('name') is_invalid  @enderror" name="name"
                                            id="name" placeholder="{{ __('Cheklist Name') }}">
                                        @error('name') <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-auto"></div>
                                    <button class="btn btn-outline-primary mb-3" type="submit">{{ __('Save') }}</button>
                                </div>
                            </div>
                        </div>
                    </form>

                    <form
                        action="{{ route('admin.checklist_groups.checklists.destroy', [$checklistGroup, $checklist]) }}"
                        method="POST" class="">
                        @csrf
                        @method('DELETE')

                        <div class="col-auto"></div>
                        <button class="btn btn-outline-danger mb-3" type="submit"
                            onclick="return confirm('{{ __('Are you sure?') }}')">{{ __('Delete this checklist')
                            }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
