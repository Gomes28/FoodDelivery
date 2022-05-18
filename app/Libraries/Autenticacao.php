<?php 

namespace App\Libraries;

/*
 *@Descricão essa biblioteca / class cuidará da parte de autenticação na nossa aplicação
*/

class Autenticacao{

   private $usuario;

   /**
    * 
    */

   public function login(string $email, string $password) {

     $usuarioModel = new \App\Models\UsuarioModel();

     $usuario = $usuarioModel->buscarUsuarioPorEmail($email);

    /* Se não encontrar o usuário por e-mail, retorna false */
     if($usuario === null ) {
         return false;
     }

     /* Se a senha não combinar com o hash, retorna false */
     if(!$usuario->verificaPassword($password)){
         return false;
     }

     /* Só permitiremos o login de usuários ativos */
     if(!$usuario->ativo) {
         return false;
     }

     /* Nesse ponto está tudo certo e podemos logar o usuário na aplicação invocando o método abaixo */
     $this->logaUsuario($usuario);

     /* Retornamos true... Autenticamos a sessão */
     return true;
   }

   public function logout() {

     session()->destroy();
   }

     public function pegaUsuarioLogado() {

        /**
         * Não esquecer de compartilhar a instância com services
         */

       if ($this->usuario === null) {

        $this->usuario = $this->pegaUsuarioDaSessao();

       }

       // Retornamos o usuario que foi definido no inicio da classe //
       return $this->usuario;

     }

     /** 
     * @descrição: O método só permite ficar logado na aplicação aquele que ainda existir na base e que esteja ativo.
     *             Do contrário, será feito o logout do mesmo, caso haja uma mandança na sua conta durante a sua sessão
     * 
     * @uso: No filtro LoginFilter
     * 
     * @return_ retorna true se o método pegaUsuarioLogado() nao for null. Ou sejá, se o usuário estiver logado
     */

     public function estaLogado() {

         return $this->pegaUsuarioLogado() !== null;

     }

     private function pegaUsuarioDaSessao() {

        if(!session()->has('usuario_id')) {
            return null;
        }
         /* Instanciamos o Model Usuário */
        $usuarioModel = new \App\Models\UsuarioModel();

         /* Recupero o usuário de acordo com a chave da sessão 'usuario_id' */
        $usuario = $usuarioModel->find(session()->get('usuario_id'));

        /* só retorno o objeto $usuario se o mesmo for encontrado e estiver ativo */
        if($usuario && $usuario->ativo){
            return $usuario;
        }

     }


   private function logaUsuario(object $usuario) {
       $session = session();
       $session->regenerate();
       $session->set('usuario_id', $usuario->id);
   }

}