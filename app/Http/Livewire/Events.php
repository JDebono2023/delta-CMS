<?php

namespace App\Http\Livewire;

use App\Models\Room;
use App\Models\Event;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Carbon;

class Events extends Component
{
    use WithFileUploads;
    use WithPagination;

    public $events, $rooms, $modelId, $modalFormVisible, $modalConfirmDeleteVisible;

    public $event_name, $start_time, $end_time, $am_pm_1, $am_pm_2, $room_id, $starts_at, $ends_at, $visible = 0;


    public function messages(): array
    {
        return [
            'event_name.required' => 'Please enter an event name.',
            'room_id.required' => 'Please select room.',
            'starts_at.required' => 'Please select a start date.',
            'ends_at.required' => 'Please select an end date.',
            'ends_at.date' => 'End date cannot occur before the start date.',
            'cat_id.required' => 'A minimum of one category must be selected.',

        ];
    }

    /**
     * The form validation rules
     *
     * @return void
     */
    protected $rules = [
        'event_name' => 'required',
        'room_id' => 'required',
        'starts_at' => 'required',
        'ends_at' => 'required|date|after:starts_at',
        'visible' => 'nullable'
    ];

    /**
     * The create function.
     *
     * @return void
     */
    public function create()
    {
        $this->validate();

        // $dateInfo = $this->ends_at < $this->starts_at;
        // $this->validateOnly($dateInfo);

        $visible = $this->visible == null ? 0 : 1;

        Event::create([
            'event_name' => $this->event_name,
            'room_id' => $this->room_id,
            'starts_at' => $this->starts_at,
            'ends_at' => $this->ends_at,
            'visible' => $visible,

        ]);

        $this->modalFormVisible = false;
        $this->cleanVars();
    }


    /**
     * The update function.
     * @return void
     */
    public function update()
    {
        $this->validate();

        $visible = $this->visible == null ? 0 : 1;

        $event = Event::find($this->modelId);

        $start = $this->starts_at == null ? $event->starts_at : $this->starts_at;
        $end = $this->ends_at == null ? $event->ends_at : $this->ends_at;

        $event->update([
            'event_name' => $this->event_name,
            'room_id' => $this->room_id,
            'starts_at' => $start,
            'ends_at' => $end,
            'visible' => $visible,
        ]);

        $this->modalFormVisible = false;
        $this->cleanVars();
    }


    /**
     * The delete function.
     * @return void
     */
    public function delete()
    {
        $event = Event::find($this->modelId);
        $event->delete();
        $this->modalConfirmDeleteVisible = false;
        $this->resetPage();
    }


    // Modal Functions ****************************************************

    /**
     * Shows the create modal
     * @return void
     */
    public function createShowModal()
    {
        $this->resetValidation();
        $this->cleanVars();
        $this->modalFormVisible = true;
    }

    /**
     * Shows the form modal in update mode.
     * @param  mixed $id
     * @return void
     */
    public function updateShowModal($id)
    {
        $this->resetValidation();
        $this->cleanVars();
        $this->modelId = $id;
        $this->modalFormVisible = true;
        $this->loadModel();
    }


    /**
     * Loads the model data of this component.
     * @return void
     */
    public function loadModel()
    {
        $data = Event::find($this->modelId);
        $this->event_name = $data->event_name;
        $this->room_id = $data->room_id;
        $this->starts_at = $data->starts_at;
        $this->ends_at = $data->ends_at;
        $this->visible = $data->visible;
    }

    /**
     * On click, close modal and clear the form
     * @return void
     */
    public function close()
    {
        $this->cleanVars();
        $this->modalFormVisible = false;
    }

    /**
     * Shows the delete confirmation modal.
     * @param  mixed $id
     * @return void
     */
    public function deleteShowModal($id)
    {
        $this->modelId = $id;
        $this->modalConfirmDeleteVisible = true;
        $this->loadModel();
    }

    /**
     * function run to clear the form
     * @return void
     */
    public function cleanVars()
    {
        $this->modelId = null;
        $this->event_name = '';
        $this->room_id = null;
        $this->starts_at = null;
        $this->ends_at = null;
        $this->visible = null;
    }


    // Render **********************************************************************

    public function render()
    {

        $today = Carbon::today();
        $mindate = Carbon::today();
        // $thirtyDays = $today->subDays(30);
        // dd($today);

        $this->events = Event::with('eventRoom')->orderBy('starts_at', 'asc')->paginate(15);
        // $this->events = Event::with('eventRoom')->orderBy('starts_at', 'asc')->where('starts_at', '>=', $today)->paginate(15);
        // $this->events = Event::with('eventRoom')->orderBy('starts_at', 'desc')->where('ends_at', '>', $today->subDays(10))->paginate(10);
        $this->rooms = Room::with('floors')->orderBy('floor_id', 'desc')->get();



        $links = $this->events;
        $this->events = collect($this->events->items());

        return view('livewire.events', ['events' => $this->events, 'rooms' => $this->rooms, 'today' => $today, 'mindate' => $mindate, 'links' => $links]);
        // 
    }
}
