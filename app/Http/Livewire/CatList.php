<?php

namespace App\Http\Livewire;

use App\Models\Cat;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class CatList extends Component
{
    use WithPagination;

    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function deleteCat($id)
    {
        $cat = Cat::where('id', $id)->first();

        $cat->delete();
    }

    public function render()
    {
        $cats = Cat::where('user_id', Auth::user()->id)
            ->where('name', 'like', '%'.$this->search.'%')
            ->orderByDesc('updated_at')
            ->paginate(6);

        return view('livewire.cat-list', compact('cats'));
    }
}
