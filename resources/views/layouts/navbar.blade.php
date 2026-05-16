<div class="topbar d-flex justify-content-between align-items-center shadow-sm">

    <h4>
        Admin Dashboard
    </h4>

    <div>

        <span class="me-3">
            Welcome,
            {{ auth()->user()->name }}
        </span>

        <form action="{{ route('logout') }}" method="POST" class="d-inline">

            @csrf

            <button class="btn btn-danger btn-sm">
                Logout
            </button>

        </form>

    </div>

</div>