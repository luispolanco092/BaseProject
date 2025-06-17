php artisan make:controller ClimaController
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
 
class ClimaController extends Controller
{
    public function index()
    {
        return view('clima');
    }
}
