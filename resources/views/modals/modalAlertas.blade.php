<div class="modal fade" id="modalExitoso" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content" id="modalInicio">
            <div class="container" id="imageModal">
                <br><br>
                <center>
                    <picture>
                        <source srcset="{{asset("images/check.webp")}}" type="image/webp"/>
                        <source srcset="{{asset("images/check.png")}}" type="image/png"/>
                        <img src="{{asset("images/check.webp")}}" id="imgAlerts">
                    </picture>
                </center>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <p id="exitoAlert"></p>
                    </div>
                </div>
                <br>
            </div>
            <div class="modal-footer" id="modalFooter">
                <button type="button" class="btn btn-success" data-dismiss="modal">Cerrar</a>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalError" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" id="modalInicio">
            <div class="container" id="imageModal">
                <br><br>
                <center>
                    <picture>
                        <source srcset="{{asset("images/uncheck.webp")}}" type="image/webp"/>
                        <source srcset="{{asset("images/uncheck.png")}}" type="image/png"/>
                        <img src="{{asset("images/uncheck.webp")}}" id="imgAlerts">
                    </picture>
                </center>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <p id="errorAlert"></p>
                    </div>
                </div>
                <br>
            </div>
            <div class="modal-footer" id="modalFooter">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
