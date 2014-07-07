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

// ############################## FIM DO PACIENTE  ############################## //

$app->get('/medic', function () use($app) {
    $app->render("pages/medic.php");
});

$app->get('/consultation', function () use($app) {
    $app->render("pages/consultation.php");
});

$app->run();
