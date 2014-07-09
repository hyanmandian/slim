<?php if (isset($_GET["error"])): ?>
    <p class="alert alert-danger">Preencha corretamente todos os campos</p>
<?php endif;?>
<div class="jumbotron">
    <h1 class="text-center">Cadastro de Médico</h1>
</div>
<form action="/slim/medic/<?php echo isset($medic) ? "edit/" . $medic["id"]: "add";?>" method="post" role="form">
    <div class="form-group">
        <label for="name">Nome</label>
        <input required="required" name="name" type="text" class="form-control" id="name" placeholder="Digite o nome" value="<?php echo isset($medic) ? $medic["name"]: "";?>">
    </div>
    <div class="form-group">
        <label for="crm">CRM</label>
        <input required="required" name="crm" type="text" class="form-control" id="crm" placeholder="Digite o CRM" value="<?php echo isset($medic) ? $medic["crm"]: "";?>">
    </div>
    <div class="form-group">
        <label for="specialty">Especialidade</label>
        <input required="required" name="specialty" type="text" class="form-control" id="specialty" placeholder="Digite a especilidade" value="<?php echo isset($medic) ? $medic["specialty"]: "";?>">
    </div>
    <button type="submit" class="btn btn-info btn-block">Salvar</button>
</form>