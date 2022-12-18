<?php

namespace App\Http\Livewire\Folder;

use App\Services\FoldersService;
use Livewire\Component;
use Livewire\WithPagination;

class Show extends Component
{
    use WithPagination;

    public $limit = 20;
    public $column = "created_at";
    public $sortDesc = true;
    public $query = '';

    public function sortBy($column)
    {
        $this->handleSortState($column);
        $this->column = $column;
    }

    public function render()
    {
        $folders = $this->folders();
        return view('folder.show', ['folders' => $folders]);
    }

    private function folders()
    {
        $options = [
            "limit" => $this->limit,
            "orderBy" => $this->column,
            "orderDirection" => $this->sortDesc ? "desc" : "asc"
        ];

        // if($this->query != '')
        //     return InsuredsService::search($this->query, $options);

        return FoldersService::getAll($options);
    }

    private function handleSortState($column)
    {
        if($this->column == $column)
            $this->sortDesc = !$this->sortDesc;
        else
            $this->sortDesc = true;
    }

}
