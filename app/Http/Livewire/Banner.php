<?php

namespace App\Http\Livewire;

use App\Models\banners;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\BannerCategory;


class banner extends Component
{
    use WithFileUploads;
    use WithPagination;


    public $category, $banner, $modelId, $iteration, $image, $banner_cat_id, $modalFormVisible, $name, $visible = 0, $modalConfirmDeleteVisible, $user, $modalPreviewVisible;


    /**
     * The form validation rules
     *
     * @return void
     */
    protected $rules = [
        'name' => 'required',
        'banner_cat_id' => 'required',
        'image' => 'image|required|max:1024',
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

        $visible = $this->visible == null ? 0 : 1;

        if ($this->image) {
            $this->name = $this->image->getClientOriginalName();
            $image = $this->image->hashName();
            $destinationPath = '/public/images';
            $this->image->storeAs($destinationPath, $image);
        } else {
            $image = 'noImage.png';
        }

        $image = banners::create([
            'image' => $image,
            'name' => $this->name,
            'visible' => $visible,
            'banner_cat_id' => $this->banner_cat_id,

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
            // 'name' => 'required',
            'image' => 'nullable',
            'visible' => 'nullable'
        ]);

        $visible = $this->visible == null ? 0 : 1;
        $image = banners::find($this->modelId);

        if ($this->image != $image->image) {

            unlink(storage_path('app/public/images/' . $image->image));
            $this->name = $this->image->getClientOriginalName();
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
            'name' => $this->name,
            'visible' => $visible,
            'banner_cat_id' => $this->banner_cat_id,
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
        $this->name = $name;
    }

    /**
     * The delete function.
     * @return void
     */
    public function delete()
    {
        $item = banners::find($this->modelId);
        unlink(storage_path('app/public/images/' . $item->image));

        banners::destroy($this->modelId);
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
        $data = banners::find($this->modelId);
        $this->name = $data->name;
        $this->image = $data->image;
        $this->banner_cat_id = $data->banner_cat_id;
        $this->visible = $data->visible;
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
        $this->name = '';
        $this->image = null;
        $this->iteration++;
        $this->banner_cat_id = null;
        $this->visible = null;
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

        $this->category = BannerCategory::all();
        $this->banner = banners::with('bannerCat')->paginate(5);

        $links = $this->banner;
        $this->banner = collect($this->banner->items());

        return view('livewire.banner', ['category' => $this->category, 'banner' => $this->banner, 'links' => $links]);
    }
}
