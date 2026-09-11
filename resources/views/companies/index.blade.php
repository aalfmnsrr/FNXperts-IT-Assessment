<x-app-layout>
    <div class="py-8 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">

            @include('partials.alert')

            <!-- Title & Action -->
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                <div>
                    <h2 class="text-2xl font-black text-gray-900">Companies</h2>
                    <p class="text-xs text-gray-500 mt-1">Manage and audit registered corporate organizations</p>
                </div>
                <a href="{{ route('companies.create') }}"
                   class="inline-flex items-center justify-center px-4 py-2.5 rounded-xl bg-indigo-600 text-white text-xs font-bold hover:bg-indigo-700 shadow-sm transition-colors">
                    + New Company
                </a>
            </div>

            <!-- Table Container -->
            <div class="bg-white rounded-2xl border border-gray-200 overflow-hidden shadow-sm">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 text-left">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="py-3.5 pl-6 pr-3 text-xs font-bold text-gray-500 uppercase tracking-wider">Logo</th>
                                <th class="px-3 py-3.5 text-xs font-bold text-gray-500 uppercase tracking-wider">Company Name</th>
                                <th class="px-3 py-3.5 text-xs font-bold text-gray-500 uppercase tracking-wider">Email</th>
                                <th class="px-3 py-3.5 text-xs font-bold text-gray-500 uppercase tracking-wider">Website</th>
                                <th class="px-3 py-3.5 text-xs font-bold text-gray-500 uppercase tracking-wider text-center">Employees</th>
                                <th class="py-3.5 pl-3 pr-6 text-xs font-bold text-gray-500 uppercase tracking-wider text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 text-sm">
                            @forelse ($companies as $company)
                                <tr class="hover:bg-gray-50/80 transition-colors">
                                    <!-- Logo -->
                                    <td class="py-4 pl-6 pr-3">
                                        @if ($company->logo_url)
                                            <img src="{{ $company->logo_url }}" 
                                                 alt="{{ $company->name }}" 
                                                 class="w-10 h-10 rounded-lg object-cover border border-gray-200 bg-white">
                                        @else
                                            <div class="w-10 h-10 rounded-lg bg-gray-100 text-gray-600 border border-gray-200 flex items-center justify-center font-bold text-xs">
                                                {{ strtoupper(substr($company->name, 0, 2)) }}
                                            </div>
                                        @endif
                                    </td>

                                    <!-- Name -->
                                    <td class="px-3 py-4 font-bold text-gray-900">
                                        <a href="{{ route('companies.show', $company) }}" class="hover:text-indigo-600 hover:underline">
                                            {{ $company->name }}
                                        </a>
                                    </td>

                                    <!-- Email -->
                                    <td class="px-3 py-4 text-gray-600 text-xs">
                                        {{ $company->email ?: '—' }}
                                    </td>

                                    <!-- Website -->
                                    <td class="px-3 py-4 text-xs">
                                        @if ($company->website)
                                            <a href="{{ $company->website }}" target="_blank" class="text-indigo-600 hover:underline font-semibold">
                                                {{ $company->website }}
                                            </a>
                                        @else
                                            <span class="text-gray-400">—</span>
                                        @endif
                                    </td>

                                    <!-- Employees count badge -->
                                    <td class="px-3 py-4 text-center">
                                        <span class="inline-flex px-2.5 py-1 rounded-full text-xs font-semibold bg-gray-100 text-gray-800">
                                            {{ $company->employees_count ?? $company->employees()->count() }}
                                        </span>
                                    </td>

                                    <!-- Actions -->
                                    <td class="py-4 pl-3 pr-6 text-right whitespace-nowrap space-x-2">
                                        <a href="{{ route('companies.edit', $company) }}" 
                                           class="text-xs font-semibold text-indigo-600 hover:text-indigo-900">
                                            Edit
                                        </a>
                                        <form action="{{ route('companies.destroy', $company) }}" method="POST" class="inline"
                                              x-data
                                              @submit.prevent="if (confirm('Delete {{ $company->name }}? This will also remove all associated employees.')) $el.submit()">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="text-xs font-semibold text-red-600 hover:text-red-900">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="py-12 text-center text-gray-500 text-sm">
                                        No companies found. <a href="{{ route('companies.create') }}" class="text-indigo-600 font-bold hover:underline">Create one</a>.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                @if ($companies->hasPages())
                    <div class="px-6 py-4 border-t border-gray-200 bg-gray-50">
                        {{ $companies->links() }}
                    </div>
                @endif
            </div>

        </div>
    </div>
</x-app-layout>