<x-guest-layout>
    <!-- Header -->
    <div class="mb-7">
        <h2 class="text-lg font-black text-gray-900 tracking-tight">Sign in</h2>
        <p class="text-xs text-gray-500 mt-1">Enter your admin credentials to enter the workspace.</p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-5" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-5">
        @csrf

        <!-- Email -->
        <div>
            <label for="email" class="block text-[11px] font-bold uppercase tracking-wider text-gray-600 mb-1.5">
                Email Address
            </label>
            <input id="email" 
                   type="email" 
                   name="email" 
                   value="{{ old('email') }}" 
                   required 
                   autofocus 
                   autocomplete="username"
                   placeholder="admin@admin.com"
                   class="w-full px-3.5 py-2.5 rounded-xl border border-gray-300 text-sm text-gray-900 placeholder-gray-400 focus:border-indigo-600 focus:ring-4 focus:ring-indigo-600/10 transition duration-150" />
            <x-input-error :messages="$errors->get('email')" class="mt-1.5" />
        </div>

        <!-- Password -->
        <div>
            <div class="flex items-center justify-between mb-1.5">
                <label for="password" class="block text-[11px] font-bold uppercase tracking-wider text-gray-600">
                    Password
                </label>
                @if (Route::has('password.request'))
                    <a class="text-xs font-semibold text-indigo-600 hover:text-indigo-800 transition-colors" href="{{ route('password.request') }}">
                        Forgot password?
                    </a>
                @endif
            </div>

            <input id="password" 
                   type="password" 
                   name="password" 
                   required 
                   autocomplete="current-password"
                   placeholder="••••••••"
                   class="w-full px-3.5 py-2.5 rounded-xl border border-gray-300 text-sm text-gray-900 placeholder-gray-400 focus:border-indigo-600 focus:ring-4 focus:ring-indigo-600/10 transition duration-150" />
            <x-input-error :messages="$errors->get('password')" class="mt-1.5" />
        </div>

        <!-- Remember Me -->
        <div class="flex items-center pt-0.5">
            <label for="remember_me" class="inline-flex items-center cursor-pointer select-none">
                <input id="remember_me" 
                       type="checkbox" 
                       name="remember"
                       class="w-4 h-4 rounded-md border-gray-300 text-indigo-600 focus:ring-indigo-500/20 focus:ring-offset-0 transition">
                <span class="ms-2.5 text-xs font-medium text-gray-600">Keep me signed in</span>
            </label>
        </div>

        <!-- Submit Button -->
        <div class="pt-2">
            <button type="submit" 
                    class="w-full inline-flex items-center justify-center px-4 py-3 rounded-xl bg-indigo-600 text-white text-xs font-black hover:bg-indigo-700 shadow-md shadow-indigo-600/25 hover:shadow-indigo-600/35 transition-all duration-200 active:scale-[0.99]">
                Sign in to Workspace
            </button>
        </div>
    </form>
</x-guest-layout>