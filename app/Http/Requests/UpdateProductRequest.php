<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $rules = [
            'name' => 'required|min:3',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|min:10|max:100',
            'image' => 'required|array',
            'size' => 'required',
            'date_product' => 'required|date',
            'stock' => 'required|numeric',

        ];
        if (request()->hasFile('image')) {
            $images = request()->file('image');

            foreach ($images as $key => $image) {
                $rules["image.{$key}"] = $this->getValidationRule("image.{$key}");
            }
        }
        return $rules;
    }
    public function getValidationRule(String $key): string
    {
        if (request()->hasFile($key)) {
            return "required|image|mimes:jpg,jpeg,png|max:1024";
        }
        return "required|string";
    }
}
