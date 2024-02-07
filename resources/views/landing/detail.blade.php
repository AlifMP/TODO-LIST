@extends('layouts.detail')
@section('contents')
    <section>
        <div class="header">
            @foreach ($lists as $list)
                <h1>{{ $list->list_title }}</h1>
                @if (session('successReg'))
                    <div class="alert-suc">
                        <h1>{{ session('successReg') }}</h1>
                    </div>
                @endif
        </div>
        <div class="container">
            <div class="top">
                <button id="add"><i class='bx bx-list-plus'></i> Add</button>
                <button id="remove"><i class='bx bx-list-minus'></i> Remove</button>
                <button id="collab"><i class='bx bxs-user-account'></i> Collab</button>
            </div>
            <div class="mid">
                <h1>{{ $list->list_title }}</h1>
                <h1>{{ $list->username }}</h1>
                <h1>{{ $list->todo_list }}</h1>
            </div>
            <div class="bottom">

            </div>
            @endforeach
        </div>
    </section>
@endsection
