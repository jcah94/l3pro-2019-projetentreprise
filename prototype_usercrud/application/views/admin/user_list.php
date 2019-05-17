

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><?=$title?></h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

            <?php if($this->session->flashdata('success')):?>
                <div class="alert alert-success">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                <strong><?php echo $this->session->flashdata('success'); ?></strong>
                </div>
            <?php elseif($this->session->flashdata('error')):?>
                <div class="alert alert-warning">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                <strong><?php echo $this->session->flashdata('error'); ?></strong>
                </div>
            <?php endif;?>
            <div class="row">
                <div class="col-lg-12">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-user-list">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Email</th>
                                <th>Rôle</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($users  as $row): ?>
                            <tr>
                                <td><?php echo $row->name; ?></td>
                                <td><?php echo $row->email; ?></td>
                                <td><?php echo ucfirst($row->role) ?></td>

                                <td>
                                    <a class="btn btn-primary" id="user-edit"  onclick="edit_user_popup('<?=$row->email?>','<?=$row->user_id?>','<?=$row->name?>','<?=$row->role?>');" data-toggle="modal" data-target="#editUser"> MODIFIER </a>
                                    <a class="btn btn-warning" id="user-reset" onclick="reset_confirmation('<?=$row->email?>','<?=$row->user_id?>')" data-toggle="modal" data-target="#resetConfirm"> REINITIALISER </a>
                                    <a class="btn btn-danger" id="user-delete" onclick="deactivate_confirmation('<?=$row->email?>','<?=$row->user_id?>');" data-toggle="modal" data-target="#deactivateConfirm"> SUPPRIMER </a>

                                </td>

                            </tr>
                            <?php endforeach; ?>

                        </tbody>
                    </table>

                    <div class="col-lg-12" style="position:fixed;bottom: 5%;left: 88%; width: 150px;text-align: center;border-radius: 100%;">
                        <img class="add_user" src="<?=base_url()?>assets/images/add.png" data-toggle="modal" data-target="#addUser" />
                    </div>

                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>



        <!-- Modal -->
        <div class="modal fade" id="deactivateConfirm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header modal-red">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">CONFIRMATION DE LA SUPPRESSION</h4>
                    </div>
                    <div class="modal-body">
                        <label>Vous allez supprimer l'utilisateur <label id="user-email" style="color:blue;"></label>.</label><br/>
                        <label>Cliquez sur <b>Ok</b> pour continuer.</label>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                        <a id="deactivateYesButton" class="btn btn-danger" >Ok</a>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

        <!-- Modal -->
        <div class="modal fade" id="resetConfirm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header modal-red">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">CONFIRMATION DE LA REINITIALISATION</h4>
                    </div>
                    <div class="modal-body">
                        <label>Vous allez réinitialiser le mot de passe de l'utilisateur <label id="reset-user-email" style="color:blue;"><br/>
                        <label>un mot de passe temporaire sera envoyez à ce mail.</label><br/>
                        <label>Cliquer sur <b>Ok</b> pour continuer.</label>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                        <a id="resetYesButton" class="btn btn-warning" >Ok</a>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->




        <div class="modal fade" id="addUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header modal-blue">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">CRÉER UN NOUVEL UTILISATEUR</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Nom</label> &nbsp;&nbsp;
                                    <label class="error" id="error_name"> ce champ est obligatoire.</label>
                                    <label class="error" id="error_name2"> le nom doit être alphanumérique.</label>
                                    <input class="form-control" id="name" placeholder="Nom" name="name" type="text" autofocus>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Email</label> &nbsp;&nbsp;
                                    <label class="error" id="error_email"> ce champ est obligatoire.</label>
                                    <label class="error" id="error_email2"> cet email existe déjà.</label>
                                    <label class="error" id="error_email3"> adresse email invalide.</label>
                                    <input class="form-control" id="email" placeholder="E-mail" name="email" type="email" autofocus>
                                </div>
                            </div>
                      </div>
                      <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Rôle</label>&nbsp;&nbsp;
                                    <label class="error" id="error_role"> ce champ est obligatoire.</label>
                                    <select name="role" id="role" class="form-control" >
                                        <option value="0" selected="selected">-- CHOIX DU ROLE --</option>
                                        <option value="admin">Admin</option>
                                        <option value="user">User</option>
                                    </select>
                                </div>
                            </div>
                      </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">ANNULER</button>
                        <button id="newUserSubmit" type="button" class="btn btn-primary">CRÉER</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->


        <div class="modal fade" id="editUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header modal-blue">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel"> MISE A JOUR DES INFOS DE L'UTILISATEUR</h4>
                    </div>
                    <div class="modal-body">
                        <input type="hidden"  id="edit-user-id" value=""/>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Nom</label> &nbsp;&nbsp;
                                    <label class="error" id="edit-error_name"> ce champ est obligatoire.</label>
                                    <label class="error" id="edit-error_name2"> le nom doit être alphanumérique.</label>
                                    <input class="form-control" id="edit-name" placeholder="Nom" name="edit-name" type="text" autofocus>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Email</label> &nbsp;&nbsp;
                                    <label class="error" id="edit-error_email"> ce champ est obligatoire.</label>
                                    <label class="error" id="edit-error_email2"> cet email existe déjà.</label>
                                    <label class="error" id="edit-error_email3"> adresse email invalide.</label>
                                    <input class="form-control" id="edit-email" placeholder="E-mail" name="edit-email" type="email" autofocus>
                                </div>
                            </div>
                      </div>
                      <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Rôle</label>&nbsp;&nbsp;
                                    <label class="error" id="edit-error_role"> ce champ est obligatoire.</label>
                                    <select name="role" id="edit-role" class="form-control" >
                                    </select>
                                </div>
                            </div>
                      </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">ANNULER</button>
                        <button id="editUserSubmit" type="button" class="btn btn-primary">METTRE À JOUR</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

        <!-- /#page-wrapper -->
        <?php $this->load->view('frame/footer_view')?>
        <script src="<?=base_url()?>assets/js/view/user_list.js"></script>
