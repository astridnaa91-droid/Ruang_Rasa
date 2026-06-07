<?php

namespace App\Http\Requests;

use App\Models\Table;
use Illuminate\Foundation\Http\FormRequest;

class StoreReservationRequest extends FormRequest
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
            'table_id' => ['required', 'exists:tables,id'],
            'reservation_date' => ['required', 'date', 'after_or_equal:today'],
            'reservation_time' => ['required'],
            'guest_count' => [
                'required',
                'integer',
                'min:1',
                function ($attribute, $value, $fail) {
                    $table = Table::find($this->table_id);
                    if ($table && $value > $table->capacity) {
                        $fail("Jumlah orang tidak boleh melebihi kapasitas meja ({$table->capacity} orang).");
                    }
                },
            ],
        ];
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'table_id.required' => 'Pilihlah meja terlebih dahulu.',
            'table_id.exists' => 'Meja yang dipilih tidak valid.',
            'reservation_date.required' => 'Tanggal reservasi wajib diisi.',
            'reservation_date.date' => 'Format tanggal tidak valid.',
            'reservation_date.after_or_equal' => 'Tanggal reservasi tidak boleh di masa lalu.',
            'reservation_time.required' => 'Jam reservasi wajib diisi.',
            'guest_count.required' => 'Jumlah orang wajib diisi.',
            'guest_count.integer' => 'Jumlah orang harus berupa angka.',
            'guest_count.min' => 'Jumlah orang minimal 1 orang.',
        ];
    }
}
