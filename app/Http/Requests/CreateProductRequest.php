<?php

namespace App\Http\Requests;

use App\Product;
use App\Student;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;

class CreateProductRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'code' => 'required|unique:products,code',
            'price' => 'required',
            'expiration_date' => 'required|date_format:Y-m-d',
            'shipment' => 'required|boolean',
            'stock' => 'required|boolean'
        ];
    }

    public function createProduct()
    {
        DB::transaction(function () {
            $student = Product::create([
                'name' => $this->name,
                'code' => $this->code,
                'price' => $this->price,
                'expiration_date' => $this->expiration_date,
                'shipment' => $this->shipment ?? 0,
                'stock' => $this->stock ?? 0,
            ]);

            $student->categories()->attach($this->categories ?? []);
        });
    }

    public function messages()
    {
        return [
            'name.required' => 'El campo nombre es obligatorio',
            'code.required' => 'El campo codigo es obligatorio',
            'price.required' => 'El campo precio es obligatorio',
            'expiration_date.required' => 'El valor introducido no es una fecha válida. El formato es: "Y-m-d"',
            'shipment.required' => 'El campo envío es obligatorio',
            'stock.required' => 'El campo stock es obligatorio',
        ];
    }
}