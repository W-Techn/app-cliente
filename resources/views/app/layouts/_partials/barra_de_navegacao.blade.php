<div class="container-fluid bg-light" id="barraDeNavegacao">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a href="{{ url('/app/home') }}" class="navbar-brand">Cliente devedor</a>
            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#toggleMobileMenu"
                aria-controls="toggleMobileMenu"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collpase navbar-collapse" id="toggleMobileMenu">
                <ul class="navbar-nav ms-auto text-center">
                    <li>
                        <a href="{{ route('cliente.index') }}" class="nav-link">Clientes</a>
                    </li>
                    <li>
                        <a href="{{ url('/app/cadastrar-divida') }}" class="nav-link">Dívidas</a>
                    </li>
                    <li>
                        <a href="{{ url('/app/sair') }}" class="nav-link">Sair</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>
