<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;

class Response extends Component
{

    protected $listeners = ['newResponse', 'refreshResponse'];

    public $response = [];
    public $responseTime = 3000;
    
    public function render()
    {
        return view('components.response');
    }

    public function newResponse($response)
    {
        $this->response = $response;
        $this->dispatchBrowserEvent('showresponse');
    }

    public function refreshResponse()
    {
        $this->response = [];
    }
}