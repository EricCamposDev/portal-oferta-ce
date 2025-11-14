@extends('layouts.app')

@section('title', 'Redefinir Senha - Oferta CE')

@section('content')
<!-- Hero Section -->
<section class="py-5 mt-4 bg-success bg-gradient">
    <div class="container">
        <div class="row justify-content-center text-center text-white">
            <div class="col-lg-8">
                <span class="badge bg-white bg-opacity-20 text-white fs-6 mb-3 px-3 py-2">
                    <i class="fas fa-lock me-2"></i>Nova Senha
                </span>
                <h1 class="display-5 fw-bold mb-4">Crie Sua Nova Senha</h1>
                <p class="lead mb-4 opacity-75">Digite sua nova senha para recuperar o acesso à sua conta</p>
            </div>
        </div>
    </div>
</section>

<!-- Reset Password Form Section -->
<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="card border-0 shadow-lg">
                    <div class="card-header bg-transparent border-0 py-4">
                        <h2 class="fw-bold text-dark mb-0 text-center">
                            <i class="fas fa-key text-success me-2"></i>Redefinir Senha
                        </h2>
                    </div>
                    <div class="card-body p-4 p-md-5">
                        <!-- Security Info -->
                        <div class="alert alert-info border-0 mb-4">
                            <div class="d-flex">
                                <i class="fas fa-shield-alt text-info me-3 mt-1 fs-5"></i>
                                <div>
                                    <h6 class="alert-heading mb-2">Segurança da Senha</h6>
                                    <p class="mb-0 small">
                                        Crie uma senha forte com pelo menos 8 caracteres, incluindo letras, números e símbolos.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <form method="POST" action="{{ route('password.store') }}" id="resetPasswordForm">
                            @csrf

                            <!-- Password Reset Token -->
                            <input type="hidden" name="token" value="{{ $request->route('token') }}">

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
                                           id="email" name="email" value="{{ old('email', $request->email) }}" 
                                           placeholder="seu@email.com" required autofocus autocomplete="username">
                                </div>
                                @error('email')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Password -->
                            <div class="mb-4">
                                <label for="password" class="form-label fw-semibold text-dark">
                                    <i class="fas fa-lock text-success me-2"></i>Nova Senha *
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0">
                                        <i class="fas fa-key text-muted"></i>
                                    </span>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror border-start-0" 
                                           id="password" name="password" 
                                           placeholder="Digite sua nova senha" required autocomplete="new-password">
                                    <button type="button" class="input-group-text toggle-password" data-target="password">
                                        <i class="fas fa-eye text-muted"></i>
                                    </button>
                                </div>
                                @error('password')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                                
                                <!-- Password Strength Meter -->
                                <div class="mt-2">
                                    <div class="password-strength-meter">
                                        <div class="strength-bar">
                                            <div class="strength-fill" id="passwordStrength"></div>
                                        </div>
                                        <small class="text-muted" id="passwordFeedback">
                                            Use pelo menos 8 caracteres
                                        </small>
                                    </div>
                                </div>
                            </div>

                            <!-- Confirm Password -->
                            <div class="mb-4">
                                <label for="password_confirmation" class="form-label fw-semibold text-dark">
                                    <i class="fas fa-lock text-success me-2"></i>Confirmar Nova Senha *
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
                                
                                <!-- Password Match Indicator -->
                                <div class="mt-2">
                                    <small class="text-muted" id="passwordMatch">
                                        As senhas precisam ser iguais
                                    </small>
                                </div>
                            </div>

                            <!-- Password Requirements -->
                            <div class="mb-4">
                                <h6 class="fw-semibold text-dark mb-2">
                                    <i class="fas fa-list-check text-success me-2"></i>Requisitos da Senha:
                                </h6>
                                <div class="row g-2">
                                    <div class="col-md-6">
                                        <small class="d-flex align-items-center mb-1">
                                            <i class="fas fa-check text-success me-2 requirement" data-requirement="length"></i>
                                            <span class="text-muted">Mínimo 8 caracteres</span>
                                        </small>
                                    </div>
                                    <div class="col-md-6">
                                        <small class="d-flex align-items-center mb-1">
                                            <i class="fas fa-check text-success me-2 requirement" data-requirement="lowercase"></i>
                                            <span class="text-muted">Letra minúscula</span>
                                        </small>
                                    </div>
                                    <div class="col-md-6">
                                        <small class="d-flex align-items-center mb-1">
                                            <i class="fas fa-check text-success me-2 requirement" data-requirement="uppercase"></i>
                                            <span class="text-muted">Letra maiúscula</span>
                                        </small>
                                    </div>
                                    <div class="col-md-6">
                                        <small class="d-flex align-items-center mb-1">
                                            <i class="fas fa-check text-success me-2 requirement" data-requirement="number"></i>
                                            <span class="text-muted">Pelo menos 1 número</span>
                                        </small>
                                    </div>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="d-grid mb-4">
                                <button type="submit" class="btn btn-success btn-lg py-3 fw-semibold" id="submitButton">
                                    <i class="fas fa-save me-2"></i>Salvar Nova Senha
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
                            <i class="fas fa-lightbulb text-warning me-2"></i>Dicas para uma Senha Segura
                        </h5>
                        <div class="row g-3">
                            <div class="col-12">
                                <div class="d-flex align-items-start">
                                    <i class="fas fa-check text-success mt-1 me-2"></i>
                                    <div>
                                        <small class="fw-semibold text-dark d-block">Use frases longas</small>
                                        <small class="text-muted">Combine palavras aleatórias</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d-flex align-items-start">
                                    <i class="fas fa-check text-success mt-1 me-2"></i>
                                    <div>
                                        <small class="fw-semibold text-dark d-block">Evite informações pessoais</small>
                                        <small class="text-muted">Nomes, datas, números comuns</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d-flex align-items-start">
                                    <i class="fas fa-check text-success mt-1 me-2"></i>
                                    <div>
                                        <small class="fw-semibold text-dark d-block">Use um gerenciador</small>
                                        <small class="text-muted">Para armazenar senhas com segurança</small>
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

.alert {
    border: none;
    border-radius: 10px;
}

/* Password Strength Meter */
.password-strength-meter {
    margin-top: 0.5rem;
}

.strength-bar {
    height: 4px;
    background-color: #e9ecef;
    border-radius: 2px;
    overflow: hidden;
    margin-bottom: 0.25rem;
}

.strength-fill {
    height: 100%;
    width: 0%;
    transition: all 0.3s ease;
    border-radius: 2px;
}

.strength-weak { background-color: #dc3545; width: 25%; }
.strength-fair { background-color: #fd7e14; width: 50%; }
.strength-good { background-color: #ffc107; width: 75%; }
.strength-strong { background-color: #28a745; width: 100%; }

.requirement.unmet {
    color: #6c757d !important;
}

.requirement.unmet i {
    color: #6c757d !important;
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
    const form = document.getElementById('resetPasswordForm');
    const passwordInput = document.getElementById('password');
    const confirmPasswordInput = document.getElementById('password_confirmation');
    const submitButton = document.getElementById('submitButton');
    const strengthBar = document.getElementById('passwordStrength');
    const passwordFeedback = document.getElementById('passwordFeedback');
    const passwordMatch = document.getElementById('passwordMatch');

    // Password strength checker
    function checkPasswordStrength(password) {
        let strength = 0;
        const requirements = {
            length: password.length >= 8,
            lowercase: /[a-z]/.test(password),
            uppercase: /[A-Z]/.test(password),
            number: /[0-9]/.test(password),
            special: /[^A-Za-z0-9]/.test(password)
        };

        // Update requirement indicators
        Object.keys(requirements).forEach(req => {
            const icon = document.querySelector(`[data-requirement="${req}"]`);
            if (icon) {
                if (requirements[req]) {
                    icon.classList.remove('unmet');
                    icon.style.color = '#28a745';
                } else {
                    icon.classList.add('unmet');
                    icon.style.color = '#6c757d';
                }
            }
        });

        // Calculate strength
        if (requirements.length) strength += 25;
        if (requirements.lowercase) strength += 25;
        if (requirements.uppercase) strength += 25;
        if (requirements.number || requirements.special) strength += 25;

        // Update strength meter
        strengthBar.className = 'strength-fill';
        if (strength <= 25) {
            strengthBar.classList.add('strength-weak');
            passwordFeedback.textContent = 'Senha fraca';
            passwordFeedback.style.color = '#dc3545';
        } else if (strength <= 50) {
            strengthBar.classList.add('strength-fair');
            passwordFeedback.textContent = 'Senha razoável';
            passwordFeedback.style.color = '#fd7e14';
        } else if (strength <= 75) {
            strengthBar.classList.add('strength-good');
            passwordFeedback.textContent = 'Senha boa';
            passwordFeedback.style.color = '#ffc107';
        } else {
            strengthBar.classList.add('strength-strong');
            passwordFeedback.textContent = 'Senha forte!';
            passwordFeedback.style.color = '#28a745';
        }

        return strength;
    }

    // Password match checker
    function checkPasswordMatch() {
        const password = passwordInput.value;
        const confirmPassword = confirmPasswordInput.value;

        if (!password || !confirmPassword) {
            passwordMatch.textContent = 'As senhas precisam ser iguais';
            passwordMatch.style.color = '#6c757d';
            return false;
        }

        if (password === confirmPassword) {
            passwordMatch.innerHTML = '<i class="fas fa-check me-1"></i>Senhas coincidem';
            passwordMatch.style.color = '#28a745';
            return true;
        } else {
            passwordMatch.innerHTML = '<i class="fas fa-times me-1"></i>Senhas não coincidem';
            passwordMatch.style.color = '#dc3545';
            return false;
        }
    }

    // Event listeners
    passwordInput.addEventListener('input', function() {
        checkPasswordStrength(this.value);
        checkPasswordMatch();
        updateSubmitButton();
    });

    confirmPasswordInput.addEventListener('input', function() {
        checkPasswordMatch();
        updateSubmitButton();
    });

    // Update submit button state
    function updateSubmitButton() {
        const strength = checkPasswordStrength(passwordInput.value);
        const isMatch = checkPasswordMatch();
        
        if (strength >= 50 && isMatch) {
            submitButton.disabled = false;
        } else {
            submitButton.disabled = true;
        }
    }

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

    // Form submission handling
    form.addEventListener('submit', function(e) {
        const strength = checkPasswordStrength(passwordInput.value);
        const isMatch = checkPasswordMatch();
        
        if (strength < 50) {
            e.preventDefault();
            showAlert('Por favor, use uma senha mais forte.', 'warning');
            passwordInput.focus();
            return;
        }
        
        if (!isMatch) {
            e.preventDefault();
            showAlert('As senhas não coincidem. Verifique e tente novamente.', 'danger');
            confirmPasswordInput.focus();
            return;
        }

        // Add loading state
        submitButton.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Salvando...';
        submitButton.disabled = true;
    });

    // Alert function
    function showAlert(message, type) {
        // Remove existing alerts
        const existingAlerts = document.querySelectorAll('.custom-alert');
        existingAlerts.forEach(alert => alert.remove());
        
        const alertDiv = document.createElement('div');
        alertDiv.className = `alert alert-${type} custom-alert alert-dismissible fade show mt-3`;
        alertDiv.innerHTML = `
            <i class="fas fa-${type === 'danger' ? 'exclamation-triangle' : 'info-circle'} me-2"></i>
            ${message}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        `;
        
        form.querySelector('.alert-info').after(alertDiv);
        
        // Auto remove after 5 seconds
        setTimeout(() => {
            if (alertDiv.parentNode) {
                alertDiv.remove();
            }
        }, 5000);
    }

    // Initialize
    updateSubmitButton();
});
</script>
@endsection