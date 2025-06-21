<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    protected $section;
    public function __construct()
    {
        $this->section = "admin";
    }
    public function index()
    {
        $section = $this->section;
        return view('admin.index')->with(compact('section'));
    }
}
