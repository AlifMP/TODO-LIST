@extends('layouts.sign')
@section('contents')
    <section>
        <div class="container">
            <div class="top">
                <h1>USER REGISTER</h1>
            </div>
            <div class="mid">
                <div class="inputan">
                    <form action="/register" method="post">
                        @csrf
                        <div class="inputs">
                            <i class='bx bxs-user'></i>
                            <input type="text" name="username" placeholder="Username">
                        </div>
                        <div class="inputs">
                            <i class='bx bxs-envelope'></i>
                            <input type="text" name="email" placeholder="Your Email">
                        </div>
                        <div class="inputs">
                            <i class='bx bxs-lock'></i>
                            <input type="password" name="password" placeholder="Password">
                        </div>
                        <button type="submit" class="btn">REGISTER</button>
                    </form>
                </div>
            </div>
            <div class="bottom">
                <a href="/"><button>LOGIN</button></a>
            </div>
        </div>
    </section>
@endsection
