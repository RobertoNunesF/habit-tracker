<h1>
    Welcome to the Habit Tracker App!
</h1>

<p>
    Olá, {{ $name }}!
</p>
<p>
    Seus hábitos são:
</p>
<ul>
    @foreach ($habits as $habit)
        <li>{{ $habit }}</li>
    @endforeach
</ul>
