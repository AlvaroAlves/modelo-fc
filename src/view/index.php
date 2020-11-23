<div class="col-8 offset-2">
  <div class="painel">
  <?php 
      
      foreach ($data['medicos'] as $medico) { ?>
      <tr>
        <td><?= $medico->id ?></td>
        <td><?= $medico->nome ?></td>
      </tr>
    <?php }?>
    
  </div>
  
</div>