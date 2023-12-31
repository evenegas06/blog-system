<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

class Navigation extends Component {
    /**
     * Render component.
     */
    public function render() {
        $categories = Category::all();

        return view('livewire.navigation', [
            'categories' => $categories,
        ]);
    }
}
