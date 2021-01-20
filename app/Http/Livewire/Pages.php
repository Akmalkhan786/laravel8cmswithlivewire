<?php

namespace App\Http\Livewire;

use App\Models\Page;
use Illuminate\Validation\Rule;
use Livewire\Component;

class Pages extends Component
{
    public $modalFormVisible = false;
    public $slug;
    public $title;
    public $content;

    /*
     * Validation rules
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'slug' => ['required', Rule::unique('pages', 'slug')],
            'content' => 'required',
        ];
    }

    /*
     * Create Page Model
     */
    public function createShowModal()
    {
        $this->modalFormVisible = true;
    }

    /*
     * Create the page
     */
    public function create()
    {
        $this->validate();
        Page::create($this->modelData());
        $this->modalFormVisible = false;
        $this->reset();
    }

    /*
     * Read the data
     */
    public function read()
    {
        return Page::paginate(5);
    }

    /*
     * Auto populate the slug field
     */
    public function updatedTitle($value)
    {
        $this->generateSlug($value);
    }

    private function generateSlug($value)
    {
        $process1 = str_replace(' ', '-', $value);
        $process2 = strtolower($process1);
        $this->slug = $process2;
    }

    /*
     * Get form data
     */
    public function modelData()
    {
        return [
            'title' => $this->title,
            'slug' => $this->slug,
            'content' => $this->content,
        ];
    }
    public function render()
    {
        return view('livewire.pages', [
            'data' => $this->read(),
        ]);
    }
}
