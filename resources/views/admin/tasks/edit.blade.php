@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="fade-in">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <form action="{{ route('admin.checklists.tasks.update', [$checklist, $task]) }}" method="POST"
                        class="">
                        @csrf
                        @method('PUT')

                        <div class="card-header">{{ __('Edit Task') }}</div>

                        <div class="card-body">
                            <div class="tab-content rounded-bottom">
                                <div class="tab-pane p-3 active preview" role="tabpanel" id="preview-1252">
                                    <div class="mb-3">
                                        <label for="task_name" class="form-label">{{ __('Task Name') }}</label>
                                        <input type="text" value="{{ $task->task_name }}"
                                            class="form-control @error('task_name') is_invalid  @enderror"
                                            name="task_name" id="task_name">
                                        @error('task_name') <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="description" class="form-label">{{ __('Description') }}</label>
                                        <textarea class="form-control @error('description') is_invalid  @enderror"
                                            name="description" id="task-textarea"
                                            rows="5">{{ $task->description }}</textarea>
                                        @error('description') <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-auto"></div>
                                    <button class="btn btn-outline-primary mb-3" type="submit">{{ __('Save Task')
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
