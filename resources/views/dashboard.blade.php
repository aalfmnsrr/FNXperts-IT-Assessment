<x-app-layout>
    <div class="py-8 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">
            
            <!-- Hero Card -->
            <div class="rounded-2xl bg-gray-900 text-white p-6 sm:p-8 shadow-sm">
                <span class="inline-block px-2.5 py-1 rounded-md text-xs font-bold tracking-wide uppercase bg-indigo-500 text-white">
                    Workspace Overview
                </span>
                <h1 class="text-2xl sm:text-3xl font-black text-white mt-3">
                    Welcome back, {{ Auth::user()->name }}!
                </h1>
                <p class="mt-2 text-gray-300 text-sm">
                    Manage registered companies, view team allocations, and update administrative records.
                </p>
            </div>

            <!-- Main Navigation Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <a href="{{ route('companies.index') }}" 
                   class="block p-6 bg-white rounded-2xl border border-gray-200 hover:border-indigo-500 hover:shadow-md transition-all group">
                    <div class="flex items-center justify-between">
                        <span class="text-sm font-bold text-gray-900 group-hover:text-indigo-600 transition-colors">Companies Directory</span>
                        <span class="text-xs font-semibold text-indigo-600">Open &rarr;</span>
                    </div>
                    <p class="mt-2 text-xs text-gray-500">
                        Create companies, maintain logos, email addresses, and official web domains.
                    </p>
                </a>

                <a href="{{ route('employees.index') }}" 
                   class="block p-6 bg-white rounded-2xl border border-gray-200 hover:border-indigo-500 hover:shadow-md transition-all group">
                    <div class="flex items-center justify-between">
                        <span class="text-sm font-bold text-gray-900 group-hover:text-indigo-600 transition-colors">Employees Directory</span>
                        <span class="text-xs font-semibold text-indigo-600">Open &rarr;</span>
                    </div>
                    <p class="mt-2 text-xs text-gray-500">
                        Assign employees to companies, track email records, and manage contact numbers.
                    </p>
                </a>
            </div>

        </div>
    </div>
</x-app-layout>