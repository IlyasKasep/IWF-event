<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MediaPartner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class MediaPartnerController extends Controller
{
    public function index()
    {
        $mediaPartners = MediaPartner::all();
        return view('admin.media_partners.index', compact('mediaPartners'));
    }

    public function create()
    {
        return view('admin.media_partners.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        $logoPath = null;
        if ($request->hasFile('logo')) {
            $image = $request->file('logo');
            $name = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/media-partners');
            $image->move($destinationPath, $name);
            $logoPath = '/uploads/media-partners/' . $name;
        }

        MediaPartner::create([
            'name' => $request->name,
            'logo' => $logoPath,
        ]);

        return redirect()->route('admin.media-partners.index')->with('success', 'Media Partner berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $mediaPartner = MediaPartner::findOrFail($id);
        return view('admin.media_partners.edit', compact('mediaPartner'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        $mediaPartner = MediaPartner::findOrFail($id);
        $logoPath = $mediaPartner->logo;

        if ($request->hasFile('logo')) {
            // Delete old file if exists
            if ($mediaPartner->logo && File::exists(public_path($mediaPartner->logo))) {
                File::delete(public_path($mediaPartner->logo));
            }

            $image = $request->file('logo');
            $name = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/media-partners');
            $image->move($destinationPath, $name);
            $logoPath = '/uploads/media-partners/' . $name;
        }

        $mediaPartner->update([
            'name' => $request->name,
            'logo' => $logoPath,
        ]);

        return redirect()->route('admin.media-partners.index')->with('success', 'Media Partner berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $mediaPartner = MediaPartner::findOrFail($id);

        if ($mediaPartner->logo && File::exists(public_path($mediaPartner->logo))) {
            File::delete(public_path($mediaPartner->logo));
        }

        $mediaPartner->delete();

        return redirect()->route('admin.media-partners.index')->with('success', 'Media Partner berhasil dihapus.');
    }
}
