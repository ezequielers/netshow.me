<?php

namespace App\Http\Requests;

use App\Contact;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreContactRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {

        return [
            'name'    => 'required|min:2',
            'email'   => 'required|email',
            'phone'   => 'required',
            'message' => 'required',
            'visitor' => 'ip',
            'file'    => 'required|file|max:500|mimes:pdf,doc,docx,odt,txt',
        ];
    }
}
