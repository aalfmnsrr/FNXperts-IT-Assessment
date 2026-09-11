<x-app-layout>
    <div class="py-10 bg-gray-50 min-h-screen">
        <div class="max-w-xl mx-auto px-4 sm:px-6 lg:px-8 space-y-4">
            
            <div class="flex items-center space-x-3">
                <a href="{{ route('employees.index') }}" class="w-9 h-9 rounded-xl bg-white border border-gray-200 flex items-center justify-center text-gray-600 hover:text-gray-900 transition-colors shadow-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"/></svg>
                </a>
                <div>
                    <h2 class="text-xl font-black tracking-tight text-gray-900">Add New Employee</h2>
                    <p class="text-xs text-gray-500">Record a new team member in the directory</p>
                </div>
            </div>

            <div class="bg-white rounded-2xl p-6 sm:p-8 border border-gray-200 shadow-sm">
                <form method="POST" action="{{ route('employees.store') }}">
                    @include('employees.form')

                    <div class="flex items-center justify-end space-x-3 mt-8 pt-5 border-t border-gray-100">
                        <a href="{{ route('employees.index') }}" class="px-4 py-2 rounded-xl text-xs font-bold text-gray-500 hover:bg-gray-100 transition-colors">
                            Cancel
                        </a>
                        <button type="submit" class="inline-flex items-center justify-center px-5 py-2.5 rounded-xl bg-indigo-600 text-white text-xs font-bold hover:bg-indigo-700 shadow-sm transition-colors">
                            Create Employee
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</x-app-layout>