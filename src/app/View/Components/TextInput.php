<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TextInput extends Component
{
    /**
     * The type of the input.
     *
     * @var string
     */
    public $type;

    /**
     * The input name.
     *
     * @var string
     */
    public $name;

    /**
     * The input id.
     *
     * @var string|null
     */
    public $id;

    /**
     * The input value.
     *
     * @var string|null
     */
    public $value;

    /**
     * Create a new component instance.
     *
     * @param string $type
     * @param string $name
     * @param string|null $id
     * @param string|null $value
     * @return void
     */
    public function __construct($type = 'text', $name, $id = null, $value = null)
    {
        $this->type = $type;
        $this->name = $name;
        $this->id = $id ?? $name;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.text-input');
    }
}