<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cities extends Model
{
    //
    public $table = 'cities';

    public $timestamps = false;
    public $fillable = [
        'pid',
        'name',
        'level',
        'path'
    ];

    public function childCities() {
        return $this->hasMany('App\Models\Cities', 'pid', 'id');
    }

    public function allChildrenCities()
    {
        return $this->childCities()->with('allChildrenCities');
    }

    public function getParentCitiesAttribute(){
        $parentCities=Cities::find($this->pid);
        if(!empty($parentCities)){
            return $parentCities->name;
        }
    }

    public function getParentCitiesObjAttribute(){
        $parentCities=Cities::find($this->pid);
        if(!empty($parentCities)){
            return $parentCities;
        }
    }
    
}
