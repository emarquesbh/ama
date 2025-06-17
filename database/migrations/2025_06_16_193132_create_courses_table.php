use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('schedule');
            $table->string('day');
            $table->decimal('fee', 8, 2);
            $table->string('image_small')->nullable();
            $table->string('image_large')->nullable();
            $table->boolean('active')->default(true);
            $table->boolean('canceled')->default(false);
            $table->timestamps(); // created_at, updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('courses');
    }
}

