namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function index()
    {
        return view('main');
    }

    public function checklogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('successlogin');
        } else {
            return back()->withInput()->withErrors(['email' => 'Invalid credentials']);
        }
    }

    public function successlogin()
    {
        return view('successlogin');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('main');
    }
}