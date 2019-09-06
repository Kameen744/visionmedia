<div class="card">
	<div class="card-header p-0">
		<!-- <span class="label"><i class="fa fa-edit fa-fw"></i>Programs</span>  -->
        <?php if(isset($cardnav)): ?>
            <?= $cardnav ?>
        <?php endif; ?>
	</div>
	<div class="card-body">
		<div class="row">
			<div class="col-12" id="loadreports"></div>
		</div>
	</div>
	<div class="card-footer text-muted text-center">
		<?php if(isset($tabname)): ?>
  			<strong><?= $tabname ?></strong>
		<?php endif; ?>
	</div>
</div>