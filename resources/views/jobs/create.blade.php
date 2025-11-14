@extends('layouts.app')

@section('title', 'Publicar Vaga - Oferta CE')

@section('content')
<!-- Hero Section -->
<section class="py-5 mt-4 bg-success bg-gradient">
    <div class="container p-3">
        <div class="row justify-content-center text-center text-white">
            <div class="col-lg-8">
                <!-- <span class="badge bg-white bg-opacity-20 text-white fs-6 mb-3 px-3 py-2">
                    <i class="fas fa-plus-circle me-2"></i>Nova Oportunidade
                </span> -->
                <h1 class="display-5 fw-bold mb-4">Publicar Nova Vaga</h1>
                <p class="lead mb-4 opacity-75">Compartilhe sua oportunidade com milhares de profissionais no Ceará</p>
            </div>
        </div>
    </div>
</section>

<!-- Form Section -->
<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card border-0 shadow-lg">
                    <div class="card-header bg-transparent border-0 py-4">
                        <h2 class="fw-bold text-dark mb-0 text-center">
                            <i class="fas fa-edit text-success me-2"></i>Informações da Vaga
                        </h2>
                    </div>
                    <div class="card-body p-4 p-md-5">
                        <form action="{{ route('jobs.store') }}" method="POST">
                            @csrf

                            <!-- Título e Categoria -->
                            <div class="row g-3 mb-4">
                                <div class="col-md-8">
                                    <label for="title" class="form-label fw-semibold text-dark">
                                        <i class="fas fa-heading text-success me-2"></i>Título da Vaga *
                                    </label>
                                    <input type="text" class="form-control form-control-lg @error('title') is-invalid @enderror"
                                        id="title" name="title" value="{{ old('title') }}"
                                        placeholder="Ex: Garçom para Evento Corporativo" required>
                                    @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-4">
                                    <label for="category_id" class="form-label fw-semibold text-dark">
                                        <i class="fas fa-tag text-success me-2"></i>Categoria *
                                    </label>
                                    <select class="form-select form-select-lg @error('category_id') is-invalid @enderror"
                                        id="category_id" name="category_id" required>
                                        <option value="">Selecione...</option>
                                        @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Empresa e Local -->
                            <div class="row g-3 mb-4">
                                <div class="col-md-6">
                                    <label for="company" class="form-label fw-semibold text-dark">
                                        <i class="fas fa-building text-success me-2"></i>Empresa *
                                    </label>
                                    <input type="text" class="form-control @error('company') is-invalid @enderror"
                                        id="company" name="company" value="{{ old('company') }}"
                                        placeholder="Nome da empresa ou contratante" required>
                                    @error('company')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="location" class="form-label fw-semibold text-dark">
                                        <i class="fas fa-map-marker-alt text-success me-2"></i>Local *
                                    </label>
                                    <input type="text" class="form-control @error('location') is-invalid @enderror"
                                        id="location" name="location" value="{{ old('location') }}"
                                        placeholder="Ex: Fortaleza, CE" required>
                                    @error('location')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Descrição -->
                            <div class="mb-4">
                                <label for="description" class="form-label fw-semibold text-dark">
                                    <i class="fas fa-file-alt text-success me-2"></i>Descrição da Vaga *
                                </label>
                                <textarea class="form-control @error('description') is-invalid @enderror"
                                    id="description" name="description" rows="5"
                                    placeholder="Descreva as atividades, responsabilidades e detalhes da vaga..." required>{{ old('description') }}</textarea>
                                @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <small class="text-muted">Seja claro e objetivo sobre a oportunidade</small>
                            </div>

                            <!-- Valores e Vagas -->
                            <div class="row g-3 mb-4">
                                <div class="col-md-4">
                                    <label for="paid_value" class="form-label fw-semibold text-dark">
                                        <i class="fas fa-money-bill-wave text-success me-2"></i>Valor (R$) *
                                    </label>
                                    <input type="number" step="0.01" class="form-control @error('paid_value') is-invalid @enderror"
                                        id="paid_value" name="paid_value" value="{{ old('paid_value') }}"
                                        min="0" placeholder="0,00" required>
                                    @error('paid_value')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <small class="text-muted">Valor total pelo serviço</small>
                                </div>

                                <div class="col-md-4">
                                    <label for="vacancies_count" class="form-label fw-semibold text-dark">
                                        <i class="fas fa-users text-success me-2"></i>Vagas *
                                    </label>
                                    <input type="number" class="form-control @error('vacancies_count') is-invalid @enderror"
                                        id="vacancies_count" name="vacancies_count" value="{{ old('vacancies_count', 1) }}"
                                        min="1" required>
                                    @error('vacancies_count')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <small class="text-muted">Número de vagas disponíveis</small>
                                </div>
                            </div>

                            <!-- Datas -->
                            <div class="row g-3 mb-4">
                                <div class="col-md-6">
                                    <label for="start_date" class="form-label fw-semibold text-dark">
                                        <i class="fas fa-play-circle text-success me-2"></i>Data de Início *
                                    </label>
                                    <input type="datetime-local" class="form-control @error('start_date') is-invalid @enderror"
                                        id="start_date" name="start_date" value="{{ old('start_date') }}" required>
                                    @error('start_date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="end_date" class="form-label fw-semibold text-dark">
                                        <i class="fas fa-stop-circle text-success me-2"></i>Data de Término *
                                    </label>
                                    <input type="datetime-local" class="form-control @error('end_date') is-invalid @enderror"
                                        id="end_date" name="end_date" value="{{ old('end_date') }}" required>
                                    @error('end_date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Requisitos -->
                            <div class="mb-4">
                                <label for="requirements" class="form-label fw-semibold text-dark">
                                    <i class="fas fa-tasks text-success me-2"></i>Requisitos (Opcional)
                                </label>
                                <textarea class="form-control @error('requirements') is-invalid @enderror"
                                    id="requirements" name="requirements" rows="3"
                                    placeholder="Cursos, experiências ou habilidades necessárias...">{{ old('requirements') }}</textarea>
                                @error('requirements')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <small class="text-muted">Informe os requisitos específicos, se houver</small>
                            </div>

                            <!-- Submit Button -->
                            <div class="d-grid gap-3 mt-5">
                                <button type="submit" class="btn btn-success btn-lg py-3 fw-semibold">
                                    <i class="fas fa-paper-plane me-2"></i>Publicar Vaga
                                </button>
                                <a href="{{ route('jobs.index') }}" class="btn btn-outline-secondary">
                                    <i class="fas fa-arrow-left me-2"></i>Cancelar e Voltar
                                </a>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Info Card -->
                <div class="card border-0 shadow-sm mt-4">
                    <div class="card-body text-center p-4">
                        <div class="row align-items-center">
                            <div class="col-md-8 text-md-start">
                                <h5 class="fw-semibold text-dark mb-2">Precisa de ajuda?</h5>
                                <p class="text-muted mb-0">Consulte nosso guia de como criar uma boa vaga</p>
                            </div>
                            <div class="col-md-4 text-md-end mt-3 mt-md-0">
                                <a href="#" class="btn btn-outline-success">
                                    <i class="fas fa-question-circle me-2"></i>Ver Guia
                                </a>
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

    .form-control,
    .form-select {
        border: 2px solid #e9ecef;
        transition: all 0.3s ease;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: #28a745;
        box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.25);
    }

    .form-control-lg {
        padding: 0.75rem 1rem;
        font-size: 1.1rem;
    }

    .btn-lg {
        padding: 0.75rem 2rem;
        font-size: 1.1rem;
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
        // Set min datetime for start_date to current time
        const now = new Date();
        const timezoneOffset = now.getTimezoneOffset() * 60000;
        const localISOTime = new Date(now - timezoneOffset).toISOString().slice(0, 16);

        const startDateInput = document.getElementById('start_date');
        const endDateInput = document.getElementById('end_date');

        startDateInput.min = localISOTime;

        // Update end_date min when start_date changes
        startDateInput.addEventListener('change', function() {
            endDateInput.min = this.value;
        });

        // Format currency input
        const paidValueInput = document.getElementById('paid_value');
        paidValueInput.addEventListener('blur', function() {
            if (this.value) {
                this.value = parseFloat(this.value).toFixed(2);
            }
        });
    });
</script>
@endsection