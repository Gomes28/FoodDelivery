<?php echo $this->extend('Admin/layout/principal'); ?>

<?php echo $this->section('titulo'); ?><?php echo $titulo; ?><?php echo $this->endSection(); ?>

<!-- estilos -->


<?php echo $this->section('estilo'); ?>

<link rel="stylesheet" href="<?php echo site_url('admin/vendors/auto-complete/jquery-ui.css'); ?>" />

<!-- Aqui enviamos para o templete principal os estilos -->

<?php echo $this->endSection(); ?>


<!-- Conteudo -->


<?php echo $this->section('conteudo'); ?>

<div class="row">

            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title"><?php echo $titulo ?></h4>

                  <div class="ui-widget">
                      <input id="query" name="query" placeholder="Pesquise por um usuário"  class="form-control bg-light mb-5">
                  </div>

                  <a href="<?php echo site_url("admin/usuarios/criar") ?>" class="btn btn-info float-right mb-5">Cadastrar Usuário</a>

                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>Nome</th>
                          <th>Email</th>
                          <th>Cpf</th>
                          <th>Ativo</th>
                          <th>Situação</th>
                        </tr>
                      </thead>
                      <tbody>

                        <?php foreach ($usuarios as $usuario): ?>

                        <tr>
                          <td>
                            <a href="<?php echo site_url("admin/usuarios/show/$usuario->id") ?>"><?php echo $usuario->nome; ?></td></a>
                          <td><?php echo $usuario->email; ?></td>
                          <td><?php echo $usuario->cpf; ?></td>

                          <td><?php echo ($usuario->ativo && $usuario->deletado_em == null ? '<label class="badge badge-primary">Sim</label>' : '<label class="badge badge-danger">Não</label>'); ?></td>

                          <td>
                            <?php echo ($usuario->deletado_em === null ? '<label class="badge badge-primary">Disponivel</label>' : '<label class="badge badge-danger">Excluido</label>'); ?>

                            <?php if($usuario->deletado_em != null): ?>

                            <a href="<?php echo site_url("admin/usuarios/desfazerexclusao/$usuario->id") ?>" class="badge badge-dark ml-4">Desfazer</a>

                            <?php endif; ?>

                          </td>
                        </tr>

                        <?php endforeach; ?>

                      </tbody>
                    </table>
                  </div>
                    <div class="mt-3">
                      
                      <?php echo $pager->links() ?>

                  </div>
                </div>
              </div>
            </div>
          </div>
    

<?php echo $this->endSection(); ?>


<!-- scripts -->


<?php echo $this->section('scripts'); ?>

<script src="<?php echo site_url('admin/vendors/auto-complete/jquery-ui.js'); ?>">
</script>

<script>
    $(function () {

      $("#query").autocomplete({

        source: function(request, response){
          
          $.ajax({
            
            url: "<?php echo site_url('admin/usuarios/procurar') ?>",
            dataType: "json",
            data:{
              term: request.term
            },

            success: function (data) {
              if(data.lenght < 1){
 
                var data = [
                  {
                    label: 'Usuario não encontrado',
                    value: -1
                  }

                ];

              }

              response(data); // AQUI TEMOS VALOR NO DATA

            },

          }); // Fim ajax

        },

        minLenght: 1,
        select: function (event, ui) {
            
           if(ui.item.value == -1){
              $(this).val("");
              return false;

           } else {

             window.location.href = '<?php echo site_url('admin/usuarios/show/') ?>' + ui.item.id

           }

        }

      });

    });


</script>

<!-- Aqui enviamos para o templete principal os scripts -->

<?php echo $this->endSection(); ?>