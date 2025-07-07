<?php include 'index.php'; ?>

<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">inicio</li>
                <li class="breadcrumb-item active"><a href="#">agregar area</a></li>
            </ol>
        </div>

        <div class="col-12 d-flex justify-content-center">
            <div class="card container mt-4">
                <div class="card-header">
                    <h4 class="card-title">agregar nueva area</h4>
                </div>
                <div class="card-bdy">
                    <div class="basic-form">
                        <form action="" method="post">
                            <div class="row">
                                <div class="mb-3">
                                    <label class="form-label">nombre del area</label>
                                    <input type="text" name="area" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3">
                                    <label class="form-label">nose que ptra poner</label>
                                    <input type="text" name="area" class="form-control">
                                </div>
                            </div>

                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn me-2 btn-primary">Guardar</button>
                                <a href="tabla_area.php" class="btn btn-primary">Cancelar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>