<div>
    <label class="block text-sm font-medium text-slate-300">Degree</label>
    <input type="text" name="degree" value="{{ old('degree', $education->degree ?? '') }}"
           class="mt-2 w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3 text-white outline-none focus:border-sky-400">
    @error('degree') <p class="mt-1 text-sm text-red-400">{{ $message }}</p> @enderror
</div>

<div>
    <label class="block text-sm font-medium text-slate-300">Institution</label>
    <input type="text" name="institution" value="{{ old('institution', $education->institution ?? '') }}"
           class="mt-2 w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3 text-white outline-none focus:border-sky-400">
    @error('institution') <p class="mt-1 text-sm text-red-400">{{ $message }}</p> @enderror
</div>

<div>
    <label class="block text-sm font-medium text-slate-300">Department</label>
    <input type="text" name="department" value="{{ old('department', $education->department ?? '') }}"
           class="mt-2 w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3 text-white outline-none focus:border-sky-400">
</div>

<div class="grid gap-6 md:grid-cols-3">
    <div>
        <label class="block text-sm font-medium text-slate-300">Start Year</label>
        <input type="text" name="start_year" value="{{ old('start_year', $education->start_year ?? '') }}"
               class="mt-2 w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3 text-white outline-none focus:border-sky-400">
    </div>

    <div>
        <label class="block text-sm font-medium text-slate-300">End Year</label>
        <input type="text" name="end_year" value="{{ old('end_year', $education->end_year ?? '') }}"
               class="mt-2 w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3 text-white outline-none focus:border-sky-400">
    </div>

    <div>
        <label class="block text-sm font-medium text-slate-300">Sort Order</label>
        <input type="number" name="sort_order" value="{{ old('sort_order', $education->sort_order ?? 0) }}"
               class="mt-2 w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3 text-white outline-none focus:border-sky-400">
    </div>
</div>

<div>
    <label class="block text-sm font-medium text-slate-300">Description</label>
    <textarea name="description" rows="5"
              class="mt-2 w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3 text-white outline-none focus:border-sky-400">{{ old('description', $education->description ?? '') }}</textarea>
</div>