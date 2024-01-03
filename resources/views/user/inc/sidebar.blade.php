<div class="card" style="width: 18rem;">
    <img class="card-img-top" src="{{ asset(Auth::user()->image) }}" style="border-radius: 50%; margin-left:40px"
        alt="" width="100px">
    <ul class="list-group list-group-flush">
        <a href="{{ route('user.dashboard') }}" class="btn btn-primary btn-sm btn-block">Home</a>
        <a href="{{ route('my-orders') }}" class="btn btn-primary btn-sm btn-block">My Orders</a>
        <a href="{{ route('return-orders') }}" class="btn btn-primary btn-sm btn-block">Return Orders</a>
        <a href="{{ route('user-cancel-orders') }}" class="btn btn-primary btn-sm btn-block">Cancel Orders</a>
        <a href="{{ route('user-image') }}" class="btn btn-primary btn-sm btn-block">Update Image</a>
        <a href="{{ route('update-password') }}" class="btn btn-primary btn-sm btn-block">Update
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
