<div class="container-fluid content">    
    <div class="row breadcrumbs">
        <ol class="breadcrumb">
            <li><?= $this->Html->link('Preguntas', ['action' => 'index']) ?></li>
            <li class="active">Nueva pregunta</li>
        </ol>
    </div>
    <div class="row">
        <div class="col-md-7">                                 
            <?= $this->Form->create(null, [
                'type' => 'post', 
                'enctype' => 'multipart/form-data',
                'url' => [
                'controller' => 'questions', 
                'action' => 'add'
                 ]])
            ?>
                <div class="checkbox">
                    <label>                        
                        <?= $this->Form->checkbox('classB', ['value' => '1']) ?>
                        Clase B
                    </label>
                </div>
                <div class="checkbox">
                    <label>                        
                        <?= $this->Form->checkbox('classC', ['value' => '1'])?>
                        Clase C
                    </label>
                </div>
                <div class="form-group">                
                    <?= $this->Form->input('category_id', ['options' => $categories, 'class'=>'form-control', 'label'=> false, 'empty'=> 'Seleccione una categoría', 'required'=> true])?>
                </div>
                <div class="form-group">
                    <?= $this->Form->textarea('question', ['label' => false, 'class'=>'form-control', 'rows'=>'4', 'placeholder'=> 'Pregunta', 'required'=> true]) ?>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <?= $this->Form->radio('correct', [['value' => '1', 'text'=> '', 'id'=> 'correct-1', 'required'=> true]]) ?>
                        </span>
                        <?= $this->Form->input('alternative-1',['label'=>false, 'class'=>'form-control', 'autocomplete'=>'off', 'required'=> true]) ?>
                    </div>            
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <?= $this->Form->radio('correct', [['value' => '2', 'text'=> '', 'id'=> 'correct-2']],['hiddenField'=>false]) ?>
                        </span>
                        <?= $this->Form->input('alternative-2',['label'=>false, 'class'=>'form-control', 'autocomplete'=>'off', 'required'=> true]) ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <?= $this->Form->radio('correct', [['value' => '3', 'text'=> '', 'id'=> 'correct-3']],['hiddenField'=>false]) ?>
                        </span>
                        <?= $this->Form->input('alternative-3',['label'=>false, 'class'=>'form-control', 'autocomplete'=>'off', 'required'=> true]) ?>
                    </div>
                </div>
                <div class="form-group">
                    <?= $this->Form->input("MAX_FILE_SIZE", ["type"=>"hidden", 'value'=> '500000' ]) ?>
                    <?= $this->Form->file('Imagen', ['name'=>'image', 'id' => 'image'])?>
                </div>
                <div class="row">
                    <div class="previewImage">
                        <?php
                        if($question->image == null){
                        ?>
                            <div class="contentNoImage">
                                <span class= "glyphicon glyphicon-picture"></span> Esta pregunta no posee una imagen
                            </div>
                        <?php
                        }else{
                        ?>
                            <div class="contentImage">
                                <?= $this->Html->image('hdpi/'.$question->image, ['alt' => 'Imagen de la pregunta']) ?>
                                <div class="contentBtnImage"><span class="glyphicon glyphicon-trash"></span></div>
                            </div>                        
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <div class="form-group save">
                    <?= $this->Form->button('Guardar', ['type'=> 'submit', 'class'=> 'btn btn-success']) ?>
                </div>
            <?= $this->Form->end(); ?> 
        </div>
        <div class="col-md-5">
            <div class="row">
                <div class="row class edit">
                    <div class="circle car">
                        <?= $this->Html->image('ic_car.png', ['alt' => 'clase B', 'width'=>'40px']) ?>
                    </div>
                    <div class="circle motorbike">
                        <?= $this->Html->image('ic_motorbike.png', ['alt' => 'clase C', 'width'=>'40px']) ?>
                    </div>                      
                </div>
            </div>
        </div>        
    </div>
</diV>
<script type="text/javascript">
    $( document ).ready(function() {   
        if($('#image').val() == ""){
            $('.previewImage').html('');
            $('.previewImage').append('<div class="contentNoImage"><span class= "glyphicon glyphicon-picture"></span> Esta pregunta no posee una imagen</div>');
            $('#stateImage').prop('checked', false);
        }        
        if($('input[type="checkbox"][name="classB"]').is(':checked')){
            $('.circle.car').show();
        }
        if($('input[type="checkbox"][name="classC"]').is(':checked')){
            $('.circle.motorbike').show();
        }

        $('input[type="checkbox"][name="classB"]').change(function() {
            if(this.checked) {
                $('.circle.car').show();
            }else{
                $('.circle.car').hide();
            }
        });
        $('input[type="checkbox"][name="classC"]').change(function() {
            if(this.checked) {
                $('.circle.motorbike').show();
            }else{
                $('.circle.motorbike').hide();
            }
        }); 
        $('#image').on('change',function(){
            var archives = document.getElementById('image').files;            
            var browser = window.URL;            
            var archive = archives[0];
            var size = archive.size;            
            var type = archive.type;
            var objectUrl = browser.createObjectURL(archive);

            if(type != 'image/jpeg' && type != 'image/jpg'){                
                $('#image').val("");            
            
            }else{                 
                $('.previewImage').html('');
                $('#stateImage').prop('checked', false);
                previewImage = '<div class="contentImage"><img src='+objectUrl+' alt = "Imagen de la pregunta"><div class="contentBtnImage"><span class="glyphicon glyphicon-trash"></span></div></div>';
                $('.previewImage').append(previewImage);                
                $('.contentBtnImage').click(function(){
                    $('#image').val("");
                    $('.previewImage').html('');
                    $('.previewImage').append('<div class="contentNoImage"><span class= "glyphicon glyphicon-picture"></span> Esta pregunta no posee una imagen</div>');
                    $('#stateImage').prop('checked', true);
                }); 
            }
            
        });   
    });    
</script>