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

    public function render()
    {
        return view('media.upload');
    }

    public function updatedMedias($files)
    {
        $this->validate([
            'medias.*' => 'mimes:txt,xlx,xls,pdf,docx,ai,png|max:2048', // 2MB Max
        ], [
            "mimes" => "L'extention de fichier n'est pas acceptable."
        ]);

        foreach($files as $file){
            $file_id = base64_encode(json_encode([
                "name" => $file->getClientOriginalName(),
                "size" => $file->getSize(),
            ]));

            if(in_array($file_id, $this->uploadedFiles)) continue;

            $this->allMedias[] = $file;
            $this->uploadedFiles[] = $file_id;
        }
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