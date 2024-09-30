<?php

namespace App\Core;

class BaseModel
{

    protected  function OverrideData($entity)
    {
        return $entity;
    }

    public  function CopyModel($model, $newModel = null)
    {

        if (!$model) {
            return null;
        }
        if ($newModel) {
            $model = BaseCore::CopyModel($model, $newModel);
        }

        $data = $this->OverrideData($model);
        return $data;
    }

    public  function CopyModelList($models, $newModel = null)
    {
        if (!$models) {
            return null;
        }

        $list = array();


        foreach ($models as  $entity) {
            $data = $this->CopyModel($entity, $newModel);

            if ($newModel) {
                $data = (array) $data;
            }

            array_push($list, $data);
        }

        return $list;
    }

}
