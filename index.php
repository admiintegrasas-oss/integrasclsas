<?php
include("app/config.php");
include("layout/sesion.php");
include("layout/parte1.php");
include("app/controllers/usuarios/listado_de_usuarios.php");
include("app/controllers/categorias/listado_de_categoria.php"); 
include("app/controllers/almacen/listado_de_productos.php");
include("app/controllers/proveedores/listado_de_proveedores.php");
include("app/controllers/factura/listado_de_facturas.php");
include("app/controllers/ventas/listado_de_ventas.php");
include("app/controllers/egresos/listado_de_egresos.php");
include("app/controllers/ingresos/listado_de_ingresos.php");
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">BIENVENIDO <?php echo $nombres_sesion; ?></h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
          CONTENIDO PRINCIPAL
          <br><br>
          <div class="row">
            <div class="col-lg-3 col-6"><!-- USUARIOS -->
              <div class=" small-box bg-warning">
                <div class="inner">
                  <?php
                  $contador_usuarios=0;
                  foreach($usuarios_datos as $usuarios_datos) {
                    $contador_usuarios++ ;
                  }
                  ?>
                  <h3><?php echo$contador_usuarios; ?></h3>
                  <p>Usuarios Registrados</p>
                </div>
                <a href="<?php echo $URL;?>/usuarios/create.php">
                  <div class="icon">
                    <i class="fas fa-user-plus"></i>
                  </div>
                </a>  
                <a href="<?php echo $URL;?>/usuarios" class="small-box-footer">
                  Mas Informacion <i class="fas fa-arrow-circle-right"></i>
                </a>
              </div>
            </div><!-- FIN USUARIOS -->
            <div class="col-lg-3 col-6"><!-- CATEGORIAS -->
              <div class=" small-box bg-success"> 
                <div class="inner">
                  <?php
                  $contador_categoria=0;
                  foreach($categorias_datos as $categorias_datos) {
                    $contador_categoria++ ;
                  }
                  ?>
                  <h3><?php echo$contador_categoria; ?></h3>
                  <p>Categorias Registradas</p>
                </div>
                <a href="<?php echo $URL;?>/categoria/index.php">
                  <div class="icon">
                    <i class="fas fa-list"></i>
                  </div>
                </a>  
                <a href="<?php echo $URL;?>/categoria/index.php" class="small-box-footer">
                  Mas Informacion <i class="fas fa-arrow-circle-right"></i>
                </a>
              </div>
            </div><!-- FIN CATEGORIAS -->
              <div class="col-lg-3 col-6"><!-- PRODUCTOS -->
                <div class=" small-box bg-danger"> 
                  <div class="inner">
                    <?php
                    $contador_productos=0;
                    foreach($productos_datos as $productos_datos) {
                      $contador_productos++ ;
                    }
                    ?>
                    <h3><?php echo$contador_productos; ?></h3>
                    <p>Productos Registrados</p>
                  </div>
                  <a href="<?php echo $URL;?>/almacen/index.php">
                    <div class="icon">
                      <i class="fas fa-paint-roller"></i>
                    </div>
                  </a>  
                  <a href="<?php echo $URL;?>/almacen/index.php" class="small-box-footer">
                    Mas Informacion <i class="fas fa-arrow-circle-right"></i>
                  </a>
                </div>
              </div><!-- FIN PRODUCTOS -->
              <div class="col-lg-3 col-6"><!-- PROVEEDORES -->
                <div class=" small-box bg-info"> 
                  <div class="inner">
                    <?php
                    $contador_proveedores=0;
                    foreach($proveedores_datos as $proveedores_datos) {
                      $contador_proveedores++ ;
                    }
                    ?>
                    <h3><?php echo$contador_proveedores; ?></h3>
                    <p>Proveedores Registrados</p>
                  </div>
                  <a href="<?php echo $URL;?>/proveedores/index.php">
                    <div class="icon">
                      <i class="fas fa-truck"></i>
                    </div>
                  </a>  
                  <a href="<?php echo $URL;?>/proveedores/index.php" class="small-box-footer">
                    Mas Informacion <i class="fas fa-arrow-circle-right"></i>
                  </a>
                </div>
              </div><!-- FIN PROVEEDORES -->       
              <?php
              $nivel_usuario = $_SESSION['sesion_nivel_usuario'];
              if($nivel_usuario == "Administrador") {
                ?>
                <div class="col-lg-3 col-6"><!-- COMPRAS -->
                  <div class=" small-box bg-primary"> 
                    <div class="inner">
                      <?php
                      $contador_facturas=0;
                      foreach($facturas_datos as $facturas_datos) {
                        $contador_facturas++ ;
                      }
                      ?>
                      <h3><?php echo$contador_facturas; ?></h3>
                      <p>Compras Registradas</p>
                    </div>
                    <a href="<?php echo $URL;?>/compras/create.php">
                      <div class="icon">
                        <i class="fas fa-briefcase"></i>
                      </div>
                    </a>  
                    <a href="<?php echo $URL;?>/compras/index.php" class="small-box-footer">
                      Mas Informacion <i class="fas fa-arrow-circle-right"></i>
                    </a>
                  </div>
                </div><!-- FIN COMPRAS -->
                <div class="col-lg-3 col-6"><!-- EGRESOS -->
                <div class=" small-box bg-dark-warning"> 
                  <div class="inner">
                    <?php
                    $contador_egresos=0;
                    foreach($egresos_datos as $egresos_datos) {
                      $contador_egresos++ ;
                    }
                    ?>
                    <h3><?php echo$contador_egresos; ?></h3>
                    <p>Egresos Registrados</p>
                  </div>
                  <a href="<?php echo $URL;?>/egresos/create.php">
                    <div class="icon">
                      <i class="fas fa-arrow-up"></i>
                    </div>
                  </a>  
                  <a href="<?php echo $URL;?>/egresos/index.php" class="small-box-footer">
                    Mas Informacion <i class="fas fa-arrow-circle-right"></i>
                  </a>
               </div>
              </div><!-- FIN EGRESOS -->
              <div class="col-lg-3 col-6"><!-- INGRESOS -->
                <div class=" small-box bg-light"> 
                  <div class="inner">
                    <?php
                    $contador_ingresos=0;
                    foreach($ingresos_datos as $ingresos_datos) {
                      $contador_ingresos++ ;
                    }
                    ?>
                    <h3><?php echo$contador_ingresos; ?></h3>
                    <p>Ingresos Registrados</p>
                  </div>
                  <a href="<?php echo $URL;?>/ingresos/create.php">
                    <div class="icon">
                      <i class="fas fa-arrow-down"></i>
                    </div>
                  </a>  
                  <a href="<?php echo $URL;?>/ingresos/index.php" class="small-box-footer">
                    Mas Informacion <i class="fas fa-arrow-circle-right"></i>
                  </a>
               </div>
              </div><!-- FIN INGRESOS -->
              <div class="col-lg-3 col-6"><!-- REPORTE DE VENTAS,INGRESOS Y SALIDAS -->
                <div class=" small-box bg-info"> 
                  <div class="inner">
                    <h3>Libro Diario</h3>
                    <p>Reporte de Ventas, Ingresos y Salidas</p>
                  </div>
                  <a href="<?php echo $URL;?>/libros/index.php">
                    <div class="icon">
                      <i class="fas fa-money-bill"></i>
                    </div>
                  </a>  
                  <a href="<?php echo $URL;?>/libros/index.php" class="small-box-footer">
                    Mas Informacion <i class="fas fa-arrow-circle-right"></i>
                  </a>
               </div>
              </div><!-- FIN LIBROS -->
                <?php
              }?>
              <div class="col-lg-3 col-6"><!-- VENTAS -->
                <div class=" small-box bg-secondary"> 
                  <div class="inner">
                    <?php
                    $contador_ventas=0;
                    foreach($ventas_lista_datos as $ventas_lista_datos) {
                      $contador_ventas++ ;
                    }
                    ?>
                    <h3><?php echo$contador_ventas; ?></h3>
                    <p>Ventas Registradas</p>
                  </div>
                  <a href="<?php echo $URL;?>/ventas/create.php">
                    <div class="icon">
                      <i class="fas fa-cart-plus"></i>
                    </div>
                  </a>  
                  <a href="<?php echo $URL;?>/ventas/index.php" class="small-box-footer">
                    Mas Informacion <i class="fas fa-arrow-circle-right"></i>
                  </a>
               </div>
              </div><!-- FIN VENTAS -->
            </div><!-- /.container-fluid -->
        </div>
      </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->
<?php include("layout/mensajes.php");?>
<?php include("layout/parte2.php"); ?>

 
