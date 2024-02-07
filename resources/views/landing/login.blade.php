@extends('layouts.sign')
@section('contents')
    <section>
        <div class="container">
            @if (session('successReg'))
                <div class="alert-suc">
                    <h1>{{ session('successReg') }}</h1>
                </div>
            @endif
            @if (session('loginErr'))
                <div class="alert-err">
                    <h1>{{ session('loginErr') }}</h1>
                </div>
            @endif
            <div class="top">
                <h1>USER LOGIN</h1>
            </div>
            <div class="mid">
                <div class="inputan">
                    <form action="/login" method="post">
                        @csrf
                        <div class="inputs">
                            <i class='bx bxs-envelope'></i>
                            <input type="text" name="email" placeholder="Email ID">
                        </div>
                        <div class="inputs">
                            <i class='bx bxs-lock'></i>
                            <input type="password" name="password" placeholder="Password">
                        </div>
                        <button type="submit" class="btn">LOGIN</button>
                    </form>
                </div>
            </div>
            <div class="bottom">
                <a href="/register"><button>REGISTER</button></a>
            </div>
        </div>
    </section>
@endsection
