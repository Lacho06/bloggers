<template>
	<section class="w-100" >

		<div class="container bg-light rounded-lg" >
			<div class="row">

				<div class="col-12 p-2" >
					<div class="container-fluid">
						<div class="row justify-content-around">

							<!-- form Titulo -->
							<form action="" class="col-11 d-flex"  >
								<input type="text" v-on:keyup="typingTit" placeholder="titulo" class="form-control my-2 p-1 tituloInput" >
								<button type="submit" class="btn btn-sm btn-success my-1 ml-2 text-nowrap" id="submitTitle" >Add Title</button>
							</form>
		
							<!-- form Estracto -->
							<form action="" class="col-11 col-sm-5 col-lg-3 d-flex flex-column center">
								<textarea name="" id="" rows="8" v-on:keyup="typingEst" class="form-control my-2 estractoInput" >Estracto</textarea>
								<button type="submit" class="btn btn-sm btn-success mt-1 mb-3 mb-lg-1  text-nowrap" id="submitEst" >Add Estracto</button>
							</form>
			
							<!-- form Descripcion -->
							<form action="" class="col-11 col-sm-5 col-lg-3 d-flex flex-column center" >
								<textarea name="" id="" rows="8" v-on:keyup="typingDesc" class="form-control my-2 descripcionInput" >Descripcion</textarea>						
								<button type="submit" class="btn btn-sm btn-success mt-1 mb-3 mb-lg-1  text-nowrap" id="submitDesc" >Add Description</button>
							</form>
		
							<!-- form Imagen -->
							<form action="" class="col-11 col-sm-5 col-lg-3 center flex-column">
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
		<section class="container-fluid mt-5">
			<div class="row">

				<div class="col-10 " >
					<h4 class="ml-5 pl-5" >Vista Previa</h4>
				</div>

				<!-- {{-- Vista Previa --}} -->
				<div class="col-12 col-md-7 col-lg-9 mb-5">
					<div class="container">
						<div class="row d-flex flex-column align-items-center justify-content-center mt-5">

							<div class="col-10 center" id="mostrarImagenVistaPrevia" ></div>

							<div class="col-10 mh mt-4" >   
								<div class="container-fluid">
									<div class="row mh py-2">

										<div class="col-12 col-lg-3 order-last order-lg-first rounded shadow">
											<div class="container-fluid">
												<div class="row center ">
													<div class="col-12 d-flex flex-column align-items-center ">
														<div class="border rounded-circle my-2" style="width:55px; height:55px;" >
															<!-- aqui va la imagen del autor o usuario q esta creando el post -->
															<!-- {{-- @foreach ($imgsAutor as $imgAutor)
																@if ($imgAutor->imageable_id == $post->user_id)
																	<img src="{{$imgAutor->getImageUrl}}" alt="Imagen del autor" class='w-100 h-100 rounded-circle' >
																@endif
															@endforeach --}} -->
														</div>
														<div class="d-flex flex-column align-items-center justify-content-center" >
															<span class="text-muted" style="font-size:80%;" >Autor</span>
															<span style="font-size:130%; font-weight:bold;" ><!--{{$post->user->name}}-->John Dae</span>
															<span class="text-muted" style="font-size:80%;" ><!--{{$post->created_at->diffForHumans()}}-->2 days ago</span>
														</div>
													</div>
												</div>
											</div>	
										</div>

										<div class="col-9 p-4">
											<h2 class="mostrarTitulo" ></h2>
											<p><small class="text-muted mostrarEstracto" ></small></p>
											<p class="mostrarDescripcion" ></p>
										</div>
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>

			</div>
		</section>

		<!-- buttons submit -->
		<div class="container mt-3" >
			<div class="row">
				<div class="col-12 d-flex ">
					<button type="button" class="btn btn-lg btn-dark w-100" onclick="document.getElementById('submitTitle').click(); document.getElementById('submitEst').click(); document.getElementById('submitDesc').click(); document.getElementById('submitImg').click();" >PUBLICAR</button>
				</div>
			</div>
		</div>

	</section>
</template>

<script>
	
	export default {

		methods:{
			typingTit(e){
				console.log(e.target.value);
				const mostrarTitulo = document.querySelector('.mostrarTitulo');
				mostrarTitulo.innerHTML = e.target.value;
			},
			typingEst(e){
				console.log(e.target.value);
				const mostrarEstracto = document.querySelector('.mostrarEstracto');
				mostrarEstracto.innerHTML = e.target.value;
			},
			typingDesc(e){
				console.log(e.target.value);
				const mostrarDescripcion = document.querySelector('.mostrarDescripcion');
				mostrarDescripcion.innerHTML = e.target.value;
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
						cajadatosVistaPrevia.innerHTML = '<img src="'+ev.target.result+'"  class="rounded-lg " style="max-width:100%;" />';
					};                    
                } 			
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