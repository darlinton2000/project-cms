<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

/**
 * Controller Usuarios
 */
class UserController extends Controller
{
    /**
     * Exibe a pagina inicial listar usuarios
     * Retorna os dados dos usuarios cadastrados no BD
     *
     * @return void
     */
    public function index()
    {
        $users = User::paginate(10);
        $data['users'] = $users;

        return view('admin.users.index', $data);
    }

    /**
     * Exibe a view 'admin.users.create' Novo Usuário
     *
     * @return void
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Cadastra o usuario no BD
     *
     * @param Request $request Recebe os dados do formulario
     * @return void
     */
    public function store(Request $request)
    {   
        // Recebendo os dados do formulário
        $data = $request->only([
            'name',
            'email',
            'password',
            'password_confirmation'
        ]);

        // Validando
        $validator = Validator::make($data, [
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:200', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);

        // Verificando se existe algum erro com a validação
        if ($validator->fails()){
            return redirect()->route('users.create')
            ->withErrors($validator)
            ->withInput();
        }

        // Inserindo no BD
        $user = new User;
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        $user->save();

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Exibe as informações do usuário na pagina editar usuario
     *
     * @param integer $id Recebe o id do usuário
     * @return void
     */
    public function edit(int $id)
    {
        $user = User::find($id);

        if ($user){
            return view('admin.users.edit', [
                'user' => $user
            ]);
        }   

        return redirect()->route('users.index');
    }

    /**
     * Edita os dados do usuario
     *
     * @param Request $request Recebe os dados do formulario
     * @param string $id Recebe o id do usuario
     * @return void
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);

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
                return redirect()->route('users.edit', [
                    'user' => $id
                ])->withErrors($validator);
            }

            $user->save();
        }

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}