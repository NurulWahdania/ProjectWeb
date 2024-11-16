<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class employer extends Model
{
    use HasFactory;

    protected $table = "employer_profiles";

    protected $fillable = [
        'user_id',
        'company_name',
        'company_description',
        'industry',
        'website',
        'phone',
        'address',
        'logo'
    ];

    protected $guarded = ['id'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
