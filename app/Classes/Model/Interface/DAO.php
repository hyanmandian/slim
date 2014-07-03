<?php

namespace Classes\Model\Interface;

interface DAO {
    public static function getInstance();
    public static function insert(\Classes\Model\VO\VO $vo);
    public static function update(\Classes\Model\VO\VO $vo);
    public static function remove(\Classes\Model\VO\VO $vo);
    public static function select();
    public static function where();
    public static function execute();
    public static function as_array();
}
