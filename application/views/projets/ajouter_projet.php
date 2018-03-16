<?php require 'assets/src/inc/config.php'; ?>
<?php require 'assets/src/inc/views/template_head_start.php'; ?>

<!-- Page JS Plugins CSS -->


<?php require 'assets/src/inc/views/template_head_end.php'; ?>
<?php require 'assets/src/inc/views/base_head.php'; ?>

<div class="content bg-gray-lighter">
	<div class="row items-push">
		<div class="col-sm-8">
			<h1 class="page-heading">
				Ajouter projet 
			</h1>
		</div>
		<div class="col-sm-4 text-right hidden-xs">
			<ol class="breadcrumb push-10-t">
				<li>Liste</li>
				<li><a class="link-effect" href="">Ajouter projet</a></li>
			</ol>
		</div>
	</div>
</div>
<!-- END Page Header -->

<!-- Page Content -->
<div class="content content-narrow">


	<!-- Wizards with Validation -->
	<!-- <h2 class="content-heading">Wizards with Validation</h2> -->
	<div class="row">

		<div class="col-lg-12">
			<!-- Validation Wizard (.js-wizard-validation class is initialized in js/pages/base_forms_wizard.js) -->
			<!-- For more examples you can check out http://vadimg.com/twitter-bootstrap-wizard-example/ -->
			<div class="js-wizard-validation block">
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
				<form class="js-form2 form-horizontal" action="base_forms_wizard.php" method="post">
					<!-- Steps Content -->
					<div class="block-content tab-content">
						<!-- Step 1 -->
						<div class="tab-pane fade fade-right in push-30-t push-50 active" id="validation-step1">
							<div class="form-group">
								<div class="col-sm-8 col-sm-offset-2">
									<div class="form-material">
										<input class="form-control" type="text" id="ville" name="ville" placeholder="Choisir la ville">
										<label for="ville">Ville<span class="text-danger">*</span></label>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-8 col-sm-offset-2">
									<div class="form-material">
										<select class="form-control" id="dep" name="dep" size="1">

									
											<option value="" >Séléctionner le Département</option>

											<?php foreach($villes as $ville):?>
											<option value="<?php echo $ville->code_ville;?>"><?php echo $ville->code_ville;?>-<?php echo $ville->nom_ville; ?></option>
										<?php endforeach;?>
									</select>
									<label for="dep">Département <span class="text-danger">*</span></label>
								</div>
							</div>
						</div>

						  <div class="form-group">
                        <div class="col-sm-8 col-sm-offset-2">
                        	<div class="form-material">
                          <label for="tridept">Trigramme de la plaque + Dept sur deux chiffres <span class="text-danger">*</span></label>
                          <div class="input-group">
                            <!--<input class="form-control" type="hidden" id="trigramme_dept" name="trigramme_dept">-->
                            <span class="input-group-addon" id="trigramme">PLA00_</span>
                            <input class="form-control" type="text" id="tridept" name="tridept">
                          </div>
                          </div>
                        </div>
                      </div>
						  <div class="form-group">
                        <div class="col-sm-8 col-sm-offset-2">
                        	<div class="form-material">
                          <label for="id_nro">Code site d’origine <span class="text-danger">*</span></label>
                          <select name="id_nro" id="id_nro" class="form-control">
                            <option value="">Séléctionner le nro</option>

                            <?php foreach($nros as $nro):?>
                            <option value="<?php echo $nro->id_nro;?>"><?php echo $nro->lib_nro; ?></option>
                          <?php endforeach;?>
                        </select></div>
                      </div>
                      </div>
						 <div class="form-group">
                        <div class="col-sm-8 col-sm-offset-2">
                        	<div class="form-material">
                          <label for="type_site_origine">Type de Site d’origine</label>
                          <select name="type_site_origine" id="type_site_origine"  class="form-control">
                            <option value="none" selected="selected">Séléctionner type</option>

                            <?php foreach($tsos as $tso):?>
                            <option value="<?php echo $tso->id_site_origine_type;?>"><?php echo $tso->lib_site_origine_type; ?></option>
                          <?php endforeach;?>
                        </select></div>
                      </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-8 col-sm-offset-2">
                        	<div class="form-material">
                          <label for="taille">Taille approximative en LR <span class="text-danger">*</span></label>
                          <input class="form-control" type="number" id="taille" name="taille">
                        </div>
                        </div>
                      </div>
                       <div class="form-group">
                        <div class="col-sm-8 col-sm-offset-2">
                        <div class="form-material">
                          <label for="etat_site_origine">Etat Site Origine</label>
                          <select name="etat_site_origine" id="etat_site_origine" class="form-control">
                            <option value="">Séléctionner l'état</option>

                            <?php foreach($esos as $eso):?>
                            <option value="<?php echo $eso->id_site_origine_etat;?>"><?php echo $eso->lib_site_origine_etat; ?></option>
                          <?php endforeach;?>
                        </select>
                      </div>
                      </div>

                    </div>
                     <div class="form-group">
                      <div class="col-sm-8 col-sm-offset-2">
                      	<div class="form-material">
                        <label for="date_mad_site_origine">Date Mise à disposition site Origine <span class="text-danger">*</span></label>
                        <input class="form-control" type="date" id="date_mad_site_origine" name="date_mad_site_origine">
                      </div>
                    </div>
                    </div>
					</div>
					<!-- END Step 1 -->

					<!-- Step 2 -->
					<div class="tab-pane fade fade-right push-30-t push-50" id="validation-step2">
						<div class="form-group">
							<div class="col-sm-8 col-sm-offset-2">
								<div class="form-material">
									<textarea class="form-control" id="validation-details" name="validation-details" rows="9" placeholder="Share something about yourself"></textarea>
									<label for="validation-details">Details</label>
								</div>
							</div>
						</div>
					</div>
					<!-- END Step 2 -->

					<!-- Step 3 -->
					<div class="tab-pane fade fade-right push-30-t push-50" id="validation-step3">
						<div class="form-group">
							<div class="col-sm-8 col-sm-offset-2">
								<div class="form-material">
									<input class="form-control" type="text" id="validation-city" name="validation-city" placeholder="Where do you live?">
									<label for="validation-city">City</label>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-8 col-sm-offset-2">
								<div class="form-material">
									<select class="form-control" id="validation-skills" name="validation-skills" size="1">
										<option value="">Please select your best skill</option>
										<option value="1">Photoshop</option>
										<option value="2">HTML</option>
										<option value="3">CSS</option>
										<option value="4">JavaScript</option>
									</select>
									<label for="validation-skills">Skills</label>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-8 col-sm-offset-2">
								<label class="css-input switch switch-sm switch-primary" for="validation-terms">
									<input type="checkbox" id="validation-terms" name="validation-terms"><span></span> Agree with the <a data-toggle="modal" data-target="#modal-terms" href="#">terms</a>
								</label>
							</div>
						</div>
					</div>
					<!-- END Step 3 -->
				</div>
				<!-- END Steps Content -->

				<!-- Steps Navigation -->
				<div class="block-content block-content-mini block-content-full border-t">
					<div class="row">
						<div class="col-xs-6">
							<button class="wizard-prev btn btn-warning" type="button"><i class="fa fa-arrow-circle-o-left"></i> Previous</button>
						</div>
						<div class="col-xs-6 text-right">
							<button class="wizard-next btn btn-success" type="button">Next <i class="fa fa-arrow-circle-o-right"></i></button>
							<button class="wizard-finish btn btn-primary" type="submit"><i class="fa fa-check-circle-o"></i> Submit</button>
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
<!-- END Wizards with Validation -->
</div>
<!-- END Page Content -->

<?php require 'assets/src/inc/views/base_footer.php'; ?>

<!-- Terms Modal -->
<div class="modal fade" id="modal-terms" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-popout">
		<div class="modal-content">
			<div class="block block-themed block-transparent remove-margin-b">
				<div class="block-header bg-primary-dark">
					<ul class="block-options">
						<li>
							<button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
						</li>
					</ul>
					<h3 class="block-title">Terms &amp; Conditions</h3>
				</div>
				<div class="block-content">
					<?php echo $one->get_text('small', 5); ?>
				</div>
			</div>
			<div class="modal-footer">
				<button class="btn btn-sm btn-default" type="button" data-dismiss="modal">Close</button>
				<button class="btn btn-sm btn-primary" type="button" data-dismiss="modal"><i class="fa fa-check"></i> I agree</button>
			</div>
		</div>
	</div>
</div>
<!-- END Terms Modal -->



<?php require 'assets/src/inc/views/template_footer_start.php'; ?>
 <script>
        $(document).ready(function () {
            $('#dep').on('change', function() {
                //alert( this.value );
                $("#trigramme").text("PLA" +this.value+"_");
            })
        });
    </script>
<!-- Page JS Plugins -->
<script src="<?php echo $one->assets_folder; ?>/js/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
<script src="<?php echo $one->assets_folder; ?>/js/plugins/jquery-validation/jquery.validate.min.js"></script>

<!-- Page JS Code -->
<script src="<?php echo $one->assets_folder; ?>/js/pages/mypagejs/ajoutprojet.js"></script>


<?php require 'assets/src/inc/views/template_footer_end.php'; ?>