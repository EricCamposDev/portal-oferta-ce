@extends('layouts.app')

@section('title', 'Recuperar Senha - Oferta CE')

@section('content')
<!-- Hero Section -->
<section class="py-5 mt-4 bg-success bg-gradient">
    <div class="container p-3">
        <div class="row justify-content-center text-center text-white">
            <div class="col-lg-8">
                <!-- <span class="badge bg-white bg-opacity-20 text-white fs-6 mb-3 px-3 py-2">
                    <i class="fas fa-key me-2"></i>Recuperação de Senha
                </span> -->
                <h1 class="display-5 fw-bold mb-4">Recupere Sua Senha</h1>
                <p class="lead mb-4 opacity-75">Vamos te ajudar a redefinir sua senha e recuperar o acesso à sua conta</p>
            </div>
        </div>
    </div>
</section>

<!-- Forgot Password Form Section -->
<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="card border-0 shadow-lg">
                    <div class="card-header bg-transparent border-0 py-4">
                        <h2 class="fw-bold text-dark mb-0 text-center">
                            <i class="fas fa-unlock-alt text-success me-2"></i>Redefinir Senha
                        </h2>
                    </div>
                    <div class="card-body p-4 p-md-5">
                        <!-- Instructions -->
                        <div class="alert alert-info border-0 mb-4">
                            <div class="d-flex">
                                <i class="fas fa-info-circle text-info me-3 mt-1 fs-5"></i>
                                <div>
                                    <h6 class="alert-heading mb-2">Como funciona?</h6>
                                    <p class="mb-0 small">
                                        Informe seu email cadastrado e enviaremos um link para redefinir sua senha. 
                                        O link expira em 60 minutos.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Session Status -->
                        @if (session('status'))
                        <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                            <i class="fas fa-check-circle me-2"></i>
                            {{ session('status') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                        @endif

                        <form method="POST" action="{{ route('password.email') }}" id="forgotPasswordForm">
                            @csrf

                            <!-- Email Address -->
                            <div class="mb-4">
                                <label for="email" class="form-label fw-semibold text-dark">
                                    <i class="fas fa-envelope text-success me-2"></i>Email Cadastrado *
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0">
                                        <i class="fas fa-at text-muted"></i>
                                    </span>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror border-start-0" 
                                           id="email" name="email" value="{{ old('email') }}" 
                                           placeholder="seu@email.com" required autofocus autocomplete="email">
                                </div>
                                @error('email')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                                <small class="text-muted mt-1">
                                    <i class="fas fa-shield-alt me-1"></i>Seu email está seguro conosco
                                </small>
                            </div>

                            <!-- Submit Button -->
                            <div class="d-grid mb-4">
                                <button type="submit" class="btn btn-success btn-lg py-3 fw-semibold">
                                    <i class="fas fa-paper-plane me-2"></i>Enviar Link de Recuperação
                                </button>
                            </div>

                            <!-- Back to Login -->
                            <div class="text-center">
                                <a href="{{ route('login') }}" class="btn btn-outline-success">
                                    <i class="fas fa-arrow-left me-2"></i>Voltar para o Login
                                </a>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Security Tips Card -->
                <div class="card border-0 shadow-sm mt-4">
                    <div class="card-body">
                        <h5 class="fw-semibold text-dark mb-3 text-center">
                            <i class="fas fa-shield-alt text-success me-2"></i>Dicas de Segurança
                        </h5>
                        <div class="row g-3">
                            <div class="col-12">
                                <div class="d-flex align-items-start">
                                    <i class="fas fa-check-circle text-success mt-1 me-2"></i>
                                    <div>
                                        <small class="fw-semibold text-dark d-block">Verifique sua caixa de spam</small>
                                        <small class="text-muted">O email pode ter sido filtrado</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d-flex align-items-start">
                                    <i class="fas fa-check-circle text-success mt-1 me-2"></i>
                                    <div>
                                        <small class="fw-semibold text-dark d-block">Use senhas fortes</small>
                                        <small class="text-muted">Misture letras, números e símbolos</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d-flex align-items-start">
                                    <i class="fas fa-check-circle text-success mt-1 me-2"></i>
                                    <div>
                                        <small class="fw-semibold text-dark d-block">Não compartilhe sua senha</small>
                                        <small class="text-muted">Mantenha suas credenciais em segredo</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Support Card -->
                <div class="card border-0 shadow-sm mt-3">
                    <div class="card-body text-center p-4">
                        <div class="d-flex align-items-center justify-content-center mb-3">
                            <i class="fas fa-headset text-success me-2 fs-4"></i>
                            <h6 class="fw-semibold text-dark mb-0">Precisa de ajuda?</h6>
                        </div>
                        <p class="text-muted small mb-3">Entre em contato com nosso suporte</p>
                        <a href="mailto:suporte@ofertace.com.br" class="btn btn-outline-success btn-sm">
                            <i class="fas fa-envelope me-1"></i>suporte@ofertace.com.br
                        </a>
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

.alert {
    border: none;
    border-radius: 10px;
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
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('forgotPasswordForm');
    const emailInput = document.getElementById('email');
    
    // Form submission handling
    form.addEventListener('submit', function(e) {
        // Add loading state
        const submitButton = this.querySelector('button[type="submit"]');
        const originalText = submitButton.innerHTML;
        
        submitButton.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Enviando...';
        submitButton.disabled = true;
        
        // Re-enable button after 5 seconds in case of error
        setTimeout(() => {
            submitButton.innerHTML = originalText;
            submitButton.disabled = false;
        }, 5000);
    });
    
    // Auto-hide alerts after 8 seconds
    const alerts = document.querySelectorAll('.alert');
    alerts.forEach(alert => {
        if (!alert.classList.contains('alert-info')) { // Don't auto-hide info alerts
            setTimeout(() => {
                if (alert.classList.contains('show')) {
                    const bsAlert = new bootstrap.Alert(alert);
                    bsAlert.close();
                }
            }, 8000);
        }
    });
    
    // Email validation feedback
    emailInput.addEventListener('blur', function() {
        if (this.value && !this.checkValidity()) {
            this.classList.add('is-invalid');
        } else {
            this.classList.remove('is-invalid');
        }
    });
    
    // Real-time email validation
    emailInput.addEventListener('input', function() {
        if (this.value && this.checkValidity()) {
            this.classList.remove('is-invalid');
            this.classList.add('is-valid');
        } else {
            this.classList.remove('is-valid');
        }
    });
    
    // Add validation styles
    const style = document.createElement('style');
    style.textContent = `
        .is-valid {
            border-color: #28a745 !important;
        }
        .is-invalid {
            border-color: #dc3545 !important;
        }
    `;
    document.head.appendChild(style);
});
</script>
@endsection