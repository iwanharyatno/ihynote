<?php

namespace App\View\Components\Utils;

use Illuminate\View\Component;

class MoveNode extends Component
{
    public $currentFolder;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($currentFolder)
    {
        $this->currentFolder = $currentFolder;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.utils.move-node');
    }
}
