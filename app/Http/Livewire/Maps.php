<?php

namespace App\Http\Livewire;

use App\Models\Map;

use App\Models\Floor;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class Maps extends Component
{
    use WithFileUploads;
    use WithPagination;

    public $maps, $modelId, $iteration, $image, $file_name, $modalFormVisible, $map_name, $modalConfirmDeleteVisible, $floors, $floor_id, $modalPreviewVisible;


    /**
     * The form validation rules
     *
     * @return void
     */
    protected $rules = [
        'image' => 'image|required|max:1024',
        'file_name' => 'required',
        'map_name' => 'required',
        'floor_id' => 'required'
    ];



    /**
     * The create function.
     *
     * @return void
     */
    public function create()
    {
        $this->validate();


        if ($this->image) {
            $this->file_name = $this->image->getClientOriginalName();
            $image = $this->image->hashName();
            $destinationPath = '/public/images';
            $this->image->storeAs($destinationPath, $image);
        } else {
            $image = 'noImage.png';
        }

        $image = Map::create([
            'image' => $image,
            'file_name' => $this->file_name,
            'map_name' => $this->map_name,
            'floor_id' => $this->floor_id,

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
        $this->validate([
            'image' => 'nullable',
            'map_name' => 'required',
        ]);


        $image = Map::find($this->modelId);

        if ($this->image != $image->image) {

            unlink(storage_path('app/public/images/' . $image->image));
            $this->file_name = $this->image->getClientOriginalName();
            $name = $this->image->hashName();
            // dd($this->image);
            $destinationPath = '/public/images';
            $this->image->storeAs($destinationPath, $name);
            $data = $name;
            // dd($data);
        } else {
            $data = $this->image;
            // dd($data);
        }

        $image->update([
            'image' => $data,
            'file_name' => $this->file_name,
            'map_name' => $this->map_name,
            'floor_id' => $this->floor_id,
        ]);

        $this->modalFormVisible = false;
        $this->cleanVars();
    }


    /**
     * File_name updated automatically to the original file image name
     * @param  mixed $value
     * @return void
     */
    public function updatedImage($value)
    {
        $this->validate([
            'image' => 'image|nullable|max:1024', // 1MB Max
        ]);

        $name = $value->getClientOriginalName();
        $this->file_name = $name;
    }

    /**
     * The delete function.
     * @return void
     */
    public function delete()
    {
        $item = Map::find($this->modelId);
        unlink(storage_path('app/public/images/' . $item->image));

        Map::destroy($this->modelId);
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
        $data = Map::find($this->modelId);
        $this->image = $data->image;
        $this->file_name = $data->file_name;
        $this->map_name = $data->map_name;
        $this->floor_id = $data->floor_id;
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
     * Preview content modal.
     * @param  mixed $id
     * @return void
     */
    public function previewModal($id)
    {
        $this->modelId = $id;
        $this->modalPreviewVisible = true;
        $this->loadModel();
    }

    /**
     * function run to clear the form
     * @return void
     */
    public function cleanVars()
    {
        $this->modelId = null;
        $this->image = null;
        $this->file_name = '';
        $this->map_name = '';
        $this->floor_id = null;
        $this->iteration++;
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

    // Render **********************************************************************

    public function render()
    {
        $this->maps = Map::with('floors')->paginate(5);
        $this->floors = Floor::all();

        $links = $this->maps;
        $this->maps = collect($this->maps->items());


        return view('livewire.maps', ['floors' => $this->floors, 'maps' => $this->maps, 'links' => $links]);
    }
}
