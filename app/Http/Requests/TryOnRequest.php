<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Carbon\Carbon;

class TryOnRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'customer_id' => 'nullable',
            'lens_id'     => 'required|exists:lenses,id',
            'shop_id'     => 'nullable|exists:shopkeepers,id',
            'image_url'   => 'nullable|url',
            'status'      => 'nullable|in:pending,completed,failed',
            'tryon_time'  => 'nullable',
        ];
    }

    // ← YE ADD KARO
    protected function prepareForValidation(): void
    {
        if ($this->tryon_time) {
            $this->merge([
                'tryon_time' => Carbon::parse($this->tryon_time)->format('Y-m-d H:i:s'),
            ]);
        }
    }
}