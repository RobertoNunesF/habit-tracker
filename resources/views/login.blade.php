<x-layout>
    <main class="py-10">
        
        <section class="mt-4 bg-white max-w-150 mx-auto p-10 pb-6 habit-shadow-lg">
           <h1 class="font-bold text-4xl mb-4">Faça login</h1>

            <p>Insira seus dados para acessar</p>


        <form action="{{route('auth.login')}}" method="POST" class="mt-4 flex flex-col gap-4">
            @csrf


            <div class="flex flex-col gap-4 mt-4">
            <label for="email">Email</label>

            <input 
            type="email" 
            name="email" 
            placeholder="your@email.com" 
            class="bg-white p-2 habit-shadow @error ('email') border-red-500 @enderror"
            >


            @error('email')
            <p class="text-red-500 text-sm">
                {{ $message }}
            </p>
            @enderror
            </div>

            <div class="flex flex-col gap-4 mt-4 ">
            <label for="password">Senha</label>

            <input 
            type="password" 
            name="password" 
            placeholder="********" 
            class="bg-white p-2 habit-shadow @error ('password') border-red-500 @enderror"
            >


            @error('password')
            <p class="text-red-500 text-sm">
                {{ $message }}
            </p>
            @enderror
            </div>

            <button 
            type="submit"
            class="p-2 bg-habit-orange habit-shadow-lg habit-btn"
            >
                Entrar
            </button>
        </form>

        <p class="text-center mt-4">
            Não tem uma conta? <a href="{{route('site.register')}}" class="underline hover:opacity-50 transition">Registrar-se</a>
        </p>
       </section>
    </main>
</x-layout>