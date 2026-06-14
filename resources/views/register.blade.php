<x-layout>
    <main class="py-10">
        
        <section class="mt-4 bg-white max-w-150 mx-auto border-2 p-10 pb-6">
           <h1 class="font-bold text-4xl mb-4">Registre-se</h1>

            <p>Preencha as informações para cadastrar seus hábitos</p>


        <form action="{{route('auth.register')}}" method="POST" class="mt-4 flex flex-col gap-4">
            @csrf

            <div class="flex flex-col gap-4 mt-4">
            <label for="name">Nome</label>

            <input 
            type="text" 
            name="name" 
            placeholder="Seu nome" 
            class="bg-white p-2 border-2 @error ('name') border-red-500 @enderror"
            >


            @error('name')
            <p class="text-red-500 text-sm">
                {{ $message }}
            </p>
            @enderror
            </div>

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
            <div class="flex flex-col gap-4 mt-4">
            <label for="password_confirmation">Repita sua senha</label>

            <input 
            type="password" 
            name="password_confirmation" 
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
                Registrar
            </button>
        </form>

        <p class="text-center mt-4">
            Já tem uma conta? <a href="{{route('site.login')}}" class="underline hover:opacity-50 transition">Faça login</a>
        </p>
       </section>
    </main>
</x-layout>