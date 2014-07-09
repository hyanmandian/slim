<?php if (isset($_GET["error"])): ?>
    <p class="alert alert-danger">Preencha corretamente todos os campos</p>
<?php endif; ?>
<div class="jumbotron">
    <h1 class="text-center">Cadastro de Consulta</h1>
</div>
<form action="/slim/consultation/<?php echo isset($consultation) ? "edit/" . $consultation["id"] : "add"; ?>" method="post" role="form">
    <div class="form-group">
        <label for="date">Data</label>
        <input required="required" name="date" type="date" class="form-control" id="date" value="<?php echo isset($consultation) ? $consultation["date"] : ""; ?>">
    </div>
    <div class="form-group">
        <label for="hour">Hora</label>
        <input required="required" name="hour" type="time" class="form-control" id="hour" value="<?php echo isset($consultation) ? $consultation["hour"] : ""; ?>">
    </div>
    <div class="form-group">
        <label for="patient">Paciente</label>
        <select required="required" name="patient" id="patient" class="form-control">
            <option value="">Selecione</option>
            <?php foreach($patients as $patient):?>
                <option <?php echo isset($consultation) && $consultation["idpatient"] == $patient["id"] ? "selected='selected'" : ""; ?> value="<?php echo $patient["id"]?>"><?php echo $patient["name"];?></option>
            <?php endforeach;?>
        </select>
    </div>
    <div class="form-group">
        <label for="medic">Medico</label>
        <select required="required" name="medic" id="medic" class="form-control">
            <option value="">Selecione</option>
             <?php foreach($medics as $medic):?>
                <option <?php echo isset($consultation) && $consultation["idmedic"] == $medic["id"] ? "selected='selected'" : ""; ?>value="<?php echo $medic["id"]?>"><?php echo $medic["name"];?></option>
            <?php endforeach;?>
        </select>
    </div>
    <div class="form-group">
        <label for="observations">Observações</label>
        <textarea class="form-control" rows="3" placeholder="Digite as observações" id="observations" name="observations" ><?php echo isset($consultation) ? $consultation["observations"] : ""; ?></textarea>
    </div>
    <button type="submit" class="btn btn-info btn-block">Salvar</button>
</form>