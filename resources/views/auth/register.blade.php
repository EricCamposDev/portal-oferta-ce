@extends('layouts.app')

@section('title', 'Cadastrar - Oferta CE')

@section('content')
<!-- Hero Section -->
<section class="py-5 mt-4 bg-success bg-gradient">
    <div class="container p-3">
        <div class="row justify-content-center text-center text-white">
            <div class="col-lg-8">
                <!-- <span class="badge bg-white bg-opacity-20 text-white fs-6 mb-3 px-3 py-2">
                    <i class="fas fa-user-plus me-2"></i>Junte-se à Nossa Comunidade
                </span> -->
                <h1 class="display-5 fw-bold mb-4">Crie Sua Conta</h1>
                <p class="lead mb-4 opacity-75">Cadastre-se gratuitamente e comece a encontrar as melhores oportunidades</p>
            </div>
        </div>
    </div>
</section>

<!-- Register Form Section -->
<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="card border-0 shadow-lg">
                    <div class="card-header bg-transparent border-0 py-4">
                        <h2 class="fw-bold text-dark mb-0 text-center">
                            <i class="fas fa-user-plus text-success me-2"></i>Criar Nova Conta
                        </h2>
                    </div>
                    <div class="card-body p-4 p-md-5">
                        <form method="POST" action="{{ route('register') }}" id="registerForm">
                            @csrf

                            <!-- Name -->
                            <div class="mb-4">
                                <label for="name" class="form-label fw-semibold text-dark">
                                    <i class="fas fa-user text-success me-2"></i>Nome Completo *
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0">
                                        <i class="fas fa-id-card text-muted"></i>
                                    </span>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror border-start-0" 
                                           id="name" name="name" value="{{ old('name') }}" 
                                           placeholder="Seu nome completo" required autofocus autocomplete="name">
                                </div>
                                @error('name')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

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
                                           placeholder="seu@email.com" required autocomplete="username">
                                </div>
                                @error('email')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- WhatsApp -->
                            <div class="mb-4">
                                <label for="whatsapp" class="form-label fw-semibold text-dark">
                                    <i class="fab fa-whatsapp text-success me-2"></i>WhatsApp *
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0">
                                        <i class="fas fa-phone text-muted"></i>
                                    </span>
                                    <input type="tel" class="form-control @error('whatsapp') is-invalid @enderror border-start-0" 
                                           id="whatsapp" name="whatsapp" value="{{ old('whatsapp') }}" 
                                           placeholder="(00) 00000-0000" required autocomplete="tel">
                                </div>
                                @error('whatsapp')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                                <small class="text-muted mt-1">
                                    <i class="fas fa-info-circle me-1"></i>Digite seu número com DDD
                                </small>
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
                                           placeholder="Crie uma senha segura" required autocomplete="new-password">
                                    <button type="button" class="input-group-text toggle-password" data-target="password">
                                        <i class="fas fa-eye text-muted"></i>
                                    </button>
                                </div>
                                @error('password')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                                <small class="text-muted mt-1">
                                    <i class="fas fa-shield-alt me-1"></i>Use pelo menos 8 caracteres
                                </small>
                            </div>

                            <!-- Confirm Password -->
                            <div class="mb-4">
                                <label for="password_confirmation" class="form-label fw-semibold text-dark">
                                    <i class="fas fa-lock text-success me-2"></i>Confirmar Senha *
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0">
                                        <i class="fas fa-key text-muted"></i>
                                    </span>
                                    <input type="password" class="form-control border-start-0" 
                                           id="password_confirmation" name="password_confirmation" 
                                           placeholder="Digite a senha novamente" required autocomplete="new-password">
                                    <button type="button" class="input-group-text toggle-password" data-target="password_confirmation">
                                        <i class="fas fa-eye text-muted"></i>
                                    </button>
                                </div>
                            </div>

                            <!-- Terms Agreement -->
                            <div class="form-check mb-4">
                                <input class="form-check-input" type="checkbox" id="terms_agreement" name="terms_agreement" required>
                                <label class="form-check-label text-muted" for="terms_agreement">
                                    Concordo com os <a href="#" class="text-success text-decoration-none">Termos de Uso</a> 
                                    e <a href="#" class="text-success text-decoration-none">Política de Privacidade</a>
                                </label>
                            </div>

                            <!-- Submit Button -->
                            <div class="d-grid mb-4">
                                <button type="submit" class="btn btn-success btn-lg py-3 fw-semibold">
                                    <i class="fas fa-user-plus me-2"></i>Criar Minha Conta
                                </button>
                            </div>

                            <!-- Login Link -->
                            <div class="text-center">
                                <p class="text-muted mb-3">Já tem uma conta?</p>
                                <a href="{{ route('login') }}" class="btn btn-outline-success">
                                    <i class="fas fa-sign-in-alt me-2"></i>Fazer Login
                                </a>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Benefits Card -->
                <div class="card border-0 shadow-sm mt-4">
                    <div class="card-body">
                        <h5 class="fw-semibold text-dark mb-3 text-center">
                            <i class="fas fa-star text-warning me-2"></i>Vantagens de se Cadastrar
                        </h5>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="d-flex align-items-start">
                                    <i class="fas fa-briefcase text-success mt-1 me-2"></i>
                                    <div>
                                        <small class="fw-semibold text-dark d-block">Publicar Vagas</small>
                                        <small class="text-muted">Divulgue suas oportunidades</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex align-items-start">
                                    <i class="fas fa-bolt text-success mt-1 me-2"></i>
                                    <div>
                                        <small class="fw-semibold text-dark d-block">Acesso Rápido</small>
                                        <small class="text-muted">Candidate-se em 1 clique</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex align-items-start">
                                    <i class="fas fa-bell text-success mt-1 me-2"></i>
                                    <div>
                                        <small class="fw-semibold text-dark d-block">Alertas Personalizados</small>
                                        <small class="text-muted">Vagas do seu interesse</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex align-items-start">
                                    <i class="fas fa-chart-line text-success mt-1 me-2"></i>
                                    <div>
                                        <small class="fw-semibold text-dark d-block">Acompanhamento</small>
                                        <small class="text-muted">Monte suas candidaturas</small>
                                    </div>
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

/* WhatsApp validation styles */
.whatsapp-valid {
    border-color: #28a745 !important;
}

.whatsapp-invalid {
    border-color: #dc3545 !important;
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
    const whatsappInput = document.getElementById('whatsapp');
    const registerForm = document.getElementById('registerForm');
    
    // WhatsApp formatting function
    function formatWhatsApp(value) {
        let numbers = value.replace(/\D/g, '');
        numbers = numbers.substring(0, 11);
        
        if (numbers.length <= 10) {
            return numbers.replace(/(\d{2})(\d{4})(\d{0,4})/, '($1) $2-$3');
        } else {
            return numbers.replace(/(\d{2})(\d{5})(\d{0,4})/, '($1) $2-$3');
        }
    }
    
    function validateWhatsApp(value) {
        const numbers = value.replace(/\D/g, '');
        return numbers.length >= 10 && numbers.length <= 11;
    }
    
    // WhatsApp input handling
    whatsappInput.addEventListener('input', function(e) {
        const formatted = formatWhatsApp(e.target.value);
        e.target.value = formatted;
        
        // Visual validation
        if (validateWhatsApp(formatted)) {
            e.target.classList.remove('whatsapp-invalid');
            e.target.classList.add('whatsapp-valid');
        } else {
            e.target.classList.remove('whatsapp-valid');
            e.target.classList.add('whatsapp-invalid');
        }
    });
    
    // Format initial value if exists
    if (whatsappInput.value) {
        whatsappInput.value = formatWhatsApp(whatsappInput.value);
    }
    
    // Form submission validation
    registerForm.addEventListener('submit', function(e) {
        const numbers = whatsappInput.value.replace(/\D/g, '');
        if (!validateWhatsApp(numbers)) {
            e.preventDefault();
            showAlert('Por favor, insira um número de WhatsApp válido com DDD.', 'danger');
            whatsappInput.focus();
        } else {
            // Send only numbers to backend
            whatsappInput.value = numbers;
            
            // Add loading state
            const submitButton = this.querySelector('button[type="submit"]');
            submitButton.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Criando conta...';
            submitButton.disabled = true;
        }
    });
    
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
    
    // Alert function
    function showAlert(message, type) {
        // Remove existing alerts
        const existingAlerts = document.querySelectorAll('.custom-alert');
        existingAlerts.forEach(alert => alert.remove());
        
        const alertDiv = document.createElement('div');
        alertDiv.className = `alert alert-${type} custom-alert alert-dismissible fade show`;
        alertDiv.innerHTML = `
            <i class="fas fa-${type === 'danger' ? 'exclamation-triangle' : 'info-circle'} me-2"></i>
            ${message}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        `;
        
        registerForm.parentNode.insertBefore(alertDiv, registerForm);
        
        // Auto remove after 5 seconds
        setTimeout(() => {
            if (alertDiv.parentNode) {
                alertDiv.remove();
            }
        }, 5000);
    }
    
    // Password strength indicator (optional enhancement)
    const passwordInput = document.getElementById('password');
    passwordInput.addEventListener('input', function() {
        // Could add password strength meter here
    });
});
</script>
@endsection