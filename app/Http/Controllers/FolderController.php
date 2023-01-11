<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use Illuminate\Support\Facades\Gate;

class FolderController
{
    public function index()
    {
        if(!Gate::authorize('view-folders')) abort(403);
        return view("folder.index");
    }

    public function create()
    {
        if(!Gate::authorize('manage-folders')) abort(403);
        return view("folder.create");
    }

    public function edit($folderId)
    {
        $folder = Folder::find($folderId);
        if(!$folder) abort(404);

        if(!Gate::authorize('manage-folders', $folderId)) abort(403);

        return view("folder.edit", compact('folderId'));
    }
}