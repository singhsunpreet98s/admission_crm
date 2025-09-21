<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAdmissionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'ureg_no' => 'nullable|string',
            'list_type' => 'required|string',
            'session_yr' => 'required|string',
            'quota_type' => 'nullable|string',
            'semester_id' => 'required|integer',
            'merit_list_id' => 'required|integer',
            'merit_list_student_id' => 'required|integer',

            'student_name' => 'required|string',
            'fathers_name' => 'required|string',
            'mothers_name' => 'required|string',
            'dob' => 'required|date',
            'gender' => 'required|string|in:MALE,FEMALE,OTHER',
            'category' => 'required',
            'relegion' => 'required|string',
            'aadhar' => 'required|digits:12',
            'ews' => 'required|in:Yes,No',
            'ews_certificate' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:100',
            'reservation' => 'required|string',
            'reservation_certificate' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:100',
            'abc_id' => 'nullable|string',

            'caddress' => 'required|string',
            'cstate' => 'required|string',
            'cdistrict' => 'required|string',
            'cpin' => 'required|digits:6',
            'phone' => 'required|digits:10',
            'email' => 'required|email',

            'profile_photo' => 'required|image|max:100',
            'signature' => 'required|image|max:100',

            'course_id' => 'required|integer',
            'program_name' => 'required|string',
            'ac_year' => 'required|string',
            'major_subject_id' => 'required|integer',
            'minor_subject_id' => 'required|integer',
            'idc' => 'required',
            'aec' => 'required',
            'sec' => 'required',
            'vac' => 'required',

            'PassYear10' => 'required|string',
            'Board10' => 'required|string',
            'RollCode10' => 'required|string',
            'RollNo10' => 'required|string',
            'MaxMarks10' => 'required|numeric',
            'MarksObt10' => 'required|numeric',
            'MarksObt10Per' => 'nullable|numeric',

            'PassYear12' => 'required|string',
            'Board12' => 'required|string',
            'xii_stream' => 'required|string',
            'RollCode12' => 'required|string',
            'RollNo12' => 'required|string',
            'MaxMarks12' => 'required|numeric',
            'MarksObt12' => 'required|numeric',
            'MarksObt12Per' => 'nullable|numeric',

            'marksheet12' => 'required|file|mimes:pdf,jpg,jpeg,png|max:100',
            'certificate12' => 'required|file|mimes:pdf,jpg,jpeg,png|max:100',
            'clc' => 'required|file|mimes:pdf,jpg,jpeg,png|max:100',
            'migration12' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:100',

            'baccount_name' => 'required|string',
            'baccount_no' => 'required|string',
            'baccount_noc' => 'required|string|same:baccount_no',
            'baccount_ifsc' => 'required|string',
            'baccount_bname' => 'required|string',
            'declaration' => 'required|in:YES',
        ];
    }
}
