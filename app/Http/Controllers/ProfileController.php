<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Responsável por carregar dos dados da pagina 'Meu Perfil'
     *
     * @return void
     */
    public function index()
    {
        $loggedId = intval(Auth::id());

        $user = User::find($loggedId);

        if ($user){
            return view('admin.profile.index', [
                'user' => $user
            ]);
        }

        return redirect()->route('home');
    }

    
    public function save(Request $request)
    {
        $loggedId = intval(Auth::id());

        $user = User::find($loggedId);

        if ($user){

            // Recebendo apenas os dados abaixo do formulario
            $data = $request->only([
                'name',
                'email',
                'password',
                'password_confirmation'
            ]);

            // Criando as validações
            $validator = Validator::make([
                'name'=> $data['name'],
                'email' => $data['email']
            ],  [
                'name' => ['required', 'string', 'max:100'],
                'email' => ['required', 'string', 'email', 'max:100']
            ]);

            $user->name = $data['name'];

            // Verificando se o email foi alterado
            if ($user->email != $data['email']){
                //Verificando se o novo email já existe
                $hasEmail = User::where('email', $data['email'])->get();

                if (count($hasEmail) === 0){
                    $user->email = $data['email'];
                } else {
                    $validator->errors()->add('email', __('validation.unique', [
                        'attribute' => 'email'
                    ]));
                }
            }

            // Verificando se o usuario digitou senha
            if (!empty($data['password'])){
                if (strlen($data['password']) >= 8){
                    if ($data['password'] === $data['password_confirmation']){
                        $user->password = Hash::make($data['password']);
                    } else {
                        $validator->errors()->add('password', __('validation.confirmed', [
                            'attribute' => 'password'
                        ]));
                    }
                } else {
                    $validator->errors()->add('password', __('validation.min.string', [
                        'attribute' => 'password',
                        'min' => 8
                    ]));
                }
            }

            // Verificando se houve algum erro
            if (count($validator->errors()) > 0){
                return redirect()->route('profile', [
                    'user' => $loggedId
                ])->withErrors($validator);
            }

            $user->save();

            return redirect()->route('profile')->with('warning', 'Informações alteradas com sucesso!');
        }

        return redirect()->route('profile');
    }
}
