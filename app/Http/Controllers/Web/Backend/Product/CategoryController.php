<?php

namespace App\Http\Controllers\Web\Backend\Product;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
      public function index()
      {
          $categories = Category::all();
          return view('backend.layout.category.index', compact('categories'));
      }

      public function create()
      {
          return view('categories.create');
      }

      // Store a newly created category in storage
      public function store(Request $request)
      {
          // Validate the incoming request data
          $request->validate([
              'name' => 'required|string|max:255', // Validate the name field
          ]);

          // Create the category
          Category::create([
              'name' => $request->name, // Store the name of the category
          ]);

          return redirect()->route('categories.index')->with('success', 'Category created successfully!');
      }

      // Display the specified category and its related products
      public function show($id)
      {
          $category = Category::findOrFail($id); // Find category by ID or fail
          $products = $category->products; // Get products related to this category
          return view('categories.show', compact('category', 'products'));
      }

      // Show the form for editing the specified category
      public function edit($id)
      {
          $category = Category::findOrFail($id); // Find category by ID or fail
          return view('categories.edit', compact('category')); // Return edit form with category data
      }

      // Update the specified category in storage
      public function update(Request $request, $id)
      {
          // Validate the incoming request data
          $request->validate([
              'name' => 'required|string|max:255', // Validate the name field
          ]);

          // Find the category and update it
          $category = Category::findOrFail($id); // Find category by ID or fail
          $category->update([
              'name' => $request->name, // Update the name of the category
          ]);

          return redirect()->route('categories.index')->with('success', 'Category updated successfully!');
      }

      // Remove the specified category from storage
      public function destroy($id)
      {
          // Find the category and delete it
          $category = Category::findOrFail($id);
          $category->delete();

          return redirect()->route('categories.index')->with('success', 'Category deleted successfully!');
      }

}
