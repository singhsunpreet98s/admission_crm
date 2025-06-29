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
