<x-layout>
    <main class="py-10">
        <h1>
            Cadastrar novo Hábito
        </h1>

        <section class="mt-4 bg-white max-w-150 mx-auto border-2 p-10 pb-6">


        <form action="{{route('habits.store')}}" method="POST">
            @csrf

            <div class="flex flex-col gap-2 mb-2">
            <label for="name">Nome do Hábito</label>

            <input 
                type="text" 
                name="name" 
                placeholder="Ex.: Ler 10 páginas" 
                class="bg-white p-2 border-2 @error('name') border-red-500 @enderror"
            >


            @error('name')
            <p class="text-red-500 text-sm">
                {{ $message }}
            </p>
            @enderror

            <button 
            type="submit"
            class="bg-white border-2 p-2"
            >
                Cadastrar Hábito
            </button>
            </div>
        </form>

        </section>
    </main>
</x-layout>