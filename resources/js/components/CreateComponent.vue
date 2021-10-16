<template>
	<section class="w-100" >

		<div class="container bg-light rounded-lg" >
			<div class="row">

				<div class="col-12 p-2" >
					<div class="container-fluid">
						<div class="row justify-content-around">

							<!-- form Titulo -->
							<form class="col-11 d-flex" :action="route1" >
								<input type="text" name="titulo" v-on:keyup="typingTit" placeholder="titulo" class="form-control my-2 p-1 tituloInput" >
								<button type="submit" class="btn btn-sm btn-success my-1 ml-2 text-nowrap" id="submitTitle" >Add Title</button>
							</form>
		
							<!-- form Estracto -->
							<form :action="route2" class="col-11 col-sm-5 col-lg-3 d-flex flex-column center">
								<textarea name="estracto" id="" rows="8" v-on:keyup="typingEst" class="form-control my-2 estractoInput" >Estracto</textarea>
								<button type="submit" class="btn btn-sm btn-success mt-1 mb-3 mb-lg-1  text-nowrap" id="submitEst" >Add Estracto</button>
							</form>
			
							<!-- form Descripcion -->
							<form :action="route3" class="col-11 col-sm-5 col-lg-3 d-flex flex-column center" >
								<textarea name="descripcion" id="" rows="8" v-on:keyup="typingDesc" class="form-control my-2 descripcionInput" >Descripcion</textarea>						
								<button type="submit" class="btn btn-sm btn-success mt-1 mb-3 mb-lg-1  text-nowrap" id="submitDesc" >Add Description</button>
							</form>
		
							<!-- form Imagen -->
							<form :action="route4" class="col-11 col-sm-5 col-lg-3 center flex-column">
								<!-- img -->
								<div class="center flex-column m-2" >
									<div id="mostrarImagen" style="width: 180px; height:180px;" class="rounded" >
										<!-- -------- AQUI PUEDE QUE HALLA UNA VULNERABILIDAD DEBIDO A Q ENLAZO LA FOTO CON SU RUTA TAL CUAL Y NO CON UN METODO ASSET DEBIDO A Q ESTOY EN UN COMPONENTE DE VUE --------------- -->
										<img src="../../../public/img/img-perfil-default.png" alt="" width="180" height="180" class="border rounded" id="imgPost" >
									</div>
									<input type="file" name="file" id="multimediaCreate" @change="addPic" class="border-0" style="display: none; outline:0;" >
									<button type="button" onclick="document.getElementById('multimediaCreate').click();" class="btn btn-dark mt-3">Browse...</button>
								</div>					
								<!-- fin img -->
								<button type="submit" class="btn  btn-success" id="submitImg" >Add Pic</button>
							</form>

						</div>
					</div>
				</div>

			</div>
		</div>

		<!-- VISTA PREVIA -->
		<section class="container-fluid mt-5" id="vista_previa" @click="vistaPrevia();" >
			<div class="row">

				<div class="col-10 " >
					<h4 class="ml-5 pl-5" >Vista Previa</h4>
				</div>

				<!-- {{-- Vista Previa --}} -->
				<div class="col-12 col-md-7 col-lg-9 mb-5">
					<div class="container">
						<div class="row d-flex flex-column align-items-center justify-content-center mt-5">

							<div class="col-10 " id="mostrarImagenVistaPrevia" ></div>

							<div class="col-10 mh mt-4" >   
								<div class="container-fluid">
									<div class="row mh py-2">

										<div class="col-9 p-4">
											<h2 class="mostrarTitulo" ></h2>
											<p><small class="text-muted mostrarEstracto" ></small></p>
											<p class="mostrarDescripcion" ></p>
										</div>

										<div class="col-12">
											<div class="container-fluid">
												<div class="row center ">
													<div class="col-12 d-flex  ">
														<div class="border rounded-circle my-2" style="width:55px; height:55px;" >
															<!-- aqui va la imagen del autor o usuario q esta creando el post -->
															<!-- {{-- @foreach ($imgsAutor as $imgAutor)
																@if ($imgAutor->imageable_id == $post->user_id)
																	<img src="{{$imgAutor->getImageUrl}}" alt="Imagen del autor" class='w-100 h-100 rounded-circle' >
																@endif
															@endforeach --}} -->
														</div>
														<div class="d-flex flex-column align-items-start justify-content-center ml-2" >
															<span class="text-muted" style="font-size:80%;" >Autor</span>
															<span style="font-size:130%; font-weight:bold;" ><!--{{$post->user->name}}-->John Dae</span>
														</div>
													</div>
												</div>
											</div>	
										</div>

									</div>
								</div>
							</div>

						</div>
					</div>
				</div>

				<!-- buttons submit -->
				<div class="col-12 center ">
					<div>
						<button type="button" class="btn btn-lg btn-dark w-100" onclick="document.getElementById('submitTitle').click(); document.getElementById('submitEst').click(); document.getElementById('submitDesc').click(); document.getElementById('submitImg').click(); alert('publicado');" >PUBLICAR</button>
					</div>
				</div>

			</div>
		</section>

		

	</section>
</template>

<script>

	window.addEventListener('load', () => {
		document.getElementById('vista_previa').style.display="none";
	});
	
	export default {

		methods:{
			typingTit(e){
				const mostrarTitulo = document.querySelector('.mostrarTitulo');
				mostrarTitulo.innerHTML = e.target.value;
				if(e.target.value){
					document.getElementById('vista_previa').style.display="block";
				};
			},
			typingEst(e){
				const mostrarEstracto = document.querySelector('.mostrarEstracto');
				mostrarEstracto.innerHTML = e.target.value;
				if(e.target.value){
					document.getElementById('vista_previa').style.display="block";
				};
			},
			typingDesc(e){
				const mostrarDescripcion = document.querySelector('.mostrarDescripcion');
				mostrarDescripcion.innerHTML = e.target.value;
				if(e.target.value){
					document.getElementById('vista_previa').style.display="block";
				};
			},
			addPic(e){
				var archivo=e.target.files[0];
				if(!archivo.type.match(/image.*/i)){
                    alert('seleccione una imagen');
                }else{
                    var lector=new FileReader();
					lector.readAsDataURL(archivo);
                    lector.onload= (ev) => {
						//mostrarImagenVistaPrevia
						var cajadatos = document.getElementById('mostrarImagen');
						var cajadatosVistaPrevia = document.getElementById('mostrarImagenVistaPrevia');
						cajadatos.innerHTML = '<img src="'+ev.target.result+'"  width="180" height="180" class="border rounded" id="imgPost" />';
						cajadatosVistaPrevia.innerHTML = '<img src="'+ev.target.result+'"  class="rounded-lg " style="max-height:300px;" />';
					};                    
                } 			
			}							
		},

		props:{
			route1:{
				type: String,
				default: 'rutaDefault.blade.php'
			},
			route2:{
				type: String,
				default: 'rutaDefault.blade.php'
			},
			route3:{
				type: String,
				default: 'rutaDefault.blade.php'
			},
			route4:{
				type: String,
				default: 'rutaDefault.blade.php'
			}
		}
		
	}

</script>

<style>

*{
	margin:0;
	padding:0;
}

body{
	overflow-x: hidden;
}

/* ====================== RESPONSIVE  ======================== */

@media (min-width :576px){        /*sm*/

}

@media (min-width :768px){        /*md*/

}

@media (min-width :991px){        /*lg*/

}

@media (min-width :1200px){        /*xl*/

}

</style>