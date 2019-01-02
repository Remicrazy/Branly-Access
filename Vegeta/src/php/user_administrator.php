<!--Section Administration-->
<div class="block administrator">
  <h2 id="administrator" class="subtitle heading-site">Administration</h2>
  <hr class="separator">
  <div class="container">
    <p class="para">
      Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
    </p>
    <div class="columns ">
      <div class="column administrator-single">
        <h6 class="subtitle is-5 heading-site">Création de badge</h6>
        <button class="button is-link is-rounded" id="open_creat">Création</button>
      </div>
      <div class="column administrator-single">
        <h6 class="subtitle is-5 heading-site">Réédition de badge</h6>
        <button class="button is-link is-rounded" id="open_edit" disabled>Réédition</button>
      </div>
    </div>
  </div>
</div>
<!--Section-->
    <!--Modal Création-->
    <div class="modal my-modal" id="modal_creat">
      <div class="modal-background"></div>
      <div class="modal-card">
        <header class="modal-card-head">
          <i class="fas fa-address-card fa-lg"></i>
          <p class="modal-card-title">Création de badge</p>
          <button class="delete" aria-label="close" id="close_creat"></button>
        </header>
        <section class="modal-card-body">
          <!--Formulaire-->
          <form method="post" id="register">
            <div class="field">
              <div class="control">
                <label class="radio">
                  <input type="radio" name="post" value="student" id="student" required>
                  Elèves/Etudiant
                </label>
                <label class="radio">
                  <input type="radio" name="post" value="staff" id="staff" >
                  Personnel
                </label>
              </div>
            </div>
            <div class="field">
              <label class="label">Nom</label>
              <div class="control">
                <input id="name" class="input is-rounded" type="text" name="name" required>
              </div>
            </div>
            <div class="field">
              <label class="label">Prénom</label>
              <div class="control">
                <input id="firstname" class="input is-rounded" type="text" name="firstname" required>
              </div>
            </div>
            <div class="field what-class">
              <label class="label">Classe</label>
              <div class="control">
                <div class="select is-rounded">
                  <select id="classroom" name="classroom">
                    <?php
                    $reponse2 = $bdd->query('SELECT * FROM classe ORDER BY idClasses ASC');
                    while ($donnees2 = $reponse2->fetch())
                    {
                    ?>
                    <option value="<?php echo $donnees2['Classes'];?>">
                      <?php echo $donnees2['Classes'];?>
                    </option>
                    <?php
                    }
                    ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="field what-post">
              <label class="label">Profession</label>
              <div class="control">
                <div class="select is-rounded">
                  <select id="job" name="job">
                    <?php
                    $reponse3 = $bdd->query('SELECT * FROM profession ORDER BY idProfessions ASC');
                    while ($donnees3 = $reponse3->fetch())
                    {
                    ?>
                    <option value="<?php echo $donnees3['Professions'];?>">
                      <?php echo $donnees3['Professions'];?>
                    </option>
                    <?php
                    }
                    ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="field">
              <div class="control">
                <i class="fas fa-venus-mars"></i>
                <label class="radio">
                  <input type="radio" name="gender" value="male" id="male" required>
                  Homme
                </label>
                <label class="radio">
                  <input type="radio" name="gender" value="female" id="female">
                  Femme
                </label>
              </div>
            </div>
            <div class="field">
              <label class="label">Date de Naissance</label>
              <div class="control">
                <i class="fas fa-calendar-alt"></i>
                <input type="date" name="bday" id="bday" required>
              </div>
            </div>
            <div class="field">
              <label class="label">Badge</label>
              <p class="help">
                Veuillez scanner le badge à associer et cliquer sur le bouton "Scanne effectuer"
                <button class="button is-link is-rounded is-small" type="button" id="refresh">Scanne effectuer</button>
              </p>
              <div class="control" id="badges">
                  <?php
                  $badge = file("UID.txt");
                  $lastbadge = $badge[count($badge)-1];
                  ?>
                <input id="uid" class="input is-rounded" type="text" name="uid" readonly="readonly" value="<?php echo $lastbadge;?>" required>
              </div>
            </div>

          <!--Formulaire-->
        </section>
        <footer class="modal-card-foot">
          <div class="columns">
            <div class="column">
              <button class="button is-success is-rounded" type="submit">Envoyer</button>
              <button class="button is-warning is-rounded" type="reset">Reset</button>
          </form>
              <div class="notification is-success notif" id="notif_success">
                Le badge est créé avec succès
              </div>
              <div class="notification is-warning notif" id="notif_warning">
                Echec de création du badge! Veuillez réessayer!
              </div>
            </div>
          </div>
        </footer>
      </div>
    </div>
    <!--Modal Création-->
