<?php

namespace App\Services;

use App\Models\Category;
use App\Models\Course;
use App\Models\MeritListStudent;
use App\Models\Semester;
use App\Models\Subject;
use Intervention\Image\Exception\NotFoundException;

class StudentService
{
   private function getCatgory(string $category): array
   {
      if (empty($category) || $category === "") return Category::pluck('name', 'id');
      $categories = Category::where('name', $category)->pluck('name', 'id');
      if (!empty($categories)) return [];
      return $this->getCatgory("");
   }

   private function getSubjects(string $subject, int $semesterId): array
   {
      if (empty($subject) || $subject === "") return Subject::where('semester_id', $semesterId)->pluck('name', 'id');
      $subjects = Subject::where('name', $subject)->where('semester_id', $semesterId)->pluck('name', 'id');
      if (!empty($subjects)) return [];
      return $this->getSubjects("", $semesterId);
   }

   private function getCourse(string $course)
   {
      if (empty($course) || $course === "") throw new NotFoundException("Course Not found");
      return Course::where('name', $course)->first();
   }

   private function getSemester(string $semester, int $courseId)
   {
      if (empty($semester) || $semester === "") throw new NotFoundException("Semester Not found");
      return Semester::where('course_id', $courseId)->where('name', $semester)->first();
   }

   public function getStudentFormData(string $resNo): array
   {
      $studentRegistrationData = MeritListStudent::where('res_no', $resNo)
         ->with('file')->first();
      $course = Course::where('id', $studentRegistrationData->file->course_id)
         ->select('id', 'name', 'program_name')->first();
      $semester = Semester::where('id', $studentRegistrationData->file->semester_id)
         ->select('id', 'name')->first();
      return [
         'merit_list_student_id' => $studentRegistrationData->id,
         'merit_list_id' => $studentRegistrationData->file->id,
         'student_name' => $studentRegistrationData->student_name,
         'fathers_name' => $studentRegistrationData->fathers_name,
         'mother_name' => '',
         'ac_year' => date("Y"),
         'student_category' => $studentRegistrationData->category,
         'categories' => $this->getCatgory($studentRegistrationData->category),
         'semester' => $semester,
         'courses' => [$course],
         'gender' => $studentRegistrationData->gender,
         'email' => $studentRegistrationData->email,
         'program_name' => $course->program_name,
         'course' => $course,
         'dob' => $studentRegistrationData->dob,
         'idc' => $this->getSubjects($studentRegistrationData->idc, $semester->id),
         'major_subjects' => $this->getSubjects($studentRegistrationData->major_subjects, $semester->id),
         'minor_subjects' => $this->getSubjects($studentRegistrationData->minor_subjects, $semester->id),
         'mil' => $this->getSubjects($studentRegistrationData->mil, $semester->id),
         'vac' => $this->getSubjects($studentRegistrationData->vac, $semester->id),
         'major_sec_subjects' => $this->getSubjects($studentRegistrationData->majorsec_subjects, $semester->id),
         'last_15_years' => getLast15Years($studentRegistrationData->file->session_start),
         'education_boards' => getIndianEducationBoards()
      ];
   }
}
