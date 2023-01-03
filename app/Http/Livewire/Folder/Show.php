<?php

namespace App\Http\Livewire\Folder;

use App\Services\FoldersService;
use Livewire\Component;
use Livewire\WithPagination;

class Show extends Component
{
    use WithPagination;

    public $skeletonWidths = ["full", "1/2", "1/3", "1/4", "1/5", "2/3", "2/12", "3/12", "4/12", "5/12", "6/12", "7/12", "8/12", "9/12", "10/12", "11/12"];
    public $limit = 20;
    public $column = "created_at";
    public $sortDesc = true;
    public $query = '';
    public $filterQuery = "";
    public $filters = [
        "compagnie" => null,
        "numero_adheration" => null,
        "phone" => null,
        "email" => null,
        "client" => null
        // "date_effet_start" => null,
        // "date_effet_end" => null,
    ];

    protected $rules = [
        "filters.compagnie" => "nullable|string",
        "filters.numero_adheration" => "nullable|string",
        "filters.email" => "nullable|email",
        // "filters.date_effet_start" => "nullable|date",
        // "filters.date_effet_end" => "nullable|required_with:date_effet_start|date|after_or_equal:date_effet_start",
        "filters.nom_client" => "nullable|string",
    ];

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

        if ($this->query != '')
            return FoldersService::simpleSearch($this->query, $options);

        if ($this->filterQuery != '')
            return FoldersService::search($this->filterQuery, $options);

        return FoldersService::getAll($options);
    }

    private function handleSortState($column)
    {
        if ($this->column == $column)
            $this->sortDesc = !$this->sortDesc;
        else
            $this->sortDesc = true;
    }

    public function applyFilter()
    {
        $this->validate();
        $this->filterQuery = "";
        // $this->filters["date_effet"] = !isset($this->filters["date_effet_start"]) ? null : $this->filters["date_effet_start"] . ',' . $this->filters["date_effet_end"];

        foreach ($this->filters as $filter => $value) {
            if ($value == null) continue;
            $this->filterQuery .= strtoupper($filter) . '::' . urlencode($value) . ',';
        }

        $this->filterQuery = substr($this->filterQuery, 0, -1);
    }

    public function resetFilter()
    {
        $this->filters = [
            "compagnie" => null,
            "numero_adheration" => null,
            "phone" => null,
            "email" => null,
            "date_effet_start" => null,
            "date_effet_end" => null,
        ];

        $this->filterQuery = "";
    }

    public function delete($folder_id)
    {
        FoldersService::delete($folder_id);
    }
}
