<?php
/*
* @LitePanel
* @Version: 1.1 [dev]
* @Developed by QuickDevel
*/
?>
<?php echo $header ?>
				<h2>Редактирование игры</h2>
				<a class="btn btn-danger pull-right" href="/admin/games/edit/delete/<?php echo $game['game_id'] ?>">Удалить игру</a>
				<div class="btn-group">
					<a class="btn" href="/admin/servers/index?gameid=<?php echo $game['game_id'] ?>">Сервера игры</a>
				</div>
				<form class="form-horizontal" action="#" id="editForm" method="POST">
					<fieldset>
						<div id="legend">
							<legend>Основные параметры</legend>
						</div>
						<div class="control-group">
							<!-- Название -->
							<label class="control-label" for="name">Название</label>
							<div class="controls">
								<input type="text" id="name" name="name" class="input-xlarge" value="<?php echo $game['game_name'] ?>">
							</div>
						</div>
						<div class="control-group">
							<!-- Код -->
							<label class="control-label" for="code">Код</label>
							<div class="controls">
								<input type="text" id="code" name="code" class="input-large" value="<?php echo $game['game_code'] ?>">
							</div>
						</div>
						<div class="control-group">
							<!-- Query -->
							<label class="control-label" for="query">Query-драйвер</label>
							<div class="controls">
								<select id="query" name="query" class="input-small">
									<?php foreach($queryDrivers as $item): ?> 
									<option value="<?php echo $item ?>"<?php if($item == $game['game_query']): ?> selected<?php endif; ?>><?php echo $item ?></option>
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
								<input type="text" id="minslots" name="minslots" class="input-small" value="<?php echo $game['game_min_slots'] ?>"> - <input type="text" id="maxslots" name="maxslots" class="input-small" value="<?php echo $game['game_max_slots'] ?>">
							</div>
						</div>
						<div class="control-group">
							<!-- Порты -->
							<label class="control-label" for="minport">Порты</label>
							<div class="controls">
								<input type="text" id="minport" name="minport" class="input-small" value="<?php echo $game['game_min_port'] ?>"> - <input type="text" id="maxport" name="maxport" class="input-small" value="<?php echo $game['game_max_port'] ?>">
							</div>
						</div>
						<div class="control-group">
							<!-- Стоимость -->
							<label class="control-label" for="price">Стоимость</label>
							<div class="controls">
								<input type="text" id="price" name="price" class="input-small" value="<?php echo $game['game_price'] ?>">
							</div>
						</div>
						<div class="control-group">
							<!-- Статус -->
							<label class="control-label" for="status">Статус</label>
							<div class="controls">
								<select id="status" name="status" class="input-large">
									<option value="0" <?php if($game['game_status'] == 0): ?>selected="selected"<?php endif; ?>>0 - Выключена</option>
									<option value="1" <?php if($game['game_status'] == 1): ?>selected="selected"<?php endif; ?>>1 - Включена</option>
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
					$('#editForm').ajaxForm({ 
						url: '/admin/games/edit/ajax/<?php echo $game['game_id'] ?>',
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
									break;
							}
						},
						beforeSubmit: function(arr, $form, options) {
							$('button[type=submit]').prop('disabled', true);
						}
					});
				</script>
<?php echo $footer ?>