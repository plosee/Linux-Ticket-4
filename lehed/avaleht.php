<!-- JUMBOTRON -->
<div class="row">
    <div class="jumbotron jumbotron-fluid text-center bg-primary">
        <div class="container">
            <h1 class="display-4 font-weight-bold">Tere tulemast lehele Kasutajatugi!</h1>
            <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque deserunt vero debitis et, inventore at magnam consectetur ipsa nulla asperiores nam exercitationem assumenda sunt voluptatem modi. Quaerat rerum esse sequi!</p>
            <hr class="my-4 border-light">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. A cum non temporibus consequatur modi sint explicabo nemo debitis architecto quia unde veniam nesciunt numquam deleniti, quas ea sunt magnam aliquam?</p>
        </div>
    </div>
</div>

<!-- JUMBOTRON -->
<div class="row gx-3">
    <div class="col-md-4">
        <div class="kast">
            <p style="text-align: center;">Info</p>
        </div>
    </div>

    <div class="col-md-4">
        <div class="kast">
            <p style="text-align: center;">Info2</p>
        </div>
    </div>

    <div class="col-md-4">
        <div class="kast">
            <p style="text-align: center;">Info3</p>
        </div>
    </div>
</div>


<!-- PROBLEEMI KIRJELDUSE VORM -->
<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
        <form method="POST" class="probleemi-vorm">
            <h2>Esita oma probleem</h2>
            <hr>

            <label for="nimi">Nimi:</label>
            <input type="text" name="nimi" class="form-control" placeholder="Sisesta nimi..." required>

            <label for="osakond">Osakond:</label>
            <input type="text" name="osakond" class="form-control" placeholder="Sisesta osakond..." required>

            <label for="kontakt">Kontakt:</label>
            <input type="text" name="kontakt" class="form-control" placeholder="Sisesta kontakt..." required>

            <label for="probleem">Probleemi kirjeldus:</label>
            <textarea name="probleem" class="form-control" rows="5" placeholder="Kirjelda probleemi..." required></textarea>

            <button type="submit">Saada</button>
        </form>
        <?php
        if (isset($_POST['nimi']) && isset($_POST['osakond']) && isset($_POST['kontakt']) && isset($_POST['probleem'])) {
            // Vormilt saadud andmed
            $nimi = $_POST['nimi'];
            $osakond = $_POST['osakond'];
            $kontakt = $_POST['kontakt'];
            $probleem = $_POST['probleem'];

            // SQL-päring
            $sql = "INSERT INTO probleemid (nimi, osakond, kontakt, probleem) 
                    VALUES ('$nimi', '$osakond', '$kontakt', '$probleem')";

            // Käivita päring
            if (mysqli_query($yhendus, $sql)) {
                ?>
                <p>Probleem esitatud. Vastame Teile esimesel võimalusel.</p>
                <?php
            } else {
                echo "Viga: " . mysqli_error($conn);
            }
        }
        ?>
    </div>
</div>

