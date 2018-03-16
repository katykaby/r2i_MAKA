<?php require 'assets/src/inc/config.php'; ?>
<?php require 'assets/src/inc/views/template_head_start.php'; ?>

<!-- Page JS Plugins CSS -->


<?php require 'assets/src/inc/views/template_head_end.php'; ?>
<?php require 'assets/src/inc/views/base_head.php'; ?>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/style.css">





<div class="content bg-gray-lighter">
  <div class="row items-push">
    <div class="col-sm-7">
      <h1 class="page-heading">
        <?= $title ?> <small></small>
      </h1>
    </div>

  </div>
</div>

<div class="col-sm-12 col-lg-12">
  <div class="block block-themed" id="listeprojet_block">
    <div class="block-header bg-info">
      <ul class="block-options">
        <li>
          <button id="listeprojet_block_refresh" type="button" data-toggle="block-option" data-action="refresh_toggle" data-action-mode="demo"><i class="si si-refresh"></i></button>
        </li>
        <li>
          <button type="button" data-toggle="block-option" data-action="content_toggle"><i class="si si-arrow-up"></i></button>
        </li>
      </ul>
      <h3 class="block-title">Projets</h3>
    </div>
    <div class="block-content">
      <div class="block" id="listeprojet_block_content">
        <!-- Table projets -->
        <div class="block">
          <div class="block-content table-responsive">
            <!-- Table projets -->
            <table  id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>Projet</th>
                  <th>Date de Création</th>
                  <th>Date d'attribution</th>
                  <th class="text-center sorting_disabled" style="width: 81px;" rowspan="1" colspan="1" aria-label="Actions">Actions</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Projet</th>
                  <th>Date de Création</th>
                  <th>Date d'attribution</th>
                  <th class="text-center sorting_disabled" style="width: 81px;" rowspan="1" colspan="1" aria-label="Actions">Actions</th>
                  
                </tr>
              </tfoot>
              <tbody>
                <?php foreach ($projet as $project)  :?>
                <tr>
                  <td><?php echo $project['projet_nom']; ?></td>
                  <td><?php echo $project['date_creation']; ?></td>
                  <td><?php echo $project['date_attribution']; ?></td>
                  <td class="text-center">
                   <div class="btn-group">
                      <button id="update_project_show" class="btn btn-xs btn-default" data-toggle="modal" title="Modifier le projet" data-target="#update-project"><span class="glyphicon glyphicon-edit"></span></button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                     <button class="btn btn-xs btn-default" type="button" data-toggle="modal" title="Supprimer Projet"><i class="fa fa-times"></i></button>
                   </div>
                 </td>
                 
               </tr>
             <?php endforeach; ?>  
           </tbody>

         </table>
       </div>
     </div>
     <!-- END Table projets -->
<!--      <button id="add_project_show" class="btn btn-success btn-sm" data-toggle="modal" data-target="#add-project" data-backdrop="static" data-keyboard="false"><span class="glyphicon glyphicon-plus">&nbsp;</span> Ajouter projet</button> -->
     <button id="add_project_show" class="btn btn-success btn-sm" ><span class="glyphicon glyphicon-plus">&nbsp;</span><a href="ajouter_projet" style="color:white">Ajouter projet</a></button>
  
     <!-- ajouter projet Modal -->
     <div class="modal fade" id="add-project" role="dialog" aria-hidden="true" style="display: none;"><!--tabindex="-1"-->
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="block block-themed block-transparent remove-margin-b">
            <div class="block-header bg-primary">
              <ul class="block-options">
                <li>
                  <button id="close-project-add-form" data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                </li>
              </ul>
              <h3 class="block-title">Ajouter projet</h3>
            </div>
            <div class="block-content">
              <!-- Validation Wizard (.project-add-js-wizard-validation class is initialized in js/pages/base_forms_wizard.js) -->
              <!-- For more examples you can check out http://vadimg.com/twitter-bootstrap-wizard-example/ -->
              <div class="project-add-js-wizard-validation block">
                <!-- Step Tabs -->
                <ul class="nav nav-tabs nav-tabs-alt nav-justified">
                  <li class="active">
                    <a class="inactive" href="#validation-step1" data-toggle="tab">1. Info Projet</a>
                  </li>
                  <li>
                    <a class="inactive" href="#validation-step2" data-toggle="tab">2. Chef de projet</a>
                  </li>
                  <li>
                    <a class="inactive" href="#validation-step3" data-toggle="tab">3. Fichiers contour</a>
                  </li>
                  <li>
                    <a class="inactive" href="#validation-step4" data-toggle="tab">4. Envoi de mail</a>
                  </li>
                </ul>
                <!-- END Step Tabs -->

                <!-- Form -->
                <!-- jQuery Validation (.js-form2 class is initialized in js/pages/base_forms_wizard.js) -->
                <!-- For more examples you can check out https://github.com/jzaefferer/jquery-validation -->
                <form id="info_project_form" class="project-add-js-form1 form-horizontal">
                  <!-- Steps Content -->
                  <div class="block-content tab-content">
                    <!-- Step 1 -->
                    <div class="tab-pane fade fade-right in push-30-t push-50 active" id="validation-step1">
                      <div class="form-group">
                        <div class="col-sm-8 col-sm-offset-2">
                          <!--<div class="form-material">-->
                          <label for="ville_nom">Ville <span class="text-danger">*</span></label>
                          <input class="form-control" type="text" id="ville_nom" name="ville_nom">
                          <!--</div>-->
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-8 col-sm-offset-2">
                          <label for="ville">Département <span class="text-danger">*</span></label>
                          <select class="form-control" name="ville"  id="ville">
                            <option value="none" selected="selected">Select Département</option>

                            <?php foreach($villes as $ville):?>
                            <option value="<?php echo $ville->code_ville;?>"><?php echo $ville->code_ville;?>-<?php echo $ville->nom_ville; ?></option>
                          <?php endforeach;?>
                        </select></div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-8 col-sm-offset-2">
                          <label for="trigramme">Trigramme de la plaque + Dept sur deux chiffres <span class="text-danger">*</span></label>
                          <div class="input-group">
                            <!--<input class="form-control" type="hidden" id="trigramme_dept" name="trigramme_dept">-->
                            <span class="input-group-addon" id="trigramme">PLA00_</span>
                            <input class="form-control" type="text" id="tridept" name="tridept">
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-8 col-sm-offset-2">
                          <label for="id_nro">Code site d’origine <span class="text-danger">*</span></label>
                          <select name="id_nro" class="form-control">
                            <option value="none" selected="selected">Select nro</option>

                            <?php foreach($nros as $nro):?>
                            <option value="<?php echo $nro->id_nro;?>"><?php echo $nro->lib_nro; ?></option>
                          <?php endforeach;?>
                        </select></div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-8 col-sm-offset-2">
                          <label for="type_site_origine">Type de Site d’origine</label>
                          <select name="type_site_origine"  class="form-control">
                            <option value="none" selected="selected">Select type</option>

                            <?php foreach($tsos as $tso):?>
                            <option value="<?php echo $tso->id_site_origine_type;?>"><?php echo $tso->lib_site_origine_type; ?></option>
                          <?php endforeach;?>
                        </select></div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-8 col-sm-offset-2">
                          <label for="taille">Taille approximative en LR <span class="text-danger">*</span></label>
                          <input class="form-control" type="number" id="taille" name="taille">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-8 col-sm-offset-2">
                          <label for="etat_site_origine">Etat Site Origine</label>
                          <select name="etat_site_origine" class="form-control">
                            <option value="none" selected="selected">Select état</option>

                            <?php foreach($esos as $eso):?>
                            <option value="<?php echo $eso->id_site_origine_etat;?>"><?php echo $eso->lib_site_origine_etat; ?></option>
                          <?php endforeach;?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-8 col-sm-offset-2">
                        <label for="date_mad_site_origine">Date Mise à disposition site Origine <span class="text-danger">*</span></label>
                        <input class="form-control" type="date" id="date_mad_site_origine" name="date_mad_site_origine">
                      </div>
                    </div>
                    <div class="col-sm-8 col-sm-offset-2">
                      <div class="alert alert-success" id="message_project_add" role="alert" style="display: none;">
                      </div>
                    </div>
                  </div>
                  <!-- END Step 1 -->

                  <!-- Step 2 -->
                  <div class="tab-pane fade fade-right push-30-t push-50" id="validation-step2">
                    <div class="form-group">
                      <div class="col-sm-8 col-sm-offset-2">
                        <select class="form-control" id="id_chef_projet" name="id_chef_projet" size="1">
                          <option value="" selected="" disabled="">Séléctionnez chef de projet</option>
                          <option value="1031">rrr rrr</option>                                            </select>
                        </div>
                      </div>
                      <div class="col-sm-8 col-sm-offset-2">
                        <div class="alert alert-success" id="message_cdp_update" role="alert" style="display: none;">
                        </div>
                      </div>
                    </div>
                    <!-- END Step 2 -->

                    <!-- Step 3 -->
                    <div class="tab-pane fade fade-right push-30-t push-50" id="validation-step3">
                      <div class="form-group">
                        <div class="col-md-6">
                          <label for="fileuploader">Fichiers contour ou SD<span class="text-danger">*</span></label>
                          <div id="fileuploader"><div class="ajax-upload-dragdrop" style="vertical-align: top; width: 400px;"><div class="ajax-file-upload" style="position: relative; overflow: hidden; cursor: default;">Téléchargez<form method="POST" action="api/projet/projet/projet_upload_files.php" enctype="multipart/form-data" style="margin: 0px; padding: 0px;"><input type="file" id="ajax-upload-id-1521026390838" name="myfile[]" accept="*" multiple="" style="position: absolute; cursor: pointer; top: 0px; width: 100%; height: 100%; left: 0px; z-index: 100; opacity: 0;"></form></div><span><b>Faites glisser et déposez les fichiers</b></span></div><div></div></div><div class="ajax-file-upload-container"></div>
                          <div class="alert alert-success" id="message_files_upload" role="alert">
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- END Step 3 -->
                    <!-- Step 4 -->
                    <div class="tab-pane fade fade-right push-30-t push-50" id="validation-step4">
                      <div class="form-group">
                        <div class="col-sm-8 col-sm-offset-2">
                          <div id="progress_loader_message" class="progress active">
                            <div class="progress-bar progress-bar-primary progress-bar-striped" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">Envoi de mail en cours ...</div>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-8 col-sm-offset-2">
                        <div class="alert alert-success" id="message_send_mail" role="alert" style="display: none;">
                        </div>
                      </div>
                    </div>
                    <!-- END Step 4 -->
                  </div>
                  <!-- END Steps Content -->

                  <!-- Steps Navigation -->
                  <div class="block-content block-content-mini block-content-full border-t">
                    <div class="row">
                      <div class="col-xs-6">
                        <!--<button class="wizard-prev btn btn-warning" type="button"><i class="fa fa-arrow-circle-o-left"></i> Previous</button>-->
                      </div>
                      <div class="col-xs-6 text-right">
                        <button id="next-btn" class="wizard-next btn btn-success" type="button">Valider <i class="fa fa-arrow-circle-o-right"></i></button>
                        <button id="close-btn" class="wizard-finish btn btn-primary" type="button" data-dismiss="modal" style="display: none;"><i class="fa fa-close"></i> Fermer</button>
                      </div>
                    </div>
                  </div>
                  <!-- END Steps Navigation -->
                </form>
                <!-- END Form -->
              </div>
              <!-- END Validation Wizard Wizard -->
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- END ajouter projet Modal -->

    <button id="add_sub_project_show" class="btn btn-info btn-sm" data-toggle="modal" data-target="#add-subproject" data-backdrop="static" data-keyboard="false"><span class="glyphicon glyphicon-plus">&nbsp;</span> Ajouter sous projet</button>




    <!-- ajouter sous projet Modal -->
    <div class="modal fade" id="add-subproject" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="block block-themed block-transparent remove-margin-b">
            <div class="block-header bg-primary">
              <ul class="block-options">
                <li>
                  <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                </li>
              </ul>
              <h3 class="block-title">Ajouter sous projet</h3>
            </div>
            <div class="block-content">
              <form class="js-validation-bootstrap form-horizontal" id="sous_project_form">
                <div class="form-group">
                  <div class="col-md-6">
                    <label for="sousprojet_dep">Département <span class="text-danger">*</span></label>
                    <input class="form-control" type="number" id="sousprojet_dep" name="sousprojet_dep" disabled="">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-md-6">
                    <label for="sousprojet_ville">Ville <span class="text-danger">*</span></label>
                    <input class="form-control" type="text" id="sousprojet_ville" name="sousprojet_ville" disabled="">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-md-6">
                    <label for="sousprojet_plaque">Plaque <span class="text-danger">*</span></label>
                    <input class="form-control" type="text" id="sousprojet_plaque" name="sousprojet_plaque" disabled="">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-md-6">
                    <label for="sousprojet_zone">Zone <span class="text-danger">*</span></label>
                    <input class="form-control" type="text" id="sousprojet_zone" name="sousprojet_zone">
                  </div>
                </div>
                <div class="alert alert-success" id="message_sub_project_add" role="alert" style="display: none;">
                </div>
              </form>
            </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-sm btn-default" type="button" data-dismiss="modal">Fermer</button>
            <button class="btn btn-sm btn-primary" id="save_sub_project" type="button"><i class="fa fa-check"></i> Enregistrer</button>
          </div>
        </div>
      </div>
    </div>
    <!-- END ajouter sous projet Modal -->

    <!-- modifier projet Modal -->
    <div class="modal fade" id="update-project" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="block block-themed block-transparent remove-margin-b">
            <div class="block-header bg-primary">
              <ul class="block-options">
                <li>
                  <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                </li>
              </ul>
              <h3 class="block-title">Modifier projet</h3>
            </div>
            <div class="block-content">
              <div class="block">
                <ul class="nav nav-tabs nav-tabs-alt nav-justified" data-toggle="tabs">
                  <li class="active">
                    <a href="#info_project_update_tab" data-toggle="tab">Infos Projet</a>
                  </li>
                  <li>
                    <a href="#cdp_update_tab" data-toggle="tab">Chef de projet</a>
                  </li>
                  <li>
                    <a href="#files_update_tab" data-toggle="tab">Fichiers contour (SD)</a>
                  </li>
                </ul>
                <div class="block-content tab-content">
                  <div class="tab-pane active" id="info_project_update_tab"><!--info_project_update_tab-->
                    <form class="js-form1 form-horizontal">
                      <div class="form-group">
                        <div class="col-sm-8 col-sm-offset-2">
                          <!--<div class="form-material">-->
                          <label for="projet_update_ville_nom">Ville <span class="text-danger">*</span></label>
                          <input class="form-control" type="text" id="projet_update_ville_nom" name="projet_update_ville_nom">
                          <!--</div>-->
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-8 col-sm-offset-2">
                          <!--<div class="form-material">-->
                          <label for="projet_update_ville">Ville <span class="text-danger">*</span></label>
                          <select class="js-select2 form-control select2-hidden-accessible" id="projet_update_ville" name="projet_update_ville" size="1" style="width: 100%;" data-placeholder="Séléctionner départ/ville.." tabindex="-1" aria-hidden="true">
                            <option value="">&nbsp;</option>
                            <option value="01">01 - Ain</option><option value="02">02 - Aisne</option><option value="03">03 - Allier</option><option value="04">04 - Alpes-de-Haute-Provence</option><option value="05">05 - Hautes-Alpes</option><option value="06">06 - Alpes-Maritimes</option><option value="07">07 - Ardèche</option><option value="08">08 - Ardennes</option><option value="09">09 - Ariège</option><option value="10">10 - Aube</option><option value="11">11 - Aude</option><option value="12">12 - Aveyron</option><option value="13">13 - Bouches-du-Rhône</option><option value="14">14 - Calvados</option><option value="15">15 - Cantal</option><option value="16">16 - Charente</option><option value="17">17 - Charente-Maritime</option><option value="18">18 - Cher</option><option value="19">19 - Corrèze</option><option value="21">21 - Côte-d Or</option><option value="22">22 - Côtes-d Armor</option><option value="23">23 - Creuse</option><option value="24">24 - Dordogne</option><option value="25">25 - Doubs</option><option value="26">26 - Drôme</option><option value="27">27 - Eure</option><option value="28">28 - Eure-et-Loir</option><option value="29">29 - Finistère</option><option value="2A">2A - Corse-du-Sud</option><option value="2B">2B - Haute-Corse</option><option value="30">30 - Gard</option><option value="31">31 - Haute-Garonne</option><option value="32">32 - Gers</option><option value="33">33 - Gironde</option><option value="34">34 - Hérault</option><option value="35">35 - Ille-et-Vilaine</option><option value="36">36 - Indre</option><option value="37">37 - Indre-et-Loire</option><option value="38">38 - Isère</option><option value="39">39 - Jura</option><option value="40">40 - Landes</option><option value="41">41 - Loir-et-Cher</option><option value="42">42 - Loire</option><option value="43">43 - Haute-Loire</option><option value="44">44 - Loire-Atlantique</option><option value="45">45 - Loiret</option><option value="46">46 - Lot</option><option value="47">47 - Lot-et-Garonne</option><option value="48">48 - Lozère</option><option value="49">49 - Maine-et-Loire</option><option value="50">50 - Manche</option><option value="51">51 - Marne</option><option value="52">52 - Haute-Marne</option><option value="53">53 - Mayenne</option><option value="54">54 - Meurthe-et-Moselle</option><option value="55">55 - Meuse</option><option value="56">56 - Morbihan</option><option value="57">57 - Moselle</option><option value="58">58 - Nièvre</option><option value="59">59 - Nord</option><option value="60">60 - Oise</option><option value="61">61 - Orne</option><option value="62">62 - Pas-de-Calais</option><option value="63">63 - Puy-de-Dôme</option><option value="64">64 - Pyrénées-Atlantiques</option><option value="65">65 - Hautes-Pyrénées</option><option value="66">66 - Pyrénées-Orientales</option><option value="67">67 - Bas-Rhin</option><option value="68">68 - Haut-Rhin</option><option value="69">69 - Rhône</option><option value="70">70 - Haute-Saône</option><option value="71">71 - Saône-et-Loire</option><option value="72">72 - Sarthe</option><option value="73">73 - Savoie</option><option value="74">74 - Haute-Savoie</option><option value="75">75 - Paris</option><option value="76">76 - Seine-Maritime</option><option value="77">77 - Seine-et-Marne</option><option value="78">78 - Yvelines</option><option value="79">79 - Deux-Sèvres</option><option value="80">80 - Somme</option><option value="81">81 - Tarn</option><option value="82">82 - Tarn-et-Garonne</option><option value="83">83 - Var</option><option value="84">84 - Vaucluse</option><option value="85">85 - Vendée</option><option value="86">86 - Vienne</option><option value="87">87 - Haute-Vienne</option><option value="88">88 - Vosges</option><option value="89">89 - Yonne</option><option value="90">90 - Territoire de Belfort</option><option value="91">91 - Essonne</option><option value="92">92 - Hauts-de-Seine</option><option value="93">93 - Seine-Saint-Denis</option><option value="94">94 - Val-de-Marne</option><option value="95">95 - Val-d Oise</option>                                            </select><span class="select2 select2-container select2-container--default" dir="ltr" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-projet_update_ville-container"><span class="select2-selection__rendered" id="select2-projet_update_ville-container" title="02 - Aisne">02 - Aisne</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                            <!--</div>-->
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-sm-8 col-sm-offset-2">
                            <!--<div class="form-material">-->
                            <label for="projet_update_dept">Trigramme de la plaque + Dept sur deux chiffres <span class="text-danger">*</span></label>
                            <div class="input-group">
                              <!--<input class="form-control" type="text" id="projet_update_trigramme_dept" name="projet_update_trigramme_dept">-->
                              <span class="input-group-addon" id="projet_update_trigramme">PLA02_</span>
                              <input class="form-control" type="text" id="projet_update_dept" name="projet_update_dept">
                            </div>
                            <!--</div>-->
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-sm-8 col-sm-offset-2">
                            <label for="projet_update_code_site_origine">Code site d’origine <span class="text-danger">*</span></label>
                            <select class="js-select2 form-control select2-hidden-accessible" id="projet_update_code_site_origine" name="projet_update_code_site_origine" size="1" style="width: 100%;" data-placeholder="Séléctionner nro.." tabindex="-1" aria-hidden="true">
                              <option value="">&nbsp;</option>
                              <option value="3">MIC13</option><option value="4">FAC34</option><option value="5">BRI44</option><option value="6">MOU92</option><option value="7">ALB91</option><option value="8">FAB92</option><option value="9">COM95</option><option value="10">ROU92</option><option value="11">PEL92</option><option value="12">VIC92</option><option value="13">CHA92</option><option value="14">REB92</option><option value="15">HEB92</option><option value="16">CBV92</option><option value="17">CDG92</option><option value="140">AZA92</option><option value="141">LOG77</option><option value="142">VAI93</option><option value="143">BAR93</option><option value="144">ALL93</option><option value="145">BAB93</option><option value="146">SEM93</option><option value="147">DEL95</option><option value="148">HOR93</option><option value="149">BOI93</option><option value="150">BAU93</option><option value="151">NSG93</option><option value="152">CAR94</option><option value="153">FRA94</option><option value="154">LAF94</option><option value="155">ROU94</option><option value="156">VAI94</option><option value="157">VIE94</option><option value="158">COL59</option><option value="159">ISL59</option><option value="160">LYA59</option><option value="161">REG59</option><option value="162">WAZ59</option><option value="163">QUE45</option><option value="164">SOU45</option><option value="165">GRA86</option><option value="166">PAT86</option><option value="167">TOU86</option><option value="168">BR137</option><option value="169">RC137</option><option value="170">BEA44</option><option value="872">LUC44</option><option value="873">SCH44</option><option value="874">VIV44</option><option value="875">CHE35</option><option value="876">JOU35</option><option value="877">MAG35</option><option value="878">MET35</option><option value="879">ROA76</option><option value="880">ROB76</option><option value="881">4AA54</option><option value="882">4BE54</option><option value="883">ARL57</option><option value="884">PDA57</option><option value="885">SAB57</option><option value="886">CHA67</option><option value="887">SCH67</option><option value="888">VIC67</option><option value="889">ZOR67</option><option value="890">DEL63</option><option value="891">FLA63</option><option value="892">LAV63</option><option value="893">SAL63</option><option value="894">COU42</option><option value="895">CHA69</option><option value="896">SPV69</option><option value="897">IMB69</option><option value="898">BEL69</option><option value="899">SAL69</option><option value="900">BER69</option><option value="901">CUV69</option><option value="902">DEL69</option><option value="903">GRA69</option><option value="904">PEI69</option><option value="905">HER38</option><option value="906">MEY38</option><option value="907">STA38</option><option value="908">YCL38</option><option value="909">BAS33</option><option value="910">BDN33</option><option value="911">CAU33</option><option value="912">CHE33</option><option value="913">MEK33</option><option value="914">BER31</option><option value="915">FON31</option><option value="916">GLO31</option><option value="917">ITA31</option><option value="918">LOT31</option><option value="919">REC31</option><option value="920">UNI31</option><option value="921">BER34</option><option value="922">FAU34</option><option value="923">FLA34</option><option value="924">GAM34</option><option value="925">JAN34</option><option value="926">LAV34</option><option value="927">RAV34</option><option value="928">RIC34</option><option value="929">NAT13</option><option value="930">ALL13</option><option value="931">MER13</option><option value="933">VIN13</option><option value="934">RED13</option><option value="935">SAN13</option><option value="936">BOC06</option><option value="937">CAN06</option><option value="938">NIC06</option><option value="939">TCA83</option><option value="940">TRO83</option><option value="941">TSM83</option><option value="942">12345ABC</option><option value="943">SMA06</option><option value="944">JOF06</option><option value="945">VAU06</option><option value="946">VLL06</option><option value="947">BON06</option><option value="948">SVA92</option><option value="949">GRU92</option><option value="950">MAI92</option><option value="952">GAL92</option><option value="953">JUI92</option><option value="955">POI92</option><option value="956">REP92</option><option value="957">DEB92</option><option value="959">TEH91</option><option value="960">ROU91</option><option value="961">SLO13</option>                                            </select><span class="select2 select2-container select2-container--default" dir="ltr" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-projet_update_code_site_origine-container"><span class="select2-selection__rendered" id="select2-projet_update_code_site_origine-container" title="MIC13">MIC13</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="col-sm-8 col-sm-offset-2">
                              <!--<div class="form-material">-->
                              <label for="projet_update_type_site_origine">Type de Site d’origine</label>
                              <select class="form-control" id="projet_update_type_site_origine" name="projet_update_type_site_origine" size="1">
                                <option value="" selected="" disabled="">Séléctionnez type</option>
                                <option value="1">NRA</option><option value="2">NRO</option><option value="3">POP</option>                                            </select>
                                <!--</div>-->
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="col-sm-8 col-sm-offset-2">
                                <!--<div class="form-material">-->
                                <label for="projet_update_taille">Taille approximative en LR <span class="text-danger">*</span></label>
                                <input class="form-control" type="number" id="projet_update_taille" name="projet_update_taille">
                                <!--</div>-->
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="col-sm-8 col-sm-offset-2">
                                <!--<div class="form-material">-->
                                <label for="projet_update_etat_site_origine">Etat Site Origine</label>
                                <select class="form-control" id="projet_update_etat_site_origine" name="projet_update_etat_site_origine" size="1">
                                  <option value="" selected="" disabled="">Séléctionnez état</option>
                                  <option value="1">Promesse</option><option value="2">Acquis</option><option value="3">A Commander</option><option value="4">Prêt pour Travaux</option><option value="5">En Travaux</option><option value="6">Recette OK</option><option value="7">Prêt</option><option value="8">En service</option>                                            </select>
                                  <!--</div>-->
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col-sm-8 col-sm-offset-2">
                                  <!--<div class="form-material">-->
                                  <label for="projet_update_date_mad_site_origine">Date Mise à disposition site Origine <span class="text-danger">*</span></label>
                                  <input class="form-control" type="date" id="projet_update_date_mad_site_origine" name="projet_update_date_mad_site_origine">
                                  <!--</div>-->
                                </div>
                              </div>
                              <div class="col-sm-8 col-sm-offset-2">
                                <div class="alert alert-success" id="message_project_update" role="alert" style="display: none;">
                                </div>
                              </div>
                              <div class="block-content block-content-mini block-content-full border-t">
                                <div class="row">
                                  <div class="col-xs-6">
                                    <!--<button class="wizard-prev btn btn-warning" type="button"><i class="fa fa-arrow-circle-o-left"></i> Previous</button>-->
                                  </div>
                                  <div class="col-xs-6 text-right">
                                    <button class="btn btn-primary" type="button" data-dismiss="modal"><i class="fa fa-close"></i> Fermer</button>
                                    <button class="btn btn-success" id="update_project_infos" type="button">Valider <i class="fa fa-check"></i></button>
                                  </div>
                                </div>
                              </div>
                            </form>
                          </div>
                          <div class="tab-pane" id="cdp_update_tab">
                            <form class="js-form1 form-horizontal">
                              <div class="form-group">
                                <div class="col-sm-8 col-sm-offset-2">
                                  <div class="form-material">
                                    <select class="form-control" id="projet_update_id_chef_projet" name="id_chef_projet" size="1">
                                      <option value="" selected="" disabled="">Séléctionnez chef de projet</option>
                                      <option value="1031">rrr rrr</option>                                                </select>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-sm-8 col-sm-offset-2">
                                  <div class="alert alert-success" id="message_project_cdp_update" role="alert" style="display: none;">
                                  </div>
                                </div>
                                <div class="block-content block-content-mini block-content-full border-t">
                                  <div class="row">
                                    <div class="col-xs-6">
                                      <!--<button class="wizard-prev btn btn-warning" type="button"><i class="fa fa-arrow-circle-o-left"></i> Previous</button>-->
                                    </div>
                                    <div class="col-xs-6 text-right">
                                      <button class="btn btn-primary" type="button" data-dismiss="modal"><i class="fa fa-close"></i> Fermer</button>
                                      <button class="btn btn-success" type="button" id="update_project_cdp">Valider <i class="fa fa-check"></i></button>
                                    </div>
                                  </div>
                                </div>
                              </form>
                            </div>
                            <div class="tab-pane" id="files_update_tab">
                              <div class="row">
                                <div class="col-md-6">
                                  <div id="fileuploader2"><div class="ajax-upload-dragdrop" style="vertical-align: top; width: 400px;"><div class="ajax-file-upload" style="position: relative; overflow: hidden; cursor: default;">Téléchargez<form method="POST" action="api/projet/projet/projet_upload_files.php" enctype="multipart/form-data" style="margin: 0px; padding: 0px;"><input type="file" id="ajax-upload-id-1521026395148" name="myfile[]" accept="*" multiple="" style="position: absolute; cursor: pointer; top: 0px; width: 100%; height: 100%; left: 0px; z-index: 100; opacity: 0;"></form></div><span><b>Faites glisser et déposez les fichiers</b></span></div><div></div></div><div class="ajax-file-upload-container"></div><div class="ajax-file-upload-container"></div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- END modifier projet Modal -->
          </div>
        </div>
      </div>

      <?php require 'assets/src/inc/views/base_footer.php'; ?>
      <?php require 'assets/src/inc/views/template_footer_start.php'; ?>
      <?php require 'assets/src/inc/views/template_footer_end.php'; ?>



    
      
      <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
      <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js
      "></script>
      <script type="text/javascript">
$(document).ready(function() {
   
    var table = $('#example').DataTable( {
        responsive: true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
        }
    } );
   
    
    $('#example tbody').on( 'click', 'tr', function () {
        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
            
        }
        else {
            table.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
            
        }
    } );
 
    $('#button').click( function () {
        table.row('.selected').remove().draw( true );
    } );
    
} );
</script>


