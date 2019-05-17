<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Prototype</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?=base_url()?>assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?=base_url()?>assets/css/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="<?=base_url()?>assets/css/dataTables.bootstrap.css" rel="stylesheet">

    <link href="<?=base_url()?>assets/css/bootstrap-editable.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?=base_url()?>assets/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?=base_url()?>assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Custom tab icons -->
    <link rel="shortcut icon" href="<?=base_url()?>assets/images/yy.png" type="image/x-icon">
    <link href="<?=base_url()?>assets/js/jquery-ui-1.11.4.custom/jquery-ui.css" rel="stylesheet" type="text/css" />
    <link href="<?=base_url()?>assets/js/jquery-ui-1.11.4.custom/jquery-ui-custom-datepicker.css" rel="stylesheet" type="text/css" />

    <input type="hidden"  id="base-url" value="<?=base_url()?>"/>
</head>

<body>
    <div class="overlay"></div>
    <img id="loading"  width="250px" src="<?=base_url()?>assets/images/loading.gif" alt="Loading...">

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">#</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?=base_url();?>">
                    <div class="inline"> &nbsp;PROTOTYPE </div>
                </a>

            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a  id="header-dropdown" class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i id="header-icon" class="fa fa-user fa-fw"></i>  <i id="header-icon" class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#" data-toggle="modal" data-target="#changePasswordModal"><i class="fa fa-refresh fa-fw"></i> Changer le Mot de passe</a></li>
                        <li class="divider"></li>
                        <li><a href="<?=base_url();?>authentication/logout"><i class="fa fa-sign-out fa-fw"></i> Déconnexion</a></li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <div class=" navbar-brand navbar-right navbar-access-level">
                Niveau d'accès : <?=ucfirst($this->session->userdata('role'));?>
                &nbsp;
            </div>
            <!-- /.navbar-top-links -->


            <div class="modal fade" id="changePasswordModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header modal-blue">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">CHANGER LE MOT DE PASSE (<?=$this->session->userdata('email')?>)</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <label class="error" id="error_changePassword">Mot de passe actuel invalide</label>
                                <label class="error" id="error_changePassword2">Le mot de passe doit contenir au moins 8 caractères (alphanumeriques ou caractères spéciales)</label>
                            </div>
                        </div>
                        &nbsp;
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Mot de passe actuel</label> &nbsp;&nbsp;
                                    <label class="error" id="error_currentPassword"> ce champ est obligatoire.</label>
                                    <input class="form-control" id="currentPassword" placeholder="Mot de passe actuel" name="currentPassword" type="password" autofocus>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Nouveau mot de passe</label> &nbsp;&nbsp;
                                    <label class="error" id="error_newPassword"> ce champ est obligatoire.</label>
                                    <label class="error" id="error_newPassword2"> le mot de passe ne concorde pas</label>
                                    <input class="form-control" id="newPassword" placeholder="Nouveau mot de passe" name="newPassword" type="password" autofocus>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Confirmation du nouveau mot de passe</label> &nbsp;&nbsp;
                                    <input class="form-control" id="confirmNewPassword" placeholder="Confirmer le nouveau mot de passe" name="confirmNewPassword" type="password" autofocus>
                                </div>
                            </div>
                      </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">ANNULER</button>
                        <button id="changePasswordSubmit" type="button" class="btn btn-primary">METTRE À JOUR</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
