<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    // Relacionamento com vagas
    public function jobs()
    {
        return $this->hasMany(FreelanceJob::class);
    }

    // Scope para categorias ativas
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Método para obter categorias populares (com mais vagas)
    public function scopePopular($query, $limit = 10)
    {
        return $query->withCount(['jobs as active_jobs_count' => function($query) {
                $query->where('status', 'open')
                      ->where('end_date', '>', now());
            }])
            ->active()
            ->orderBy('active_jobs_count', 'desc')
            ->limit($limit);
    }
}
