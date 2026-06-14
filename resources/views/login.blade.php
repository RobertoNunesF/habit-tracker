<x-layout>
    <main class="py-10">
        
        <section class="mt-4 bg-white max-w-150 mx-auto border-2 p-10">
           <h1 class="font-bold text-4xl mb-4">Faça login</h1>

            <p>Insira seus dados para acessar</p>


        <form action="/login" method="POST" class="mt-4 flex flex-col gap-4">
            @csrf


            <div class="flex flex-col gap-4 mt-4">
            <label for="email">Email</label>

            <input 
            type="email" 
            name="email" 
            placeholder="your@email.com" 
            class="bg-white p-2 border-2 @error ('email') border-red-500 @enderror"
            >


            @error('email')
            <p class="text-red-500 text-sm">
                {{ $message }}
            </p>
            @enderror
            </div>

            <div class="flex flex-col gap-4 mt-4">
            <label for="password">Senha</label>

            <input 
            type="password" 
            name="password" 
            placeholder="********" 
            class="bg-white p-2 border-2 @error ('password') border-red-500 @enderror"
            >


            @error('password')
            <p class="text-red-500 text-sm">
                {{ $message }}
            </p>
            @enderror
            </div>

            <button 
            type="submit"
            class="bg-white border-2 p-2"
            >
                Entrar
            </button>
        </form>
       </section>
    </main>
</x-layout>