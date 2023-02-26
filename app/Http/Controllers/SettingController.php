<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Apresenta as informacoes das 'Configuracoes do Site' na view
     *
     * @return void
     */
    public function index()
    {
        $settings = [];

        $dbsettings = Setting::get();

        foreach($dbsettings as $dbsetting){
            $settings[$dbsetting['name']] = $dbsetting['content'];
        }

        return view('admin.settings.index', [
            'settings' => $settings
        ]);
    }

    /**
     * Salva as informacoes das 'Configuracoes do Site' no BD
     *
     * @param Request $request
     * @return void
     */
    public function save(Request $request)
    {
        $data = $request->only([
            'title', 'subtitle', 'email', 'bgcolor', 'textcolor'
        ]);

        $validator = $this->validator($data);

        // Verificando se existe algum erro com a validação
        if ($validator->fails()){
            return redirect()->route('settings')->withErrors($validator);
        }

        // Salvando as informacoes no BD
        foreach($data as $item => $value){
            Setting::where('name', $item)->update([
                'content' => $value
            ]);
        }

        return redirect()->route('settings')->with('warning', 'Informações alteradas com sucesso!');
    }

    /**
     * Validando as informacoes recebidas do formulario
     *
     * @param array $data
     * @return object
     */
    protected function validator(array $data): object
    {
        return Validator::make($data, [
            'title'     => ['string', 'max:100'],
            'subtitle'  => ['string', 'max:100'],
            'email'     => ['string', 'email'],
            'bgcolor'   => ['string', 'regex:/#[A-Z0-9]{6}/i'],
            'textcolor' => ['string', 'regex:/#[A-Z0-9]{6}/i']
        ]);
    }
}
