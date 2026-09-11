<x-app-layout>
    <div class="py-10 bg-slate-50/50 min-h-screen">
        <div class="max-w-xl mx-auto px-4 sm:px-6 lg:px-8 space-y-4">
            
            <div class="flex items-center gap-3">
                <a href="{{ route('companies.index') }}" class="w-9 h-9 rounded-2xl bg-white border border-slate-200/80 flex items-center justify-center text-slate-500 hover:text-slate-900 transition-colors shadow-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"/></svg>
                </a>
                <div>
                    <h2 class="text-xl font-black tracking-tight text-slate-950">Edit {{ $company->name }}</h2>
                    <p class="text-xs font-medium text-slate-500">Update company profile record</p>
                </div>
            </div>

            <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200/80 shadow-sm">
                <form method="POST" action="{{ route('companies.update', $company) }}" enctype="multipart/form-data">
                    @method('PUT')
                    @include('companies.form')

                    <div class="flex items-center justify-end gap-3 mt-8 pt-5 border-t border-slate-100">
                        <a href="{{ route('companies.index') }}" class="px-4 py-2 rounded-xl text-xs font-bold text-slate-500 hover:bg-slate-100 transition-colors">
                            Cancel
                        </a>
                        <button type="submit" class="inline-flex items-center justify-center rounded-2xl bg-slate-950 px-5 py-2.5 text-xs font-black text-white hover:bg-indigo-600 transition-all duration-200 shadow-md hover:shadow-indigo-500/20 active:scale-95">
                            Save Changes
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</x-app-layout>