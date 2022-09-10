<nav class="navbar navbar-expand-lg bg-light">
    <div class="container">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/contact">Contact</a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
                <?php //if(\App\Core\Application::isGuest()) : ?>
                <li class="nav-item">
                    <a class="nav-link active" href="/login">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/register">Register</a>
                </li>
                <?php// else: ?>
                <li class="nav-item">
                    <a class="nav-link active" href="/profile">Profile</a>
                </li>
                <li class="nav-item"><?php //echo \App\Core\Application::$app->user->getDisplayName(); ?></li>
                <?php //endif; ?>


            </ul>
        </div>
    </div>
</nav>