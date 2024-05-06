<div class="field">
    <label for="name">Nombre del Proyecto:</label>
    <input type="text" name="name" id="name" placeholder="Nombre del proyecto" value="<?php echo $project->name?>">
</div>
<div class="field">
    <label for="type">Tipo de Proyecto:</label>
    <select name="type"  id="type" class="styled-select" onmousedown="this.size=3;" onkeydown="this.size=3;" onchange="this.size=0;" onblur="this.size=0;">
        <option value="" disabled selected>-- Seleccione --</option>
        <option value="residencial" <?php if($project->type === 'residencial') echo 'selected';?>>Residencial</option>
        <option value="comercial" <?php if($project->type === 'comercial') echo 'selected';?>>Comercial</option>
        <option value="institucional" <?php if($project->type === 'institucional') echo 'selected';?>>Institucional</option>
        <option value="hotelero" <?php if($project->type === 'hotelero') echo 'selected';?>>Hotelero</option>
    </select> 
</div>

<div class="field">
    <label for="client">Cliente:</label>
    <input type="text" name="client" id="client" placeholder="Nombre del cliente" value="<?php echo $project->client?>">
</div>

<div class="field">
    <label for="budget">Presupuesto:</label>
    <input type="text" name="budget" id="budget" placeholder="Presupuesto del proyecto" value="<?php echo $project->budget?>">
</div>
<div class="field">
    <label for="location">Ubicación:</label>
    <input type="text" name="location" id="location" placeholder="Zona o ubicación del proyecto" value="<?php echo $project->location?>">
</div>
<div class="field">
    <label for="duration">Duración:</label>
    <input type="text" name="duration" id="duration" placeholder="Duración del proyecto" value="<?php echo $project->duration?>">
</div>
<div class="field">
    <label for="durationEng">Duration:</label>
    <input type="text" name="durationEng" id="durationEng" placeholder="Lo mismo de la anterior pero en inglés" value="<?php echo $project->durationEng?>">
</div>
<div class="field">
    <label for="endDate">Conclusión:</label>
    <input type="text" name="endDate" id="endDate" placeholder="Fecha de conclusión del proyecto" value="<?php echo $project->endDate?>">
</div>
<div class="field">
    <label for="details">Detalles del proyecto:</label>
    <textarea name="details" id="details" placeholder="Resumen corto de lo que se hizo en este proyecto"><?php echo $project->details?></textarea>
</div>
<div class="field">
    <label for="detailsEng">Project details:</label>
    <textarea name="detailsEng" id="detailsEng" placeholder="Lo mismo anterior pero en inglés"><?php echo $project->detailsEng?></textarea>
</div>
<div class="field">
    <label for="photos[]">Fotos del Proyecto:</label>
    <input type="file" name="photos[]" class="custom-file-input" accept="image/jpeg, image/png, image/webp" multiple>
</div>
<input type="hidden" name="token" value="<?php echo $project->token?>">