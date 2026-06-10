<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CertificateController extends Controller
{
    public function index()
    {
        $certificates = Certificate::latest()->get();

        return view('admin.certificates.index', compact('certificates'));
    }

    public function create()
    {
        return view('admin.certificates.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|max:255',
            'issuer' => 'nullable|max:255',
            'issue_date' => 'nullable|max:255',
            'credential_url' => 'nullable|url',
            'certificate_file' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:4096',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('certificate_file')) {
            $data['certificate_file'] = $request->file('certificate_file')
                ->store('certificates/files', 'public');
        }

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')
                ->store('certificates/images', 'public');
        }

        Certificate::create($data);

        return redirect()
            ->route('admin.certificates.index')
            ->with('success', 'Certificate added successfully.');
    }

    public function edit(Certificate $certificate)
    {
        return view('admin.certificates.edit', compact('certificate'));
    }

    public function update(Request $request, Certificate $certificate)
    {
        $data = $request->validate([
            'title' => 'required|max:255',
            'issuer' => 'nullable|max:255',
            'issue_date' => 'nullable|max:255',
            'credential_url' => 'nullable|url',
            'certificate_file' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:4096',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('certificate_file')) {
            if ($certificate->certificate_file) {
                Storage::disk('public')->delete($certificate->certificate_file);
            }

            $data['certificate_file'] = $request->file('certificate_file')
                ->store('certificates/files', 'public');
        }

        if ($request->hasFile('image')) {
            if ($certificate->image) {
                Storage::disk('public')->delete($certificate->image);
            }

            $data['image'] = $request->file('image')
                ->store('certificates/images', 'public');
        }

        $certificate->update($data);

        return redirect()
            ->route('admin.certificates.index')
            ->with('success', 'Certificate updated successfully.');
    }

    public function destroy(Certificate $certificate)
    {
        if ($certificate->certificate_file) {
            Storage::disk('public')->delete($certificate->certificate_file);
        }

        if ($certificate->image) {
            Storage::disk('public')->delete($certificate->image);
        }

        $certificate->delete();

        return redirect()
            ->route('admin.certificates.index')
            ->with('success', 'Certificate deleted successfully.');
    }
}