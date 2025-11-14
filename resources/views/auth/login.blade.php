@extends('layouts.app')

@section('title', 'Entrar - Oferta CE')

@section('content')
<!-- Hero Section -->
<section class="py-5 mt-4 bg-success bg-gradient">
    <div class="container p-3">
        <div class="row justify-content-center text-center text-white">
            <div class="col-lg-8">
                <!-- <span class="badge bg-white bg-opacity-20 text-white fs-6 mb-3 px-3 py-2">
                    <i class="fas fa-sign-in-alt me-2"></i>Acesse Sua Conta
                </span> -->
                <h1 class="display-5 fw-bold mb-4">Bem-vindo de Volta</h1>
                <p class="lead mb-4 opacity-75">Acesse sua conta e continue encontrando as melhores oportunidades</p>
            </div>
        </div>
    </div>
</section>

<!-- Login Form Section -->
<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="card border-0 shadow-lg">
                    <div class="card-header bg-transparent border-0 py-4">
                        <h2 class="fw-bold text-dark mb-0 text-center">
                            <i class="fas fa-user-circle text-success me-2"></i>Entrar na Plataforma
                        </h2>
                    </div>
                    <div class="card-body p-4 p-md-5">
                        <!-- Session Status -->
                        @if (session('status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fas fa-check-circle me-2"></i>
                            {{ session('status') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                        @endif

                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <!-- Email Address -->
                            <div class="mb-4">
                                <label for="email" class="form-label fw-semibold text-dark">
                                    <i class="fas fa-envelope text-success me-2"></i>Email *
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0">
                                        <i class="fas fa-at text-muted"></i>
                                    </span>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror border-start-0" 
                                           id="email" name="email" value="{{ old('email') }}" 
                                           placeholder="seu@email.com" required autofocus autocomplete="username">
                                </div>
                                @error('email')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Password -->
                            <div class="mb-4">
                                <label for="password" class="form-label fw-semibold text-dark">
                                    <i class="fas fa-lock text-success me-2"></i>Senha *
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0">
                                        <i class="fas fa-key text-muted"></i>
                                    </span>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror border-start-0" 
                                           id="password" name="password" 
                                           placeholder="Sua senha" required autocomplete="current-password">
                                    <button type="button" class="input-group-text toggle-password" data-target="password">
                                        <i class="fas fa-eye text-muted"></i>
                                    </button>
                                </div>
                                @error('password')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Remember Me & Forgot Password -->
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="remember_me" name="remember">
                                    <label class="form-check-label text-muted" for="remember_me">
                                        Lembrar de mim
                                    </label>
                                </div>
                                
                                @if (Route::has('password.request'))
                                <a class="text-success text-decoration-none" href="{{ route('password.request') }}">
                                    <small><i class="fas fa-question-circle me-1"></i>Esqueceu a senha?</small>
                                </a>
                                @endif
                            </div>

                            <!-- Submit Button -->
                            <div class="d-grid mb-4">
                                <button type="submit" class="btn btn-success btn-lg py-3 fw-semibold">
                                    <i class="fas fa-sign-in-alt me-2"></i>Entrar na Plataforma
                                </button>
                            </div>

                            <!-- Register Link -->
                            <div class="text-center">
                                <p class="text-muted mb-3">Ainda não tem uma conta?</p>
                                <a href="{{ route('register') }}" class="btn btn-outline-success">
                                    <i class="fas fa-user-plus me-2"></i>Criar Conta Gratuita
                                </a>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Features Card -->
                <div class="card border-0 shadow-sm mt-4">
                    <div class="card-body text-center p-4">
                        <h5 class="fw-semibold text-dark mb-3">Por que fazer login?</h5>
                        <div class="row g-3">
                            <div class="col-6">
                                <div class="d-flex align-items-center justify-content-center">
                                    <i class="fas fa-briefcase text-success me-2"></i>
                                    <small class="text-muted">Publicar Vagas</small>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex align-items-center justify-content-center">
                                    <i class="fas fa-heart text-success me-2"></i>
                                    <small class="text-muted">Salvar Favoritos</small>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex align-items-center justify-content-center">
                                    <i class="fas fa-bell text-success me-2"></i>
                                    <small class="text-muted">Receber Alertas</small>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex align-items-center justify-content-center">
                                    <i class="fas fa-chart-line text-success me-2"></i>
                                    <small class="text-muted">Acompanhar Candidaturas</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
.bg-gradient {
    background: linear-gradient(135deg, #28a745 0%, #20c997 100%) !important;
}

.card {
    transition: all 0.3s ease;
}

.form-control, .form-select {
    border: 2px solid #e9ecef;
    transition: all 0.3s ease;
}

.form-control:focus, .form-select:focus {
    border-color: #28a745;
    box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.25);
}

.btn-lg {
    padding: 0.75rem 2rem;
    font-size: 1.1rem;
}

.toggle-password {
    cursor: pointer;
    transition: all 0.3s ease;
}

.toggle-password:hover {
    background-color: #e9ecef;
}

/* Mobile optimizations */
@media (max-width: 768px) {
    .display-5 {
        font-size: 2.5rem;
    }
    
    .card-body {
        padding: 1.5rem !important;
    }
    
    .btn-lg {
        padding: 0.75rem 1.5rem;
        font-size: 1rem;
    }
}

/* Smooth animations */
.form-label {
    transition: all 0.3s ease;
}

.btn {
    transition: all 0.3s ease;
}

.btn:hover {
    transform: translateY(-2px);
}

.alert {
    border: none;
    border-radius: 10px;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Toggle password visibility
    const toggleButtons = document.querySelectorAll('.toggle-password');
    
    toggleButtons.forEach(button => {
        button.addEventListener('click', function() {
            const targetId = this.getAttribute('data-target');
            const passwordInput = document.getElementById(targetId);
            const icon = this.querySelector('i');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        });
    });

    // Auto-hide alerts after 5 seconds
    const alerts = document.querySelectorAll('.alert');
    alerts.forEach(alert => {
        setTimeout(() => {
            const bsAlert = new bootstrap.Alert(alert);
            bsAlert.close();
        }, 5000);
    });

    // Add loading state to form submission
    const form = document.querySelector('form');
    form.addEventListener('submit', function() {
        const submitButton = this.querySelector('button[type="submit"]');
        submitButton.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Entrando...';
        submitButton.disabled = true;
    });
});
</script>
@endsection