<?php

namespace App\Models;

use CodeIgniter\Model;

use App\Libraries\Token;

class UsuarioModel extends Model
{
    
    protected $table            = 'usuarios';
    protected $returnType       = 'App\Entities\Usuario';
    protected $allowedFields    = ['nome','email','telefone','cpf','reset_hash','reset_expira_em'];

    // Datas
    protected $useTimestamps        = true;
    protected $createdField         = 'criado_em';
    protected $updatedField         = 'atualizado_em';
    protected $dateFormat           = 'datetime'; // Para uso com o $useSoftDeletes
    protected $useSoftDeletes       = true;
    protected $deletedField         = 'deletado_em';

    // Validacoes
    protected $validationRules = [
      'nome' => 'required|min_length[4]|max_length[120]',
      'email' => 'required|valid_email|is_unique[usuarios.email]',
      'cpf' => 'required|exact_length[14]|validaCpf|is_unique[usuarios.cpf]',
      'telefone' => 'required',
      'password' => 'required|min_length[6]',
      'password_confirmation' => 'required_with[password]|matches[password]',
    ];
    protected $validationMessages = [
    'nome' => [
        'require' => 'O campo Nome é obrigatório.'
    ],
    'email' => [
        'require' => 'O campo Email é obrigatório.',
        'is_unique' => 'Desculpe. Esse email já existe.'
    ],
      'cpf' => [
          'require' => 'O campo CPF é obrigatório.',
          'is_unique' => 'Desculpe. Esse CPF já existe.'
      ],
    ];

    // Eventos CallBack
    protected $beforeInsert = ['hashPassword'];
    protected $beforeUpdate = ['hashPassword'];

    protected function hashPassword(array $data){
      if(isset($data['data']['password'])) {
          $data['data']['password_hash'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);

          unset($data['data']['password']);
          unset($data['data']['password_confirmation']);
      }
      return $data;
    }

    // pesquisa de usuarios

    public function procurar($term) {

        if($term === null) {
        
            return [];
        }

        return $this->select('id, nome')
           ->like('nome', $term)
           ->get()
           ->getResult();

    }

    public function desabilitaValidacaoSenha(){
        unset($this->validationRules['password']);
        unset($this->validationRules['password_confirmation']);
    }

    public function desfazerExclusao(int $id){
        return $this->protect(false)
        ->where('id', $id)
        ->set('deletado_em', null)
        ->update();
    }

    /**
     * @uso Classe Autenticacao
     * @params string $email
     * @returne objecto $usuario
     */

    public function buscarUsuarioPorEmail(string $email){
        return $this->where('email', $email)->first();
    }

    public function buscaUsuarioParaResetarSenha(string $token) {

      $token = new Token($token);

      $tokenHash = $token->getHash();

      $usuario = $this->where('reset_hash', $tokenHash)->first();

      if ($usuario != null) {



       if ($usuario->reset_expira_em < date('Y-m-d H:i:s')) {

         $usuario = null;

       }

       return $usuario;

      }
    }

}
