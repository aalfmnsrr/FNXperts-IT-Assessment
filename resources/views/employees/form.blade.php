@csrf

<div class="space-y-5">
    <!-- Name Fields Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <div>
            <label for="first_name" class="block text-xs font-black uppercase tracking-wider text-gray-700 mb-1.5">First Name <span class="text-red-500">*</span></label>
            <input id="first_name" name="first_name" type="text" 
                   value="{{ old('first_name', $employee->first_name ?? '') }}" 
                   required autofocus
                   placeholder="e.g. Jane" 
                   class="w-full rounded-xl border-gray-300 text-sm focus:border-indigo-600 focus:ring-4 focus:ring-indigo-500/10 placeholder-gray-400 transition duration-200">
            <x-input-error :messages="$errors->get('first_name')" class="mt-1.5" />
        </div>

        <div>
            <label for="last_name" class="block text-xs font-black uppercase tracking-wider text-gray-700 mb-1.5">Last Name <span class="text-red-500">*</span></label>
            <input id="last_name" name="last_name" type="text" 
                   value="{{ old('last_name', $employee->last_name ?? '') }}" 
                   required
                   placeholder="e.g. Doe" 
                   class="w-full rounded-xl border-gray-300 text-sm focus:border-indigo-600 focus:ring-4 focus:ring-indigo-500/10 placeholder-gray-400 transition duration-200">
            <x-input-error :messages="$errors->get('last_name')" class="mt-1.5" />
        </div>
    </div>

    <!-- Company Dropdown -->
    <div>
        <label for="company_id" class="block text-xs font-black uppercase tracking-wider text-gray-700 mb-1.5">Company <span class="text-red-500">*</span></label>
        <select id="company_id" name="company_id" required
                class="w-full rounded-xl border-gray-300 text-sm focus:border-indigo-600 focus:ring-4 focus:ring-indigo-500/10 bg-white transition duration-200">
            <option value="">Select a company</option>
            @foreach ($companies as $company)
                <option value="{{ $company->id }}"
                    @selected(old('company_id', $employee->company_id ?? '') == $company->id)>
                    {{ $company->name }}
                </option>
            @endforeach
        </select>
        <x-input-error :messages="$errors->get('company_id')" class="mt-1.5" />
    </div>

    <!-- Email & Phone Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <div>
            <label for="email" class="block text-xs font-black uppercase tracking-wider text-gray-700 mb-1.5">Email Address</label>
            <input id="email" name="email" type="email" 
                   value="{{ old('email', $employee->email ?? '') }}" 
                   placeholder="jane.doe@company.com" 
                   class="w-full rounded-xl border-gray-300 text-sm focus:border-indigo-600 focus:ring-4 focus:ring-indigo-500/10 placeholder-gray-400 transition duration-200">
            <x-input-error :messages="$errors->get('email')" class="mt-1.5" />
        </div>

        <div>
            <label for="phone" class="block text-xs font-black uppercase tracking-wider text-gray-700 mb-1.5">Phone Number</label>
            <input id="phone" name="phone" type="text" 
                   value="{{ old('phone', $employee->phone ?? '') }}" 
                   placeholder="+60 12-345 6789" 
                   class="w-full rounded-xl border-gray-300 text-sm focus:border-indigo-600 focus:ring-4 focus:ring-indigo-500/10 placeholder-gray-400 transition duration-200">
            <x-input-error :messages="$errors->get('phone')" class="mt-1.5" />
        </div>
    </div>
</div>