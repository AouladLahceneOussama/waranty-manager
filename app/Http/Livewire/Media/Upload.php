<?php

namespace App\Http\Livewire\Media;

use App\Services\MediasService;
use Livewire\Component;
use Livewire\WithFileUploads;

class Upload extends Component
{
    use WithFileUploads;

    protected $listeners = ['createMediaFolder'];

    public $medias = [];
    public $allMedias = [];
    public $uploadedFiles = [];

    // var related to update case
    public $folderId;
    public $updating = false;

    public function render()
    {
        return view('media.upload');
    }

    public function updatedMedias($files)
    {

        // dd("we are here");
        $this->validate([
            'medias.*' => 'mimes:txt,xlx,xls,pdf,docx,ai,jpg,png|max:2048', // 2MB Max
        ], [
            "mimes" => "L'extention de fichier n'est pas acceptable.",
            "max" => "La taille de fichier depasse 2MB"
        ]);

        foreach ($files as $file) {
            $file_id = base64_encode(json_encode([
                "name" => $file->getClientOriginalName(),
                "size" => $file->getSize(),
            ]));

            if (in_array($file_id, $this->uploadedFiles)) continue;

            $this->allMedias[] = $file;
            $this->uploadedFiles[] = $file_id;
        }

        if ($this->updating) {
            MediasService::create($this->allMedias, $this->folderId);
            $this->allMedias = [];
            $this->emit("mediaUploaded");
        }

        $this->emit('newResponse', [
            'error' => false,
            'redirect' => [
                'ok' => false,
                'url' => '/',
                'msg' => ''
            ],
            'msg' => 'Media est bien Ajouter',
            'data' => ""
        ]);
    }

    public function createMediaFolder($folder_id)
    {
        MediasService::create($this->allMedias, $folder_id);
    }

    public function delete($index)
    {
        unset($this->allMedias[$index]);
        unset($this->uploadedFiles[$index]);
        $this->allMedias = array_values($this->allMedias);
        $this->uploadedFiles = array_values($this->uploadedFiles);
    }
}
