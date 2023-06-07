<footer class="site-footer">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <h2 class="footer-heading mb-4" id="titulofooter" tabindex="0">Grúas y Parqueaderos Bogotá S.A.S</h2>
                <ul class="list-unstyled">
                    <li><a href="https://goo.gl/maps/X192voPg1tqL1Nny6" target="_blank"><span class="icon icon-map-marker"></span>&nbsp;Calle 55 # 73 - 19, Bogotá, Colombia</a></li>
                    <li><a href="tel:+5719279254"><span class="icon icon-phone"></span>&nbsp;+57(1) 9279254</a> - <a href="tel:+5719279254">3124985077</a></li>
                    <li><a href="mailto:denuncias@gypbogota.com"><span class="icon icon-envelope"></span>&nbsp;denuncias@gypbogota.com</a></li>
                </ul>
            </div>
            <div class="col-md-3">
                <h2 class="footer-heading mb-4" tabindex="0"><b>INFORMACIÓN</b></h2>
                <ul class="list-unstyled">
                    <li><a href="../nosotros">Nosotros</a></li>
                    <li><a href="nuestrosServicios">Servicios</a></li>
                    <li><a href="tarifas">Tarifas</a></li>
                    <li><a href="../normatividad">Normatividad</a></li>
                    <li><a href="../puntosAtencion">Puntos de Atención</a></li>
                    <li><a href="../contacto">Contáctenos</a></li>
                    @if($PoliticaHSEQ)
                        {!! $PoliticaHSEQ !!}
                    @endif
                    <li><a href="../mapaSitio">Mapa del Sitio</a></li>
                </ul>
            </div>
            <div class="col-md-4" id="titulo1footer">
                <picture tabindex="0">
                    <source srcset="{{asset("images/logo_footer.webp")}}" type="image/webp"/>
                    <source srcset="{{asset("images/logo_footer.png")}}" type="image/png"/>
                    <img src="{{asset("images/logo_footer.webp")}}" id="footerImg" alt="Imagen Footer"/>
                </picture>
                <br><br>
                <h2 class="footer-heading mb-4" tabindex="0">Contrato de Concesión No. 2018-114</h2>
            </div>
        </div>
        <div class="row pt-5 mt-3 text-center" id="copyright">
            <div class="col-md-12">
                <div class="border-top pt-3" tabindex="0">
                    <p class="copyright">© Todos los derechos reservados 2021 | Grúas y Parqueaderos Bogotá S.A.S</p>
                </div>
            </div>
        </div>
    </div>
</footer>
