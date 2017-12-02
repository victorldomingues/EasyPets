<?php

namespace App\Http\Controllers\Manager\Employees;

use App\Http\Controllers\Controller;
use App\Http\Requests\Manager\Employees\EmployeeRequest;
use Illuminate\Http\Request;
use App\Models\Manager;
use App\Models\User;
use DateTime;
use Mail;
use Illuminate\Support\Facades\Log;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use DB;
use App\Helpers\GuidHelper;
use App\Repositories\Store\EmployeesRepository;
// Import the Postmark Client Class:
use Postmark\PostmarkClient;

class EmployeesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $managers = DB::table('managers')
        ->join('users', 'users.id', '=', 'managers.id')
        ->select('managers.Role','users.Name','users.Email','users.Password','users.Type','users.Cpf','users.Id')
        ->orderBy('users.created_at', 'desc')
        ->get();

        return view('manager.employees.employees', ['managers' => $managers],[]);
    }

    // public function index()
    // {
    //     $customers = Productcolor::orderBy('created_at', 'desc')->paginate(10);
    //     return view('manager.products.colors.index',['manager.products.colors' => $customers]);
    // }

    public function create()
    {
        return view('manager.employees.employees-new');
    }
  
    public function store(EmployeeRequest $request)
    {
        $password  =  GuidHelper::short();
        $user = new User;
        $user->name              = $request->name;
        $user->email             = $request->email;
        $user->password          = Hash::make($password);
        $user->type              = 0;
        $user->cpf               = $request->cpf;
        $user->save();
        $manager = new Manager;
        $manager->id             = $user->id;
        $manager->role           = $request->role;
        $manager->save();

        try{

            // try code
            $client = new PostmarkClient(env("POSTMARK_API_KEY"));
            // Send an email:
            $sendResult = $client->sendEmailWithTemplate(
            "victor@atrace.com.br",
            $request->email,
            3982421,
            [
            "first_name" => $request->name,
            "email" => $request->email,
            "password" => $password,
            "host" => $request->getSchemeAndHttpHost(),
            ]);

        } 
        catch(\Exception $e){
            
        }

        return redirect()->route('manager.employees')->with('message', 'Funcionario cadastrado com sucesso!');
    }
  
    public function show($id)
    {
        $manager = EmployeesRepository::getById($id);
        return view('manager.employees.employees-show', ['manager' => $manager]);
    }

    public function edit($id)
    {
        $manager = EmployeesRepository::getById($id);
        
        return view('manager.employees.employees-new', ['manager' => $manager]);
        
        
    }

    public function update(EmployeeRequest $request, $id)
    {

        $user = User::findOrFail($id);
        $manager = Manager::findOrFail($id);

        if($manager == null || !isset($manager)){
            $manager = self::saveManager($request, $user);
        }  

        $user->name              = $request->name;
        $user->email             = $request->email;
        $user->type              = 0;
        $user->save();
        $manager->role           = $request->role;
        $manager->save();

        return redirect()->route('manager.employees')->with('message', 'Funcionário atualizado com sucesso!');
    }
  
    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->updated_by    = Auth::user()->id;
        $customer->deleted_at    = new DateTime();
        $customer->save();
        return redirect()->route('manager.costumers')->with('alert-success', 'Cliente removidoo com sucesso!');
    }

    private static function saveUser(CustomerRequest $request, $password){
        $user = new User;
         $user->name              = $request->name;
         $user->email             = $request->email;
         $user->password          = Hash::make($password);
         $user->type              = 1;
         $user->cpf               = $request->cpf;
         $user->save();
         return $user;
    }

    private static function saveManager(CustomerRequest $request, $user){
        if($user == null){
            $password  =  GuidHelper::short();
            $user = self::saveUser($request, $password);
        }

        $manager->id             = $user->id;
        $manager->role           = $request->role;
        $manager->save();

        return $manager;
    }

}
