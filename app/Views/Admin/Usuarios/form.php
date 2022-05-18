<div class="form-row d-flex">

                    <div class="form-group col-md-6 px-2">
                      <label for="nome">Nome</label>
                      <input type="text" class="form-control" id="nome" name="nome" value="<?php echo old('nome', esc($usuario->nome)); ?>">
                    </div>

                    <div class="form-group col-md-6 px-2">
                      <label for="email">Email</label>
                      <input type="email" class="form-control" id="email" name="email" value="<?php echo old('email', esc($usuario->email)); ?>">
                    </div>

</div>

<div class="form-row d-flex">

                    <div class="form-group col-md-6 px-2">
                    <label for="cpf">CPF</label>
                      <input type="text" class="form-control cpf" id="cpf" name="cpf" value="<?php echo old('cpf', esc($usuario->cpf)); ?>">
                    </div>

                    <div class="form-group col-md-6 px-2">
                    <label for="telefone">Telefone</label>
                      <input type="text" class="form-control sp_celphones" id="telefone" name="telefone" value="<?php echo old('telefone', esc($usuario->telefone)); ?>">
                    </div>

</div>

<div class="form-row d-flex">
 
        <div class="form-group col-md-6 px-2">
            <label for="password">Senha</label>
            <input type="password" class="form-control" id="password" name="password" name="password">
        </div>
        <div class="form-group col-md-6 px-2">
            <label for="password_confirmation">Confirmação senha</label>
            <input type="password" class="form-control" name="password_confirmation" id="exampleInputConfirmPassword1">
        </div>

</div>

<div class="form-row d-flex">

<div class="form-group col-md-6 px-2">
                <label for="email">Ativo</label>
                <select class="form-control" name="ativo">
 
                    <?php if ($usuario->id): ?>

                        <option value="1" <?php set_select('ativo', '1')?> <?php echo($usuario->ativo ? 'selected' : ''); ?>>Sim</option>
                        <option value="0" <?php set_select('ativo', '0') ?> <?php echo(!$usuario->ativo ? 'selected' : ''); ?>>Não</option>

                    <?php else: ?>

                        <option value="1" <?php set_select('ativo', '1')?>>Sim</option>
                        <option value="0" <?php set_select('ativo', '0')?>>Não</option>

                    <?php endif; ?>

                </select>
        </div>

        <div class="form-group col-md-6 px-2">
                <label for="email">Perfil de acesso</label>
                <select class="form-control" name="is_admin">
 
                    <?php if ($usuario->id): ?>

                        <option value="1" <?php set_select('is_admin', '1') ?> <?php echo($usuario->is_admin ? 'selected' : ''); ?>>Administrador</option>
                        <option value="0" <?php set_select('is_admin', '0') ?> <?php echo(!$usuario->is_admin ? 'selected' : ''); ?>>Cliente</option>

                    <?php else: ?>

                        <option value="1" <?php set_select('is_admin', '1') ?>>Administrador</option>
                        <option value="0" <?php set_select('is_admin', '0') ?>>Cliente</option>

                    <?php endif; ?>

                </select>
        </div>
</div>

                    <button type="submit" class="btn btn-primary me-2 bg-black">Salvar</button>