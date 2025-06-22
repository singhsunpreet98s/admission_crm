<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use App\Models\CourseFees;
use App\Models\Semester;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request as CustomRequest;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;

class CourseFeesController extends Controller
{
   protected string $section;
   protected int $paginationLimit;
   public function __construct()
   {
      $this->section = "courses.fees";
      $this->paginationLimit = config('app.pagination_limit');
   }
   public function index($courseId)
   {
      $section = $this->section;
      $course = Course::select(['name'])->find($courseId);
      $courseName = $course->name;
      $courseFees = CourseFees::where('course_id', $courseId)->with(['category:id,name', 'semester:id,name'])->select(['id', 'category_id',  'amount', 'fee_head', 'period_number', 'semester_id'])->paginate($this->paginationLimit);
      return View::make('admin.' . $this->section . '.' . (CustomRequest::ajax() ? 'table' : 'index'))->with(compact('section', 'courseFees', 'courseId', 'courseName'));
   }
   public function create($courseId)
   {
      $section = $this->section;
      $categories = Category::get()->pluck('name', 'id');
      $semesters = Semester::where('course_id', $courseId)->get()->pluck('name', 'id');
      return view("admin.$section.create")->with(compact('section', 'courseId', 'categories', 'semesters'));
   }
   public function store(Request $request, $courseId)
   {
      $validator = Validator::make($request->all(), [
         'category_id'  => 'required|exists:categories,id',
         'semester_id'  => 'required|exists:semesters,id',
         'gender'       => 'nullable|in:male,female,other',
         'fee_head'     => 'required|string|max:255',
         'amount'       => 'required|numeric|min:0',
         'period_number' => 'required|integer|min:1',
      ]);
      if ($validator->fails()) {
         return response()->json(['errors' => $validator->errors()], 400);
      }
      $requestData = $request->only(['category_id', 'gender', 'fee_head', 'amount', 'period_number', 'semester_id']);
      $fees = new CourseFees();
      $fees->course_id = $courseId;
      $fees->category_id = $requestData['category_id'];
      $fees->semester_id = $requestData['semester_id'];
      $fees->gender = $requestData['gender'];
      $fees->fee_head = $requestData['fee_head'];
      $fees->amount = $requestData['amount'];
      $fees->period_number = $requestData['period_number'];
      $fees->added_by = Auth::user()->id;
      $fees->save();
      return response()->json(['status' => 1], 201);
   }
   public function edit($courseId, $id)
   {
      $section = $this->section;
      $courseFee = CourseFees::where('course_id', $courseId)
         ->where('id', $id)
         ->select(['id', 'category_id',  'amount', 'fee_head', 'period_number'])
         ->first();
      $categories = Category::get()->pluck('name', 'id');
      return view("admin.$section.edit")->with(compact('courseFee', 'section', 'categories', 'courseId'));
   }
   public function update(Request $request, $id)
   {
      $validator = Validator::make($request->all(), [
         'category_id'  => 'required|exists:categories,id',
         'gender'       => 'nullable|in:male,female,other',
         'fee_head'     => 'required|string|max:255',
         'amount'       => 'required|numeric|min:0',
         'period_number' => 'required|integer|min:1',
      ]);
      if ($validator->fails()) {
         return response()->json(['errors' => $validator->errors()], 400);
      }
      $requestData = $request->only(['category_id', 'gender', 'fee_head', 'amount', 'period_number']);
      $fees = CourseFees::find($id);
      $fees->category_id = $requestData['category_id'];
      $fees->gender = $requestData['gender'];
      $fees->fee_head = $requestData['fee_head'];
      $fees->amount = $requestData['amount'];
      $fees->period_number = $requestData['period_number'];
      $fees->added_by = Auth::user()->id;
      $fees->save();
      return response()->json(['status' => 1], 201);
   }
   public function doDelete($courseId, $id)
   {
      $section = $this->section;
      $courseFee = CourseFees::select(['id'])->find($id);
      return view("admin.$section.do_delete")->with(compact('section', 'courseFee', 'courseId'));
   }
   public function delete($courseId, $id)
   {
      $courseFee = CourseFees::find($id);
      $courseFee->delete();
      return response()->json(['status' => 1], 200);
   }
}
