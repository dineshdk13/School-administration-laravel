<?php
namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    

    public function index()
    {
        $users = User::latest()->paginate(5);
      
            return view('admin.handleAdmin', compact('users'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
        
    }
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
   

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

     
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'address' => ['required', 'string', 'max:255'],
            'phone_no' => ['required', 'integer'],
            'gender' => ['required'],
            'role' => ['required'],
            'image' => ['required'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $request = request();


        if ($request->file('image') == null) {
            $file = "";
        }else{
           $file = $request->file('image')->store('public/images');  
        }
        
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'address' => $data['address'],
            'gender' => $data['gender'],
            'phone_no' => $data['phone_no'],
            'role' => $data['role'],
            'image' => $file,
        ]);
    }

    public function show($id)
    {
        $userId = Auth::user()->id;
        $users = User::where(['id' => $userId, 'id' => $id])->first();
        return view('admin.show', compact('users'));
        
    }

    # app/Http/Controllers/TodoController.php
/**
 * Show the form for editing the specified resource.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function edit($id)
{
    $userId = Auth::user()->id;
    $users = User::where(['id' => $userId, 'id' => $id])->first();
  
    if ($users) {
        return view('admin.edit', compact('users'));
    } else {
        return redirect('admin/home')->with('error', 'User not found');
    }
}
/**
 * Update the specified resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function update(Request $request, $id)
{
   
    $users = User::find($id);
    $users->update($request->all());
    

    if ($users) {
        return redirect('admin/home')->with('success', 'successfully updated.');
    } else {
        return redirect('admin/home')->with('error', 'Oops something went wrong. Todo not updated');
    }
}




    public function destroy($id)
    {
        $userId = Auth::user()->id;
        $users = User::where(['id' => $userId, 'id' => $id])->first();
        $respStatus= $respMsg ='';
        if(!$users){
            $respStatus ="error";
            $respMsg ="Not Found";
        }
        $userDelStatus = $users->delete();
        if ($userDelStatus) {
            $respStatus = 'success';
            $respMsg = 'User deleted successfully';
        } else {
            $respStatus = 'error';
            $respMsg = 'Oops something went wrong. Todo not deleted successfully';
        }
        return redirect()->route('home.index')->with($respStatus, $respMsg);
  
        return redirect()->route('home.index')
                        ->with('success', 'Member deleted successfully');
    }
}
