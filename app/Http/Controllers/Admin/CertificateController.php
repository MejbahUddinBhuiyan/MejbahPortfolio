<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use Illuminate\Http\Request;
use App\Support\CloudinaryUploader;

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
           $data['certificate_file'] = CloudinaryUploader::upload(
               $request->file('certificate_file'),
               'portfolio/certificates/files'
           );
       }

        if ($request->hasFile('image')) {
            $data['image'] = CloudinaryUploader::upload(
                $request->file('image'),
                'portfolio/certificates/images'
            );
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
                $data['certificate_file'] = CloudinaryUploader::upload(
                $request->file('certificate_file'),
                'portfolio/certificates/files'
            );
       }

        if ($request->hasFile('image')) {
            $data['image'] = CloudinaryUploader::upload(
            $request->file('image'),
            'portfolio/certificates/images'
           );
    }
        $certificate->update($data);

        return redirect()
            ->route('admin.certificates.index')
            ->with('success', 'Certificate updated successfully.');
    }

    public function destroy(Certificate $certificate)
        {
            $certificate->delete();

            return redirect()
                ->route('admin.certificates.index')
                ->with('success', 'Certificate deleted successfully.');
        }
}