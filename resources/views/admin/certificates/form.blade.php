<div class="space-y-6">

    <input type="text"
           name="title"
           placeholder="Certificate Title"
           value="{{ old('title',$certificate->title ?? '') }}"
           class="w-full rounded-xl bg-slate-800 p-4 text-white">

    <input type="text"
           name="issuer"
           placeholder="Issuer"
           value="{{ old('issuer',$certificate->issuer ?? '') }}"
           class="w-full rounded-xl bg-slate-800 p-4 text-white">

    <input type="text"
           name="issue_date"
           placeholder="Issue Date"
           value="{{ old('issue_date',$certificate->issue_date ?? '') }}"
           class="w-full rounded-xl bg-slate-800 p-4 text-white">

    <input type="url"
           name="credential_url"
           placeholder="Credential URL"
           value="{{ old('credential_url',$certificate->credential_url ?? '') }}"
           class="w-full rounded-xl bg-slate-800 p-4 text-white">

    <div>
        <label class="mb-2 block text-slate-300">
            Certificate File
        </label>

        <input type="file"
               name="certificate_file"
               class="w-full rounded-xl bg-slate-800 p-4 text-white">
    </div>

    <div>
        <label class="mb-2 block text-slate-300">
            Certificate Image
        </label>

        <input type="file"
               name="image"
               class="w-full rounded-xl bg-slate-800 p-4 text-white">
    </div>

</div>