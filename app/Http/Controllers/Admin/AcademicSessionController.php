<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AcadmicSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request as CustomRequest;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;

class AcademicSessionController extends Controller
{
   protected string $section;
   protected int $paginationLimit;
   public function __construct()
   {
      $this->section = "academicSession";
      $this->paginationLimit = config('app.pagination_limit');
   }
   public function index()
   {
      $section = $this->section;
      $academicSessions = AcadmicSession::select(['id', 'title', 'from_date', 'to_date'])->paginate($this->paginationLimit);
      return View::make('admin.' . $this->section . '.' . (CustomRequest::ajax() ? 'table' : 'index'))->with(compact('section', 'academicSessions'));
   }
   public function create()
   {
      $section = $this->section;
      return view("admin.$section.create")->with(compact('section'));
   }
   public function store(Request $request)
   {
      $validator = Validator::make($request->all(), [
         'from_date' => 'required|date',
         'to_date' => 'required|date',
      ]);
      if ($validator->fails()) {
         return response()->json(['errors' => $validator->errors()], 400);
      }
      $requestData = $request->only(['from_date', 'to_date']);
      $acadmicSession = new AcadmicSession();
      $acadmicSession->from_date = $requestData['from_date'];
      $acadmicSession->to_date = $requestData['to_date'];
      $acadmicSession->save();
      return response()->json(['status' => 1], 201);
   }
   public function edit($id)
   {
      $section = $this->section;
      $academicSession = AcadmicSession::select(['id', 'from_date', 'to_date'])->find($id);
      return view("admin.$section.edit")->with(compact('academicSession', 'section'));
   }
   public function update(Request $request, $id)
   {
      $validator = Validator::make($request->all(), [
         'from_date' => 'required|date',
         'to_date' => 'required|date',
      ]);
      if ($validator->fails()) {
         return response()->json(['errors' => $validator->errors()], 400);
      }
      $requestData = $request->only(['from_date', 'to_date']);
      $acadmicSession = AcadmicSession::find($id);
      $acadmicSession->from_date = $requestData['from_date'];
      $acadmicSession->to_date = $requestData['to_date'];
      $acadmicSession->save();
      return response()->json(['status' => 1], 201);
   }
   public function doDelete($id)
   {
      $academicSession = AcadmicSession::where('id', $id)->select(['id', 'title'])->first();
      $section = $this->section;
      return view("admin.$section.do_delete")->with(compact('section', 'academicSession'));
   }
   public function delete($id)
   {
      $acadmicSession = AcadmicSession::find($id);
      $acadmicSession->delete();
      return response()->json(['status' => 1], 200);
   }
}
