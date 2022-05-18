<?php echo $this->extend('Admin/layout/principal'); ?>

<?php echo $this->section('titulo'); ?><?php echo $titulo; ?><?php echo $this->endSection(); ?>

<!-- estilos -->


<?php echo $this->section('estilo'); ?>

<!-- Aqui enviamos para o templete principal os estilos -->

<?php echo $this->endSection(); ?>


<!-- Conteudo -->


<?php echo $this->section('conteudo'); ?>

<div class="row">

            <div class="col-lg-8 grid-margin stretch-card">
              <div class="card">
                <div class="card-header bg-primary pb-0 pt-4">
                  <h4 class="card-title text-white"><?php echo esc($titulo); ?></h4>
              </div>

              <div class="card-body">

                  <p class="card-text">
                      <span class="font-weight-bold">Nome:</span>
                      <?php echo esc($usuario->nome); ?>
                  </p>

                  <p class="card-text">
                      <span class="font-weight-bold">Email:</span>
                      <?php echo esc($usuario->email); ?>
                  </p>

                  <p class="card-text">
                      <span class="font-weight-bold">Ativo:</span>
                      <?php echo ($usuario->nome ? 'sim' : 'Não'); ?>
                  </p>

                  <p class="card-text">
                      <span class="font-weight-bold">Perfil:</span>
                      <?php echo ($usuario->is_admin ? 'Administrador' : 'Cliente'); ?>
                  </p>

                  <p class="card-text">
                      <span class="font-weight-bold">Criado:</span>
                      <?php echo $usuario->criado_em->humanize(); ?>
                  </p>

                  <?php if($usuario->deletado_em == null): ?>

                    <a href="<?php echo site_url("admin/usuarios/editar/$usuario->id") ?>" class="btn btn-dark btn-rounded mr-4">Editar</a>
                      <a href="<?php echo site_url("admin/usuarios/excluir/$usuario->id") ?>" class="btn btn-danger btn-rounded mr-4">Excluir</a>
                      <a href="<?php echo site_url("admin/usuarios") ?>" class="btn btn-info btn-rounded ">Voltar</a>

                  <?php else: ?>

                  <p class="card-text">
                      <span class="font-weight-bold text-danger">Excluido:</span>
                      <?php echo $usuario->deletado_em->humanize(); ?>
                  </p>

                  <a title="Desfazer Exclusão" href="<?php echo site_url("admin/usuarios/desfazerexclusao/$usuario->id") ?>" class="btn btn-dark ">Desfazer</a>

                  <div class="mt-4">
                      
                      <a href="<?php echo site_url("admin/usuarios") ?>" class="btn btn-info btn-rounded ">Voltar</a>
                  </div>

                  <?php endif; ?>

              </div>
            </div>
          </div>
    

<?php echo $this->endSection(); ?>


<!-- scripts -->


<?php echo $this->section('scripts'); ?>

<!-- Aqui enviamos para o templete principal os scripts -->

<?php echo $this->endSection(); ?>