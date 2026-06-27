<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Batikura Plate</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-ivory text-dark-brown font-sans min-h-screen flex items-center justify-center relative py-12 px-4 sm:px-6 lg:px-8">
    <!-- Etnic Background Ornament Pattern (simulated with CSS gradients/shapes) -->
    <div class="absolute inset-0 opacity-5 pointer-events-none bg-[radial-gradient(#3e2723_1px,transparent_1px)] [background-size:24px_24px]"></div>
    
    <div class="max-w-md w-full space-y-8 bg-white p-10 rounded-xl shadow-xl border border-batik-gold/30 relative z-10">
        <!-- Logo & Header -->
        <div class="text-center">
            <h2 class="font-playfair text-4xl font-bold text-sogan tracking-wide">Batikura Plate</h2>
            <p class="mt-2 text-sm text-batik-gold font-medium uppercase tracking-widest">Panel Admin</p>
            <div class="w-24 h-[1px] bg-batik-gold mx-auto mt-4 relative">
                <span class="absolute -top-1 left-1/2 -translate-x-1/2 text-[8px] text-batik-gold">◆</span>
            </div>
        </div>

        @if ($errors->any())
            <div class="bg-red-50 border-l-4 border-red-500 p-4 rounded text-sm text-red-700">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form class="mt-8 space-y-6" action="{{ route('login') }}" method="POST">
            @csrf
            <div class="rounded-md space-y-4">
                <div>
                    <label for="username" class="block text-xs font-semibold text-sogan uppercase tracking-wider mb-2">Username</label>
                    <input id="username" name="username" type="text" required value="{{ old('username') }}"
                        class="appearance-none relative block w-full px-4 py-3 border border-gray-300 placeholder-gray-400 text-dark-brown rounded-lg focus:outline-none focus:ring-2 focus:ring-batik-gold focus:border-batik-gold focus:z-10 sm:text-sm bg-ivory/30" 
                        placeholder="Masukkan username admin">
                </div>
                <div>
                    <label for="password" class="block text-xs font-semibold text-sogan uppercase tracking-wider mb-2">Password</label>
                    <input id="password" name="password" type="password" required 
                        class="appearance-none relative block w-full px-4 py-3 border border-gray-300 placeholder-gray-400 text-dark-brown rounded-lg focus:outline-none focus:ring-2 focus:ring-batik-gold focus:border-batik-gold focus:z-10 sm:text-sm bg-ivory/30" 
                        placeholder="••••••••">
                </div>
            </div>

            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <input id="remember" name="remember" type="checkbox" 
                        class="h-4 w-4 text-sogan focus:ring-batik-gold border-gray-300 rounded">
                    <label for="remember" class="ml-2 block text-sm text-dark-brown">
                        Ingat saya di perangkat ini
                    </label>
                </div>
            </div>

            <div>
                <button type="submit" 
                    class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-semibold rounded-lg text-white bg-sogan hover:bg-dark-brown focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-batik-gold transition-colors duration-200">
                    Masuk ke Dashboard
                </button>
            </div>
        </form>
        
        <div class="text-center mt-4">
            <a href="{{ route('home') }}" class="text-xs text-batik-gold hover:text-sogan transition-colors duration-200 flex items-center justify-center gap-1">
                ← Kembali ke Halaman Utama
            </a>
        </div>
    </div>
</body>
</html>
