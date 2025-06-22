<?php

use App\Models\ErrorLogs;
use Illuminate\Support\Facades\DB;
use Mockery\Matcher\Any;

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
