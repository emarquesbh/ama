namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'schedule',
        'day',
        'fee',
        'image_small',
        'image_large',
        'active',
        'canceled'
    ];

    public function turmas()
    {
        return $this->hasMany(Turma::class);
    }

    // se usar uma tabela média para galeria
    public function media()
    {
        return $this->morphMany(Media::class, 'mediable');
    }
}
