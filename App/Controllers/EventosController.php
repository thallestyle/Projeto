<?php
namespace App\Controllers;

use Foundation\Controller;
use App\Models\Pessoa;
use App\Models\Evento;
use App\Models\PessoaEvento;

class EventosController extends Controller
{
    protected $pessoa;
    protected $evento;
    protected $pessoaEvento;

    public function __construct()
    {
        $this->pessoa = new Pessoa;
        $this->evento = new Evento;
        $this->pessoaEvento = new PessoaEvento;
    }

    public function index()
    {
        $id = input()->get('pessoa');
        
        $pessoa = $this->pessoa->getById($id);
        
        return $this->render('eventos/index', [
            'pessoa' => $pessoa,
            'eventos' => $this->pessoa->getEventos($id)
        ]);
    }

    public function cadastrar()
    {
        $idEvento = input()->get('evento', false);
        $idPessoa = input()->get('pessoa');

        if(!$idPessoa) {
            return redirect()->route('index');
        }

        $evento = null;

        if($idEvento) {
            $evento = $this->evento->getById($idEvento);
        }

        return $this->render('eventos/cadastrar', [
            'pessoa' => $this->pessoa->getById($idPessoa),
            'evento' => $evento
        ]);
    }

    public function salvar()
    {
        $idPessoa = input()->get('pessoa');
        $idEvento = input()->get('id');

        $data = str_replace('/', '-', input()->get('data'));

        $fields = [
            'data' => dt($data)->format('Y-m-d'),
            'hora_de' => input()->get('hora_de'),
            'hora_ate' => input()->get('hora_ate'),
            'descricao' => input()->get('descricao')
        ];

        // Atualizar
        if($idEvento) {
            $this->evento->updateById($idEvento, $fields);

            session()->put('_sucesso', 'O evento foi atualizado com sucesso');

            return redirect()->route('eventos.index', [
                'evento' => $idEvento,
                'pessoa' => $idPessoa
            ]);
        }

        // Cadastra o evento
        $idEventoCadastrado = $this->evento->insert($fields);

        // Relaciona o evento com a pessoa
        $this->pessoaEvento->insert([
            'pessoa' => $idPessoa,
            'evento' => $idEventoCadastrado
        ]);

        session()->put('_sucesso', 'Evento cadastrado com sucesso!');

        return redirect()->route('eventos.index', [
            'pessoa' => $idPessoa
        ]);
    }
}
