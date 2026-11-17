<?php
include("../app/config.php");
include("../layout/sesion.php");
include("../layout/parte1.php");
include("../app/controllers/almacen/listado_de_productos.php");
$nivel_usuario = $_SESSION['sesion_nivel_usuario'];
if($nivel_usuario == "Administrador" ){
?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">LISTADO DE PRODUCTOS</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card card-outline card-primary">
                <div class="card-header">
                  <h3 class="card-title">Productos registrados</h3>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body" style="display: block;">
                  <table id="tabla_usuarios" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th><center>Numero</center></th>
                    <th><center>Codigo</center></th>
                    <th><center>Categoria</center></th>
                    <th><center>Nombre</center></th>
                    <th><center>Stock</center></th>
                    <th><center>Precio Compra</center></th>
                    <th><center>Precio Venta</center></th>
                    <th><center>Usuario</center></th>
                    <th><center>Acciones</center></th>
                  </tr>
                  </thead>
                  <tbody>
                      <?php
                      $contador = 1;
                      foreach ($productos_datos as $producto_dato) {?>
                        <tr>
                            <td><center><?php echo $contador++; ?></center></td>
                            <td><center><?php echo $producto_dato['codigo']; ?></center></td>
                            <td><center><?php echo $producto_dato['categoria']; ?></center></td>
                            <td><center><?php echo $producto_dato['nombre']; ?></center></td>
                            <td><center>
                              <?php 
                                if ($producto_dato['stock'] <= 0) {
                                  echo "<span class='badge badge-danger'>".$producto_dato['stock']."</span>";
                                } else {
                                  if ($producto_dato['stock'] < $producto_dato['stock_minimo']) {
                                    echo "<span class='badge badge-warning'>".$producto_dato['stock']."</span>";
                                  } else {
                                    if ($producto_dato['stock'] > $producto_dato['stock_maximo']) {
                                      echo "<span class='badge badge-info'>".$producto_dato['stock']."</span>";
                                    }
                                    else {
                                      echo "<span class='badge badge-success'>".$producto_dato['stock']."</span>";
                                    }
                                  }
                                }
                              ?>
                            </center></td>
                            <td><center>$ <?php echo number_format($producto_dato['precio_compra'], 0, ',', '.'); ?></center></td>
                            <td><center>$ <?php echo number_format($producto_dato['precio_venta'], 0, ',', '.'); ?></center></td>
                            <td><center><?php echo $producto_dato['email']; ?></center></td>
                            <td><center>
                              <div class="btn-group">
                                  <?php
                                  $nivel_usuario = $_SESSION['sesion_nivel_usuario'];
                                  if($nivel_usuario == "Administrador" ){?>
                                    <a href="<?php echo $URL; ?>/factura/index.php?id_producto=<?php echo $producto_dato['id_producto']; ?>" class="btn btn-info"><i class="fa fa-plus"></i>  AGREGAR</a>
                                    <?php
                                  }
                                  ?>
                                <a href="<?php echo $URL; ?>/almacen/update.php?id_producto=<?php echo $producto_dato['id_producto']; ?>" class="btn btn-success"><i class="fa fa-pencil-alt"></i>  MODIFICAR</a>
                                <a href="<?php echo $URL; ?>/almacen/delete.php?id_producto=<?php echo $producto_dato['id_producto']; ?>" class="btn btn-danger"><i class="fa fa-trash"></i>  ELIMINAR</a>
                              </div>
                        </tr>
                        <?php
                      }
                      ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th><center>Numero</center></th>
                    <th><center>Codigo</center></th>
                    <th><center>Categoria</center></th>
                    <th><center>Nombre</center></th>
                    <th><center>Stock</center></th>
                    <th><center>Precio Compra</center></th>
                    <th><center>Precio Venta</center></th>
                    <th><center>Usuario</center></th>
                    <th><center>Acciones</center></th>
                  </tr>
                  </tfoot>
                </table>               
                </div>
              </div>
            </div>
          </div>
    </div>
  </div>

<?php 
include("../layout/mensajes.php");
include("../layout/parte2.php"); ?>
<script>
  $(function () {
    $("#tabla_usuarios").DataTable({
      "pageLength": 25,
      "language": {
        "emptyTable": "No hay datos disponibles en la tabla",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ Productos",
        "infoEmpty": "Mostrando 0 a 0 de 0 Productos",
        "infoFiltered": "(filtrado de _MAX_ Productos totales)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrar _MENU_ Productos",
        "loadingRecords": "Cargando...",
        "search": "Buscar:",
        "zeroRecords": "No se encontraron resultados",
          "paginate": {
              "first": "Primero",
              "last": "Último",
              "next": "Siguiente",
              "previous": "Anterior"
            },
            "buttons": {
              "copy": "Copiar",
              "csv": "CSV",
              "excel": "Excel",
              "pdf": "PDF",
              "print": "Imprimir",
              "colvis": "Visibilidad de columnas"
            } 
      },
      "responsive": true, "lengthChange": true, "autoWidth": false,
      "buttons": [ "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#tabla_usuarios_wrapper .col-md-6:eq(0)');
  });
</script>
<?php
}
else{
?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">LISTADO DE PRODUCTOS</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card card-outline card-primary">
                <div class="card-header">
                  <h3 class="card-title">Productos registrados</h3>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body" style="display: block;">
                  <table id="tabla_usuarios" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th><center>Numero</center></th>
                    <th><center>Codigo</center></th>
                    <th><center>Categoria</center></th>
                    <th><center>Nombre</center></th>
                    <th><center>Stock</center></th>
                    <th><center>Precio Venta</center></th>
                  </tr>
                  </thead>
                  <tbody>
                      <?php
                      $contador = 1;
                      foreach ($productos_datos as $producto_dato) {?>
                        <tr>
                            <td><center><?php echo $contador++; ?></center></td>
                            <td><center><?php echo $producto_dato['codigo']; ?></center></td>
                            <td><center><?php echo $producto_dato['categoria']; ?></center></td>
                            <td><center><?php echo $producto_dato['nombre']; ?></center></td>
                            <td><center>
                              <?php 
                                if ($producto_dato['stock'] <= 0) {
                                  echo "<span class='badge badge-danger'>".$producto_dato['stock']."</span>";
                                } else {
                                  if ($producto_dato['stock'] < $producto_dato['stock_minimo']) {
                                    echo "<span class='badge badge-warning'>".$producto_dato['stock']."</span>";
                                  } else {
                                    if ($producto_dato['stock'] > $producto_dato['stock_maximo']) {
                                      echo "<span class='badge badge-info'>".$producto_dato['stock']."</span>";
                                    }
                                    else {
                                      echo "<span class='badge badge-success'>".$producto_dato['stock']."</span>";
                                    }
                                  }
                                }
                              ?>
                            </center></td>
                            <td><center>$ <?php echo number_format($producto_dato['precio_venta'],0,',','.'); ?></center></td>      
                        </tr>
                        <?php
                      }
                      ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th><center>Numero</center></th>
                    <th><center>Codigo</center></th>
                    <th><center>Categoria</center></th>
                    <th><center>Nombre</center></th>
                    <th><center>Stock</center></th>
                    <th><center>Precio Venta</center></th>
                  </tr>
                  </tfoot>
                </table>               
                </div>
              </div>
            </div>
          </div>
    </div>
  </div>

<?php 
include("../layout/mensajes.php");
include("../layout/parte2.php"); ?>
<script>
  $(function () {
    $("#tabla_usuarios").DataTable({
      "pageLength": 25,
      "language": {
        "emptyTable": "No hay datos disponibles en la tabla",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ Productos",
        "infoEmpty": "Mostrando 0 a 0 de 0 Productos",
        "infoFiltered": "(filtrado de _MAX_ Productos totales)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrar _MENU_ Productos",
        "loadingRecords": "Cargando...",
        "search": "Buscar:",
        "zeroRecords": "No se encontraron resultados",
          "paginate": {
              "first": "Primero",
              "last": "Último",
              "next": "Siguiente",
              "previous": "Anterior"
            },
            "buttons": {
              "copy": "Copiar",
              "csv": "CSV",
              "excel": "Excel",
              "pdf": "PDF",
              "print": "Imprimir",
              "colvis": "Visibilidad de columnas"
            } 
      },
      "responsive": true, "lengthChange": true, "autoWidth": false,
      "buttons": [ "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#tabla_usuarios_wrapper .col-md-6:eq(0)');
  });
</script>
<?php
}
