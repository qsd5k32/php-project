<div class="container mt-4 p-4">
  <div class="jumbotron">
<!-- Material form register -->
<form method="post" autocomplete="off">
    <p class="h4 text-center mb-4">Comment adhrer !</p>
    <div class="md-form">
      <i class="fa fa-user prefix"></i>
      <input type="text" name="name" required id="Name" class="form-control">
      <label for="Name">Nom et Prénom</label>
    </div>
    <div class="md-form">
      <i class="fa fa-lightbulb-o prefix"></i>
      <input type="text" id="idea" name="idea" required class="form-control">
      <label for="idea">Idée de projet</label>
    </div>
    <div class="md-form">
      <i class="fa fa-phone prefix"></i>
      <input type="tel" id="phone" name="phone" required class="form-control">
      <label for="phone">N de téléphone</label>
    </div>
    <div class="md-form">
      <i class="fa fa-envelope prefix"></i>
      <input type="email" id="Email" name="email" required class="form-control">
      <label for="Email">Email</label>
    </div>
    <p class="h6">Les services dont vous avez besoin :</p>
    <div class="form-check checkbox-teal">
      <input type="checkbox" name="files" class="form-check-input" id="checkbox1">
      <label class="form-check-label" for="checkbox1">Consulter les fiches des projets existante</label>
    </div>
    <div class="form-check checkbox-teal">
      <input type="checkbox" name="dev" class="form-check-input" id="checkbox3">
      <label class="form-check-label" for="checkbox3">Développer mon idée </label>
    </div>
    <select class="mdb-select" name="host">
    <option value="" disabled selected>Hébergement ( type de bureau souhaité )</option>
    <option value="pour une personne">Bureau pour une personne</option>
    <option value="pour deux personnes">Bureau pour (2) deux personnes</option>
    <option value="pour trois personnes">Bureau pour (3) trois personnes</option>
    <option value="Bureau jeune pousse">Bureau jeune pousse</option>
    </select>
    <div class="form-check checkbox-teal">
      <input type="checkbox" name="accompa" class="form-check-input" id="checkbox4">
      <label class="form-check-label" for="checkbox4">Accompagnement</label>
    </div>
    <div class="form-check checkbox-teal">
      <input type="checkbox" name="coach" class="form-check-input" id="checkbox5">
      <label class="form-check-label" for="checkbox5">Coaching</label>
    </div>
    <div class="form-check checkbox-teal">
      <input type="checkbox" name="formation" class="form-check-input" id="checkbox6">
      <label class="form-check-label" for="checkbox6">Formation</label>
    </div>
    <center>
      <input type="submit" class="btn btn-primary mt-2" name="submit" value="Inscree">
    </center>
</form>
<!-- Material form register -->

  </div>
</div>
