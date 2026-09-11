@csrf

<div class="space-y-5" x-data="{ 
    preview: '{{ !empty($company) && $company->logo_url ? $company->logo_url : '' }}',
    fileName: '' 
}">
    <!-- Company Name -->
    <div>
        <label for="name" class="block text-xs font-black uppercase tracking-wider text-slate-700 mb-1.5">Company Name <span class="text-rose-500">*</span></label>
        <input id="name" name="name" type="text" 
               value="{{ old('name', $company->name ?? '') }}" 
               required autofocus
               placeholder="e.g. Acme Studio" 
               class="w-full rounded-2xl border-slate-200 text-sm focus:border-indigo-600 focus:ring-4 focus:ring-indigo-500/10 placeholder-slate-400 font-medium transition duration-200">
        <x-input-error :messages="$errors->get('name')" class="mt-1.5" />
    </div>

    <!-- Email & Website Split Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <div>
            <label for="email" class="block text-xs font-black uppercase tracking-wider text-slate-700 mb-1.5">Email Address</label>
            <input id="email" name="email" type="email" 
                   value="{{ old('email', $company->email ?? '') }}" 
                   placeholder="hello@company.com" 
                   class="w-full rounded-2xl border-slate-200 text-sm focus:border-indigo-600 focus:ring-4 focus:ring-indigo-500/10 placeholder-slate-400 font-medium transition duration-200">
            <x-input-error :messages="$errors->get('email')" class="mt-1.5" />
        </div>

        <div>
            <label for="website" class="block text-xs font-black uppercase tracking-wider text-slate-700 mb-1.5">Website</label>
            <input id="website" name="website" type="url" 
                   value="{{ old('website', $company->website ?? '') }}" 
                   placeholder="https://company.com" 
                   class="w-full rounded-2xl border-slate-200 text-sm focus:border-indigo-600 focus:ring-4 focus:ring-indigo-500/10 placeholder-slate-400 font-medium transition duration-200">
            <x-input-error :messages="$errors->get('website')" class="mt-1.5" />
        </div>
    </div>

    <!-- Interactive Logo Upload -->
    <div>
        <label class="block text-xs font-black uppercase tracking-wider text-slate-700 mb-1.5">
            Logo <span class="text-[11px] font-normal lowercase text-slate-400">(min. 100x100px)</span>
        </label>
        
        <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-slate-200 border-dashed rounded-3xl hover:border-indigo-400 transition-colors bg-slate-50/50 group relative cursor-pointer"
             @click="$refs.fileInput.click()">
            <div class="space-y-2 text-center flex flex-col items-center">
                <!-- Preview / Icon -->
                <template x-if="preview">
                    <img :src="preview" class="w-16 h-16 rounded-2xl object-cover shadow-md border border-slate-200 mb-1">
                </template>
                <template x-if="!preview">
                    <div class="w-12 h-12 rounded-2xl bg-white border border-slate-200 text-indigo-600 flex items-center justify-center shadow-sm group-hover:scale-110 transition-transform">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    </div>
                </template>

                <div class="flex text-xs text-slate-600 font-semibold">
                    <span class="text-indigo-600 group-hover:underline">Upload an image file</span>
                    <span class="pl-1">or drag and drop</span>
                </div>
                <p class="text-[11px] text-slate-400">PNG, JPG, WEBP up to 2MB</p>
                <span x-text="fileName" class="text-xs font-bold text-indigo-700"></span>
            </div>

            <input x-ref="fileInput" id="logo" name="logo" type="file" accept="image/*" class="hidden"
                   @change="
                       if ($event.target.files.length) {
                           fileName = $event.target.files[0].name;
                           preview = URL.createObjectURL($event.target.files[0]);
                       }
                   ">
        </div>
        <x-input-error :messages="$errors->get('logo')" class="mt-1.5" />
    </div>
</div>