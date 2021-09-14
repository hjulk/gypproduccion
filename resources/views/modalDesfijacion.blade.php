<div class="modal fade bd-example-modal-xl" id="modal-desfijacion" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title modal-title-primary">CONSTANCIA DESFIJACIÓN
                <br>NOTIFICACIÓN POR AVISO</h4>
            </div>
            <div class="modal-body">
                @if($Desfijacion)
                    @foreach($Desfijacion as $value)
                        <p>
                            {!! $value['CONTENIDO'] !!}
                        </p>
                    @endforeach
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary pull-left" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
