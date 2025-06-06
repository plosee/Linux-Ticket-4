<?php 
$currentPage = $_GET['p'] ?? '';  
?> 

<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="/" style="font-size: 30px;">
            <p class="mb-0">
                <b>Kasutajatugi</b>
            </p>
        </a>

        <!-- NUPP KUI NAVBAR LIIGA VAIKESEKS LAHEB -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu" aria-controls="menu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="menu">
            <!-- NAV LINGID -->
            <ul class="navbar-nav ml-auto mb-lg-0">
                <!-- AVALEHT -->
                <li class="nav-item">
                    <a class="nav-link <?php echo $currentPage == '' ? 'active' : ''; ?>" href="/">Avaleht</a>
                </li>
                <!-- UUDISED -->
                <li class="nav-item">
                    <a class="nav-link <?php echo $currentPage == 'uudised' ? 'active' : ''; ?>" href="/?p=uudised">Uudised</a>
                </li>
                <!-- TUGILEHT -->
                <li class="nav-item">
                    <a class="nav-link <?php echo $currentPage == 'tugileht' ? 'active' : ''; ?>" href="/?p=tugileht">Tugileht</a>
                </li>
                <!-- KONTAKT -->
                <li class="nav-item">
                    <a class="nav-link <?php echo $currentPage == 'kontakt' ? 'active' : ''; ?>" href="/?p=kontakt">Kontakt</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- VAJALIKUD SCRIPTID -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
