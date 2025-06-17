namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCourseRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Defina a lógica de autorização aqui
    }

    public function rules()
    {
        return [
            'title' => 'string|max:255',
            'description' => 'string',
            'schedule' => 'string|max:255',
            'day' => 'string|max:255',
            'fee' => 'numeric|min:0',
            'image_small' => 'nullable|image|max:2048', // 2MB Max
            'image_large' => 'nullable|image|max:2048',
            'active' => 'boolean',
            'canceled' => 'boolean',
        ];
    }
}
