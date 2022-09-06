<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Laravel\Sanctum\HasApiTokens;

/**
 * @property mixed first_name
 * @property mixed last_name
 * @property mixed phone
 * @property mixed email
 * @property mixed|string password
 */
class User extends Model
{
    use HasFactory, HasApiTokens;

    /**
     * @var string
     */
    protected $table = "users";

    /**
     * @return BelongsTo
     */
    public function company(): BelongsTo
    {
        return $this->belongsTo('company');
    }
}
