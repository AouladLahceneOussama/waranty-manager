<?php

namespace App\Http\Livewire\Insured;

use App\Services\InsuredsService;
use Livewire\Component;
use Livewire\WithPagination;

class Show extends Component
{
    use WithPagination;

    public $folder;
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
        $insureds = $this->insureds();
        return view('insured.show', ['insureds' => $insureds]);
    }

    private function insureds()
    {
        $options = [
            "limit" => $this->limit,
            "orderBy" => $this->column,
            "orderDirection" => $this->sortDesc ? "desc" : "asc"
        ];

        // if($this->query != '')
        //     return InsuredsService::search($this->query, $options);

        return InsuredsService::getInsured($this->folder, $options);
    }

    private function handleSortState($column)
    {
        if($this->column == $column)
            $this->sortDesc = !$this->sortDesc;
        else
            $this->sortDesc = true;
    }

}
