<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * @var string
     */
    protected $table = "companies";

    /**
     * @return HasOne
     */
    public function data(): HasOne
    {
        return $this->hasOne(CompanyData::class);
    }
}
