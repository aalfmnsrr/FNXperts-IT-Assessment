<x-app-layout>
    <div class="py-8 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">

            @include('partials.alert')

            <!-- Title & Action -->
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                <div>
                    <h2 class="text-2xl font-black text-gray-900">Employees</h2>
                    <p class="text-xs text-gray-500 mt-1">Manage personnel records and corporate associations</p>
                </div>
                <a href="{{ route('employees.create') }}"
                   class="inline-flex items-center justify-center px-4 py-2.5 rounded-xl bg-indigo-600 text-white text-xs font-bold hover:bg-indigo-700 shadow-sm transition-colors">
                    + New Employee
                </a>
            </div>

            <!-- Table Container -->
            <div class="bg-white rounded-2xl border border-gray-200 overflow-hidden shadow-sm">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 text-left">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="py-3.5 pl-6 pr-3 text-xs font-bold text-gray-500 uppercase tracking-wider">Employee Name</th>
                                <th class="px-3 py-3.5 text-xs font-bold text-gray-500 uppercase tracking-wider">Company</th>
                                <th class="px-3 py-3.5 text-xs font-bold text-gray-500 uppercase tracking-wider">Email</th>
                                <th class="px-3 py-3.5 text-xs font-bold text-gray-500 uppercase tracking-wider">Phone</th>
                                <th class="py-3.5 pl-3 pr-6 text-xs font-bold text-gray-500 uppercase tracking-wider text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 text-sm">
                            @forelse ($employees as $employee)
                                <tr class="hover:bg-gray-50/80 transition-colors">
                                    <!-- Name & Avatar -->
                                    <td class="py-4 pl-6 pr-3">
                                        <div class="flex items-center space-x-3">
                                            <div class="w-9 h-9 rounded-lg bg-gray-100 text-gray-700 border border-gray-200 flex items-center justify-center font-bold text-xs flex-shrink-0">
                                                {{ strtoupper(substr($employee->first_name, 0, 1) . substr($employee->last_name, 0, 1)) }}
                                            </div>
                                            <div>
                                                <span class="font-bold text-gray-900 block">{{ $employee->first_name }} {{ $employee->last_name }}</span>
                                                <span class="text-[11px] text-gray-400 font-medium">ID #{{ str_pad($employee->id, 4, '0', STR_PAD_LEFT) }}</span>
                                            </div>
                                        </div>
                                    </td>

                                    <!-- Company -->
                                    <td class="px-3 py-4 text-xs font-semibold">
                                        @if ($employee->company)
                                            <a href="{{ route('companies.show', $employee->company) }}" class="text-indigo-600 hover:underline">
                                                {{ $employee->company->name }}
                                            </a>
                                        @else
                                            <span class="text-gray-400 font-normal">—</span>
                                        @endif
                                    </td>

                                    <!-- Email -->
                                    <td class="px-3 py-4 text-gray-600 text-xs">
                                        {{ $employee->email ?: '—' }}
                                    </td>

                                    <!-- Phone -->
                                    <td class="px-3 py-4 text-gray-600 text-xs">
                                        {{ $employee->phone ?: '—' }}
                                    </td>

                                    <!-- Actions -->
                                    <td class="py-4 pl-3 pr-6 text-right whitespace-nowrap space-x-2">
                                        <a href="{{ route('employees.edit', $employee) }}" 
                                           class="text-xs font-semibold text-indigo-600 hover:text-indigo-900">
                                            Edit
                                        </a>
                                        <form action="{{ route('employees.destroy', $employee) }}" method="POST" class="inline"
                                              x-data
                                              @submit.prevent="if (confirm('Delete {{ $employee->first_name }} {{ $employee->last_name }}?')) $el.submit()">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="text-xs font-semibold text-red-600 hover:text-red-900">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="py-12 text-center text-gray-500 text-sm">
                                        No employees found. <a href="{{ route('employees.create') }}" class="text-indigo-600 font-bold hover:underline">Add one</a>.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                @if ($employees->hasPages())
                    <div class="px-6 py-4 border-t border-gray-200 bg-gray-50">
                        {{ $employees->links() }}
                    </div>
                @endif
            </div>

        </div>
    </div>
</x-app-layout>