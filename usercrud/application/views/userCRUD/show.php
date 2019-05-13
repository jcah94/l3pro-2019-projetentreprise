<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Afficher l'utilisateur</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="<?php echo base_url('userCRUD');?>"> Retour</a>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Nom d'utilisateur:</strong>
            <?php echo $user->username; ?>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Email:</strong>
            <?php echo $user->email; ?>
        </div>
    </div>
</div>
