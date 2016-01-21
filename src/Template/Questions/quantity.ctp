<div class="container-fluid content">
    <div class="row information">
        Cantidad total de preguntas: <?= $totalNumber ?>
    </div>
</div>
<table class = "table quantity">
	<thead>
		<tr>
			<th></th>
			<th>
				<div class="circle">
                	<?= $this->Html->image('ic_car.png', ['alt' => 'clase B', 'width'=>'40px']) ?>
               	</div>
            </th>            
			<th>
				<div class="circle">
                	<?= $this->Html->image('ic_motorbike.png', ['alt' => 'clase C', 'width'=>'40px']) ?>
               	</div>
			</th>
		</tr>		
	</thead>
	<tbody>
		<tr>
			<td style="text-align: right; color: grey; font-weight: 100; ">Conocimientos legales y reglamentarios</td>
			<td><?= $number1B ?></td>
			<td><?= $number1C ?></td>
		</tr>
		<tr>
			<td style="text-align: right; color: grey; font-weight: 100; ">Conducta vial</td>
			<td><?= $number2B ?></td>
			<td><?= $number2C ?></td>
		</tr>
		<tr>
			<td style="text-align: right; color: grey; font-weight: 100; ">Conocimientos mecánica básica</td>
			<td><?= $number3B ?></td>
			<td><?= $number3C ?></td>
		</tr>
		<tr>
			<td style="text-align: right; color: grey; font-weight: 100; ">Seguridad vial</td>
			<td><?= $number4B ?></td>
			<td><?= $number4C ?></td>
		</tr>
		<tr>
			<td style="text-align: right; color: grey; font-weight: 100; ">Total</td>
			<td><?= $number1B + $number2B + $number3B + $number4B?></td>
			<td><?= $number1C + $number2C + $number3C + $number4C?></td>
		</tr>
	</tbody>
</table>

<script type="text/javascript">
	$(document).ready(function() {
    	$("#btn-questions").attr('class', '');
    	$("#btn-quantity").attr('class', 'active');
    	$("#btn-help").attr('class', '');
	});
</script>