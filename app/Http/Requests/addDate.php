<?php

namespace App\Http\Requests;

use App\Models\Date;
use App\Models\Event;
use App\Models\EventDate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Carbon\Carbon;
class addDate extends FormRequest
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
            'fecha' => [
                'required',
                'date',
                'after:today',
                function($value, $message) {
                    // Verifica que no haya duplicados de fecha y hora
                    $findDate = Date::where('fecha', $value)->where('hora', $this->hora)->first();
                    if($findDate){
                        $eventDateExists = EventDate::where('date_id', $findDate->id)
                            ->where('event_id', $this->id_event)
                            ->exists();
                        if ($eventDateExists) {
                            $message('La combinación de fecha y hora ya existe para este evento.');
                        }
                    }
                }
            ],
            'hora' => 'required|date_format:H:i',
            'id_event' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'fecha.required' => 'La fecha es obligatoria.',
            'fecha.date' => 'La fecha debe ser una fecha válida.',
            'fecha.after_or_equal' => 'La fecha debe ser igual o posterior a hoy.',
            'hora.required' => 'La hora es obligatoria.',
            'hora.date_format' => 'La hora debe estar en formato HH:MM.',
        ];
    }
}
