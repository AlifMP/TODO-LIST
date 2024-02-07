@extends('layouts.dashboard')
@section('contents')
    <section>
        <div class="header">
            <h1>TODO-LIST</h1>
            @if (session('successReg'))
                <div class="alert-suc">
                    <h1>{{ session('successReg') }}</h1>
                </div>
            @endif
        </div>
        <div class="card-container">
            @foreach ($lists as $list)
                @if ($list->user_id == auth()->user()->id)
                    <div class="card">
                        <h2>{{ $list->list_title }}</h2>
                        <p>{{ $list->desc_title }}</p>
                        <p>Owner: {{ $list->user->username }}</p>
                        <?php if ($list->collaborate == null) {
                            echo '<p>Collaborator: 0</p>';
                        } else {
                            echo '<p>Collaborator: ' . $list->collaborate . '</p>';
                        } ?>
                        <div class="card-button">
                            <a href="/delete/{{ $list->id }}"><button class="delete">Delete</button></a>
                            <a href="/detail/{{ $list->id }}"><button>Detail</button></a>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </section>
@endsection
