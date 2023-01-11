<?php

namespace App\Http\Livewire\User;

use App\Services\UsersService;
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

    public $confirm_modal = false;
    public $user_id_delete;

    public function sortBy($column)
    {
        $this->handleSortState($column);
        $this->column = $column;
    }

    public function render()
    {
        $users = $this->users();
        return view('user.show', ['users' => $users]);
    }

    private function users()
    {
        $options = [
            "limit" => $this->limit,
            "orderBy" => $this->column,
            "orderDirection" => $this->sortDesc ? "desc" : "asc"
        ];

        if ($this->query != '')
            return UsersService::simpleSearch($this->query, $options);

        return UsersService::get($options);
    }

    private function handleSortState($column)
    {
        if ($this->column == $column)
            $this->sortDesc = !$this->sortDesc;
        else
            $this->sortDesc = true;
    }

    public function delete()
    {
        // Add confirmation because this will delete a folder with all its content.
        $deleted = UsersService::delete($this->user_id_delete);
        if(!$deleted){
            $this->emit('newResponse', [
                'error' => true,
                'redirect' => [
                    'ok' => false,
                    'url' => '/',
                    'msg' => ''
                ],
                'msg' => 'Il y a une erreur lors de suppression',
                'data' => ""
            ]);
        }else{
            $this->emit('newResponse', [
                'error' => false,
                'redirect' => [
                    'ok' => false,
                    'url' => '/',
                    'msg' => ''
                ],
                'msg' => 'Utilisateur bien supprimer',
                'data' => ""
            ]);
        }

        // close modal in both cases
        $this->confirm_modal = false;
    }

    public function confirmModal($stat, $user_id_delete = null)
    {
        $this->confirm_modal = $stat;
        $this->user_id_delete = $user_id_delete;
    }
}
