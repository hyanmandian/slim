<div class="jumbotron">
    <h1 class="text-center">Listas</h1>
</div>

<ul class="nav nav-tabs" role="tablist">
    <li class="active"><a href="#patients" role="tab" data-toggle="tab">Pacientes</a></li>
    <li><a href="#medics" role="tab" data-toggle="tab">Médicos</a></li>
    <li><a href="#consultations" role="tab" data-toggle="tab">Consultas</a></li>
</ul>

<div class="tab-content">
    <div class="tab-pane active" id="patients">
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
                            <td><?php echo $patient["dateofbirth"] ?></td>
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
    <div class="tab-pane" id="consultations">
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
                            <td><?php echo $consultation["date"] ?></td>
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