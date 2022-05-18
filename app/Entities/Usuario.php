<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

use App\Libraries\Token;

class Usuario extends Entity
{
    protected $dates   = [
        'criado_em',
        'atualizado_em',
        'deletado_em'];

        public function verificaPassword(string $password) {

           return password_verify($password, $this->password_hash);

        }

        public function iniciaPasswordReset() {

        /* Instancio novo objeto da classe Token */ 
        $token = new Token();

        /*
        * @Descricao: Atribuímos ao objeto Entitie Usuario ($this) o atributo 'reset_token' que conterá o token gerado
                      para que possamos acessá-lo na view 'Password/reset_email'
        */
        $this->reset_token = $token->getValue();

        /*
        *  @Descricao: Atribuímos ao objeto Entities Usuario ($this) o atributo 'reset_hash' que conterá o hash do token
        */
        $this->reset_hash = $token->getHash();
        
        // Expira em 2hrs a partir da data e hora atuais \\
        $this->reset_expira_em = date('Y-m-d H:i:s', time() + 7200);

        }
}
