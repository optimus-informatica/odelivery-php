<?php
namespace App\Traits;

use Ramsey\Uuid\Uuid;

trait Uuid4 {
    public static function bootUuid4() {
        static::creating(function($model) {
            $model->user_id = Uuid::uuid4();
        });
    }
}
