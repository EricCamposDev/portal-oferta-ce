@extends('layouts.app')

@section('title', $job->title . ' - Oferta CE')

@section('content')
<!-- Hero Section -->
<section class="py-5 mt-4 bg-success bg-gradient p-3">
    <div class="container p-3">
        <div class="row align-items-center">
            <div class="col-lg-8 text-white">
                <!-- <span class="badge bg-white bg-opacity-20 text-warning fs-6 mb-3 px-3 py-2">
                    <i class="fas fa-briefcase me-2"></i> Oportunidade
                </span> -->
                <h1 class="display-5 fw-bold mb-3">{{ $job->title }}</h1>
                <div class="d-flex flex-wrap gap-3 align-items-center mb-4">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-building me-2 opacity-75"></i>
                        <span class="fw-semibold">{{ $job->company }}</span>
                    </div>
                    <div class="d-flex align-items-center">
                        <i class="fas fa-map-marker-alt me-2 opacity-75"></i>
                        <span>{{ $job->location }}</span>
                    </div>
                    <div class="d-flex align-items-center">
                        <i class="fas fa-money-bill-wave me-2 opacity-75"></i>
                        <span class="fw-semibold">R$ {{ number_format($job->paid_value, 2, ',', '.') }}</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 text-lg-end">
                <span class="badge bg-white bg-opacity-20 text-dark fs-6 px-3 py-2 mb-2 d-inline-block">
                    Vaga {{ $job->getStatusText() }}
                </span>
                <div class="mt-3">
                    <span class="badge bg-warning bg-opacity-20 text-dark fs-6 px-3 py-2">
                        Categoria: {{ $job->category->name }}
                    </span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Main Content -->
<section class="py-5">
    <div class="container">
        <div class="row g-5">
            <!-- Left Column - Job Details -->
            <div class="col-lg-8">
                <!-- Job Info Cards -->
                <div class="row g-4 mb-5">
                    <div class="col-md-6">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body text-center p-4">
                                <div class="bg-success bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                                     style="width: 60px; height: 60px;">
                                    <i class="fas fa-users text-success fs-4"></i>
                                </div>
                                <h4 class="fw-bold text-dark mb-1">{{ $job->vacancies_count }}</h4>
                                <p class="text-muted mb-0">Vagas Disponíveis</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body text-center p-4">
                                <div class="bg-success bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                                     style="width: 60px; height: 60px;">
                                    <i class="fas fa-calendar-alt text-success fs-4"></i>
                                </div>
                                <h4 class="fw-bold text-dark mb-1">{{ $job->start_date->format('d/m') }}</h4>
                                <p class="text-muted mb-0">Data de Início</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Job Description -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-transparent border-0 py-4">
                        <h3 class="fw-bold text-dark mb-0">
                            <i class="fas fa-file-alt text-success me-2"></i>Descrição da Vaga
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="job-content">
                            {!! nl2br(e($job->description)) !!}
                        </div>
                    </div>
                </div>

                <!-- Requirements -->
                @if($job->requirements)
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-transparent border-0 py-4">
                        <h3 class="fw-bold text-dark mb-0">
                            <i class="fas fa-tasks text-success me-2"></i>Requisitos
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="job-content">
                            {!! nl2br(e($job->requirements)) !!}
                        </div>
                    </div>
                </div>
                @endif
            </div>

            <!-- Right Column - Action Sidebar -->
            <div class="col-lg-4">
                <!-- Contact Card -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-transparent border-0 py-4">
                        <h4 class="fw-bold text-dark mb-0">
                            <i class="fas fa-paper-plane text-success me-2"></i>Interessado?
                        </h4>
                    </div>
                    <div class="card-body text-center">
                        @if($job->status === \App\Models\FreelanceJob::STATUS_OPEN && $job->user->whatsapp)
                            <a href="https://wa.me/55{{ preg_replace('/[^0-9]/', '', $job->user->whatsapp) }}?text={{ $job->getWhatsAppMessage() }}" 
                               class="btn btn-success btn-lg w-100 py-3 fw-semibold mb-3" 
                               target="_blank">
                                <i class="fab fa-whatsapp me-2 fs-5"></i>Contatar via WhatsApp
                            </a>
                            <small class="text-muted">
                                Clique para conversar diretamente com o anunciante
                            </small>
                        @elseif($job->status !== \App\Models\FreelanceJob::STATUS_OPEN)
                            <div class="alert alert-warning mb-0">
                                <i class="fas fa-info-circle me-2"></i>
                                <strong>Vaga {{ strtolower($job->getStatusText()) }}!</strong><br>
                                Esta vaga não está mais aceitando candidaturas.
                            </div>
                        @else
                            <div class="alert alert-secondary mb-0">
                                <i class="fas fa-exclamation-triangle me-2"></i>
                                WhatsApp não disponível para contato.
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Job Details Card -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-transparent border-0 py-4">
                        <h4 class="fw-bold text-dark mb-0">
                            <i class="fas fa-info-circle text-success me-2"></i>Detalhes
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center py-2 border-bottom">
                            <span class="text-muted">Empresa:</span>
                            <span class="fw-semibold">{{ $job->company }}</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center py-2 border-bottom">
                            <span class="text-muted">Local:</span>
                            <span class="fw-semibold">{{ $job->location }}</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center py-2 border-bottom">
                            <span class="text-muted">Valor:</span>
                            <span class="fw-semibold text-success">R$ {{ number_format($job->paid_value, 2, ',', '.') }}</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center py-2 border-bottom">
                            <span class="text-muted">Início:</span>
                            <span class="fw-semibold">{{ $job->start_date->format('d/m/Y H:i') }}</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center py-2 border-bottom">
                            <span class="text-muted">Término:</span>
                            <span class="fw-semibold">{{ $job->end_date->format('d/m/Y H:i') }}</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center py-2">
                            <span class="text-muted">Publicada:</span>
                            <span class="fw-semibold">{{ $job->created_at->diffForHumans() }}</span>
                        </div>
                    </div>
                </div>

                <!-- Publisher Info -->
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-transparent border-0 py-4">
                        <h4 class="fw-bold text-dark mb-0">
                            <i class="fas fa-user text-success me-2"></i>Anunciante
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <div class="bg-success rounded-circle d-flex align-items-center justify-content-center me-3" 
                                 style="width: 50px; height: 50px;">
                                <span class="text-white fw-bold fs-5">
                                    {{ substr($job->user->name, 0, 1) }}
                                </span>
                            </div>
                            <div>
                                <h5 class="fw-bold mb-1">{{ $job->user->name }}</h5>
                                <small class="text-muted">Membro desde {{ $job->user->created_at->format('m/Y') }}</small>
                            </div>
                        </div>
                        
                        <div class="publisher-contact">
                            @if($job->user->whatsapp)
                            <div class="d-flex align-items-center mb-2">
                                <i class="fab fa-whatsapp text-success me-2"></i>
                                <span class="text-muted">{{ $job->user->whatsapp }}</span>
                            </div>
                            @endif
                            <div class="d-flex align-items-center">
                                <i class="fas fa-envelope text-success me-2"></i>
                                <span class="text-muted">{{ $job->user->email }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Related Jobs -->
@if($related_jobs->count() > 0)
<section class="py-5 bg-light">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-5">
            <div>
                <h2 class="fw-bold text-dark mb-2">Vagas Similares</h2>
                <p class="text-muted mb-0">Outras oportunidades que podem te interessar</p>
            </div>
            <a href="{{ route('jobs.index') }}" class="btn btn-outline-success">
                Ver Todas as Vagas
            </a>
        </div>

        <div class="row g-4">
            @foreach($related_jobs as $related_job)
            <div class="col-md-6 col-lg-4">
                <div class="card border-0 shadow-sm h-100 hover-lift">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <span class="badge bg-success bg-opacity-10 text-success">
                                {{ $related_job->category->name }}
                            </span>
                            <span class="badge bg-warning bg-opacity-10 text-dark">
                                {{ $related_job->getStatusText() }}
                            </span>
                        </div>
                        
                        <h5 class="card-title fw-semibold text-dark mb-2">
                            {{ Str::limit($related_job->title, 50) }}
                        </h5>
                        
                        <p class="text-muted small mb-3">
                            <i class="fas fa-building text-muted me-1"></i>
                            {{ $related_job->company }}
                        </p>

                        <div class="job-meta mb-3">
                            <div class="d-flex align-items-center mb-2">
                                <i class="fas fa-map-marker-alt text-muted me-2 fs-6"></i>
                                <small class="text-muted">{{ Str::limit($related_job->location, 25) }}</small>
                            </div>
                            <div class="d-flex align-items-center">
                                <i class="fas fa-money-bill-wave text-muted me-2 fs-6"></i>
                                <small class="text-muted">R$ {{ number_format($related_job->paid_value, 2, ',', '.') }}</small>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-transparent border-0 pt-0">
                        <a href="{{ route('jobs.show', $related_job) }}" class="btn btn-outline-success w-100">
                            Ver Detalhes
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<style>
.hover-lift {
    transition: all 0.3s ease;
}

.hover-lift:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.1) !important;
}

.bg-gradient {
    background: linear-gradient(135deg, #28a745 0%, #20c997 100%) !important;
}

.job-content {
    line-height: 1.7;
    color: #495057;
}

.job-content br {
    content: "";
    display: block;
    margin-bottom: 0.5rem;
}

/* Mobile optimizations */
@media (max-width: 768px) {
    .display-5 {
        font-size: 2rem;
    }
    
    .btn-lg {
        padding: 0.75rem 1.5rem;
        font-size: 1rem;
    }
}

/* Smooth animations */
.card {
    transition: all 0.3s ease;
}

.badge {
    transition: all 0.3s ease;
}

.btn {
    transition: all 0.3s ease;
}

.publisher-contact {
    border-top: 1px solid #e9ecef;
    padding-top: 1rem;
}
</style>
@endsection