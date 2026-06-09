<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sponsor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SponsorController extends Controller
{
    public function index()
    {
        $sponsors = Sponsor::all();
        return view('admin.sponsors.index', compact('sponsors'));
    }

    public function create()
    {
        return view('admin.sponsors.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'tier' => 'required|in:bronze,gold,platinum',
            'price' => 'required|integer|min:0',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'description' => 'nullable|string',
        ]);

        $logoPath = null;
        if ($request->hasFile('logo')) {
            $image = $request->file('logo');
            $name = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/sponsors');
            $image->move($destinationPath, $name);
            $logoPath = '/uploads/sponsors/' . $name;
        }

        Sponsor::create([
            'name' => $request->name,
            'tier' => $request->tier,
            'price' => $request->price,
            'logo' => $logoPath,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.sponsors.index')->with('success', 'Sponsor berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $sponsor = Sponsor::findOrFail($id);
        return view('admin.sponsors.edit', compact('sponsor'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'tier' => 'required|in:bronze,gold,platinum',
            'price' => 'required|integer|min:0',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'description' => 'nullable|string',
        ]);

        $sponsor = Sponsor::findOrFail($id);
        $logoPath = $sponsor->logo;

        if ($request->hasFile('logo')) {
            // Delete old file if exists
            if ($sponsor->logo && File::exists(public_path($sponsor->logo))) {
                File::delete(public_path($sponsor->logo));
            }

            $image = $request->file('logo');
            $name = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/sponsors');
            $image->move($destinationPath, $name);
            $logoPath = '/uploads/sponsors/' . $name;
        }

        $sponsor->update([
            'name' => $request->name,
            'tier' => $request->tier,
            'price' => $request->price,
            'logo' => $logoPath,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.sponsors.index')->with('success', 'Sponsor berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $sponsor = Sponsor::findOrFail($id);

        if ($sponsor->logo && File::exists(public_path($sponsor->logo))) {
            File::delete(public_path($sponsor->logo));
        }

        $sponsor->delete();

        return redirect()->route('admin.sponsors.index')->with('success', 'Sponsor berhasil dihapus.');
    }
}
