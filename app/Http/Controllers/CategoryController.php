<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
   function index(){
     $categories = Category::all();
     
     //return response()->json($categories);
     return view('categories.index', compact('categories'));
   }
   function show(Category $category){

     return response()->json($category);
  
   }

   function edit(Category $category){

      return view('categories.edit', compact('category'));
   
    }

   function create(){

      return view('categories.create');
   
    }

   function store(){

      $data = request()->validate([
         'name' => ['required'],

      ]);
   
      // $category = new Category();
      // $category->name = $data['name'];
      // $category->save();

     $category = Category::create($data);

    return response()->json($category);
  
   }
   function update(Category $category){

      $data = request()->validate([
         'name' => ['required'],

      ]);
      
      $category->update($data);
      
      // $category->fill($data);
      // $category->save();

     return response()->json($category);
  
   }

   function destroy(Category $category){

     $category->delete();

   //  return redirect(route('category.index'));
   return response()->json([
      'message' => 'Category deleted successfully!'
   ]);
  
   }
}
