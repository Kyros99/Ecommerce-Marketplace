<?php

namespace App\Services;

use Exception;
use Illuminate\Database\RecordNotFoundException;
use Illuminate\Database\RecordsNotFoundException;
use Propel\Runtime\ActiveRecord\ActiveRecordInterface;
use Propel\Runtime\Map\TableMap;
use Throwable;

abstract class PropelService extends DatabaseAccessService
{

    protected $propelModel;

    abstract function getPropelModelName();

    abstract function getNewPropelModel();

    public function createWithArray($arguments=[]){
        try{
            $this->setPropelModel($this->getNewPropelModel());
            return $this->updateWithArray($arguments);

        }catch (Exception $ex){
            throw new Exception(sprintf('%s Model failed to be created',$this->getPropelModelName()),0,$ex);
        }
    }

    public function updateWithArray($arguments=[]){

        $this->checkPropelModel();
        try{
            $this->updateModelWithArray($arguments);

            return $this->getPropelModel()->save($this->getConnection());

        }catch(Exception $ex){

            throw new Exception(sprintf('%s Model failed to be update',$this->getPropelModelName()),0,$ex);
        }
    }

    protected function updateModelWithArray($arguments = []){

        $this->checkPropelModel();
        foreach ($arguments as $name => $value) {
            try {
                $this->getPropelModel()->setByName($name, $value, TableMap::TYPE_FIELDNAME);
            }catch (Throwable $ex){

                //Skip fields they do not exist
            }
        }

    }

    public function delete()
    {
        $this->checkPropelModel();
        try {
            $this->getPropelModel()->delete($this->getConnection());
            if ($this->getPropelModel()->isDeleted()) {
                unset($this->propelModel);
                return true;
            }

            return false;
        }catch (Throwable $ex){
            throw new Exception(sprintf('%s Model failed to be update',$this->getPropelModelName()),0,$ex);
        }
    }



    protected function checkPropelModel()
    {
        if (empty($this->getPropelModel())){
            throw new RecordsNotFoundException(sprintf('Propel model %s not found for ', $this->getPropelModelName()));
        }
    }

    public function getPropelModel()
    {
        return $this->propelModel;
    }

    public function setPropelModel($propelModel)
    {
        $this->propelModel = $propelModel;
        return $this;
    }
}
