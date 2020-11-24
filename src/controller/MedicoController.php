<?php
include __DIR__. '/../core/Controller.php';
include __DIR__. '/../model/Medico.php';

class MedicoController extends Controller
{
    

    /**
     * Lista os medicos
     */
    public function listar()
    {
        $medicos = Medico::all();
        return $this->view('index', ['medicos' => $medicos]);
    }
 
    /**
     * Mostrar formulario para criar um novo medico
     */
    public function criar()
    {
        return $this->view('cadastromedico');
    }
 
    /**
     * Mostrar formulário para editar um medico
     */
    public function editar($dados)
    {
        $id      = (int) $dados['id'];
        $medico = Medico::find($id);
 
        
    }
 
    /**
     * Salvar o medico submetido pelo formulário
     */
    public function salvar()
    {
        $medico           = new Medico;
        $medico->nome     = $this->request->nome;
        $medico->senha = $this->request->senha;
        $medico->email    = $this->request->email;
        $medico->data_alteracao = date("Y-m-d H:i:s");
        if ($medico->save()) {
            return $this->listar();
        }
    }
 
    /**
     * Atualizar o medico conforme dados submetidos
     */
    public function atualizar($dados)
    {
        $id                = (int) $dados['id'];
        $medico           = Medico::find($id);
        $medico->nome     = $this->request->nome;
        $medico->senha = $this->request->senha;
        $medico->email    = $this->request->email;
        $medico->data_alteracao = date("Y-m-d H:i:s");
        $medico->save();
 
        return $this->listar();
    }
 
    /**
     * Apagar um medico conforme o id informado
     */
    public function excluir($dados)
    {
        $id      = (int) $dados['id'];
        $medico = Medico::destroy($id);
        return $this->listar();
    }
}