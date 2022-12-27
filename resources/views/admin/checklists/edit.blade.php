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
                                            id="name">
                                        @error('name') <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-auto"></div>
                                    <button class="btn btn-outline-primary mb-3" type="submit">{{ __('Save Checklist')
                                        }}</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <form action="{{ route('admin.checklist_groups.checklists.destroy', [$checklistGroup, $checklist]) }}"
                    method="POST" class="">
                    @csrf
                    @method('DELETE')

                    <div class="col-auto mt-2"></div>
                    <button class="btn btn-outline-danger mb-3" type="submit"
                        onclick="return confirm('{{ __('Are you sure you want to delete this Checklist ?') }}')">{{
                        __('Delete this checklist')
                        }}</button>
                </form>

                <hr>
                <div class="card mb-4">
                    <div class="card-header"><strong>{{ __('List of Tasks') }}</strong></div>
                    <div class="card-body">

                        <div class="tab-content rounded-bottom">
                            <div class="tab-pane p-3 active preview" role="tabpanel" id="preview-512">
                                <table class="table table-responsive-sm">
                                    <tbody>
                                        @foreach ($checklist->tasks as $key => $task)
                                        <tr>
                                            <th scope="row">{{ ++$key }}</th>
                                            <td>{{ $task->task_name }}</td>
                                            <td>
                                                <div class="d-flex">
                                                    <a href="{{ route('admin.checklists.tasks.edit', [$checklist, $task]) }}"
                                                        class="btn btn-sm btn-outline-secondary">{{ __('Edit Task')}}
                                                    </a>

                                                    <form
                                                        action="{{ route('admin.checklists.tasks.destroy', [$checklist, $task]) }}"
                                                        method="POST" class="">
                                                        @csrf
                                                        @method('DELETE')


                                                        <button class="btn btn-outline-danger btn-sm" type="submit"
                                                            onclick="return confirm('{{ __('Are you sure you want to delete this Task ?') }}')">{{
                                                            __('Delete')
                                                            }}</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <form action="{{ route('admin.checklists.tasks.store', [ $checklist]) }}" method="POST" class="">
                        @csrf

                        <div class="card-header">{{ __('New Task') }}</div>
                        <div class="card-body">
                            <div class="tab-content rounded-bottom">
                                <div class="tab-pane p-3 active preview" role="tabpanel" id="preview-1252">
                                    <div class="mb-3">
                                        <label for="task_name" class="form-label">{{ __('Task Name') }}</label>
                                        <input type="text" value="{{ old('task_name') }}"
                                            class="form-control @error('task_name') is_invalid  @enderror"
                                            name="task_name" id="task_name">
                                        @error('task_name') <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="description" class="form-label">{{ __('Description') }}</label>
                                        <textarea class="form-control @error('decription') is_invalid  @enderror"
                                            name="description" id="description"
                                            rows="5">{{ old('description') }}</textarea>
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
