<?php

namespace App\Http\Livewire;

use App\Models\Menu;
use App\Models\MenuType;
use App\Models\Restaurant;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class Menus extends Component
{
    use WithFileUploads;
    use WithPagination;

    public $menus, $modelId, $iteration, $image, $file_name, $modalFormVisible, $rest_id, $menu, $modalConfirmDeleteVisible, $restaurant, $modalPreviewVisible, $type_id, $type;

    /**
     * The form validation rules
     *
     * @return void
     */
    protected $rules = [
        'image' => 'image|required',
        'file_name' => 'nullable',
        'menu' => 'required',
        'rest_id' => 'nullable',
        'type_id' => 'required',
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

        $image = Menu::create([
            'image' => $image,
            'file_name' => $this->file_name,
            'menu' => $this->menu,
            'rest_id' => $this->rest_id,
            'type_id' => $this->type_id,

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
            'menu' => 'required',
            'image' => 'nullable',

        ]);

        // dd($this->rest_id);

        $image = Menu::find($this->modelId);

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
            'menu' => $this->menu,
            'rest_id' => $this->rest_id,
            'type_id' => $this->type_id,
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
            'image' => 'image|nullable', // 1MB Max
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
        $item = Menu::find($this->modelId);
        unlink(storage_path('app/public/images/' . $item->image));

        Menu::destroy($this->modelId);
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
        $data = Menu::find($this->modelId);
        $this->image = $data->image;
        $this->file_name = $data->file_name;
        $this->menu = $data->menu;
        $this->rest_id = $data->rest_id;
        $this->type_id = $data->type_id;
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
        $this->menu = null;
        $this->rest_id = null;
        $this->type_id = null;
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
        $this->menus = Menu::with(['restaurant', 'menuTypes'])->orderBy('menu', 'asc')->paginate(15);

        $this->restaurant = Restaurant::all();
        $this->type = MenuType::all();
        $links = $this->menus;
        $this->menus = collect($this->menus->items());

        return view('livewire.menus', ['menus' => $this->menus, 'types' => $this->type, 'restaurant' => $this->restaurant, 'links' => $links]);
    }
}
