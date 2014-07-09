<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

require 'vendor/autoload.php';

$app = new \Slim\Slim();

$app->config(array(
    'debug' => true,
    'mode' => 'development',
    'templates.path' => 'app/views',
    'view' => '\Slim\LayoutView',
    'layout' => 'template.php'
));

$app->get('/', function () use($app) {
    $patient = Classes\Model\Factory\DAO::factory("patient");
    $patients = $patient->select()->execute();

    $medic = Classes\Model\Factory\DAO::factory("medic");
    $medics = $medic->select()->execute();

    $consultation = Classes\Model\Factory\DAO::factory("consultation");
    $consultations = $consultation->select()->execute();
    
    $app->render("pages/index.php", array(
        "patients" => $patients,
        "medics" => $medics,
        "consultations" => $consultations,
    ));
});

// ############################## PACIENTE  ############################## //

$app->get('/patient/add', function () use($app) {
    $app->render("pages/patient.php");
});

$app->post('/patient/add', function () use($app) {
    $patient = Classes\Model\Factory\VO::factory("patient");

    $patient->setName($app->request()->post("name"));
    $patient->setCpf($app->request()->post("cpf"));
    $patient->setSex($app->request()->post("sex"));
    $patient->setDateOfBirth($app->request()->post("dateofbirth"));
    $patient->setAddress($app->request()->post("address"));

    $database = Classes\Model\Factory\DAO::factory("patient");

    try {
        $database->insert($patient)->execute();
        $app->redirect("/slim");
    } catch (Exception $e) {
        echo $e->getMessage();
    }
});

$app->get('/patient/edit/:id', function ($id) use($app) {
    $patient = Classes\Model\Factory\VO::factory("patient");

    $patient->setId($id);

    $database = Classes\Model\Factory\DAO::factory("patient");

    try {
        $patient = $database->select()->where("id", "=", $id)->execute();
        $app->render("pages/patient.php", array("patient" => $patient[0]));
    } catch (Exception $e) {
        echo $e->getMessage();
    }
});

$app->post('/patient/edit/:id', function ($id) use($app) {
    $patient = Classes\Model\Factory\VO::factory("patient");

    $patient->setId($id);
    $patient->setName($app->request()->post("name"));
    $patient->setCpf($app->request()->post("cpf"));
    $patient->setSex($app->request()->post("sex"));
    $patient->setDateOfBirth($app->request()->post("dateofbirth"));
    $patient->setAddress($app->request()->post("address"));

    $database = Classes\Model\Factory\DAO::factory("patient");

    try {
        $database->update($patient)->execute();
        $app->redirect("/slim");
    } catch (Exception $e) {
        echo $e->getMessage();
    }
});

$app->get('/patient/remove/:id', function ($id) use($app) {
    $patient = Classes\Model\Factory\VO::factory("patient");

    $patient->setId($id);

    $database = Classes\Model\Factory\DAO::factory("patient");

    try {
        $database->remove($patient)->execute();
        $app->redirect("/slim");
    } catch (Exception $e) {
        echo $e->getMessage();
    }
});

// ############################## MEDICO  ############################## //

$app->get('/medic/add', function () use($app) {
    $app->render("pages/medic.php");
});

$app->post('/medic/add', function () use($app) {
    $medic = Classes\Model\Factory\VO::factory("medic");

    $medic->setName($app->request()->post("name"));
    $medic->setCrm($app->request()->post("crm"));
    $medic->setSpecialty($app->request()->post("specialty"));

    $database = Classes\Model\Factory\DAO::factory("medic");

    try {
        $database->insert($medic)->execute();
        $app->redirect("/slim");
    } catch (Exception $e) {
        echo $e->getMessage();
    }
});

$app->get('/medic/edit/:id', function ($id) use($app) {
    $medic = Classes\Model\Factory\VO::factory("medic");

    $medic->setId($id);

    $database = Classes\Model\Factory\DAO::factory("medic");

    try {
        $medic = $database->select()->where("id", "=", $id)->execute();
        $app->render("pages/medic.php", array("medic" => $medic[0]));
    } catch (Exception $e) {
        echo $e->getMessage();
    }
});

$app->post('/medic/edit/:id', function ($id) use($app) {
    $medic = Classes\Model\Factory\VO::factory("medic");

    $medic->setId($id);
    $medic->setName($app->request()->post("name"));
    $medic->setCrm($app->request()->post("crm"));
    $medic->setSpecialty($app->request()->post("specialty"));

    $database = Classes\Model\Factory\DAO::factory("medic");

    try {
        $database->update($medic)->execute();
        $app->redirect("/slim");
    } catch (Exception $e) {
        echo $e->getMessage();
    }
});

$app->get('/medic/remove/:id', function ($id) use($app) {
    $medic = Classes\Model\Factory\VO::factory("medic");

    $medic->setId($id);

    $database = Classes\Model\Factory\DAO::factory("medic");

    try {
        $database->remove($medic)->execute();
        $app->redirect("/slim");
    } catch (Exception $e) {
        echo $e->getMessage();
    }
});

// ############################## Consulta  ############################## //
$app->get('/consultation/add', function () use($app) {
    $patients = Classes\Model\Factory\DAO::factory("patient");
    $patients = $patients->select()->execute();
    
    $medics =  Classes\Model\Factory\DAO::factory("medic");
    $medics = $medics->select()->execute();
    
    $app->render("pages/consultation.php", array(
        "patients" => $patients,
        "medics" => $medics,
    ));
});

$app->post('/consultation/add', function () use($app) {
    $consultation = Classes\Model\Factory\VO::factory("consultation");

    $consultation->setDate($app->request()->post("date"));
    $consultation->setHour($app->request()->post("hour"));
    $consultation->setIdPatient($app->request()->post("patient"));
    $consultation->setIdMedic($app->request()->post("medic"));
    $consultation->setObservations($app->request()->post("observations"));

    $database = Classes\Model\Factory\DAO::factory("consultation");

    try {
        $database->insert($consultation)->execute();
        $app->redirect("/slim");
    } catch (Exception $e) {
        echo $e->getMessage();
    }
});

$app->get('/consultation/edit/:id', function ($id) use($app) {
    $consultation = Classes\Model\Factory\VO::factory("consultation");
    
    $consultation->setId($id);
    
    $patients = Classes\Model\Factory\DAO::factory("patient");
    $patients = $patients->select()->execute();
    
    $medics =  Classes\Model\Factory\DAO::factory("medic");
    $medics = $medics->select()->execute();
    
    $database = Classes\Model\Factory\DAO::factory("consultation");

    try {
        $consultation = $database->select(NULL, FALSE)->where("id", "=", $id)->execute();
        $app->render("pages/consultation.php", array(
            "consultation" => $consultation[0],
            "patients" => $patients,
            "medics" => $medics,
        ));
    } catch (Exception $e) {
        echo $e->getMessage();
    }
});

$app->post('/consultation/edit/:id', function ($id) use($app) {
    $consultation = Classes\Model\Factory\VO::factory("consultation");

    $consultation->setId($id);
    $consultation->setDate($app->request()->post("date"));
    $consultation->setHour($app->request()->post("hour"));
    $consultation->setIdPatient($app->request()->post("patient"));
    $consultation->setIdMedic($app->request()->post("medic"));
    $consultation->setObservations($app->request()->post("observations"));

    $database = Classes\Model\Factory\DAO::factory("consultation");

    try {
        $database->update($consultation)->execute();
        $app->redirect("/slim");
    } catch (Exception $e) {
        echo $e->getMessage();
    }
});

$app->get('/consultation/remove/:id', function ($id) use($app) {
    $consultation = Classes\Model\Factory\VO::factory("consultation");

    $consultation->setId($id);

    $database = Classes\Model\Factory\DAO::factory("consultation");

    try {
        $database->remove($consultation)->execute();
        $app->redirect("/slim");
    } catch (Exception $e) {
        echo $e->getMessage();
    }
});

$app->run();
