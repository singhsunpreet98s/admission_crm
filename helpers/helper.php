<?php

use App\Models\ErrorLogs;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

function normalizeSection(string $section): string
{
   return str_replace('.', '_', $section);
}
function beginTransaction()
{
   DB::beginTransaction();
}
function commitTransaction()
{
   DB::commit();
}
function rollbackTransaction()
{
   DB::rollBack();
}
function logError(string $module, string $message, $data)
{
   try {
      $error = new ErrorLogs();
      $error->module = $module;
      $error->message = $message;
      $error->data = $data;
      $error->save();
   } catch (Exception $e) {
   }
}
function getPrograms()
{
   return [
      'intermediate' => 'Intermediate',
      'graduation' => 'Graduation',
      'post_graduation' => 'Post Graduation'
   ];
}
function calculateSession(string | null $program)
{
   if (empty($program)) {
      return "No Pogram Selected";
   }
   $durations = [
      'intermediate'     => 1,
      'graduation'       => 3,
      'post_graduation'  => 2,
   ];

   $labels = [
      'intermediate'     => 'Intermediate',
      'graduation'       => 'Graduation',
      'post_graduation'  => 'Post Graduation',
   ];

   $program = strtolower($program);

   if (!array_key_exists($program, $durations)) {
      return "Invalid Program Selected";
   }

   $currentYear = date('Y');
   $endYear = $currentYear + $durations[$program];

   return $labels[$program] . " Session: {$currentYear} - {$endYear}";
}
function calculateSessionDates(?string $program): array|string
{
   if (empty($program)) {
      throw new \InvalidArgumentException("No Program Selected");
   }

   $durations = [
      'intermediate'     => 1,
      'graduation'       => 3,
      'post_graduation'  => 2,
   ];

   $labels = [
      'intermediate'     => 'Intermediate',
      'graduation'       => 'Graduation',
      'post_graduation'  => 'Post Graduation',
   ];

   $program = strtolower(trim($program));

   if (!array_key_exists($program, $durations)) {
      throw new \InvalidArgumentException("Wrong Program Selected");
   }

   $currentYear = (int) date('Y');
   $currentMonth = (int) date('n');

   // Financial year starts on April 1st
   $startYear = $currentMonth >= 4 ? $currentYear : $currentYear - 1;
   $endYear = $startYear + $durations[$program];

   $startDate = Carbon::createFromDate($startYear, 4, 1)->format('Y-m-d');
   $endDate = Carbon::createFromDate($endYear, 3, 31)->format('Y-m-d');

   return [
      'start_date' => $startDate, // e.g., 2025-04-01
      'end_date'   => $endDate,   // e.g., 2028-03-31
      'program'    => $labels[$program],
   ];
}
function getListTypes(): array
{
   return [1 => '1st List', 2 => '2nd List', 3 => '3rd List'];
}
function getLast15Years($dateString)
{
   $year = date('Y', strtotime($dateString));
   $years = [];
   for ($i = 0; $i < 15; $i++) {
      $years[] = (int)$year - $i;
   }
   return $years;
}
function getIndianEducationBoards()
{
   return [
      'CBSE' => 'Central Board of Secondary Education',
      'ICSE' => 'Indian Certificate of Secondary Education',
      'ISC'  => 'Indian School Certificate',
      'NIOS' => 'National Institute of Open Schooling',

      // State Boards
      'AHSEC' => 'Assam Higher Secondary Education Council',
      'BSEAP' => 'Board of Secondary Education, Andhra Pradesh',
      'CHSE Odisha' => 'Council of Higher Secondary Education, Odisha',
      'CGBSE' => 'Chhattisgarh Board of Secondary Education',
      'GBSHSE' => 'Goa Board of Secondary and Higher Secondary Education',
      'GSEB' => 'Gujarat Secondary and Higher Secondary Education Board',
      'HBSE' => 'Board of School Education Haryana',
      'HPBOSE' => 'Himachal Pradesh Board of School Education',
      'JAC' => 'Jharkhand Academic Council',
      'JKBOSE' => 'Jammu and Kashmir Board of School Education',
      'KSEEB' => 'Karnataka Secondary Education Examination Board',
      'KBPE' => 'Kerala Board of Public Examinations',
      'MPBSE' => 'Madhya Pradesh Board of Secondary Education',
      'MSBSHSE' => 'Maharashtra State Board of Secondary and Higher Secondary Education',
      'MBSE' => 'Mizoram Board of School Education',
      'NBSE' => 'Nagaland Board of School Education',
      'PSEB' => 'Punjab School Education Board',
      'RBSE' => 'Board of Secondary Education, Rajasthan',
      'TNBSE' => 'Tamil Nadu Board of Secondary Education',
      'TBSE' => 'Tripura Board of Secondary Education',
      'TSBIE' => 'Telangana State Board of Intermediate Education',
      'UBSE' => 'Uttarakhand Board of School Education',
      'UPMSP' => 'Uttar Pradesh Madhyamik Shiksha Parishad',
      'WBCHSE' => 'West Bengal Council of Higher Secondary Education',
      'WBBSE' => 'West Bengal Board of Secondary Education'
   ];
}
