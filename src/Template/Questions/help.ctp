<div class="content help">	
	<div class="contentLinks">
		<div class="row"><h4>Tabla de contenidos</h4></div>
		<div class="row linkContents"><a href="#1">1.- Ingresar una pregunta </a></div>
		<div class="row linkContents"><a href="#2">2.- Imagen de una pregunta </a></div>
		<div class="row linkContents"><a href="#3">3.- Editar una pregunta </a></div>
		<div class="row linkContents"><a href="#4">4.- Eliminar una pregunta </a></div>
		<div class="row linkContents"><a href="#5">5.- Búsqueda de preguntas </a></div>
	</div>	
	<div class="contentText">
		<div class="row" id ="1"><h4>1.- Ingresar una pregunta</h4><hr/></div>
		<div class="row body-text">
			<ol>
				<li><p>Hacer clic en el botón "Nueva pregunta", se redireccionará a un formulario.</p></li>
				<p><?= $this->Html->image('help/1.1.jpg', ['alt' => 'Botón nueva pregunta']) ?></p>
				<li><p>Completar los campos. Para una pregunta el único campo que no es requerido es la imagen.</p></li>
				<ol>
					<li><p>Debe seleccionar al menos una clase (si la pregunta es para clase B o para clase C o ambas).</p></li>
					<li><p>Seleccionar la categoría a la cual pertenece la pregunta.</p></li>
					<li><p>Ingresar la pregunta.</p></li>
					<li><p>Ingresar las tres alternativas de la pregunta.</p></li>
					<li><p>Seleccionar la alternativa correcta.</p></li>
					<li><p>Si la pregunta requiere de una imagen, hacer clic sobre el botón "Seleccionar archivo" y adjuntar una imagen en formato jpg. Esta imagen no debe superar los 1000 pixeles de ancho y los 600 pixeles de alto.</p></li>
				</ol>
				<p><?= $this->Html->image('help/1.2.jpg', ['alt' => 'Formulario con datos', 'width'=> '600px']) ?></p>
				<li><p>En caso que se detecte un error o falte un campo, se le informará del error específico para que sea solucionado.</p></li>
				<p><?= $this->Html->image('help/1.3.jpg', ['alt' => 'Formulario con datos', 'width'=> '600px']) ?></p>
				<li><p>Una vez guardada la pregunta se redireccionará al listado de preguntas y se informará que la pregunta ha sido guardada.</p></li>
				<p><?= $this->Html->image('help/1.4.jpg', ['alt' => 'Formulario con datos', 'width'=> '600px']) ?></p>
			</ol>
		</div>

		<div class="row" id ="2"><h4>2.- Imagen de una pregunta</h4><hr/></div>
		<div class="row body-text">
			<p> Las imágenes en los dispositivos móviles se ajustan y visualizan según la resolución de éste, es por eso que antes de subir una imagen debe tener en cuenta las siguientes consideraciones:</p>
			<ol>
				<li><p>Para una buena visualización en el dispositivo es necesario que la imagen sea de un tamaño cercano a los 1000 pixeles de ancho y 600 pixeles de alto. El sistema se encargara de redimensionar la imagen según las distintas densidades de los dispositivos móviles.</p></li>
				<li><p>La imagen no puede superar los 1000 pixeles de ancho ni los 600 pixeles de alto.</p></li>
				<li><p>El sistema acepta sólo imágenes con formato JPG.</p></li>
			</ol>			
		</div>

		<div class="row" id ="3"><h4>3.- Editar una pregunta</h4><hr/></div>
		<div class="row body-text">			
			<ol>
				<li><p>Identificar la pregunta que desea modificar. Si no se encuentra a simple vista puede utilizar el buscador.</p></li>
				<p><?= $this->Html->image('help/3.1.jpg', ['alt' => 'Búqueda de pregunta', 'width'=> '600px']) ?></p>
				<li><p>Hacer clic en el ícono con forma de lápiz, se redireccionará a un formulario con los datos de la pregunta seleccionada.</p></li>
				<p><?= $this->Html->image('help/3.2.jpg', ['alt' => 'Formulario editar', 'width'=> '600px']) ?></p>
				<li><p>Editar los campos deseados, teniendo en consideración que el único campo que no es obligatorio es el de la imagen.</p></li>
				<p><?= $this->Html->image('help/3.3.jpg', ['alt' => 'Formulario editar', 'width'=> '600px']) ?></p>
				<li><p>hacer clic en el botón Guardar.</p></li>
				<li><p>Se redireccionará a la página principal indicando que los campos han sido modificados exitosamente.</p></li>
				<p><?= $this->Html->image('help/3.4.jpg', ['alt' => 'Edición de pregunta', 'width'=> '600px']) ?></p>
			</ol>			
		</div>
		

		<div class="row" id ="4"><h4>4.- Eliminar una pregunta</h4><hr/></div>		
		<div class="row body-text">			
			<ol>
				<li><p>Identificar la pregunta que desea Eliminar. Si no se encuentra a simple vista puede utilizar el buscador.</p></li>
				<p><?= $this->Html->image('help/4.1.jpg', ['alt' => 'Búqueda de pregunta', 'width'=> '600px']) ?></p>
				<li><p>Hacer clic en el ícono de basura, aparecerá un mensaje de advertencia preguntándole nuevamente si está seguro.</p></li>
				<p><?= $this->Html->image('help/4.2.jpg', ['alt' => 'Mensaje de advertencia']) ?></p>
				<li><p>Si desea visualizar la pregunta que desea eliminar, hacer clic sobre el ícono en forma de ojo.</p></li>
				<p><?= $this->Html->image('help/4.4.jpg', ['alt' => 'Ver pregunta', 'width'=> '600px']) ?></p>
				<p><?= $this->Html->image('help/4.5.jpg', ['alt' => 'ver pregunta', 'width'=> '600px']) ?></p>
				<ol>
					<li><p>Si la pregunta seleccionada es la que desea eliminar, hacer clic en el ícono con forma de basura.</p></li>
					<li><p>Se mostrará un mensaje indicando si está seguro que desea eliminar esa pregunta.</p></li>					
				</ol>
				<li><p>Hacer clic en Aceptar.</p></li>
				advertencia preguntándole nuevamente si está seguro.</p></li>
				<p><?= $this->Html->image('help/4.3.jpg', ['alt' => 'Mensaje de advertencia', 'width'=> '600px']) ?></p>
				<li><p>Se redireccionará a la página principal indicando que ha sido eliminada con éxito.</p></li>
			</ol>			
		</div>


		<div class="row" id ="5"><h4>5.- Búsqueda de preguntas</h4><hr/></div>
		<div class="row body-text">			
			<p>Puede realizar la búsqueda mediante la paginación haciendo clic en el botón ">". En caso que la pregunta no sea fácilmente ubicable, puede ingresar una palabra clave que contenga la pregunta y luego presionar en el botón "Buscar". Luego que ha ubicado la pregunta, hacer clic en los íconos que se encuentran en la columna "Acciones" dependiendo la finalidad.</p>	
			<p>La Simbología de los íconos es la siguiente:</p>		
			<ul>
				<li><p>Ícono en forma de <strong>ojo</strong>: visualizar la pregunta</p></li>
				<p><?= $this->Html->image('help/5.1.jpg', ['alt' => 'ícono ojo']) ?></p>
				<li><p>Ícono en forma de <strong>lápiz</strong>: editar la pregunta</p></li>
				<p><?= $this->Html->image('help/5.2.jpg', ['alt' => 'ícono lápiz']) ?></p>
				<li><p>Ícono en forma de <strong>tarro de basura</strong>: eliminar la pregunta</p></li>
				<p><?= $this->Html->image('help/5.3.jpg', ['alt' => 'ícono basura']) ?></p>
			</ul>
		</div>
	</div>	
</div>
<script type="text/javascript">
	$(document).ready(function() {
    	$("#btn-questions").attr('class', '');
    	$("#btn-quantity").attr('class', '');
    	$("#btn-help").attr('class', 'active');
	});
</script>