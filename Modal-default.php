<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
                <div class="modal__container">
                    <div class="modal__created">
                        <header class="modal__header">
                            <h2 class="modal__title"> Agregar Datos De Mascota</h2>
                            <div class="modal__close">✕</div>
                        </header>
                        <section class="modal__content">
                            <form method="post" class="modal__form">
                                <div class="form__item">
                                    <label for="tipoMascota">Tipo Mascota</label>
                                    <select class="modalInput Scroll__container" id="tipoMascota" name="tipoMascota" >
                                        <option value=""></option>
                                        <option value="1">Gato</option>
                                        <option value="2">Perro</option>
                                    </select>                                        
                                </div>
                                <div class="form__item">
                                    <label for="raza">Razas Mascotas</label>
                                    <select class="modalInput Scroll__container" id="raza" name="raza"  disabled>
                                        <option  value=""></option>
                                        <?php foreach ($PetsRaza as $Raza) {?> 
                                            <option id="optionRaza" label="<?php echo$Raza['nombre']?>" value="<?php echo$Raza['id']?>"><?php echo$Raza['TipoMascota_id']?></option>
                                        <?php }?> 
                                    </select>  
                                </div>
                                <div class="form__item">
                                    <label for="nombre">Nombre Mascota</label>
                                    <input class="modalInput" id="nombre" type="text" name="nombre" >
                                </div>
                                <div class="form__item">
                                    <label for="fechaNacimiento">Fecha Nacimiento</label>
                                    <input class="modalInput" id="fechaNacimiento" type="date" name="fechaNacimiento">
                                </div>
                                <div class="form__item__btn">
                                    <input class="modalSubmit" type="submit" name="btn_created_mascota" value="ENVIAR" disabled>                                    
                                </div>
                            </form>
                        </section>
                        <footer class="modal__footer">
                        </footer>
                    </div>
                </div>
</body>
</html>