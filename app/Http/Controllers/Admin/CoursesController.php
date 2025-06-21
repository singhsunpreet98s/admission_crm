<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request as CustomRequest;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;

class CoursesController extends Controller
{
   protected string $section;
   protected int $paginationLimit;
   public function __construct()
   {
      $this->section = "courses";
      $this->paginationLimit = config('app.pagination_limit');
   }
   public function index()
   {
      $section = $this->section;
      $courses = Course::select(['id', 'name', 'code'])->paginate($this->paginationLimit);
      return View::make('admin.' . $this->section . '.' . (CustomRequest::ajax() ? 'table' : 'index'))->with(compact('section', 'courses'));
   }
   public function create()
   {
      $section = $this->section;
      return view("admin.$section.create")->with(compact('section'));
   }
   public function store(Request $request)
   {
      $validator = Validator::make($request->all(), [
         'name' => 'required|string',
         'code' => 'required|string|unique:courses,code',
      ]);
      if ($validator->fails()) {
         return response()->json(['errors' => $validator->errors()], 400);
      }
      $requestData = $request->only(['name', 'code']);
      $course = new Course();
      $course->name = $requestData['name'];
      $course->code = $requestData['code'];
      $course->added_by = Auth::user()->id;
      $course->save();
      return response()->json(['status' => 1], 201);
   }
   public function edit($id)
   {
      $section = $this->section;
      $course = Course::select(['id', 'name', 'code'])->find($id);
      return view("admin.$section.edit")->with(compact('course', 'section'));
   }
   public function update(Request $request, $id)
   {
      $validator = Validator::make($request->all(), [
         'name' => 'required|string',
         'code' => 'required|string',
      ]);
      if ($validator->fails()) {
         return response()->json(['errors' => $validator->errors()], 400);
      }
      $requestData = $request->only(['name', 'code']);
      $course = Course::find($id);
      $course->name = $requestData['name'];
      $course->code = $requestData['code'];
      $course->save();
      return response()->json(['status' => 1], 201);
   }
   public function doDelete($id)
   {
      $course = Course::where('id', $id)->select(['id', 'name'])->first();
      $section = $this->section;
      return view("admin.$section.do_delete")->with(compact('section', 'course'));
   }
   public function delete($id)
   {
      $course = Course::find($id);
      $course->delete();
      return response()->json(['status' => 1], 200);
   }
}
