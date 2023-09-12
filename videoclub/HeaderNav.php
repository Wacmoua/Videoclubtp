<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Vidéo-Club</title>
    <link rel="stylesheet" href="VCcss.css" />
  </head>

  <body>
    <header>
      <h1>Vidéo-Club</h1>
      <p>... et si on se faisait une folie à la maison?</p>
    </header>

    <h3>Bienvenue sur le site du Vidéo-Club!</h3>

    <p class="date">17 décembre 2014</p>
    <p class="admin">Admin</p>

    <nav>
      <ul>
        <li><a href="#reserve">Réserver un film</a></li>
        <li><a href="#boutiques">Les boutiques VC</a></li>
        <li><a href="#actualites">Actualités</a></li>
        <li><a href="#contact">Nous contacter</a></li>
      </ul>
    </nav>
    <aside>
      <button id="reserve" onclick="toggleTable()">
        <h2>Réserver un film</h2>
      </button>
      <!-- Tableau initiallement masqué -->
      <table id="reservation-table">
        <tr>
          <th>Film</th>
        </tr>
        <tr>
          <td>Aventure</td>
        </tr>
        <tr>
          <td>Comédie</td>
        </tr>
        <tr>
          <td>Dessin animé</td>
        </tr>
        <tr>
          <td>Policier</td>
        </tr>
        <!-- Ajoutez d'autres lignes de réservation ici -->
      </table>

      <a name="boutiques">
        <section>
          <h2>Les boutiques VC</h2>
          <!-- Contenu de la section "Les boutiques VC" -->
        </section>
      </a>

      <a name="actualites">
        <section>
          <h2>Actualités</h2>
          <!-- Contenu de la section "Actualités" -->
        </section>
      </a>

      <a name="contact">
        <section>
          <h2>Nous contacter</h2>
          <!-- Contenu de la section "Nous contacter" -->
        </section>
      </a>
    </aside>