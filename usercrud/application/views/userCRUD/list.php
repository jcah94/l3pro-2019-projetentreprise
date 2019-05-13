<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>SIMPLE CRUD</h2>
        </div>
        <div class="pull-right">
          <br>
            <a class="btn btn-success" href="<?php echo base_url('userCRUD/create') ?>"> Créer un nouvel utilisateur</a>
        </div>
    </div>
</div>


<table class="table table-bordered">


  <thead>
      <tr>
          <th>Nom d'utilisateur</th>
          <th>Email</th>
          <th width="260px">Action</th>
      </tr>
  </thead>


  <tbody>
   <?php foreach ($data as $user) { ?>
      <tr>
          <td><?php echo $user->username; ?></td>
          <td><?php echo $user->email; ?></td>
      <td>
        <form method="DELETE" action="<?php echo base_url('userCRUD/delete/'.$user->id);?>">
          <a class="btn btn-info" href="<?php echo base_url('userCRUD/'.$user->id) ?>"> Afficher</a>

         <a class="btn btn-primary" href="<?php echo base_url('userCRUD/edit/'.$user->id) ?>"> Editer</a>

          <button type="submit" class="btn btn-danger"> Supprimer</button>
        </form>
      </td>
      </tr>
      <?php } ?>
  </tbody>


</table>
