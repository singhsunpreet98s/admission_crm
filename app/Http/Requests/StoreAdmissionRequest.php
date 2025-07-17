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
            'ureg_no' => 'required|string',
            'list_type' => 'required|string',
            'session_yr' => 'required|string',
            'quota_type' => 'nullable|string',
            'student_name' => 'required|string',
            'father_name' => 'required|string',
            'mother_name' => 'required|string',
            'dob' => 'required|date',
            'gender' => 'required|string|in:MALE,FEMALE,OTHER',
            'category' => 'required|string',
            'relegion' => 'required|string',
            'aadhar' => 'required|digits:12',
            'ews' => 'required|in:Yes,No',
            'ews_certificate' => 'nullable|string',
            'reservation' => 'required|string',
            'reservation_certificate' => 'nullable|string',
            'abc_id' => 'nullable|string',
            'caddress' => 'required|string',
            'cstate' => 'required|string',
            'cdistrict' => 'required|string',
            'cpin' => 'required|digits:6',
            'phone' => 'required|digits:10',
            'email' => 'required|email',
            'course_name' => 'required|string',
            'department' => 'required|string',
            'ac_year' => 'required|string',
            'sub_name' => 'nullable|string',
            'sub2' => 'nullable|string',
            'sub3' => 'nullable|string',
            'll' => 'nullable|string',
            'sec' => 'nullable|string',
            'vac' => 'nullable|string',
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
            'marksheet12' => 'required|string',
            'certificate12' => 'required|string',
            'clc' => 'required|string',
            'migration12' => 'nullable|string',
            'baccount_name' => 'required|string',
            'baccount_no' => 'required|string',
            'baccount_noc' => 'required|string',
            'baccount_ifsc' => 'required|string',
            'baccount_bname' => 'required|string',
            'declaration' => 'required|in:YES',
        ];
    }
}
