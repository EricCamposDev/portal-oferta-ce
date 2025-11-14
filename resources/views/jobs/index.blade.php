@extends('layouts.app')

@section('title', 'Vagas Freelancer - Oferta CE')

@section('content')
<!-- Hero Search Section -->
<section class="py-5 mt-4 bg-success bg-gradient">
    <div class="container p-3">
        <div class="row justify-content-center text-center text-white">
            <div class="col-lg-8">
                <h1 class="display-5 fw-bold mb-4">Vagas Freelancer no Ceará</h1>
                <p class="lead mb-4 opacity-75">Encontre as melhores oportunidades de trabalho temporário perto de você</p>
            </div>
        </div>

        <!-- Search Form -->
        <div class="row justify-content-center mt-4">
            <div class="col-lg-10">
                <div class="card border-0 shadow-lg">
                    <div class="card-body p-4">
                        <form action="{{ route('jobs.search') }}" method="GET">
                            <div class="row g-3 align-items-end">
                                <div class="col-md-5">
                                    <label class="form-label fw-semibold text-dark">O que você procura?</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light border-end-0">
                                            <i class="fas fa-search text-muted"></i>
                                        </span>
                                        <input type="text" name="search" class="form-control border-start-0" 
                                               placeholder="Digite cargo, empresa ou palavra-chave..." 
                                               value="{{ request('search') }}">
                                    </div>
                                </div>
                                
                                <div class="col-md-4">
                                    <label class="form-label fw-semibold text-dark">Categoria</label>
                                    <select name="category" class="form-select">
                                        <option value="">Todas as categorias</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" 
                                                {{ request('category') == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                
                                <div class="col-md-3">
                                    <button type="submit" class="btn btn-success w-100 py-2 fw-semibold">
                                        <i class="fas fa-search me-2"></i>Buscar Vagas
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Quick Categories -->
<section class="py-4 bg-light">
    <div class="container">
        <div class="row g-2 justify-content-center">
            <div class="col-auto">
                <a href="{{ route('jobs.index') }}" 
                   class="btn btn-outline-dark btn-sm {{ !request()->has('category') ? 'active' : '' }}">
                    Todas as Vagas
                </a>
            </div>
            @foreach($categories->take(8) as $category)
            <div class="col-auto">
                <a href="{{ route('jobs.search', ['category' => $category->id]) }}" 
                   class="btn btn-outline-success btn-sm {{ request('category') == $category->id ? 'active' : '' }}">
                    {{ $category->name }}
                </a>
            </div>
            @endforeach
            @if($categories->count() > 8)
            <div class="col-auto">
                <div class="dropdown">
                    <button class="btn btn-outline-success btn-sm dropdown-toggle" type="button" 
                            data-bs-toggle="dropdown">
                        Mais
                    </button>
                    <ul class="dropdown-menu">
                        @foreach($categories->skip(8) as $category)
                        <li>
                            <a class="dropdown-item" href="{{ route('jobs.search', ['category' => $category->id]) }}">
                                {{ $category->name }}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            @endif
        </div>
    </div>
</section>

<!-- Jobs Grid -->
<section class="py-5">
    <div class="container">
        <!-- Header -->
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mb-5">
            <div>
                <h2 class="fw-bold text-dark mb-2">
                    @if(request()->has('search') || request()->has('category'))
                    Resultados da Busca
                    @else
                    Todas as Vagas
                    @endif
                </h2>
                <p class="text-muted mb-0">
                    @if(request()->has('search') || request()->has('category'))
                    Encontramos <strong>{{ $jobs->total() }}</strong> vaga(s) para você
                    @else
                    <strong>{{ $jobs->total() }}</strong> vagas disponíveis
                    @endif
                </p>
            </div>
            
            @auth
            <a href="{{ route('jobs.create') }}" class="btn btn-success mt-3 mt-md-0">
                <i class="fas fa-plus me-2"></i>Publicar Vaga
            </a>
            @else
            <div class="mt-3 mt-md-0">
                <a href="{{ route('register') }}" class="btn btn-success">
                    <i class="fas fa-user-plus me-2"></i>Anunciar Vaga
                </a>
            </div>
            @endauth
        </div>

        <!-- Jobs -->
        <div class="row g-4">
            @forelse($jobs as $job)
            <div class="col-md-6 col-lg-4">
                <div class="card border-0 shadow-sm h-100 hover-lift job-card">
                    <div class="card-body">
                        <!-- Header -->
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <span class="badge bg-dark bg-opacity-10 text-success">
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
                    </div>
                    
                    <!-- Footer -->
                    <div class="card-footer bg-transparent border-0 pt-0">
                        <div class="d-grid">
                            <a href="{{ route('jobs.show', $job) }}" class="btn btn-outline-success">
                                <i class="fas fa-eye me-2"></i>Ver Detalhes
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <!-- Empty State -->
            <div class="col-12">
                <div class="text-center py-5">
                    <div class="bg-light rounded-3 p-5">
                        <i class="fas fa-search text-muted mb-3" style="font-size: 3rem;"></i>
                        <h4 class="text-muted mb-3">
                            @if(request()->has('search') || request()->has('category'))
                            Nenhuma vaga encontrada
                            @else
                            Nenhuma vaga disponível no momento
                            @endif
                        </h4>
                        <p class="text-muted mb-4">
                            @if(request()->has('search') || request()->has('category'))
                            Tente ajustar os termos da sua busca ou <a href="{{ route('jobs.index') }}">ver todas as vagas</a>
                            @else
                            Seja o primeiro a publicar uma oportunidade!
                            @endif
                        </p>
                        @if(!request()->has('search') && !request()->has('category'))
                            @auth
                                <a href="{{ route('jobs.create') }}" class="btn btn-success">Publicar Vaga</a>
                            @else
                                <a href="{{ route('register') }}" class="btn btn-success">Cadastrar e Publicar</a>
                            @endauth
                        @else
                            <a href="{{ route('jobs.index') }}" class="btn btn-success">Ver Todas as Vagas</a>
                        @endif
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

<!-- CTA Section -->
@guest
<section class="py-5 bg-light">
    <div class="container">
        <div class="row align-items-center text-center text-lg-start">
            <div class="col-lg-8 mb-4 mb-lg-0">
                <h3 class="fw-bold text-dark mb-3">Quer publicar uma vaga?</h3>
                <p class="text-muted mb-0">Cadastre-se e comece a divulgar oportunidades para milhares de profissionais</p>
            </div>
            <div class="col-lg-4 text-center text-lg-end">
                <a href="{{ route('register') }}" class="btn btn-success btn-lg px-4">
                    <i class="fas fa-user-plus me-2"></i>Criar Conta Grátis
                </a>
            </div>
        </div>
    </div>
</section>
@endguest

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

.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.job-card {
    transition: all 0.3s ease;
}

/* Active state for filter buttons */
.btn-outline-success.active {
    background-color: #198754;
    border-color: #198754;
    color: white;
}

/* Mobile optimizations */
@media (max-width: 768px) {
    .display-5 {
        font-size: 2.5rem;
    }
    
    .btn-lg {
        padding: 0.75rem 1.5rem;
        font-size: 1rem;
    }
    
    .job-meta {
        font-size: 0.8rem;
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