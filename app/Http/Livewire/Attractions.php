<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Attraction;
use App\Models\AttractionCategory;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class Attractions extends Component
{
    use WithFileUploads;
    use WithPagination;


    public $allAttractions, $image, $attraction, $description, $distance, $category, $address, $phone, $website, $modelId, $iteration,  $modalFormVisible, $modalConfirmDeleteVisible, $attractcat_id, $cat_image, $modalCategoryVisible, $modalDeleteCategoryVisible, $allCategory, $cat_iteration;

    /**
     * The form validation rules
     *
     * @return void
     */
    protected $rules = [
        'image' => 'nullable',
        'attraction' => 'required',
        'description' => 'required',
        'attractcat_id' => 'required',
        'distance' => 'nullable',
        'address' => 'nullable',
        'phone' => 'nullable',
        'website' => 'required'
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
            $image = $this->image->hashName();
            $destinationPath = '/public/images';
            $this->image->storeAs($destinationPath, $image);
        } else {
            $image = 'noImage.png';
        }

        $image = Attraction::create([
            'image' => $image,
            'attraction' => $this->attraction,
            'description' => $this->description,
            'distance' => $this->distance,
            'attractcat_id' => $this->attractcat_id,
            'address' => $this->address,
            'phone' => $this->phone,
            'website' => $this->website,
        ]);

        $this->modalFormVisible = false;
        $this->cleanVars();
    }


    /**
     * The create function.
     *
     * @return void
     */
    public function createCategory()
    {
        $this->validate([
            'image' => 'required',
            'category' => 'required'
        ]);
        if ($this->cat_image) {
            $image = $this->cat_image->hashName();
            $destinationPath = '/public/images';
            $this->cat_image->storeAs($destinationPath, $image);
        } else {
            $image = 'noImage.png';
        }

        $image = AttractionCategory::create([
            'image' => $image,
            'category' => $this->category,
        ]);

        $this->modalCategoryVisible = false;
        $this->cleanCatVars();
    }

    /**
     * The update function.
     * @return void
     */
    public function update()
    {
        $this->validate([
            'image' => 'nullable'
        ]);

        $data = Attraction::find($this->modelId);

        if ($this->image != $data->image) {

            unlink(storage_path('app/public/images/' . $data->image));
            $name = $this->image->hashName();
            $destinationPath = '/public/images';
            $this->image->storeAs($destinationPath, $name);
            $file = $name;
            // dd($data);
        } else {
            $file = $this->image;
            // dd($data);
        }

        $data->update([
            'image' => $file,
            'attraction' => $this->attraction,
            'attractcat_id' => $this->attractcat_id,
            'description' => $this->description,
            'distance' => $this->distance,
            'address' => $this->address,
            'phone' => $this->phone,
            'website' => $this->website,
        ]);

        $this->modalFormVisible = false;
        $this->cleanVars();
    }

    /**
     * The update function.
     * @return void
     */
    public function updateCategory()
    {
        $this->validate([
            'image' => 'nullable'
        ]);

        $data = AttractionCategory::find($this->modelId);

        if ($this->cat_image != $data->image) {

            unlink(storage_path('app/public/images/' . $data->image));
            $name = $this->cat_image->hashName();
            $destinationPath = '/public/images';
            $this->cat_image->storeAs($destinationPath, $name);
            $file = $name;
            // dd($data);
        } else {
            $file = $this->cat_image;
            // dd($data);
        }

        $data->update([
            'image' => $file,
            'category' => $this->category,

        ]);

        $this->modalCategoryVisible = false;
        $this->cleanCatVars();
    }


    /**
     * The delete function.
     * @return void
     */
    public function delete()
    {
        $item = Attraction::find($this->modelId);
        unlink(storage_path('app/public/images/' . $item->image));

        Attraction::destroy($this->modelId);
        $this->modalConfirmDeleteVisible = false;
        $this->resetPage();
    }

    /**
     * The delete function.
     * @return void
     */
    public function deleteCategory()
    {
        $item = AttractionCategory::find($this->modelId);
        unlink(storage_path('app/public/images/' . $item->image));

        AttractionCategory::destroy($this->modelId);
        $this->modalDeleteCategoryVisible = false;
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
        $data = Attraction::find($this->modelId);
        $this->image = $data->image;
        $this->attraction = $data->attraction;
        $this->description = $data->description;
        $this->attractcat_id = $data->attractcat_id;
        $this->address = $data->address;
        $this->distance = $data->distance;
        $this->phone = $data->phone;
        $this->website = $data->website;
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
        $this->image = null;
        $this->attraction = '';
        $this->description = '';
        $this->attractcat_id = '';
        $this->address = '';
        $this->distance = '';
        $this->phone = '';
        $this->website = '';
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

    // Category Modal COntrols

    /**
     * Shows the create modal
     * @return void
     */
    public function createCatModal()
    {
        $this->resetValidation();
        $this->cleanCatVars();
        $this->modalCategoryVisible = true;
    }


    /**
     * Shows the form modal in update mode.
     * @param  mixed $id
     * @return void
     */
    public function updateCatModal($id)
    {
        $this->resetValidation();
        $this->cleanCatVars();
        $this->modelId = $id;
        $this->modalCategoryVisible = true;
        $this->loadCatModel();
    }


    /**
     * Loads the model data of this component.
     * @return void
     */
    public function loadCatModel()
    {
        $data = AttractionCategory::find($this->modelId);
        $this->cat_image = $data->image;
        $this->category = $data->category;
    }

    /**
     * Shows the delete confirmation modal.
     * @param  mixed $id
     * @return void
     */
    public function deleteCatModal($id)
    {
        $this->modelId = $id;
        $this->modalDeleteCategoryVisible = true;
        $this->loadCatModel();
    }


    /**
     * function run to clear the form
     * @return void
     */
    public function cleanCatVars()
    {
        $this->modelId = null;
        $this->cat_image = null;
        $this->category = '';
        $this->cat_iteration++;
    }

    /**
     * On click, close modal and clear the form
     * @return void
     */
    public function closeCategory()
    {
        $this->cleanVars();
        $this->modalCategoryVisible = false;
    }


    // Render **********************************************************************
    public function render()
    {
        $this->allCategory = AttractionCategory::all();
        $this->allAttractions = Attraction::with('attractionCategory')->orderBy('attraction', 'asc')->paginate(10);

        $links = $this->allAttractions;
        $this->allAttractions = collect($this->allAttractions->items());

        return view('livewire.attractions', ['allAttractions' => $this->allAttractions, 'allCategory' => $this->category, 'links' => $links]);

        // 'links' => $links
    }
}
