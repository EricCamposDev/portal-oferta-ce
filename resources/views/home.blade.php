@extends('layouts.app')

@section('title', 'Oferta CE - Encontre Seu Próximo Freela no Ceará')

@section('content')
<!-- Hero Section -->
<section class="py-5 mt-4">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <div class="mb-4">
                    <span class="badge bg-success bg-opacity-10 text-success fs-6 mb-3 px-3 py-2">
                        <i class="fas fa-rocket me-2"></i>Plataforma #1 de Freelas no CE
                    </span>
                    <h1 class="display-5 fw-bold text-dark mb-3">
                        Encontre seu próximo 
                        <span class="text-success">freela</span> 
                        no Ceará
                    </h1>
                    <p class="lead text-muted mb-4">
                        Conectamos você às melhores oportunidades de trabalho temporário. 
                        Segurança, entregador, garçom, pizzaiolo e muito mais!
                    </p>
                </div>

                <div class="d-flex flex-column flex-sm-row gap-3 mb-4">
                    <a href="{{ route('jobs.index') }}" class="btn btn-success btn-lg px-4 py-3 fw-semibold">
                        <i class="fas fa-search me-2"></i>Explorar Vagas
                    </a>
                    @auth
                        <a href="{{ route('jobs.create') }}" class="btn btn-outline-success btn-lg px-4 py-3">
                            <i class="fas fa-plus me-2"></i>Publicar Vaga
                        </a>
                    @else
                        <a href="{{ route('register') }}" class="btn btn-outline-success btn-lg px-4 py-3">
                            <i class="fas fa-user-plus me-2"></i>Começar Agora
                        </a>
                    @endauth
                </div>

                <!-- Stats -->
                <div class="row text-center text-sm-start">
                    <div class="col-sm-4 mb-3 mb-sm-0">
                        <div class="d-flex align-items-center justify-content-center justify-content-sm-start">
                            <i class="fas fa-briefcase text-success fs-4 me-2"></i>
                            <div>
                                <h4 class="fw-bold mb-0">{{ $stats['total_jobs'] }}+</h4>
                                <small class="text-muted">Vagas Ativas</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 mb-3 mb-sm-0">
                        <div class="d-flex align-items-center justify-content-center justify-content-sm-start">
                            <i class="fas fa-building text-success fs-4 me-2"></i>
                            <div>
                                <h4 class="fw-bold mb-0">{{ $stats['total_companies'] }}+</h4>
                                <small class="text-muted">Empresas</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="d-flex align-items-center justify-content-center justify-content-sm-start">
                            <i class="fas fa-users text-success fs-4 me-2"></i>
                            <div>
                                <h4 class="fw-bold mb-0">{{ count($stats['featured_categories']) }}+</h4>
                                <small class="text-muted">Categorias</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 text-center">
                <div class="position-relative">
                    <div class="bg-success bg-opacity-10 rounded-3 p-5 d-inline-block">
                        <i class="fas fa-briefcase text-success" style="font-size: 4rem;"></i>
                    </div>
                    <!-- Floating Elements -->
                    <div class="position-absolute top-0 start-0 mt-n3 ms-n3">
                        <div class="bg-warning bg-opacity-10 rounded-circle p-3">
                            <i class="fas fa-bolt text-warning fs-2"></i>
                        </div>
                    </div>
                    <div class="position-absolute bottom-0 end-0 mb-n3 me-n3">
                        <div class="bg-info bg-opacity-10 rounded-circle p-3">
                            <i class="fas fa-star text-info fs-2"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- How It Works -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <span class="badge bg-success bg-opacity-10 text-success fs-6 mb-3 px-3 py-2">
                Como Funciona
            </span>
            <h2 class="fw-bold text-dark mb-3">Encontre vagas em 3 passos</h2>
            <p class="text-muted lead">Simples, rápido e eficiente</p>
        </div>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="text-center p-4 h-100">
                    <div class="bg-success bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-4" 
                         style="width: 80px; height: 80px;">
                        <i class="fas fa-search text-success fs-2"></i>
                    </div>
                    <h4 class="fw-semibold mb-3">1. Encontre</h4>
                    <p class="text-muted mb-0">
                        Navegue por diversas oportunidades disponíveis em toda Fortaleza e interior do Ceará
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="text-center p-4 h-100">
                    <div class="bg-success bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-4" 
                         style="width: 80px; height: 80px;">
                        <i class="fab fa-whatsapp text-success fs-2"></i>
                    </div>
                    <h4 class="fw-semibold mb-3">2. Candidate-se</h4>
                    <p class="text-muted mb-0">
                        Entre em contato direto com o anunciante via WhatsApp com um clique
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="text-center p-4 h-100">
                    <div class="bg-success bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-4" 
                         style="width: 80px; height: 80px;">
                        <i class="fas fa-handshake text-success fs-2"></i>
                    </div>
                    <h4 class="fw-semibold mb-3">3. Trabalhe</h4>
                    <p class="text-muted mb-0">
                        Combine os detalhes e comece a trabalhar no seu próximo freela
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Featured Categories -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <span class="badge bg-success bg-opacity-10 text-success fs-6 mb-3 px-3 py-2">
                Categorias Populares
            </span>
            <h2 class="fw-bold text-dark mb-3">Explore por categoria</h2>
            <p class="text-muted">Encontre vagas na sua área de interesse</p>
        </div>

        <div class="row g-3">
            @foreach($stats['featured_categories'] as $category)
            <div class="col-6 col-md-4 col-lg-2">
                <a href="{{ route('jobs.search', ['category' => $category['slug']]) }}" 
                   class="text-decoration-none">
                    <div class="card border-0 shadow-sm h-100 text-center hover-lift">
                        <div class="card-body py-4">
                            <div class="bg-success bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                                 style="width: 60px; height: 60px;">
                                <i class="fas fa-tag text-success fs-5"></i>
                            </div>
                            <h6 class="fw-semibold text-dark mb-1">{{ $category['name'] }}</h6>
                            <small class="text-muted">{{ $category['count'] }} vaga(s)</small>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>

        <div class="text-center mt-4">
            <a href="{{ route('jobs.index') }}" class="btn btn-outline-success">
                Ver Todas as Categorias
            </a>
        </div>
    </div>
</section>

<!-- Featured Jobs -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mb-5">
            <div class="text-center text-md-start mb-4 mb-md-0">
                <span class="badge bg-success bg-opacity-10 text-success fs-6 mb-2 px-3 py-2">
                    Vagas em Destaque
                </span>
                <h2 class="fw-bold text-dark mb-2">Oportunidades Recentes</h2>
                <p class="text-muted mb-0">Confira as últimas vagas publicadas</p>
            </div>
            <a href="{{ route('jobs.index') }}" class="btn btn-success">
                <i class="fas fa-list me-2"></i>Ver Todas
            </a>
        </div>

        <div class="row g-4">
            @forelse($featured_jobs as $job)
            <div class="col-md-6 col-lg-4">
                <div class="card border-0 shadow-sm h-100 hover-lift">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <span class="badge bg-success bg-opacity-10 text-success">
                                {{ $job->category->name }}
                            </span>
                            <span class="badge bg-warning bg-opacity-10 text-dark">
                                {{ $job->getStatusText() }}
                            </span>
                        </div>
                        
                        <h5 class="card-title fw-semibold text-dark mb-2">
                            {{ Str::limit($job->title, 50) }}
                        </h5>
                        
                        <p class="text-muted small mb-3">
                            <i class="fas fa-building text-muted me-1"></i>
                            {{ $job->company }}
                        </p>
                        
                        <p class="card-text text-muted small mb-3">
                            {{ Str::limit($job->description, 100) }}
                        </p>

                        <div class="job-meta mb-3">
                            <div class="d-flex align-items-center mb-2">
                                <i class="fas fa-map-marker-alt text-muted me-2 fs-6"></i>
                                <small class="text-muted">{{ Str::limit($job->location, 30) }}</small>
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                <i class="fas fa-money-bill-wave text-muted me-2 fs-6"></i>
                                <small class="text-muted">R$ {{ number_format($job->paid_value, 2, ',', '.') }}</small>
                            </div>
                            <div class="d-flex align-items-center">
                                <i class="fas fa-users text-muted me-2 fs-6"></i>
                                <small class="text-muted">{{ $job->vacancies_count }} vaga(s)</small>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-transparent border-0 pt-0">
                        <a href="{{ route('jobs.show', $job) }}" class="btn btn-outline-success w-100">
                            Ver Detalhes
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12">
                <div class="text-center py-5">
                    <div class="bg-light rounded-3 p-5">
                        <i class="fas fa-inbox text-muted mb-3" style="font-size: 3rem;"></i>
                        <h4 class="text-muted mb-3">Nenhuma vaga disponível</h4>
                        <p class="text-muted mb-4">Seja o primeiro a publicar uma oportunidade!</p>
                        @auth
                            <a href="{{ route('jobs.create') }}" class="btn btn-success">Publicar Vaga</a>
                        @else
                            <a href="{{ route('register') }}" class="btn btn-success">Cadastrar e Publicar</a>
                        @endauth
                    </div>
                </div>
            </div>
            @endforelse
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-5 bg-success bg-gradient">
    <div class="container">
        <div class="row align-items-center text-center text-lg-start">
            <div class="col-lg-8 text-white mb-4 mb-lg-0">
                <h3 class="fw-bold mb-3">Pronto para encontrar seu próximo freela?</h3>
                <p class="mb-0 opacity-75">Junte-se a milhares de profissionais e empresas no maior portal de freelas do Ceará</p>
            </div>
            <div class="col-lg-4 text-center text-lg-end">
                @auth
                    <a href="{{ route('jobs.create') }}" class="btn btn-light btn-lg fw-semibold px-4">
                        <i class="fas fa-plus me-2"></i>Publicar Vaga
                    </a>
                @else
                    <div class="d-flex flex-column flex-sm-row gap-3 justify-content-center justify-content-lg-end">
                        <a href="{{ route('register') }}" class="btn btn-light btn-lg fw-semibold px-4">
                            <i class="fas fa-user-plus me-2"></i>Criar Conta
                        </a>
                        <a href="{{ route('login') }}" class="btn btn-outline-light btn-lg px-4">
                            <i class="fas fa-sign-in-alt me-2"></i>Entrar
                        </a>
                    </div>
                @endauth
            </div>
        </div>
    </div>
</section>

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

/* Mobile optimizations */
@media (max-width: 768px) {
    .display-5 {
        font-size: 2.5rem;
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
</style>
@endsection