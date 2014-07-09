<div class="jumbotron">
    <h1 class="text-center">Listas</h1>
</div>

<ul class="nav nav-tabs" role="tablist">
    <li class="<?php echo !isset($search) ? "active" : "" ?>"><a href="#patients" role="tab" data-toggle="tab">Pacientes</a></li>
    <li><a href="#medics" role="tab" data-toggle="tab">Médicos</a></li>
    <li class="<?php echo isset($search) ? "active" : "" ?>"><a href="#consultations" role="tab" data-toggle="tab">Consultas</a></li>
</ul>

<div class="tab-content">
    <div class="tab-pane <?php echo !isset($search) ? "active" : "" ?>" id="patients">
        <?php if (count($patients) > 0): ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>CPF</th>
                        <th>Sexo</th>
                        <th>Data de Nascimento</th>
                        <th>Endereço</th>
                        <th>Editar</th>
                        <th>Excluir</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($patients as $patient): ?>
                        <tr>
                            <td><?php echo $patient["id"] ?></td>
                            <td><?php echo $patient["name"] ?></td>
                            <td><?php echo $patient["cpf"] ?></td>
                            <td><?php echo $patient["sex"] ?></td>
                            <td><?php echo date('d/m/Y', strtotime($patient["dateofbirth"])) ?></td>
                            <td><?php echo $patient["address"] ?></td>
                            <td><a href="/slim/patient/edit/<?php echo $patient["id"]; ?>"><i class="glyphicon glyphicon-edit"></i></a></td>
                            <td><a href="/slim/patient/remove/<?php echo $patient["id"]; ?>"><i class="glyphicon glyphicon-remove-circle"></i></a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p class="text-center alert alert-info">Não existem pacientes cadastrados.</p>
        <?php endif; ?>
    </div>
    <div class="tab-pane" id="medics">
        <?php if (count($medics) > 0): ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>CRM</th>
                        <th>Especialidade</th>
                        <th>Editar</th>
                        <th>Excluir</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($medics as $medic): ?>
                        <tr>
                            <td><?php echo $medic["id"] ?></td>
                            <td><?php echo $medic["name"] ?></td>
                            <td><?php echo $medic["crm"] ?></td>
                            <td><?php echo $medic["specialty"] ?></td>
                            <td><a href="/slim/medic/edit/<?php echo $medic["id"]; ?>"><i class="glyphicon glyphicon-edit"></i></a></td>
                            <td><a href="/slim/medic/remove/<?php echo $medic["id"]; ?>"><i class="glyphicon glyphicon-remove-circle"></i></a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p class="text-center alert alert-info">Não existem médicos cadastrados.</p>
        <?php endif; ?>
    </div>
    <div class="tab-pane <?php echo isset($search) ? "active" : "" ?>" id="consultations">
        <form action="/slim/search" method="get" role="form">
           <div class="form-group">
                <label for="medic">Medico</label>
                <select required="required" name="medic" id="medic" class="form-control">
                    <option value="">Selecione</option>
                    <?php foreach($medics as $medic):?>
                        <option <?php echo isset($_GET["medic"]) && $_GET["medic"] == $medic["id"] ? "selected='selected'" : ""; ?>value="<?php echo $medic["id"]?>"><?php echo $medic["name"];?></option>
                    <?php endforeach;?>
                </select>
            </div>
            <div class="form-group">
                <label for="date">Data da consulta</label>
                <input required="required" name="date" id="date" type="date" class="form-control" value="<?php echo isset($_GET["date"]) ? $_GET["date"]: "";?>">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-info btn-block">Salvar</button>
            </div>
        </form>
        <?php $consultations = isset($search) ? $search : $consultations?>
        <?php if (count($consultations) > 0): ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Data</th>
                        <th>Hora</th>
                        <th>Paciente</th>
                        <th>Médico</th>
                        <th>Observações</th>
                        <th>Editar</th>
                        <th>Excluir</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($consultations as $consultation): ?>
                        <tr>
                            <td><?php echo $consultation["id"] ?></td>
                            <td><?php echo date('d/m/Y', strtotime($consultation["date"])) ?></td>
                            <td><?php echo $consultation["hour"] ?></td>
                            <td><?php echo $consultation["patient"] ?></td>
                            <td><?php echo $consultation["medic"] ?></td>
                            <td><?php echo $consultation["observations"] ?></td>
                            <td><a href="/slim/consultation/edit/<?php echo $consultation["id"]; ?>"><i class="glyphicon glyphicon-edit"></i></a></td>
                            <td><a href="/slim/consultation/remove/<?php echo $consultation["id"]; ?>"><i class="glyphicon glyphicon-remove-circle"></i></a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p class="text-center alert alert-info">Não existem consultas cadastradas.</p>
        <?php endif; ?>
    </div>
</div> 