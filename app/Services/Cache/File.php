<?php


namespace App\Services\Cache;


use DoctrineTest\InstantiatorTestAsset\ExceptionAsset;

class File extends Cache
{
    protected $cacheDir;


    public function __construct($dir = '/tmp')
    {
        $this->cacheDir = $dir;
    }

    protected function getFilePath($key)
    {
        return $this->cacheDir . '/' . $key;
    }


    public function set($key, $value, $ttl)
    {
        $content = json_encode([
            "key" => $key,
            "value" => $value,
            "expires_at" => time() + $ttl
        ]);
        return file_put_contents($this->getFilePath($key), $content);
    }

    public function del($key)
    {
        return unlink($this->getFilePath($key));
    }

    public function get($key)
    {
        try{
            $content = file_get_contents($this->getFilePath($key));
        }catch (\Exception $e){
            return null;
        }
        if(!$content){
            return null;
        }
        $data = json_decode($content, true);
        if (isset($data['expires_at'])) {
            if ($data['expires_at'] < time()) {
                $this->del($key);
                return null;
            }
        }
        if(!isset($data['value'])){
            return null;
        }
        return $data['value'];
    }
}