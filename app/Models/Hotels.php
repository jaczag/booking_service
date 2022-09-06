<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hotels extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * @var string
     */
    protected $table = "hotels";

    /**
     * @return MorphMany
     */
    public function services(): MorphMany
    {
        return $this->morphMany(Service::class, 'serviceable');
    }
}
