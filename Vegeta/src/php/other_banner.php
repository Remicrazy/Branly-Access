<!--Banner-->
<div class="block">
  <div class="banner">
    <img src="src/img/bg.jpg" class"banner-image">
    <div class="banner-content">
      <h1 class="title is-1">Branly Access</h1>
      <h2 class="subtitle">Pour un accès sécurisé !</h2>
      <button class="button is-link is-large" id="connected">Connexion</button>
    </div>
  </div>
</div>
<!--Banner-->

<!-- Modal Login -->
<div class="modal my-modal" id="modal_log">
  <div class="modal-background"></div>
  <div class="modal-card">
    <header class="modal-card-head">
      <i class="fas fa-sign-in-alt"></i>
      <p class="modal-card-title">Connexion au Site</p>
      <button class="delete" aria-label="close" id="close_log"></button>
    </header>
    <section class="modal-card-body">
      <!-- Formulaire Login -->
      <form method="post" id="login">
        <div class="field">
          <label class="label">Username</label>
          <div class="control has-icons-left has-icons-right">
            <input class="input is-rounded" type="text" placeholder="Usermane" name="user" id="user" required>
            <span class="icon is-small is-left">
              <i class="fas fa-user"></i>
            </span>
          </div>
        </div>
        <div class="field">
          <label class="label">Password</label>
          <div class="control has-icons-left">
            <input class="input is-rounded" type="password" placeholder="Password" name="pwd" id="pwd" required>
            <span class="icon is-small is-left">
              <i class="fas fa-lock"></i>
            </span>
          </div>
        </div>
      <!-- Formulaire Login -->
    </section>
    <footer class="modal-card-foot">
      <div class="columns">
        <div class="column">
          <button class="button is-success is-rounded" type="submit">Envoyer</button>
          <button class="button is-warning is-rounded" type="reset">Reset</button>
        </form>
          <div class="notification is-success notif" id="log_success">
            Connexion réussi !
          </div>
          <div class="notification is-warning notif" id="log_warning">
            Echec de Connexion! Mauvais identifiant ou mot de passe!
          </div>
        </div>
      </div>
    </footer>
  </div>
</div>
<!-- Modal Login -->
