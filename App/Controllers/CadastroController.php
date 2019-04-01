<?php
namespace App\Controllers;

use Foundation\Controller;
use App\Models\Pessoa;

class CadastroController extends Controller
{
    public function index()
    {
        return $this->render('cadastro/index');
    }
    
    public function salvar()
    {
        $dados = [
            'nome' => input()->get('nome'),
            'email' => input()->get('email')
        ];
        
        $pessoa = new Pessoa;
        $qtd = $pessoa->insert($dados);
        
        if ($qtd) {
            session()->put('_sucesso', 'Incluido com sucesso');
            return redirect()->route('cadastro.index');
        }
        session()->put('_erro', 'Erro ao incluir pessoa');
        return redirect()->route('cadastro.index');
    }
}
