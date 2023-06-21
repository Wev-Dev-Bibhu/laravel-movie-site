<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class DashboardTable extends Component
{
    /**
     * Create a new component instance.
     */
    public array $key;
    public object $value;
    public array $header;
    public $title;
    public $url;
    public function __construct($title, array $key, object $value, array $header, $url)
    {
        $this->title = $title;
        $this->url = $url;
        $this->key = $key;
        $this->value = $value;
        $this->header = $header;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('components.dashboard-table');
    }
}
