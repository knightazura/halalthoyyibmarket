<?php

namespace App\Http\Requests\Customer;

use App\Contracts\RequestValidatorInterface;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCustomer extends FormRequest implements RequestValidatorInterface
{
    /**
     * The route to redirect to if validation fails.
     *
     * @var string
     */
    protected $redirectRoute = 'experiment.mn:customer.show-customer';

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // change this fixed value with real implementation
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user_id' => 'required|uuid|unique:Sindria\Models\Customer,user_id|bail',
            'nama_depan' => 'required|min:2',
            'nama_belakang' => 'nullable|min:2'
        ];
    }

    public function messages()
    {
        return [
            'user_id.required' => 'Sesi ini belum memiliki akun terdaftar!',
            'nama_depan.required' => 'Nama depan tidak boleh kosong',
            'nama_depan.min' => 'Minimal :min karakter',
        ];
    }
}
