<table class="table table-responsive-sm" wire:sortable="updateTaskOrder">
    <tbody>
        @foreach ($tasks as $key => $task)
        <tr wire:sortable.item="{{ $task->id }}" wire:key="task-{{ $task->id }}">
            <th scope="row">{{ ++$key }}</th>
            <td>{{ $task->task_name }}</td>
            <td>
                <div class="flex d-flex">
                    <a href="{{ route('admin.checklists.tasks.edit', [$checklist, $task]) }}"
                        class="btn btn-sm btn-outline-secondary me-2">{{ __('Edit Task')}}
                    </a>

                    <form action="{{ route('admin.checklists.tasks.destroy', [$checklist, $task]) }}" method="POST"
                        class="">
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
