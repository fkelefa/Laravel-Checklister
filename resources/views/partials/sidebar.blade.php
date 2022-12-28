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

    <li class="nav-group"><a class="nav-link" href="{{ route('admin.checklist_groups.edit', $group) }}">
            <svg class="nav-icon">
                <use xlink:href="{{ asset('/vendors/@coreui/icons/svg/free.svg#cil-puzzle') }}"></use>
            </svg> {{ $group->name }}
        </a>
        <ul class="nav-group-items">
            @foreach($group->checklists as $checklist)
            <li class="nav-item"><a class="nav-link"
                    href="{{ route('admin.checklist_groups.checklists.edit', [$group, $checklist]) }}"><span
                        class="nav-icon"></span>
                    {{ $checklist->name }}
                </a>
            </li>
            @endforeach

            <li class="nav-item">
                <a href="{{ route('admin.checklist_groups.checklists.create', $group) }}" class="nav-link">{{ __('New
                    Checklist') }}</a>
            </li>
        </ul>

    </li>
    @endforeach
    <li class="nav-item">
        <a href="{{ route('admin.checklist_groups.create') }}" class="nav-link">{{ __('New Checklist group ') }}</a>
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
    @endif

    <li class="nav-title">{{ __('Others') }}</li>
    <li class="nav-item"><a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
            <svg class="nav-icon">
                <use xlink:href="{{ asset('/vendors/@coreui/icons/svg/free.svg#cil-account-logout') }}"></use>
            </svg> {{ __('Logout') }}
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </li>

</ul>
<button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
