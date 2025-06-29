<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request as CustomRequest;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;

class AdmissionController extends Controller
{
   protected string $section;
   protected int $paginationLimit;
   public function __construct()
   {
      $this->section = "admission";
      $this->paginationLimit = config('app.pagination_limit');
   }
   public function index()
   {
      $section = $this->section;
      $categories = Category::select(['id', 'name'])->paginate($this->paginationLimit);
      return View::make('admin.' . $this->section . '.' . (CustomRequest::ajax() ? 'table' : 'index'))->with(compact('section', 'categories'));
   }
   public function create()
   {
      $section = $this->section;
      return view("admin.$section.create")->with(compact('section'));
   }
   public function store(Request $request)
   {
      $validator = Validator::make($request->all(), [
         'name' => 'required|string|unique:categories,name',
      ]);
      if ($validator->fails()) {
         return response()->json(['errors' => $validator->errors()], 400);
      }
      $requestData = $request->only(['name']);
      $category = new Category();
      $category->name = $requestData['name'];
      $category->added_by = Auth::user()->id;
      $category->save();
      return response()->json(['status' => 1], 201);
   }
   public function edit($id)
   {
      $section = $this->section;
      $category = Category::select(['id', 'name'])->find($id);
      return view("admin.$section.edit")->with(compact('category', 'section'));
   }
   public function update(Request $request, $id)
   {
      $validator = Validator::make($request->all(), [
         'name' => 'required|string|unique:categories,name',
      ]);
      if ($validator->fails()) {
         return response()->json(['errors' => $validator->errors()], 400);
      }
      $requestData = $request->only(['name']);
      $category = Category::find($id);
      $category->name = $requestData['name'];
      $category->save();
      return response()->json(['status' => 1], 201);
   }
   public function doDelete($id)
   {
      $category = Category::where('id', $id)->select(['id', 'name'])->first();
      $section = $this->section;
      return view("admin.$section.do_delete")->with(compact('section', 'category'));
   }
   public function delete($id)
   {
      $category = Category::find($id);
      $category->delete();
      return response()->json(['status' => 1], 200);
   }
}
