<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;

class FolderController
{
    public function index()
    {
        return view("folder.index");
    }

    public function create()
    {
        if(!Gate::check('admin') && !Gate::check('edit')) abort(403);
        return view("folder.create");
    }

    public function edit($folderId)
    {
        $folder = Folder::find($folderId);
        if(!$folder) abort(404);

        return view("folder.edit", compact('folderId'));
    }
}