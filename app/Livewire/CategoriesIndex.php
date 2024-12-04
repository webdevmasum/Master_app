<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;
use Yajra\DataTables\DataTables;

class CategoriesIndex extends Component
{
    public function render()
    {
        return view('livewire.categories-index');
    }

    public function getCategoriesData()
    {
        $categories = Category::query();

        return DataTables::of($categories)
            ->addColumn('action', function ($category) {
                return '
                    <a href="' . route('categories.show', $category->id) . '">View Products</a> |
                    <a href="' . route('categories.edit', $category->id) . '">Edit</a> |
                    <form action="' . route('categories.destroy', $category->id) . '" method="POST" style="display:inline;">
                        ' . csrf_field() . '
                        ' . method_field('DELETE') . '
                        <button type="submit">Delete</button>
                    </form>
                ';
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
