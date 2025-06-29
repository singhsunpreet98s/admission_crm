<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\MeritListStudent;
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
   public function verifyApplicationStatus(Request $request)
   {
      $request->validate(
         [
            'res_no' => 'required|string|exists:merit_list_students,res_no'
         ],
         [
            'res_no.exists' => 'The given registration number does not exist in our records.',
         ]
      );
      $section = $this->section;
      $registration = MeritListStudent::where('res_no', $request->get('res_no'))
         ->select(['id', 'res_no', 'student_name', 'fathers_name', 'domincile', 'college_name', 'percentage'])
         ->first();
      if (!isset($registration)) {
         return redirect(route("$section.verifyApplicationStatus"))->with('error', 'Unable to find Registration');
      }
      return view("$section.view_application")->with(compact('section', 'registration'));
   }
}
