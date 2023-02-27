<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class PageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Exibe a pagina inicial listar paginas
     * Retorna os dados das paginas cadastrados no BD
     *
     * @return void
     */
    public function index()
    {
        $pages = Page::paginate(10);

        return view('admin.pages.index', [
            'pages' => $pages
        ]);
    }

    /**
     * Exibe a view 'admin.pages.create' Nova Pagina
     *
     * @return void
     */
    public function create()
    {
        return view('admin.pages.create');
    }

    /**
     * Cadastra a pagina no BD
     *
     * @param Request $request Recebe os dados do formulario
     * @return void
     */
    public function store(Request $request)
    {
        // Recebendo os dados do formulário
        $data = $request->only([
            'title',
            'body'
        ]);

        // Criando o Slug
        $data['slug'] = Str::slug($data['title'], '-');

        // Validando
        $validator = Validator::make($data, [
            'title' => ['required', 'string', 'max:100'],
            'body' => ['string'],
            'slug' => ['required', 'string', 'max:100', 'unique:pages']
        ]);

        // Verificando se existe algum erro com a validação
        if ($validator->fails()){
            return redirect()->route('pages.create')
            ->withErrors($validator)
            ->withInput();
        }

        // Inserindo no BD
        $page = new Page;
        $page->title = $data['title'];
        $page->body = $data['body'];
        $page->slug = $data['slug'];
        $page->save();

        return redirect()->route('pages.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Exibe as informações da página na pagina listar paginas
     *
     * @param integer $id Recebe o id da pagina
     * @return void
     */
    public function edit(string $id)
    {
        $page = Page::find($id);

        if ($page){
            return view('admin.pages.edit', [
                'page' => $page
            ]);
        }   

        return redirect()->route('pages.index');
    }

    /**
     * Edita os dados da pagina
     *
     * @param Request $request Recebe os dados do formulario
     * @param int $id Recebe o id da pagina
     * @return void
     */
    public function update(Request $request, int $id)
    {
        $page = Page::find($id);

        if ($page){

            // Recebendo apenas os dados abaixo do formulario
            $data = $request->only([
                'title',
                'body'
            ]);

            // Verificando se o titulo da pagina que foi recebido pelo formulario é diferente do atual 
            if ($page['title'] !== $data['title']){
                $data['slug'] = Str::slug($data['title'], '-');

                // Criando as validações
                $validator = Validator::make($data, [
                    'title' => ['required', 'string', 'max:100'],
                    'body'  => ['string'],
                    'slug'  => ['required', 'string', 'max:100', 'unique:pages']
                ]);
            } else {
                // Criando as validações sem o slug
                $validator = Validator::make($data, [
                    'title' => ['required', 'string', 'max:100'],
                    'body'  => ['string']
                ]);
            }

            // Verificando se existe algum erro com a validação
            if ($validator->fails()){
                return redirect()->route('pages.edit', [
                    'page' => $id
                ])
                ->withErrors($validator)
                ->withInput();
            }

            $page->title = $data['title'];
            $page->body = $data['body'];

            if (!empty($data['slug'])){
                $page->slug = $data['slug'];
            }

            $page->save();
        }

        return redirect()->route('pages.index');
    }

    /**
     * Deletando a pagina
     *
     * @param int $id recebe o id da pagina
     * @return void
     */
    public function destroy(int $id)
    {
        $page = Page::find($id);
        $page->delete();

        return redirect()->route('pages.index');
    }
}
