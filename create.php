<?php
include("../app/config.php");
include("../layout/sesion.php");
include("../layout/parte1.php");
include("../app/controllers/almacen/listado_de_productos.php");
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-8">
            <h1 class="m-0">REGISTRO DE PRODUCTOS</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="card card-primary card-primary">
                <div class="card-header">
                  <h3 class="card-title">Creacion de producto</h3>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body" style="display: block;">
                  <div class="row">
                    <div class="col-md-12">
                      <form action="../app/controllers/almacen/create.php" method="post">
                        <div class="row">
                          <div class="col-md-4">
                            <div class="form_group">
                                <label for="">Codigo del producto</label>
                                <?php
                                function ceros($numero) {
                                    $len=0;
                                    $cantidad_ceros=5;
                                    $aux = $numero;
                                    $pos=strlen($numero);
                                    $len = $cantidad_ceros - $pos;
                                    for ($i=0; $i<$len; $i++) {
                                        $aux = "0".$aux;
                                    }
                                    return $aux;
                                }
                                $contador_id=1;
                                foreach ($productos_datos as $producto_dato) {
                                    $contador_id++;
                                }
                                ?>
                                <input type="text" class="form-control" value="<?php echo "INTE-".ceros($contador_id); ?>" disabled required>
                                <input type="text" name="codigo" value="<?php echo "INTE-".ceros($contador_id); ?>" hidden required>
                              </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form_group">
                                <label for="">Nombre del producto:</label>
                                <input type="text" class="form-control" name="nombre" placeholder="Ingrese el nombre del producto" required>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form_group">
                                <label for="">Descripcion del producto:</label>
                                <input type="text"  class="form-control" name="descripcion" placeholder="Ingrese la descripcion del producto" >
                            </div>
                          </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form_group">
                                    <label for="">Stock del producto:</label>
                                    <input type="number" class="form-control" name="stock" placeholder="Ingrese stock del producto" required>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form_group">
                                    <label for="">Stock del producto minimo:</label>
                                    <input type="number" class="form-control" name="stock_minimo" placeholder="Ingrese stock minimo del producto" required>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form_group">
                                    <label for="">Stock del producto maximo:</label>
                                    <input type="number" class="form-control" name="stock_maximo" placeholder="Ingrese stock maximo del producto" required>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form_group">
                                    <label for="">Precio de compra:</label>
                                    <input type="number" class="form-control" name="precio_compra" placeholder="Ingrese precio de compra del producto" required>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form_group">
                                    <label for="">Precio de venta:</label>
                                    <input type="number" class="form-control" name="precio_venta" placeholder="Ingrese precio de venta del producto" required>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form_group">
                                    <label for="">Fecha creacion:</label>
                                    <input type="date" class="form-control" name="fecha_creacion" value="<?php echo date('Y-m-d'); ?>" placeholder="Ingrese la fecha de creacion del producto" required>
                                </div>
                            </div>
                        </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form_group">
                                        <label for="">Categoria del producto:</label>
                                          <div style="display: flex;">
                                            <select name="id_categoria" id="" class="form-control" required>
                                                <?php
                                                $sentencia = $pdo->prepare("SELECT * FROM tb_categoria");
                                                $sentencia->execute();
                                                $lista_categorias = $sentencia->fetchAll(PDO::FETCH_ASSOC);
                                                foreach ($lista_categorias as $categoria) {
                                                    ?>
                                                    <option value="<?php echo $categoria['id_categoria']; ?>"><?php echo $categoria['nombre_categoria']; ?></option>
                                                    <?php
                                                }
                                                    ?>
                                            </select>
                                            <a href="<?php echo $URL; ?>/categoria/index.php" class="btn btn-primary"><i class="fa fa-plus"></i></a>
                                          </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form_group">
                                        <label for="">Usuario:</label>
                                        <input type="text" class="form-control" name="usuario" value="<?php echo $email_sesion; ?>" disabled required>
                                        <input type="text" class="form-control" name="id_usuario" value="<?php echo $id_usuario_sesion; ?>" hidden required>
                                      </div>
                                </div>
                            </div>
                        <hr>
                        <div class="form-group">
                          <a href="<?php echo $URL; ?>" class="btn btn-danger">Cancelar</a>
                          <button type="submit" class="btn btn-primary">Registrar</button>
                        </div>
                      </form>
                    </div>
                  </div>  
                </div>
              </div>
      </div><!-- /.container-fluid -->
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
<?php include("../layout/mensajes.php");?> 
<?php include("../layout/parte2.php"); ?>
 
