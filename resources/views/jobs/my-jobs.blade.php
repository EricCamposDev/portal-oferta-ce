@extends('layouts.app')

@section('title', 'Minhas Vagas - Oferta CE')

@section('content')
<!-- Hero Section -->
<section class="py-5 mt-4 bg-success bg-gradient">
    <div class="container p-3">
        <div class="row justify-content-center text-center text-white">
            <div class="col-lg-8">
                <!-- <span class="badge bg-white bg-opacity-20 text-white fs-6 mb-3 px-3 py-2">
                    <i class="fas fa-briefcase me-2"></i>Minhas Oportunidades
                </span> -->
                <h1 class="display-5 fw-bold mb-4">Minhas Vagas Publicadas</h1>
                <p class="lead mb-4 opacity-75">Gerencie todas as suas oportunidades em um só lugar</p>
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="py-4 bg-light">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-3">
                <div class="card border-0 shadow-sm text-center">
                    <div class="card-body py-4">
                        <div class="bg-success bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                            style="width: 60px; height: 60px;">
                            <i class="fas fa-layer-group text-success fs-4"></i>
                        </div>
                        <h3 class="fw-bold text-dark mb-1">{{ $jobs->total() }}</h3>
                        <p class="text-muted mb-0">Total de Vagas</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow-sm text-center">
                    <div class="card-body py-4">
                        <div class="bg-success bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                            style="width: 60px; height: 60px;">
                            <i class="fas fa-lock-open text-success fs-4"></i>
                        </div>
                        <h3 class="fw-bold text-dark mb-1">{{ $jobs->where('status', 'open')->count() }}</h3>
                        <p class="text-muted mb-0">Vagas Abertas</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow-sm text-center">
                    <div class="card-body py-4">
                        <div class="bg-warning bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                            style="width: 60px; height: 60px;">
                            <i class="fas fa-user-check text-warning fs-4"></i>
                        </div>
                        <h3 class="fw-bold text-dark mb-1">{{ $jobs->where('status', 'filled')->count() }}</h3>
                        <p class="text-muted mb-0">Preenchidas</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow-sm text-center">
                    <div class="card-body py-4">
                        <div class="bg-secondary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                            style="width: 60px; height: 60px;">
                            <i class="fas fa-flag-checkered text-secondary fs-4"></i>
                        </div>
                        <h3 class="fw-bold text-dark mb-1">{{ $jobs->where('status', 'done')->count() }}</h3>
                        <p class="text-muted mb-0">Concluídas</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Vagas Section -->
<section class="py-5">
    <div class="container">
        <!-- Header -->
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mb-5">
            <div>
                <h2 class="fw-bold text-dark mb-2">Minhas Vagas</h2>
                <p class="text-muted mb-0">Gerencie e edite suas oportunidades publicadas</p>
            </div>

            <div class="mt-3 mt-md-0">
                <a href="{{ route('jobs.create') }}" class="btn btn-success">
                    <i class="fas fa-plus me-2"></i>Nova Vaga
                </a>
            </div>
        </div>

        <!-- Vagas -->
        <div class="row g-4">
            @forelse($jobs as $job)
            <div class="col-md-6 col-lg-4">
                <div class="card border-0 shadow-sm h-100 hover-lift job-card">
                    <div class="card-body">
                        <!-- Header -->
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <span class="badge bg-success bg-opacity-10 text-success">
                                {{ $job->category->name }}
                            </span>
                            <span class="badge {{ $job->getStatusBadgeClass() }} text-dark bg-opacity-10">
                                {{ $job->getStatusText() }}
                            </span>
                        </div>

                        <!-- Title & Company -->
                        <h5 class="card-title fw-semibold text-dark mb-2 line-clamp-2">
                            {{ $job->title }}
                        </h5>
                        <p class="text-muted small mb-3">
                            <i class="fas fa-building text-muted me-1"></i>
                            {{ $job->company }}
                        </p>

                        <!-- Description -->
                        <p class="card-text text-muted small mb-3 line-clamp-2">
                            {{ $job->description }}
                        </p>

                        <!-- Job Meta -->
                        <div class="job-meta mb-3">
                            <div class="d-flex align-items-center mb-2">
                                <i class="fas fa-map-marker-alt text-muted me-2 fs-6"></i>
                                <small class="text-muted">{{ Str::limit($job->location, 25) }}</small>
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                <i class="fas fa-money-bill-wave text-muted me-2 fs-6"></i>
                                <small class="text-muted fw-semibold text-success">
                                    R$ {{ number_format($job->paid_value, 2, ',', '.') }}
                                </small>
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                <i class="fas fa-users text-muted me-2 fs-6"></i>
                                <small class="text-muted">{{ $job->vacancies_count }} vaga(s)</small>
                            </div>
                            <div class="d-flex align-items-center">
                                <i class="fas fa-clock text-muted me-2 fs-6"></i>
                                <small class="text-muted">Expira em {{ $job->end_date->diffForHumans() }}</small>
                            </div>
                        </div>

                        <!-- Stats -->
                        <div class="border-top pt-3">
                            <div class="row text-center">
                                <div class="col-4">
                                    <small class="text-muted d-block">Publicada</small>
                                    <small class="fw-semibold text-dark">{{ $job->created_at->diffForHumans() }}</small>
                                </div>
                                <div class="col-4">
                                    <small class="text-muted d-block">Início</small>
                                    <small class="fw-semibold text-dark">{{ $job->start_date->format('d/m') }}</small>
                                </div>
                                <div class="col-4">
                                    <small class="text-muted d-block">Visualizações</small>
                                    <small class="fw-semibold text-dark">0</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Footer -->
                    <div class="card-footer bg-transparent border-0 pt-0">
                        <div class="d-grid gap-2">
                            <a href="{{ route('jobs.show', $job) }}" class="btn btn-success btn-sm">
                                <i class="fas fa-eye me-1"></i>Ver Detalhes
                            </a>
                            <div class="btn-group w-100">
                                <a href="{{ route('jobs.edit', $job) }}" class="btn btn-dark btn-sm">
                                    <i class="fas fa-edit me-1"></i>Editar
                                </a>
                                <button type="button" class="btn btn-danger btn-sm"
                                    data-bs-toggle="modal" data-bs-target="#deleteModal{{ $job->id }}">
                                    <i class="fas fa-trash me-1"></i>Excluir
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Delete Modal -->
                <div class="modal fade" id="deleteModal{{ $job->id }}" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Confirmar Exclusão</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <p>Tem certeza que deseja excluir a vaga <strong>"{{ $job->title }}"</strong>?</p>
                                <p class="text-muted small">Esta ação não pode ser desfeita.</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                <form action="{{ route('jobs.destroy', $job) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Excluir Vaga</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <!-- Empty State -->
            <div class="col-12">
                <div class="text-center py-5">
                    <div class="bg-light rounded-3 p-5">
                        <i class="fas fa-inbox text-muted mb-3" style="font-size: 3rem;"></i>
                        <h4 class="text-muted mb-3">Nenhuma vaga publicada</h4>
                        <p class="text-muted mb-4">Comece a compartilhar suas oportunidades com profissionais qualificados</p>
                        <a href="{{ route('jobs.create') }}" class="btn btn-success btn-lg">
                            <i class="fas fa-plus me-2"></i>Publicar Primeira Vaga
                        </a>
                    </div>
                </div>
            </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if($jobs->hasPages())
        <div class="row mt-5">
            <div class="col-12">
                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-center">
                        {{ $jobs->links() }}
                    </ul>
                </nav>
            </div>
        </div>
        @endif
    </div>
</section>

<style>
    .hover-lift {
        transition: all 0.3s ease;
    }

    .hover-lift:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1) !important;
    }

    .bg-gradient {
        background: linear-gradient(135deg, #28a745 0%, #20c997 100%) !important;
    }

    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .job-card {
        transition: all 0.3s ease;
    }

    /* Mobile optimizations */
    @media (max-width: 768px) {
        .display-5 {
            font-size: 2.5rem;
        }

        .btn-group {
            flex-direction: column;
        }

        .btn-group .btn {
            border-radius: 0.375rem !important;
            margin-bottom: 0.5rem;
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
</style>
@endsection