<?php echo $this->extend('Admin/layout/principal'); ?>

<?php echo $this->section('titulo'); ?><?php echo $titulo; ?><?php echo $this->endSection(); ?>

<!-- estilos -->


<?php echo $this->section('estilos'); ?>

<!-- Aqui enviamos para o templete principal os estilos -->

<?php echo $this->endSection(); ?>


<!-- Conteudo -->


<?php echo $this->section('conteudo'); ?>

<?php echo $this->endSection(); ?>


<!-- scripts -->


<?php echo $this->section('scripts'); ?>

<!-- Aqui enviamos para o templete principal os scripts -->

<?php echo $this->endSection(); ?>