namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCourseRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Defina a lógica de autorização aqui
    }

    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'schedule' => 'required|string|max:255',
            'day' => 'required|string|max:255',
            'fee' => 'required|numeric|min:0',
            'image_small' => 'nullable|image|max:2048', // 2MB Max
            'image_large' => 'nullable|image|max:2048',
            'active' => 'boolean',
            'canceled' => 'boolean',
        ];
    }
}
