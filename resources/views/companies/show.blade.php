<x-app-layout>
    <div class="py-8 bg-slate-50/50 min-h-screen">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">

            <!-- Breadcrumb Navigation Bar -->
            <div class="flex items-center justify-between">
                <a href="{{ route('companies.index') }}" class="inline-flex items-center gap-2 text-xs font-bold text-slate-500 hover:text-slate-900 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"/></svg>
                    Back to Companies
                </a>

                <div class="flex items-center gap-2">
                    <a href="{{ route('companies.edit', $company) }}" 
                       class="px-3.5 py-1.5 rounded-xl bg-white border border-slate-200/80 text-xs font-bold text-slate-700 hover:bg-slate-50 shadow-sm transition-all">
                        Edit
                    </a>
                    <form action="{{ route('companies.destroy', $company) }}" method="POST" class="inline"
                          x-data
                          @submit.prevent="if (confirm('Delete {{ $company->name }}? This will delete all team records.')) $el.submit()">
                        @csrf @method('DELETE')
                        <button type="submit" class="px-3.5 py-1.5 rounded-xl bg-rose-50 text-xs font-bold text-rose-600 hover:bg-rose-100 transition-colors">
                            Delete
                        </button>
                    </form>
                </div>
            </div>

            <!-- Company Hero Profile Card -->
            <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200/80 shadow-sm relative overflow-hidden">
                <div class="flex flex-col sm:flex-row items-start sm:items-center gap-5">
                    @if ($company->logo_url)
                        <img src="{{ $company->logo_url }}" 
                             alt="{{ $company->name }}" 
                             class="w-20 h-20 rounded-2xl object-cover border border-slate-200/80 p-1 bg-white shadow-md flex-shrink-0">
                    @else
                        <div class="w-20 h-20 rounded-2xl bg-gradient-to-tr from-indigo-500 to-purple-600 flex items-center justify-center text-white text-2xl font-black shadow-lg flex-shrink-0">
                            {{ strtoupper(substr($company->name, 0, 2)) }}
                        </div>
                    @endif

                    <div class="space-y-1.5 flex-1">
                        <h1 class="text-2xl font-black text-slate-950 tracking-tight">{{ $company->name }}</h1>
                        <div class="flex flex-wrap items-center gap-3 text-xs">
                            @if ($company->email)
                                <a href="mailto:{{ $company->email }}" class="text-slate-500 hover:text-slate-800 flex items-center gap-1.5 font-medium">
                                    <svg class="w-3.5 h-3.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                                    {{ $company->email }}
                                </a>
                            @endif

                            @if ($company->website)
                                <a href="{{ $company->website }}" target="_blank" class="text-indigo-600 hover:underline flex items-center gap-1.5 font-semibold">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                                    {{ $company->website }}
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Associated Employees Card -->
            <div class="bg-white rounded-3xl border border-slate-200/80 shadow-sm overflow-hidden">
                <div class="px-6 py-4 border-b border-slate-100 flex items-center justify-between">
                    <div>
                        <h3 class="font-black text-sm text-slate-900 tracking-tight">Team Members</h3>
                        <p class="text-[11px] text-slate-400 font-medium">Active employees on record</p>
                    </div>
                    <span class="text-xs font-extrabold px-2.5 py-0.5 rounded-full bg-slate-100 text-slate-700">
                        {{ $employees->total() }} Total
                    </span>
                </div>

                <ul class="divide-y divide-slate-100 text-xs">
                    @forelse ($employees as $employee)
                        <li class="px-6 py-3.5 flex items-center justify-between hover:bg-slate-50/50 transition-colors">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-full bg-slate-100 text-slate-700 font-bold flex items-center justify-center text-[10px]">
                                    {{ strtoupper(substr($employee->first_name, 0, 1) . substr($employee->last_name, 0, 1)) }}
                                </div>
                                <div>
                                    <p class="font-bold text-slate-900">{{ $employee->first_name }} {{ $employee->last_name }}</p>
                                    <p class="text-[11px] text-slate-400">{{ $employee->phone ?? 'No contact phone' }}</p>
                                </div>
                            </div>
                            <span class="text-slate-500 font-medium">{{ $employee->email ?? '—' }}</span>
                        </li>
                    @empty
                        <li class="px-6 py-10 text-center text-slate-400">
                            No employees assigned to this company yet.
                        </li>
                    @endforelse
                </ul>

                {{-- Pagination Links --}}
                @if ($employees->hasPages())
                    <div class="px-6 py-4 border-t border-slate-100 bg-slate-50/50">
                        {{ $employees->links() }}
                    </div>
                @endif
            </div>

        </div>
    </div>
</x-app-layout>