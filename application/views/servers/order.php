<?php
/*
* @LitePanel
* @Version: 1.1 [dev]
* @Developed by QuickDevel
*/
?>
<?php echo $header ?>
				<h2>Заказ сервера</h2>
				<form class="form-horizontal" action="#" id="orderForm" method="POST">
					<fieldset>
						<div id="legend">
							<legend>Общая информация</legend>
						</div>
						<div class="control-group">
							<!-- Игра -->
							<label class="control-label" for="gameid">Игра</label>
							<div class="controls">
								<select id="gameid" name="gameid" onChange="updateForm()">
									<?php foreach($games as $item): ?> 
									<option value="<?php echo $item['game_id'] ?>"><?php echo $item['game_name'] ?></option>
									<?php endforeach; ?> 
								</select>
							</div>
						</div>
						<div class="control-group">
							<!-- Локация -->
							<label class="control-label" for="locationid">Локация</label>
							<div class="controls">
								<select id="locationid" name="locationid">
									<?php foreach($locations as $item): ?> 
									<option value="<?php echo $item['location_id'] ?>"><?php echo $item['location_name'] ?></option>
									<?php endforeach; ?> 
								</select>
							</div>
						</div>
						<div id="legend">
							<legend>Дополнительная информация</legend>
						</div>
						<div class="control-group">
							<!-- Период оплаты -->
							<label class="control-label" for="locationid">Период оплаты</label>
							<div class="controls">
								<select id="months" name="months" onChange="updateForm()">
									<option value="1">1 месяц</option>
									<option value="3">3 месяца (-5%)</option>
									<option value="6">6 месяцев (-10%)</option>
									<option value="12">12 месяцев (-15%)</option>
								</select>
							</div>
						</div>
						<div class="control-group">
							<!-- Количество слотов -->
							<label class="control-label"  for="slots">Количество слотов</label>
							<div class="controls">
								<div class="input-prepend input-append">
									<button class="btn" type="button" onClick="minusSlots();">-</button>
									<input type="text" id="slots" name="slots" class="input-mini" onChange="updateForm()">
									<button class="btn" type="button" onClick="plusSlots();">+</button>
								</div>
							</div>
						</div>
						<div id="legend">
							<legend>Пароль</legend>
						</div>
						<div class="control-group">
							<!-- Пароль -->
							<label class="control-label" for="password">Пароль</label>
							<div class="controls">
								<input type="password" id="password" name="password" class="input-xlarge">
							</div>
						</div>
						<div class="control-group">
							<!-- Повтор пароля -->
							<label class="control-label" for="password">Повторите пароль</label>
							<div class="controls">
								<input type="password" id="password2" name="password2" class="input-xlarge">
							</div>
						</div>
						<div id="legend">
							<legend>Стоимость</legend>
						</div>
						<div class="control-group">
							<!-- Стоимость -->
							<label class="control-label" for="price">Стоимость</label>
							<div class="controls">
								<input type="text" id="price" class="input-small">
							</div>
						</div>
						<div class="control-group">
							<!-- Кнопка -->
							<div class="controls">
								<button type="submit" class="btn btn-success"><i class="icon-ok"></i> Заказать</button>
							</div>
						</div>
					</fieldset>
				</form>
				<script>
					var gameData = {
					<?php foreach($games as $item): ?> 
						<?php echo $item['game_id'] ?>: {
							'minslots': <?php echo $item['game_min_slots'] ?>,
							'maxslots': <?php echo $item['game_max_slots'] ?>,
							'price': <?php echo $item['game_price'] ?>
						},
					<?php endforeach; ?> 
					};
					
					$('#orderForm').ajaxForm({ 
						url: '/servers/order/ajax',
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
									setTimeout("redirect('/servers/control/index/" + data.id + "')", 1500);
									break;
							}
						},
						beforeSubmit: function(arr, $form, options) {
							$('button[type=submit]').prop('disabled', true);
							showWarning("Сервер будет установлен в течении 10 минут!");
						}
					});
					
					$(document).ready(function() {
						updateForm();
					});
					
					function updateForm() {
						var gameID = $("#gameid option:selected").val();
						var slots = $("#slots").val();
						if(slots < gameData[gameID]['minslots']) {
							slots = gameData[gameID]['minslots'];
							$("#slots").val(slots);
						}
						if(slots > gameData[gameID]['maxslots']) {
							slots = gameData[gameID]['maxslots'];
							$("#slots").val(slots);
						}
						var price = gameData[gameID]['price'] * slots;
						var months = $("#months option:selected").val();
						switch(months) {
							case "3":
								price = 3*price*0.95;
								break;
							case "6":
								price = 6*price*0.90;
								break;
							case "12":
								price = 12*price*0.85;
								break;
						}
						$('#price').val(price.toFixed(2) + ' руб.');
					}
					
					function plusSlots() {
						value = parseInt($('#slots').val());
						$('#slots').val(value+1);
						updateForm();
					}
					function minusSlots() {
						value = parseInt($('#slots').val());
						$('#slots').val(value-1);
						updateForm();
					}
				</script>
<?php echo $footer ?>