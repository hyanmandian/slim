<?php if (isset($_GET["error"])): ?>
    <p class="alert alert-danger">Preencha corretamente todos os campos</p>
<?php endif;?>
<div class="jumbotron">
    <h1 class="text-center">Cadastro de Paciente</h1>
</div>
<form action="/slim/patient/<?php echo isset($patient) ? "edit/" . $patient["id"]: "add";?>" method="post" role="form">
    <div class="form-group">
        <label for="name">Nome</label>
        <input required="required" name="name" type="text" class="form-control" id="name" placeholder="Digite o nome" value="<?php echo isset($patient) ? $patient["name"]: "";?>">
    </div>
    <div class="form-group">
        <label for="cpf">CPF</label>
        <input required="required" name="cpf" type="text" class="form-control" id="cpf" placeholder="Digite o CPF" value="<?php echo isset($patient) ? $patient["cpf"]: "";?>">
    </div>
    <div class="form-group">
        <label for="sex">Sexo</label>
        <select required="required" name="sex" id="sex" class="form-control">
            <option value="">Selecione</option>
            <option <?php echo isset($patient) && $patient["sex"] == "Masculino" ? "selected" : "";?> value="Masculino">Masculino</option>
            <option <?php echo isset($patient) && $patient["sex"] == "Feminino" ? "selected" : "";?> value="Feminino">Feminino</option>
        </select>
    </div>
    <div class="form-group">
        <label for="dateofbirth">Data de nascimento</label>
        <input required="required" name="dateofbirth" id="dateofbirth" type="date" class="form-control" value="<?php echo isset($patient) ? $patient["dateofbirth"]: "";?>">
    </div>
    <div class="form-group">
        <label for="address">Endereço</label>
        <input required="required" name="address" type="text" class="form-control" id="address" placeholder="Digite o endereço" value="<?php echo isset($patient) ? $patient["address"]: "";?>">
    </div>
    <button type="submit" class="btn btn-info btn-block">Submit</button>
</form>