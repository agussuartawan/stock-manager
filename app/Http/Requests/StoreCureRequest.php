<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCureRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'cure_type_id' => ['required'],
            'cure_unit_id' => ['required'],
            'rack_id' => ['required'],
            'code' => ['unique:cures,code'],
            'name' => ['required', 'max:255'],
            'minimum_stock' => ['required'],
            'purchase_price' => ['required'],
            'selling_price' => ['required']
        ];
    }

    public function messages()
    {
        return [
            'cure_type_id.required' => 'Jenis tidak boleh kosong',
            'cure_unit_id' => 'Unit tidak boleh kosong',
            'rack_id.required' => 'Rak tidak boleh kosong',
            'code.unique' => 'Kode telah digunakan',
            'name.required' => 'Nama tidak boleh kosong',
            'name.max' => 'Nama tidak boleh melebihi 255 karakter',
            'minimum_stock' => 'Stok minimum tidak boleh kosong',
            'purchase_price' => 'Harga beli tidak boleh kosong',
            'selling_price' => 'Harga jual tidak boleh kosong'
        ];
    }
}
