<header class="bg-white border-b-2 flex items-center justify-between p-4">
    <div class="flex items-center gap-2">
        <a href="{{route('habits.index')}}" class="habit-btn habit-shadow-lg bg-habit-orange px-2 py-1">
                HT
            </a>
        <p class="font-bold">Habit Tracker</p>
    </div>    

    <div>

        @auth
        <form action="{{ route('auth.logout') }}" method="POST" class="inline">
            @csrf
            <button type="submit" class="habit-shadow-lg habit-btn p-2">Sair</button>

        </form>
        @endauth

        @guest
        <div class="flex gap-2">
            <a href="{{ route('site.register') }}" class="bg-white p-2 habit-shadow-lg habit-btn">Cadastrar</a>
            <a href="{{ route('site.login') }}" class="bg-habit-orange p-2 habit-shadow-lg habit-btn">Entrar</a>
        </div>
        @endguest
    </div>
</header>