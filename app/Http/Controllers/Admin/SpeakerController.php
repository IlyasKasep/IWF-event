<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Speaker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SpeakerController extends Controller
{
    public function index()
    {
        $speakers = Speaker::all();
        return view('admin.speakers.index', compact('speakers'));
    }

    public function create()
    {
        return view('admin.speakers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'pillar' => 'required|string|max:255',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        $avatarPath = null;
        if ($request->hasFile('avatar')) {
            $image = $request->file('avatar');
            $name = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/speakers');
            $image->move($destinationPath, $name);
            $avatarPath = '/uploads/speakers/' . $name;
        }

        Speaker::create([
            'name' => $request->name,
            'title' => $request->title,
            'pillar' => $request->pillar,
            'avatar' => $avatarPath,
        ]);

        return redirect()->route('admin.speakers.index')->with('success', 'Pemateri berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $speaker = Speaker::findOrFail($id);
        return view('admin.speakers.edit', compact('speaker'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'pillar' => 'required|string|max:255',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        $speaker = Speaker::findOrFail($id);
        $avatarPath = $speaker->avatar;

        if ($request->hasFile('avatar')) {
            // Delete old file if exists
            if ($speaker->avatar && File::exists(public_path($speaker->avatar))) {
                File::delete(public_path($speaker->avatar));
            }

            $image = $request->file('avatar');
            $name = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/speakers');
            $image->move($destinationPath, $name);
            $avatarPath = '/uploads/speakers/' . $name;
        }

        $speaker->update([
            'name' => $request->name,
            'title' => $request->title,
            'pillar' => $request->pillar,
            'avatar' => $avatarPath,
        ]);

        return redirect()->route('admin.speakers.index')->with('success', 'Pemateri berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $speaker = Speaker::findOrFail($id);

        if ($speaker->avatar && File::exists(public_path($speaker->avatar))) {
            File::delete(public_path($speaker->avatar));
        }

        $speaker->delete();

        return redirect()->route('admin.speakers.index')->with('success', 'Pemateri berhasil dihapus.');
    }
}
