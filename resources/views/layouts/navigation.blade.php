<nav x-data="{ open: false }" class="bg-white border-b border-gray-200 sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center space-x-8">
                <!-- Brand Logo -->
                <a href="{{ route('dashboard') }}" class="flex items-center space-x-3">
                    <div class="w-9 h-9 rounded-xl bg-indigo-600 flex items-center justify-center text-white shadow-sm font-black text-sm">
                        CRM
                    </div>
                    <span class="font-extrabold text-gray-900 text-base tracking-tight">Mini<span class="text-indigo-600">CRM</span></span>
                </a>

                <!-- Nav Links -->
                <div class="hidden sm:flex sm:items-center sm:space-x-3">
                    <a href="{{ route('dashboard') }}" 
                       class="px-3 py-2 rounded-lg text-xs font-bold transition-colors {{ request()->routeIs('dashboard') ? 'bg-gray-900 text-white' : 'text-gray-600 hover:text-gray-900 hover:bg-gray-100' }}">
                        Dashboard
                    </a>
                    <a href="{{ route('companies.index') }}" 
                       class="px-3 py-2 rounded-lg text-xs font-bold transition-colors {{ request()->routeIs('companies.*') ? 'bg-gray-900 text-white' : 'text-gray-600 hover:text-gray-900 hover:bg-gray-100' }}">
                        Companies
                    </a>
                    <a href="{{ route('employees.index') }}" 
                       class="px-3 py-2 rounded-lg text-xs font-bold transition-colors {{ request()->routeIs('employees.*') ? 'bg-gray-900 text-white' : 'text-gray-600 hover:text-gray-900 hover:bg-gray-100' }}">
                        Employees
                    </a>
                </div>
            </div>

            <!-- Profile & Sign Out -->
            <div class="hidden sm:flex sm:items-center sm:space-x-3">
                <span class="px-3 py-1.5 rounded-full bg-gray-100 text-xs font-semibold text-gray-700">
                    {{ Auth::user()->name }}
                </span>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="px-3 py-1.5 text-xs font-semibold text-red-600 hover:bg-red-50 rounded-lg transition-colors">
                        Log Out
                    </button>
                </form>
            </div>

            <!-- Mobile Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = !open" class="p-2 rounded-lg text-gray-500 hover:bg-gray-100">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path :class="{'hidden': open, 'inline-flex': !open }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Drawer -->
    <div :class="{'block': open, 'hidden': !open}" class="hidden sm:hidden border-b border-gray-200 bg-white px-4 pt-2 pb-4 space-y-2">
        <a href="{{ route('dashboard') }}" class="block px-3 py-2 rounded-lg text-sm font-semibold {{ request()->routeIs('dashboard') ? 'bg-gray-900 text-white' : 'text-gray-600 hover:bg-gray-100' }}">Dashboard</a>
        <a href="{{ route('companies.index') }}" class="block px-3 py-2 rounded-lg text-sm font-semibold {{ request()->routeIs('companies.*') ? 'bg-gray-900 text-white' : 'text-gray-600 hover:bg-gray-100' }}">Companies</a>
        <a href="{{ route('employees.index') }}" class="block px-3 py-2 rounded-lg text-sm font-semibold {{ request()->routeIs('employees.*') ? 'bg-gray-900 text-white' : 'text-gray-600 hover:bg-gray-100' }}">Employees</a>
        <div class="pt-3 border-t border-gray-100 flex items-center justify-between">
            <span class="text-xs font-semibold text-gray-600">{{ Auth::user()->name }}</span>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="text-xs font-bold text-red-600 hover:underline">Log Out</button>
            </form>
        </div>
    </div>
</nav>