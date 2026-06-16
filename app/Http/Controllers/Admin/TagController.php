<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Tags;
use App\Http\Requests\TagRequest;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tags::all();

        return view('admin.tags.index', compact('tags'));
    }

    public function create()
    {
        return view('admin.tags.create');
    }

    public function store(TagRequest $request)
    {
        Tags::create([
            'name' => $request->name,
            'slug' => $request->slug,
        ]);

        return redirect()
            ->route('admin.tags.index')
            ->with('success', 'Tag created successfully.');
    }

    public function edit($id)
    {
        $tag = Tags::findOrFail($id);

        return view('admin.tags.edit', compact('tag'));
    }

    public function update(TagRequest $request, $id)
    {
        $tag = Tags::findOrFail($id);

        $tag->update([
            'name' => $request->name,
            'slug' => $request->slug,
        ]);

        return redirect()
            ->route('admin.tags.index')
            ->with('success', 'Tag updated successfully.');
    }

    public function destroy($id)
    {
        $tag = Tags::findOrFail($id);

        $tag->delete();

        return redirect()
            ->route('admin.tags.index')
            ->with('success', 'Tag deleted successfully.');
    }
}