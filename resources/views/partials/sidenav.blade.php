<div class="container">
    <div class="sidenav">
        <a href="/logout">{{ auth()->user()->username }} | Logout</a>
        <a href="/dashboard">Dashboard</a>
        <button id="add-list">Create Todo</button>
        <div class="inputHidden">
            <form action="/create" method="post">
                @csrf
                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                <input type="text" name="list_title" placeholder="List Title" class="list-input">
                <button type="submit" class="btn-create">Create</button>
            </form>
        </div>
    </div>
</div>
