<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AcadmicSession extends Model
{
   use HasFactory;
   protected $table = 'acadmic_sessions';
   protected $fillable = [
      'titie',
      'from_date',
      'to_date'
   ];
   protected static function booted()
   {
      static::creating(function ($session) {
         $session->title = self::makeTitle($session->from_date, $session->to_date);
      });

      static::updating(function ($session) {
         $session->title = self::makeTitle($session->from_date, $session->to_date);
      });
   }
   protected static function makeTitle($from, $to)
   {
      $fromYear = date('Y', strtotime($from));
      $toYear = date('Y', strtotime($to));
      return "$fromYear - $toYear";
   }
}
