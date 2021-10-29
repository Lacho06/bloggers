{{-- DELETE MODAL --}}
<div id="deleteModal" class="modal fade" >
    <div class="modal-dialog" >
        <div class="modal-content" >
            <div class="modal-header" >
                <h4 class="modal-title" >Eliminar?</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body" >
                <form action="ruta" method="POST">
                    @csrf @method('delete')                    
                    <input type="submit" value="Eliminar" class="btn btn-danger" id="postDelete $post->id}}">
                </form>
            </div>
        </div>
    </div>
</div>