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
    /**
     * Regaras de validação de formulario
     *
     * @return void
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'slug' => [
                'required',
                Rule::unique('pages', 'slug')
            ],
            'content' => 'required',
        ];
    }

    public function updatedTitle($value)
    {
        $this->generateSlug($value);
    }

    public function create()
    {
        $this->validate();
        Page::create($this->modelData());
        $this->modalFormVisible = false;
        $this->resetVars();
    }

    public function createShowModal()
    {
        $this->modalFormVisible = true;
    }

    public function modelData()
    {
        return [
            'title' => $this->title,
            'slug' => $this->slug,
            'content' => $this->content,
        ];
    }

    /**
     * Limpar os inpunt do form
     *
     * @return void
     */
    public function resetVars()
    {
        $this->title = null;
        $this->slug = null;
        $this->content = null;

    }

    /**
     * Generando o slug
     * baseado no titulo
     *
     * @param [type] $value
     * @return void
     */
    public function generateSlug(String $value)
    {
        $process1 = str_replace(' ', '-', $value);
        $process2 = strtolower($process1);
        $this->slug = $process2;
    }

    public function render()
    {
        return view('livewire.pages');
    }

}
