<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Imports\MeritListDataImport;
use App\Models\Category;
use App\Models\MeritListFile;
use App\Models\MeritListStudent;
use App\Models\Course;
use App\Models\Semester;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request as CustomRequest;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Collection;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Carbon\Carbon;

class MeritListController extends Controller
{
   protected string $section;
   protected int $paginationLimit;
   public function __construct()
   {
      $this->section = "meritList";
      $this->paginationLimit = config('app.pagination_limit');
   }
   public function index()
   {
      $section = $this->section;
      $meritList = MeritListFile::select(['id', 'file_name'])->paginate($this->paginationLimit);
      return View::make('admin.' . $this->section . '.' . (CustomRequest::ajax() ? 'table' : 'index'))->with(compact('section', 'meritList'));
   }
   public function create(Request $request)
   {
      $section = $this->section;
      $selectedProgram = null;
      $selectedListNumber = null;
      $semesters = [];
      $courses = [];
      if ($request->has('list_number')) {
         $selectedListNumber = $request->get('list_number');
      }
      $isCustomRequest = false;
      if ($request->has('program')) {
         $selectedProgram = $request->get('program');
         $courses = Course::where('program_name', $selectedProgram)->get()->pluck('name', 'id');
         $isCustomRequest = true;
      }
      $selectedCourse = null;
      if ($request->has('course_id')) {
         $selectedCourse = $request->get('course_id');
         $semesters = Semester::where('course_id', $selectedCourse)
            ->orderBy('name')
            ->pluck('name', 'id')
            ->take(1);
         $isCustomRequest = true;
      }
      return  View::make('admin.' . $this->section . '.' . ($isCustomRequest ? 'create_partial' : 'create'))->with(compact('section', 'selectedProgram', 'selectedCourse', 'selectedListNumber', 'semesters', 'courses'));
   }
   public function store(Request $request)
   {
      $validator = Validator::make($request->all(), [
         'program' => 'required|string',
         'course_id' => 'required|string',
         'semester_id' => 'required|string',
         'list_number' => 'required|int|min:1|max:5',
         'file' => 'required|file|mimes:csv,xls,xlsx',
      ]);
      if ($validator->fails()) {
         return response()->json(['errors' => $validator->errors()], 400);
      }
      $section = $this->section;

      try {
         $file = $request->file('file');
         $program = $request->get('program');
         $semesterId = $request->get('semester_id');
         $courseId = $request->get('course_id');
         $sessionDates = calculateSessionDates($program);
         $sessionName = calculateSession($program);
         $originalName = $file->getClientOriginalName();
         $import = new MeritListDataImport();
         Excel::import($import, $file);
         $rows = $import->getRowsArray();
         if (!isset($rows)) {
            return response()->json(['errors' => ['file' => 'invalid file']], 400);
         }
         beginTransaction();
         $meritFile = new MeritListFile();
         $meritFile->file_name = $originalName;
         $meritFile->file_path = $file->storeAs('imports', $originalName, 'public');
         $meritFile->size =  $file->getSize();
         $meritFile->uploaded_by = Auth::user()->id;
         $meritFile->session_start = $sessionDates['start_date'];
         $meritFile->session_end = $sessionDates['end_date'];
         $meritFile->program_name = $program;
         $meritFile->list_number = $request->get('list_number');
         $meritFile->session_name = $sessionName;
         $meritFile->course_id = $courseId;
         $meritFile->semester_id = $semesterId;
         $meritFile->save();
         $id = $meritFile->id;
         foreach ($rows as $row) {
            $student = new MeritListStudent();
            $student->file_id            = $id;
            $student->res_no             = $row[0];
            $student->application_id     = $row[1];
            $student->student_name       = $row[2];
            $student->fathers_name       = $row[3];
            $dobRaw = $row[4];

            try {
               if (is_numeric($dobRaw)) {
                  $dob = Date::excelToDateTimeObject($dobRaw)->format('d-m-Y');
               } else {
                  $dob = Carbon::parse($dobRaw)->format('d-m-Y');
               }
            } catch (\Exception $e) {
               $dob = null;
            }
            $student->dob = $dob;
            $student->gender             = $row[5];
            $student->category           = $row[6];
            $student->domincile          = $row[7];
            $student->percentage         = $row[8];
            $student->faculty            = $row[9];
            $student->alloted_category   = $row[10];
            $student->college_name       = $row[11];
            $student->college_code       = $row[12];
            $student->major_subjects     = $row[13];
            $student->admission_status   = $row[14];
            $admissionDateRaw = $row[15];

            try {
               if (is_numeric($admissionDateRaw)) {
                  $admissionDate = Date::excelToDateTimeObject($admissionDateRaw)->format('d-m-Y');
               } else {
                  $admissionDate = Carbon::parse($admissionDateRaw)->format('d-m-Y');
               }
            } catch (\Exception $e) {
               $admissionDate = null;
            }
            $student->admission_date     = $admissionDate;
            $student->minor_subjects     = $row[16];
            $student->idc                = $row[17];
            $student->mil                = $row[18];
            $student->majorsec_subjects  = $row[19];
            $student->vac                = $row[20];
            $student->save();
         }
         commitTransaction();
      } catch (\Exception $ex) {
         dd($ex);
         return redirect()->route("admin.$section.create")->with('error', 'You are not authorized to access this page.');
      }
      return redirect()->route("admin.$section.index")->with('success', 'Merit List uploaded successfullt');
   }

   public function doDelete($id)
   {
      $meritListFile = MeritListFile::where('id', $id)->select(['id', 'file_name'])->first();
      $section = $this->section;
      return view("admin.$section.do_delete")->with(compact('section', 'meritListFile'));
   }
   public function delete($id)
   {
      $meritListFile = MeritListFile::find($id);
      $deletedStudentsCount = MeritListStudent::where('file_id', $meritListFile->id)->delete();
      if ($deletedStudentsCount > 0) {
         $meritListFile->delete();
         return response()->json(['status' => 1], 200);
      }
      return response()->json([
         'status' => 0,
         'message' => 'No related students found. File not deleted.'
      ], 400);
   }
}
