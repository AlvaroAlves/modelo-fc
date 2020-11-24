<div class="col-12">
  <div class="painel">
    <?php 
      
      foreach ($data['medicos'] as $medico) { ?>
      <div class="card-medico">
        <div class="row">
          <div class="col-6">
            <h5><?= $medico->nome ?></h5>
          </div>
          <div class="col-6">
            <button type="button" class="btn btn-outline-primary float-right btn-sm">Configurar horários</button>
            <button type="button" class="btn btn-outline-primary float-right btn-sm">Editar cadastros</button>
          </div>
        </div>
      </div>
    <?php }?>
    
  </div>
  
</div>