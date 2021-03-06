<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Password extends BaseController {

     private $usuarioModel;

     public function __construct() {

        $this->usuarioModel = new \App\Models\UsuarioModel();

     }

    public function esqueci() {
        
       $data = [
           'titulo' => 'Esqueci minha senha',
       ];

       return view('Password/esqueci', $data);

    }

    public function processaEsqueci() {
        
       if($this->request->getMethod() === 'post'){

         $usuario = $this->usuarioModel->buscarUsuarioPorEmail($this->request->getPost('email'));

         if($usuario === null || !$usuario->ativo) {

           return redirect()->to(site_url('password/esqueci'))
           ->with('atencao', 'Não encontramos uma conta válida com esse email')
           ->withInput();

         } 

         $usuario->iniciaPasswordReset();

         dd($usuario);

          $this->usuarioModel->save($usuario);

          $this->enviaEmailRedefinicaoSenha($usuario);

         return redirect()->to(site_url('login'))->with('sucesso', 'Email de redefinição de senha enviado para sua caixa de entrada');

       } else {

           /* NÃO E UM POST */

           return redirect()->back();

       }

    }

    public function reset($token = null) {

      if($token === null) {

         return redirect()->to(site_url('password/esqueci'))->with('atencao', 'Link inválido ou expirado');

      }

      $usuario = $this->usuarioModel->buscaUsuarioParaResetarSenha($token);

      dd($usuario);

    }

    private function enviaEmailRedefinicaoSenha(object $usuario) {

        $email = service('email');

        $email->setFrom('no-repley@centerlanches.com.br', 'Center Lanches');
        $email->setTo($usuario->email);
        
        $email->setSubject('Redefinição de senha');

        $mensagem = view('Password/reset_email', ['token' => $usuario->reset_token]);

        $email->setMessage($mensagem);

        $email->send();

    }
}
