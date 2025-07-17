<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAdmissionRequest;
use App\Models\Category;
use App\Models\MeritListFile;
use App\Models\MeritListStudent;
use App\Services\AdmissionService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request as CustomRequest;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
   protected string $section;
   protected int $paginationLimit;
   public function __construct()
   {
      $this->section = "students";
      $this->paginationLimit = config('app.pagination_limit');
   }
   public function index()
   {
      $section = $this->section;
      $categories = Category::select(['id', 'name'])->paginate($this->paginationLimit);
      return View::make('admin.' . $this->section . '.' . (CustomRequest::ajax() ? 'table' : 'index'))->with(compact('section', 'categories'));
   }
   public function checkApplicationStatus()
   {
      $section = $this->section;
      return view("$section.check_application_status")->with(compact('section'));
   }
   public function demo()
   {
      $section = $this->section;
      return view("$section.payment_fail")->with(compact('section'));
   }
   public function verifyApplicationStatus(Request $request)
   {
      $request->validate(
         [
            'res_no' => 'required|string|exists:merit_list_students,res_no',
         ],
         [
            'res_no.required' => 'Please enter your Reference / Registration Number.',
            'res_no.exists' => 'You are not alloted for this college.',
         ]
      );
      $section = $this->section;
      $registration = MeritListStudent::where('res_no', $request->get('res_no'))
         ->select(['id', 'res_no', 'student_name', 'fathers_name', 'domincile', 'mil', 'college_name', 'percentage', 'faculty'])
         ->first();

      if (!$registration) {
         return redirect()
            ->route("$section.checkApplicationStatus")
            ->with('error', 'Unable to find Registration.');
      }
      $meritListFile = MeritListFile::where('id', $registration->id)->with(['course'])->first();
      return view("$section.check_application_status")->with(compact('section', 'registration', 'meritListFile'));
   }
   public function fillAdmissionForm(Request $request)
   {
      $request->validate(
         [
            'res_no' => 'required|string|exists:merit_list_students,res_no',
         ],
         [
            'res_no.required' => 'Please enter your Reference / Registration Number.',
            'res_no.exists' => 'You are not alloted for this college.',
         ]
      );
      $section = $this->section;
      $registration = MeritListStudent::where('res_no', $request->get('res_no'))
         ->select(['id', 'major_subjects', 'minor_subjects', 'mil', 'majorsec_subjects', 'vac', 'res_no', 'idc', 'student_name', 'fathers_name', 'domincile', 'college_name', 'file_id', 'percentage', 'category', 'gender'])
         ->first();
      $meritListFile = MeritListFile::where('id', $registration->id)->with(['course', 'semester'])->first();
      $last15years = getLast15Years($meritListFile->session_start);
      $educationBoards = getIndianEducationBoards();
      return view("$section.admission_from")->with(compact('section', 'registration', 'meritListFile', 'last15years', 'educationBoards'));
   }
   public function saveForm(StoreAdmissionRequest  $request, AdmissionService $admissionService)
   {
      $result = $admissionService->storeAdmission($request->all());

      if ($result['status']) {
         return response()->json($result, 201);
      } else {
         return response()->json($result, 500);
      }
   }
}
