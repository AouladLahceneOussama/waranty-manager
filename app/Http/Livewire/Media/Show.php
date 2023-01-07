<?php

namespace App\Http\Livewire\Media;

use App\Services\MediasService;
use Livewire\Component;

class Show extends Component
{
    protected $listeners = ["mediaUploaded"];

    public $folderId;
    public $medias;

    public function render()
    {
        $this->medias = MediasService::get($this->folderId);
        return view('media.show');
    }

    public function mediaUploaded()
    {
        $this->medias = MediasService::get($this->folderId);
    }

    public function delete($media_id)
    {
        MediasService::delete($media_id);
        $this->medias = MediasService::get($this->folderId);

        $this->emit('newResponse', [
            'error' => false,
            'redirect' => [
                'ok' => false,
                'url' => '/',
                'msg' => ''
            ],
            'msg' => 'Media est bien Supprimer',
            'data' => ""
        ]);
    }
}