<?php $namaUser = $_SESSION['name']; ?>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<!-- NAVBAR -->
<div class="navbar">

    <div class="logo">
        🌸 I'M SEMA
    </div>

    <div class="nav-right">


        <!-- Profile -->
        <div class="profile">
           <a class="profil" href="profil.php">Profil</a>
            <span><?php echo $namaUser; ?></span>
        </div>

        <!-- Help -->
        <a href="https://wa.me/62895324670592?text=hai%20apa%20kabar" target="_blank" class="help-btn">?</a>
        <a href="logout.php" class="logout-btn" title="Logout">
            <span class="material-icons">logout</span>
        </a>
    </div>

</div>