<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SalesPage extends Model
{
    protected $fillable = [
        'user_id',
        'product_name',
        'description',
        'features',
        'target_audience',
        'price',
        'unique_selling_points',
        'headline',
        'subheadline',
        'product_description',
        'benefits',
        'features_breakdown',
        'social_proof',
        'pricing_display',
        'call_to_action',
        'raw_ai_response',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}