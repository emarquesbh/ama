// app/Models/Turma.php

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turma extends Model
{
    use HasFactory;

    /**
     * Os atributos que são atribuíveis em massa.
     *
     * @var array
     */
    protected $fillable = [
        'course_id',
        'name',
        'day_of_week',
        'start_time',
        'end_time',
        'max_students',
        'active',
        'created_by',
        'updated_by',
    ];

    /**
     * Os atributos que devem ser convertidos.
     *
     * @var array
     */
    protected $casts = [
        'start_time' => 'datetime:H:i',
        'end_time' => 'datetime:H:i',
        'active' => 'boolean',
    ];

    /**
     * Obtém o curso ao qual esta turma pertence.
     */
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    /**
     * Obtém o usuário que criou esta turma.
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * Obtém o usuário que atualizou esta turma.
     */
    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    /**
     * Retorna o dia da semana formatado em português.
     */
    public function getDayOfWeekFormattedAttribute()
    {
        $dias = [
            'monday' => 'Segunda-feira',
            'tuesday' => 'Terça-feira',
            'wednesday' => 'Quarta-feira',
            'thursday' => 'Quinta-feira',
            'friday' => 'Sexta-feira',
            'saturday' => 'Sábado',
            'sunday' => 'Domingo',
        ];

        return $dias[strtolower($this->day_of_week)] ?? $this->day_of_week;
    }

    /**
     * Retorna o horário formatado (início - fim).
     */
    public function getScheduleFormattedAttribute()
    {
        return $this->start_time->format('H:i') . ' - ' . $this->end_time->format('H:i');
    }
}