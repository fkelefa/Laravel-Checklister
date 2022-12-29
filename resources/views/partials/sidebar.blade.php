<div class="sidebar-brand d-none d-md-flex">
    <svg class="sidebar-brand-full" width="118" height="46" alt="CoreUI Logo">
        <use xlink:href="{{ asset('/assets/brand/coreui.svg#full') }}"></use>
    </svg>
    <svg class="sidebar-brand-narrow" width="46" height="46" alt="CoreUI Logo">
        <use xlink:href="{{ asset('/assets/brand/coreui.svg#signet') }}"></use>
    </svg>
</div>
<ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">

    @if (auth()->user()->is_admin)
    <li class="nav-title">{{ __('Manage Checklists') }}</li>
    @foreach( \App\Models\ChecklistGroup::with('checklists')->get() as $group)
    <li class="nav-group">
        <a class="nav-link" href="{{ route('admin.checklist_groups.edit', $group) }}">
            <svg class="nav-icon">
                <use xlink:href="{{ asset('/vendors/@coreui/icons/svg/free.svg#cil-folder-open') }}"></use>
            </svg> {{ $group->name }}
        </a>
        <ul class="nav-group-items">
            @foreach($group->checklists as $checklist)
            <li class="nav-item"><a class="nav-link" style="padding: .5rem .5rem .5rem 86px"
                    href="{{ route('admin.checklist_groups.checklists.edit', [$group, $checklist]) }}">
                    <svg class="nav-icon">
                        <use xlink:href="{{ asset('/vendors/@coreui/icons/svg/free.svg#cil-list') }}"></use>
                    </svg>
                    {{ $checklist->name }}
                </a>
            </li>
            @endforeach

            <li class="nav-item">
                <a href="{{ route('admin.checklist_groups.checklists.create', $group) }}" class="nav-link">
                    <svg class="nav-icon">
                        <use xlink:href="{{ asset('/vendors/@coreui/icons/svg/free.svg#cil-note-add') }}"></use>
                    </svg>
                    {{ __('New Checklist') }}
                </a>
            </li>
        </ul>
    </li>
    @endforeach

    <li class="nav-item">
        <a href="{{ route('admin.checklist_groups.create') }}" class="nav-link">
            <svg class="nav-icon">
                <use xlink:href="{{ asset('/vendors/@coreui/icons/svg/free.svg#cil-library-add') }}"></use>
            </svg>
            {{ __('New Checklist group ') }}</a>
    </li>

    <li class="nav-title">{{ __('Pages') }}</li>
    @foreach( \App\Models\Page::all() as $page)
    <li class="nav-group">
        <a class="nav-link " href="{{ route('admin.pages.edit', $page) }}">
            <svg class="nav-icon">
                <use xlink:href="{{ asset('/vendors/@coreui/icons/svg/free.svg#cil-puzzle') }}"></use>
            </svg> {{ $page->title }}
        </a>
    </li>
    @endforeach

    <li class="nav-title">{{ __('Manage Data') }}</li>
    <li class="nav-item">
        <a class="nav-link " href="{{ route('admin.users.index') }}">
            <svg class="nav-icon">
                <use xlink:href="{{ asset('/vendors/@coreui/icons/svg/free.svg#cil-puzzle') }}"></use>
            </svg> {{ __('Users') }}
        </a>
    </li>
    @else
    @foreach( $user_menu as $group)
    <li class="nav-title">{{ $group['name'] }}
        @if ($group['is_new'])
        <span class="badge badge-sm bg-info ms-auto">NEW</span>
        @elseif ($group['is_updated'])
        <span class="badge badge-sm bg-info ms-auto">UPD</span>
        @endif
    </li>
    @foreach($group['checklists'] as $checklist)
    <li class="nav-item">
        <a class="nav-link" href="{{ route('user.checklists.show', [$checklist['id']]) }}">
            <svg class="nav-icon">
                <use xlink:href="{{ asset('/vendors/@coreui/icons/svg/free.svg#cil-list') }}"></use>
            </svg>
            {{ $checklist['name'] }}
            @if ($checklist['is_new'])
            <span class="badge badge-sm bg-info ms-auto">NEW</span>
            @elseif ($checklist['is_updated'])
            <span class="badge badge-sm bg-info ms-auto">UPD</span>
            @endif
        </a>
    </li>
    @endforeach
    @endforeach
    @endif
</ul>
<button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
