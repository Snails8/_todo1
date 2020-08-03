<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
     protected $table = 'task'; // テーブル名を指定

    protected $primaryKey = 'task_id'; // 主キーのカラム名を指定

    public function status()
    {
        // belongsToメソッドでStatusモデルにアクセスするリレーションを定義
        return $this->belongsTo('\App\Status', 'status_id', 'status_id');
    }

}
