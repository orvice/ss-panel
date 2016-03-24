<?php


namespace App\Services;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\ConfigModel;

class DbConfig
{
    /**
     * @param $key
     * @return string
     */
    public static function get($key)
    {
        try {
            $c = ConfigModel::where('key', $key)->firstOrFail();
            return $c->value;
        } catch (ModelNotFoundException $e) {
            return null;
        } catch (\Exception $e) {
            return null;
        }
    }

    public static function set($key, $value)
    {
        if($value == null){
            $value = "";
        }
        try {
            $c = ConfigModel::where('key', $key)->firstOrFail();
            $c->value = $value;
            return $c->save();
        } catch (ModelNotFoundException $e) {
            $c = new ConfigModel();
            $c->key = $key;
            $c->value = $value;
            return $c->save();
        }
    }
}