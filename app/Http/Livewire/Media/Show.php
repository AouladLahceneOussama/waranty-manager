<?php

namespace App\Http\Livewire\Media;

use App\Services\MediasService;
use Livewire\Component;

class Show extends Component
{
    public $folderId;
    public $medias;

    public function render()
    {
        $this->medias = MediasService::get($this->folderId);
        return view('media.show');
    }

    public function delete($media_id)
    {
        MediasService::delete($media_id);
        $this->medias = MediasService::get($this->folderId);
    }
}