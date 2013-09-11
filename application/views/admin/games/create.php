<?php
/*
* @LitePanel
* @Developed by QuickDevel
*/
?>
<?php echo $header ?>
				<h1>Создание игры</h1>	
				<form class="form-horizontal" action="#" id="createForm" method="POST">
					<fieldset>
						<div id="legend">
							<legend>Основные параметры</legend>
						</div>
						<div class="control-group">
							<!-- Название -->
							<label class="control-label" for="name">Название</label>
							<div class="controls">
								<input type="text" id="name" name="name" class="input-xlarge">
							</div>
						</div>
						<div class="control-group">
							<!-- Код -->
							<label class="control-label" for="code">Код</label>
							<div class="controls">
								<input type="text" id="code" name="code" class="input-large">
							</div>
						</div>
						<div class="control-group">
							<!-- Query -->
							<label class="control-label" for="query">Query-драйвер</label>
							<div class="controls">
								<select id="query" name="query" class="input-small">
									<?php foreach($queryDrivers as $item): ?> 
									<option value="<?php echo $item ?>"><?php echo $item ?></option>
									<?php endforeach; ?> 
								</select>
							</div>
						</div>
						<div id="legend">
							<legend>Прочее</legend>
						</div>
						<div class="control-group">
							<!-- Слоты -->
							<label class="control-label" for="minslots">Слоты</label>
							<div class="controls">
								<input type="text" id="minslots" name="minslots" class="input-small"> - <input type="text" id="maxslots" name="maxslots" class="input-small">
							</div>
						</div>
						<div class="control-group">
							<!-- Порты -->
							<label class="control-label" for="minport">Порты</label>
							<div class="controls">
								<input type="text" id="minport" name="minport" class="input-small"> - <input type="text" id="maxport" name="maxport" class="input-small">
							</div>
						</div>
						<div class="control-group">
							<!-- Стоимость -->
							<label class="control-label" for="price">Стоимость</label>
							<div class="controls">
								<input type="text" id="price" name="price" class="input-small">
							</div>
						</div>
						<div class="control-group">
							<!-- Статус -->
							<label class="control-label" for="status">Статус</label>
							<div class="controls">
								<select id="status" name="status" class="input-large">
									<option value="0">Выключена</option>
									<option value="1">Включена</option>
								</select>
							</div>
						</div>
						<div class="control-group">
							<!-- Кнопка -->
							<div class="controls">
								<button type="submit" class="btn btn-success"><i class="icon-ok"></i> Сохранить</button>
							</div>
						</div>
					</fieldset>
				</form>
				
				<script>
					$('#createForm').ajaxForm({ 
						url: '/admin/games/create/ajax',
						dataType: 'text',
						success: function(data) {
							console.log(data);
							data = $.parseJSON(data);
							switch(data.status) {
								case 'error':
									showError(data.error);
									$('button[type=submit]').prop('disabled', false);
									break;
								case 'success':
									showSuccess(data.success);
									setTimeout("redirect('/admin/games')", 1500);
									break;
							}
						},
						beforeSubmit: function(arr, $form, options) {
							$('button[type=submit]').prop('disabled', true);
						}
					});
				</script>
<?php echo $footer ?>
