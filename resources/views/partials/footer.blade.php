<footer class="bg-dark mt-auto">
    <div class="container py-5">
        <div class="row g-4">
            <!-- Brand Column -->
            <div class="col-lg-4 mb-4 mb-lg-0">
                <div class="d-flex align-items-center mb-3">
                    <div class="bg-success rounded-circle d-flex align-items-center justify-content-center me-3" 
                         style="width: 40px; height: 40px;">
                        <span class="text-white fw-bold">OC</span>
                    </div>
                    <div>
                        <h5 class="fw-bold mb-0 text-white">Oferta<span class="text-warning">CE</span></h5>
                        <small class="text-white-50">Conectando talentos e oportunidades</small>
                    </div>
                </div>
                <p class="text-white-50 mb-3">
                    A plataforma #1 de freelas no Ceará. Conectamos profissionais 
                    qualificados com as melhores oportunidades de trabalho temporário.
                </p>
                <div class="social-links">
                    <a href="#" class="text-white text-opacity-75 me-3 hover-lift">
                        <i class="fab fa-instagram fa-lg"></i>
                    </a>
                    <a href="#" class="text-white text-opacity-75 me-3 hover-lift">
                        <i class="fab fa-facebook fa-lg"></i>
                    </a>
                    <a href="#" class="text-white text-opacity-75 me-3 hover-lift">
                        <i class="fab fa-whatsapp fa-lg"></i>
                    </a>
                    <a href="#" class="text-white text-opacity-75 hover-lift">
                        <i class="fab fa-linkedin fa-lg"></i>
                    </a>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="col-lg-2 col-md-4 mb-4 mb-md-0">
                <h6 class="fw-bold text-white mb-3">Navegação</h6>
                <ul class="list-unstyled">
                    <li class="mb-2">
                        <a href="{{ route('home') }}" class="text-white-50 text-decoration-none hover-lift">
                            Início
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('jobs.index') }}" class="text-white-50 text-decoration-none hover-lift">
                            Vagas
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('jobs.create') }}" class="text-white-50 text-decoration-none hover-lift">
                            Publicar Vaga
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="#" class="text-white-50 text-decoration-none hover-lift">
                            Como Funciona
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Categories -->
            <div class="col-lg-3 col-md-4 mb-4 mb-md-0">
                <h6 class="fw-bold text-white mb-3">Categorias Populares</h6>
                <ul class="list-unstyled">
                    @foreach($footer_categories as $category)
                    <li class="mb-2">
                        <a href="{{ route('jobs.search', ['category' => $category->id]) }}" 
                           class="text-white-50 text-decoration-none hover-lift">
                            {{ $category->name }}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>

            <!-- Contact & Legal -->
            <div class="col-lg-3 col-md-4">
                <h6 class="fw-bold text-white mb-3">Contato</h6>
                <ul class="list-unstyled text-white-50 mb-4">
                    <li class="mb-2">
                        <i class="fas fa-envelope me-2 text-success"></i>
                        contato@ofertace.com.br
                    </li>
                    <li class="mb-2">
                        <i class="fab fa-whatsapp me-2 text-success"></i>
                        (85) 99999-9999
                    </li>
                    <li>
                        <i class="fas fa-map-marker-alt me-2 text-success"></i>
                        Fortaleza, CE
                    </li>
                </ul>
                
                <h6 class="fw-bold text-white mb-3">Legal</h6>
                <ul class="list-unstyled">
                    <li class="mb-2">
                        <a href="#" class="text-white-50 text-decoration-none hover-lift">
                            Termos de Uso
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="#" class="text-white-50 text-decoration-none hover-lift">
                            Política de Privacidade
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <hr class="my-4 border-secondary">

        <!-- Bottom Bar -->
        <div class="row align-items-center">
            <div class="col-md-6 text-center text-md-start">
                <small class="text-white-50">
                    &copy; 2024 Oferta CE. Todos os direitos reservados.
                </small>
            </div>
            <div class="col-md-6 text-center text-md-end">
                <small class="text-white-50">
                    Desenvolvido com <i class="fas fa-heart text-danger"></i> para o Ceará
                </small>
            </div>
        </div>
    </div>
</footer>

<style>
.hover-lift {
    transition: all 0.3s ease;
}

.hover-lift:hover {
    transform: translateY(-2px);
    color: #20c997 !important;
    text-decoration: none;
}

.social-links a {
    transition: all 0.3s ease;
    display: inline-block;
}

.social-links a:hover {
    transform: translateY(-3px);
    color: #20c997 !important;
}

/* Isolar as cores do footer */
footer {
    color: #ffffff !important;
}

footer * {
    color: inherit;
}

/* Garantir que o footer fique no bottom */
html, body {
    height: 100%;
}

body {
    display: flex;
    flex-direction: column;
}

main {
    flex: 1 0 auto;
}

footer {
    flex-shrink: 0;
}

/* Mobile optimizations */
@media (max-width: 768px) {
    .container.py-5 {
        padding-top: 3rem !important;
        padding-bottom: 3rem !important;
    }
    
    .social-links {
        text-align: center;
    }
    
    .social-links a {
        margin: 0 0.5rem;
    }
}

/* Smooth animations */
footer a {
    transition: all 0.3s ease;
}
</style>