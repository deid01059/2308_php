<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DateTimeInterface;

class Talk extends Model
{
    use HasFactory;

    protected $fillable = [
        'talk',
        'u_id',
        'updated_at',
    ];

    // API로 JSON을 파싱할때 TimeZonte을 맞추는 설정
    protected function serializeDate(DateTimeInterface $date){
        return $date->format('Y-m-d H:i:s');
    }

}
