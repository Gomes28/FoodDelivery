<?php echo $this->extend('Admin/layout/principal'); ?>

<?php echo $this->section('titulo'); ?><?php echo $titulo; ?><?php echo $this->endSection(); ?>

<!-- estilos -->


<?php echo $this->section('estilo'); ?>

<!-- Aqui enviamos para o templete principal os estilos -->

<?php echo $this->endSection(); ?>


<!-- Conteudo -->


<?php echo $this->section('conteudo'); ?>

<div class="row">

            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-header bg-primary pb-0 pt-4">
                  <h4 class="card-title text-white"><?php echo esc($titulo); ?></h4>
              </div>
              <div class="card-body">

              <?php if (session()->has('errors_model')): ?>

                 <ul>
                  
                    <?php foreach (session('errors_model') as $error): ?>

                      <li class="text-danger"><?php echo $error; ?></li>

                    <?php endforeach; ?>
                </ul>

                <?php endif; ?>

              <?php echo form_open("admin/usuarios/excluir/$usuario->id"); ?>

              <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong>Atenção!</strong>Tem certeza da exclusão do usuário <strong><?php echo esc($usuario->nome) ?></strong>
              </div>

              <button type="submit" class="btn btn-danger me-2 btn-sm">Excluir</button>

                    <a href="<?php echo site_url("admin/usuarios/show/$usuario->id"); ?>" class="btn btn-primary">
                    Voltar
                    </a>

              <?php echo form_close(); ?>

                </div> 
              </div>
            </div>
          </div>
    

<?php echo $this->endSection(); ?>


<!-- scripts -->


<?php echo $this->section('scripts'); ?>

<script src="<?php echo site_url('admin/vendors/mask/jquery.mask.min.js'); ?>"></script>
<script src="<?php echo site_url('admin/vendors/mask/app.js'); ?>"></script>
<!-- Aqui enviamos para o templete principal os scripts -->

<?php echo $this->endSection(); ?>