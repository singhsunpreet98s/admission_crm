<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\MeritListFile;
use App\Models\MeritListStudent;
use App\Services\AdmissionService;
use App\Services\StudentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request as CustomRequest;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class StudentController extends Controller
{
   protected string $section;
   protected int $paginationLimit;
   protected AdmissionService $admissionService;
   protected StudentService $studentService;
   public function __construct(AdmissionService $admissionService, StudentService $studentService)
   {
      $this->section = "students";
      $this->paginationLimit = config('app.pagination_limit');
      $this->admissionService = $admissionService;
      $this->studentService = $studentService;
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
      $data = $this->studentService->getStudentFormData($request->get('res_no'));
      return view("$section.admission_from")->with(compact('section', 'data'));
   }
   public function saveForm(Request  $request)
   {
      $result = $this->admissionService->storeAdmission($request->all());

      if ($result['status']) {
         return response()->json($result, 201);
      } else {
         return response()->json($result, 500);
      }
   }
   public function uploadPhotoSignature(Request $request)
   {
      $user = Auth::user();
      if ($request->hasFile('profile_photo')) {
         $image = Image::make($request->file('profile_photo'))
            ->encode('jpg', 80); // force jpg, 80% quality to reduce size
         $photoPath = 'students/photos/' . uniqid() . '.jpg';
         Storage::disk('public')->put($photoPath, (string) $image);
         $user->photo_path = $photoPath;
      }
      if ($request->hasFile('signature')) {
         $sign = Image::make($request->file('signature'))
            ->encode('png', 80); // keep transparency for signatures
         $signPath = 'students/signatures/' . uniqid() . '.png';
         Storage::disk('public')->put($signPath, (string) $sign);
         $user->signature_path = $signPath;
      }
      $user->save();
      return response()->json([
         'success' => true,
         'photo_url' => $user->photo_path ? asset('storage/' . $user->photo_path) : null,
         'signature_url' => $user->signature_path ? asset('storage/' . $user->signature_path) : null,
      ]);
   }
   public function payment()
   {
      $data = [
         'admission_id' => '12121',
         'student_name' => Auth::user()->name,
         'course' => 'BCA',
         'amount_before_tax' => '5000',
         'tax' => '900',
         'amount_after_tax' => '5900'
      ];
      return view('students.payment')->with(compact('data'));
   }
   public function processPayment(Request $request)
   {
      $request->validate(
         [
            'res_no' => 'required|string|exists:merit_list_students,res_no',
         ]
      );
   }
   public function payslip(Request $request)
   {
      $request->validate(
         [
            'res_no' => 'required|string|exists:merit_list_students,res_no',
         ]
      );
   }
}
