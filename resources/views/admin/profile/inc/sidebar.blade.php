<div class="card" style="width: 18rem;">
    <img class="card-img-top" src="{{ asset(Auth::user()->image) }}"
        style="border-radius: 50%; margin-left:70px;height:100px; width:100px">
    <ul class="list-group list-group-flush">
        <a href="{{ route('admin.dashboard') }}" class="btn btn-primary btn-sm btn-block">Home</a>
        <a href="{{ route('admin-image') }}" class="btn btn-primary btn-sm btn-block">Update Image</a>
        <a href="{{ route('change-password') }}" class="btn btn-primary btn-sm btn-block">Update
            Password</a>
        <a class="btn btn-danger btn-sm btn-block"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();"><i
                class="icon ion-power"></i> Log Out</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </ul>
</div>
