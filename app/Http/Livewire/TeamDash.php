<?php

namespace App\Http\Livewire;

use App\Models\Team;
use Livewire\Component;

class TeamDash extends Component
{
    public $teams, $modalFormVisible;

    // MODAL CONTROLS********************************************

    /**
     * On click, close modal and clear the form
     * @return void
     */
    public function close()
    {
        // $this->cleanVars();
        $this->modalFormVisible = false;
    }

    /**
     * Shows the create modal
     * @return void
     */
    public function createShowModal()
    {
        // $this->resetValidation();
        // $this->cleanVars();
        $this->modalFormVisible = true;
    }

    public function render()
    {
        $this->teams = Team::all();

        return view('livewire.team-dash', [
            'teams' =>  $this->teams,
        ]);
    }
}
