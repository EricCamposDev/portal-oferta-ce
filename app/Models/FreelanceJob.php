<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FreelanceJob extends Model
{
    use HasFactory;

    protected $table = 'freelance_jobs';

    protected $fillable = [
        'title',
        'description',
        'category_id',
        'vacancies_count',
        'paid_value',
        'requirements',
        'start_date',
        'end_date',
        'company',
        'location',
        'status',
        'user_id'
    ];

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'paid_value' => 'decimal:2',
    ];

    // Status constants
    const STATUS_OPEN = 'open';
    const STATUS_FILLED = 'filled';
    const STATUS_DONE = 'done';

    public static function getStatusOptions()
    {
        return [
            self::STATUS_OPEN => 'Aberta',
            self::STATUS_FILLED => 'Preenchida',
            self::STATUS_DONE => 'Concluída',
        ];
    }

    // Relacionamento com categoria
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function isActive()
    {
        return $this->end_date > now() && $this->status === self::STATUS_OPEN;
    }

    public function getStatusBadgeClass()
    {
        return match($this->status) {
            self::STATUS_OPEN => 'bg-success',
            self::STATUS_FILLED => 'bg-warning text-dark',
            self::STATUS_DONE => 'bg-secondary',
            default => 'bg-light text-dark',
        };
    }

    public function getStatusText()
    {
        return self::getStatusOptions()[$this->status] ?? 'Desconhecido';
    }

    public function getWhatsAppMessage()
    {
        $message = "Olá! Estou interessado na vaga: " . $this->title . "\n\n";
        $message .= "Empresa: " . $this->company . "\n";
        $message .= "Local: " . $this->location . "\n";
        $message .= "Valor: R$ " . number_format($this->paid_value, 2, ',', '.') . "\n";
        $message .= "Período: " . $this->start_date->format('d/m/Y H:i') . " até " . $this->end_date->format('d/m/Y H:i');
        
        return rawurlencode($message);
    }

    // Scopes
    public function scopeOpen($query)
    {
        return $query->where('status', self::STATUS_OPEN);
    }

    public function scopeActive($query)
    {
        return $query->where('status', self::STATUS_OPEN)
                    ->where('end_date', '>', now());
    }

    public function scopeFilled($query)
    {
        return $query->where('status', self::STATUS_FILLED);
    }

    public function scopeDone($query)
    {
        return $query->where('status', self::STATUS_DONE);
    }

    // Método para obter categorias disponíveis (mantido para compatibilidade)
    public static function getAvailableCategories()
    {
        return Category::active()
            ->get()
            ->pluck('name', 'id')
            ->toArray();
    }
}
