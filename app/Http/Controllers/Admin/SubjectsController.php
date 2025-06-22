<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Semester;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request as CustomRequest;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;

class SubjectsController extends Controller
{
   protected string $section;
   protected int $paginationLimit;
   public function __construct()
   {
      $this->section = "subjects";
      $this->paginationLimit = config('app.pagination_limit');
   }
   public function index()
   {
      $section = $this->section;
      $subjects = Subject::with(['course:id,name', 'semester:id,name'])->select(['id', 'name', 'course_id', 'semester_id'])->paginate($this->paginationLimit);
      return View::make('admin.' . $this->section . '.' . (CustomRequest::ajax() ? 'table' : 'index'))->with(compact('section', 'subjects'));
   }
   public function create(Request $request)
   {
      $section = $this->section;
      $courses = Course::get()->pluck('name', 'id');
      $semesters = [];
      $isCustomRequest = false;
      $selectedCourseId = null;
      $name = $request->has('name') ? $request->input('name') : "";
      if ($request->has('course_id')) {
         $isCustomRequest = true;
         $selectedCourseId = $request->input('course_id');
         $semesters = Semester::where('course_id', $selectedCourseId)->get()->pluck('name', 'id');
      }
      return  View::make('admin.' . $this->section . '.' . ($isCustomRequest ? 'create_partial' : 'create'))->with(compact('section', 'courses', 'semesters', 'selectedCourseId', 'name'));
   }
   public function store(Request $request)
   {
      $validator = Validator::make($request->all(), [
         'name' => 'required|string|unique:subjects,name',
         'course_id' => 'required|int|exists:courses,id',
         'semester_id' => 'required|int|exists:semesters,id'
      ]);
      if ($validator->fails()) {
         return response()->json(['errors' => $validator->errors()], 400);
      }
      $requestData = $request->only(['name', 'semester_id', 'course_id']);
      $subject = new Subject();
      $subject->name = $requestData['name'];
      $subject->semester_id = $requestData['semester_id'];
      $subject->course_id = $requestData['course_id'];
      $subject->is_minor = $request->has('is_minor') ? $request->input('is_minor') : false;
      $subject->is_extra = $request->has('is_extra') ? $request->input('is_extra') : false;
      $subject->added_by = Auth::user()->id;
      $subject->save();
      return response()->json(['status' => 1], 201);
   }
   public function edit($id)
   {
      $section = $this->section;
      $subject = Subject::select(['id', 'name'])->find($id);
      return view("admin.$section.edit")->with(compact('subject', 'section'));
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
      $subject = Subject::find($id);
      $subject->name = $requestData['name'];
      $subject->save();
      return response()->json(['status' => 1], 201);
   }
   public function doDelete($id)
   {
      $subject = Subject::where('id', $id)->select(['id', 'name'])->first();
      $section = $this->section;
      return view("admin.$section.do_delete")->with(compact('section', 'subject'));
   }
   public function delete($id)
   {
      $subject = Subject::find($id);
      $subject->delete();
      return response()->json(['status' => 1], 200);
   }
}
