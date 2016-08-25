<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li class="sidebar-search">
            <li>
                <a href="dashboard"><i class="fa fa-home fa-fw"></i> Inicio</a>
            </li>
            <li>
                <a href="controlHoras"><i class="fa fa-clock-o fa-fw"></i>Control Horario</a>
            </li>

             <li>
                <a href="#"><i class="fa fa-bullhorn fa-fw"></i>Comunicación<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="ComunicadosFiltro">Ver Comunicados</a>
                    </li>
                    <li>
                        <?php if($this->session->userdata('idRol') == 1){ ?><a href="agregarComunicado">Agregar Comunicados</a><?php } ?> 
                    </li>
                    <li>
                        <?php if($this->session->userdata('idRol') == 1){ ?><a href="Medio">Ver Medios</a><?php } ?> 
                    </li>
                    <li>
                        <?php if($this->session->userdata('idRol') == 1){ ?><a href="agregarMedio">Agregar Medio</a><?php } ?> 
                    </li>
                </ul>
            </li>
            <li>
                <a href="#a"><i class="fa fa-money fa-fw"></i>Promoción<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="filtrarPromociones">Ver Promoción</a>
                    </li>
                    <li>
                        <?php if($this->session->userdata('idRol') == 1){ ?><a href="agregarPromocion">Agregar Promoción</a><?php } ?> 
                    </li>
                    <li>
                        <?php if($this->session->userdata('idRol') == 1){ ?><a href="tipoPromo">Ver Categorías</a><?php } ?>
                        <?php if($this->session->userdata('idRol') == 2){ ?><a href="tipoPromo">Ver Categorías</a><?php } ?>  
                    </li>
                    <li>
                        <?php if($this->session->userdata('idRol') == 1){ ?><a href="agregarTipoPromo">Agregar Categoría</a><?php } ?> 
                    </li>
                    <li>
                        <?php if($this->session->userdata('idRol') == 1){ ?><a href="importarPromociones">Importar promociones</a><?php } ?> 
                    </li>
                </ul>
            </li>
             <li>
                <a href="#"><i class="fa fa-thumbs-o-up fa-fw"></i>Activaciones<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="ActivacionFiltro">Ver Activaciones</a>
                    </li>
                    <li>
                        <?php if($this->session->userdata('idRol') == 1){ ?><a href="agregarActivacion">Agregar Activaciones</a><?php } ?> 
                    </li>
                </ul>
            </li>
            <li>
                <a href="#a"><i class="fa fa-thumbs-up fa-fw"></i>Plan De Incentivos<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">                              
                    <li>
                        <?php if($this->session->userdata('idRol') == 1){ ?><a href="Incentivos">Ver Incentivos</a><?php } ?> 
                    </li>
                    <li>
                        <?php if($this->session->userdata('idRol') == 1){ ?><a href="Provedores">Ver Provedores</a><?php } ?> 
                    </li>
                    <li>
                        <?php if($this->session->userdata('idRol') == 1){ ?><a href="agregarProvedores">Agregar Provedor</a><?php } ?> 
                    </li> 
                </ul>
            </li>

            <li>
                <a href="#"><i class="fa fa-tags"></i> PDV<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="PDV">Ver PDV</a>
                    </li>
                    <li>
                        <?php if($this->session->userdata('idRol') == 1){ ?><a href="agregarPdv">Agregar PDV</a><?php } ?> 
                    </li>
                </ul>
            </li>

            <li>
                <a href="#"><i class="fa fa-briefcase"></i> Ventas<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="ventas">Ver ventas</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="#"><i class="fa fa-bell-o fa-fw"></i>Notificaciones<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="NotificacionFiltro">Ver Notificaciones</a>
                    </li>
                    <li>
                        <?php if($this->session->userdata('idRol') == 1){ ?><a href="agregarNotificacion">Agregar Notificaciones</a><?php } ?>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-image fa-fw"></i>Banners<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <?php if($this->session->userdata('idRol') == 1){ ?><a href="BannersFiltro">Ver Banners</a><?php } ?>
                        <?php if($this->session->userdata('idRol') == 2){ ?><a href="BannersFiltro">Ver Banners</a><?php } ?>  
                    </li>
                    <li>
                        <?php if($this->session->userdata('idRol') == 1){ ?><a href="agregarBanner">Agregar Banners</a><?php } ?> 
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-user fa-fw"></i>Usuarios<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <?php if($this->session->userdata('idRol') == 1){ ?><a href="usuarios">Ver Usuarios</a><?php } ?>
                        <?php if($this->session->userdata('idRol') == 2){ ?><a href="usuarios">Ver Usuarios</a><?php } ?>  
                    </li>
                    <li>
                        <?php if($this->session->userdata('idRol') == 1){ ?><a href="agregar_usuario">Agregar Usuarios</a><?php } ?> 
                    </li>
                    <li>
                        <?php if($this->session->userdata('idRol') == 1){ ?><a href="importarUsuarios">Importar Usuarios</a><?php } ?> 
                    </li>
                    <li>
                        <?php if($this->session->userdata('idRol') == 1){ ?><a href="reporteIngresos">Reporte de ingresos</a><?php } ?> 
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-image fa-fw"></i>Sección Contacto<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <?php if($this->session->userdata('idRol') == 1){ ?><a href="Contacto">Ver Sección Contacto</a><?php } ?>
                        <?php if($this->session->userdata('idRol') == 2){ ?><a href="Contacto">Ver Sección Contacto</a><?php } ?>  
                    </li>
                </ul>
            </li>
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->