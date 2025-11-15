<nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top border-bottom">
    <div class="container">
        <!-- Logo -->
        <a class="navbar-brand d-flex align-items-center fw-bold text-decoration-none" href="{{ route('home') }}">
            <img src="{{ asset('images/logo-wbg-2.png') }}" height="40" alt="Oferta CE" loading="lazy" class="logo">
        </a>

        <!-- Mobile Toggle -->
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" 
                data-bs-target="#navbarContent" aria-controls="navbarContent" 
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menu Content -->
        <div class="collapse navbar-collapse" id="navbarContent">
            <!-- Menu Links -->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('/') ? 'active fw-semibold' : '' }}" 
                       href="{{ route('home') }}">
                        <i class="fas fa-home me-1"></i>Início
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('vagas') || request()->is('vagas/*') ? 'active fw-semibold' : '' }}" 
                       href="{{ route('jobs.index') }}">
                        <i class="fas fa-briefcase me-1"></i>Vagas
                    </a>
                </li>
                @auth
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('vagas/criar') ? 'active fw-semibold' : '' }}" 
                    href="{{ route('jobs.create') }}">
                        <i class="fas fa-plus-circle me-1"></i>Publicar Vaga
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('minhas-vagas*') ? 'active fw-semibold' : '' }}" 
                    href="{{ route('jobs.my') }}">
                        <i class="fas fa-briefcase me-1"></i>Minhas Vagas
                    </a>
                </li>
                @endauth
            </ul>

            <!-- User Menu -->
            <div class="d-flex align-items-center">
                @auth
                    <!-- User Dropdown -->
                    <div class="dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center text-dark text-decoration-none" 
                           href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="bg-success rounded-circle d-flex align-items-center justify-content-center avatar-circle me-2">
                                <span class="text-white fw-bold small">
                                    {{ substr(auth()->user()->name, 0, 1) }}
                                </span>
                            </div>
                            <span class="d-none d-md-inline">{{ auth()->user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end border-0 shadow-sm">
                            <li>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <i class="fas fa-user me-2 text-muted"></i>
                                    Meu Perfil
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item d-flex align-items-center" href="{{ route('jobs.my') }}">
                                    <i class="fas fa-history me-2 text-muted"></i>
                                    Minhas Vagas
                                </a>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item d-flex align-items-center text-danger">
                                        <i class="fas fa-sign-out-alt me-2"></i>
                                        Sair
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                @else
                    <!-- Auth Buttons -->
                    <div class="d-flex flex-column flex-sm-row gap-2">
                        <a class="btn btn-outline-success btn-sm" href="{{ route('login') }}">
                            <i class="fas fa-sign-in-alt me-1"></i>
                            <span class="d-none d-sm-inline">Entrar</span>
                        </a>
                        <a class="btn btn-success btn-sm" href="{{ route('register') }}">
                            <i class="fas fa-user-plus me-1"></i>
                            <span class="d-none d-sm-inline">Cadastrar</span>
                        </a>
                    </div>
                @endauth
            </div>
        </div>
    </div>
</nav>

<style>
.avatar-circle {
    width: 32px;
    height: 32px;
    font-size: 0.8rem;
}

/* Active state for nav links */
.nav-link.active {
    color: #198754 !important;
}

/* Dropdown styling */
.dropdown-menu {
    min-width: 200px;
}

/* Mobile optimizations */
@media (max-width: 991.98px) {
    .navbar-collapse {
        padding-top: 1rem;
    }
    
    .nav-item {
        margin-bottom: 0.5rem;
    }
    
    .d-flex.flex-column.flex-sm-row {
        flex-direction: column !important;
        gap: 0.5rem !important;
    }
    
    .btn-sm {
        width: 100%;
        justify-content: center;
    }
}

/* Hover effects */
.nav-link:hover {
    color: #198754 !important;
}

.dropdown-item:hover {
    background-color: #f8f9fa;
    color: #198754 !important;
}
</style>