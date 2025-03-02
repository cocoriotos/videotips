<!-- Developed by Julián González Bucheli -->
<html>
<?php

include "headermgmt.php";
include "db_connection1.php";
?>

<head>
    <script src="head.js" defer></script>
    <script src="Linktoclipboard.js" defer></script>
    <link rel="icon" href="SSCircleBackgroundWhite.ico" type="image/x-icon">
    <link rel="stylesheet" href="style_sheet_ops.css" />
    <script src="Popper/popper.min.js"></script>
    <script src="plugins/sweetalert/sweetalert.min.js"></script>
    <script src="plugins/alertifyjs/alertify.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/alertify.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/alertify.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/themes/default.min.css" />
</head>

<body id="bodyadminmodule" style="padding: 0%;">
    <div class="container-fluid">
        <!-- Barra de navegación -->
        <nav class="navbar">
            <a class="navbar-brand" href="#">Administración de Usuarios y Suscripciones</a>
            <div>
                <button class="btn btn-primary" onclick="location.href='#'">Operaciones</button>
                <button class="btn btn-primary" onclick="location.href='#'">Administración</button>
                <button class="btn btn-primary" onclick="location.href='#'">Reportes y Estadísticas</button>
            </div>
        </nav>

        <!-- Módulo de Operaciones -->
        <div class="card">
            <label class="col-form-label">Operaciones</label>
            <div class="grid-container">
                <div class="grid-item">
                    <div class="grid-item-content">
                        <div class="grid-item-header">
                            <div class="grid-item-title">Listado de Suscripciones Totales</div>
                        </div>
                        <div class="grid-item-body">
                            <p class="p-title">Total Suscripciones:</p>
                            <p class="p-content">500</p>
                            <a href="#" class="btn-primary">Ver Detalles</a>
                        </div>
                    </div>
                </div>
                <div class="grid-item">
                    <div class="grid-item-content">
                        <div class="grid-item-header">
                            <div class="grid-item-title">Suscripciones por Usuario</div>
                        </div>
                        <div class="grid-item-body">
                            <p class="p-title">Usuarios Activos:</p>
                            <p class="p-content">300</p>
                            <a href="#" class="btn-primary">Ver Detalles</a>
                        </div>
                    </div>
                </div>
                <div class="grid-item">
                    <div class="grid-item-content">
                        <div class="grid-item-header">
                            <div class="grid-item-title">Habilitación de Acceso</div>
                        </div>
                        <div class="grid-item-body">
                            <p class="p-title">Accesos Pendientes:</p>
                            <p class="p-content">50</p>
                            <a href="#" class="btn-primary">Ver Detalles</a>
                        </div>
                    </div>
                </div>
                <div class="grid-item">
                    <div class="grid-item-content">
                        <div class="grid-item-header">
                            <div class="grid-item-title">Suscripciones por Vencer</div>
                        </div>
                        <div class="grid-item-body">
                            <p class="p-title">Suscripciones:</p>
                            <p class="p-content">20</p>
                            <a href="#" class="btn-primary">Ver Detalles</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Módulo de Administración -->
        <div class="card">
            <label class="col-form-label">Administración</label>
            <div class="grid-container">
                <div class="grid-item">
                    <div class="grid-item-content">
                        <div class="grid-item-header">
                            <div class="grid-item-title">Visitas de Usuarios</div>
                        </div>
                        <div class="grid-item-body">
                            <p class="p-title">Visitas Hoy:</p>
                            <p class="p-content">120</p>
                            <a href="#" class="btn-primary">Ver Detalles</a>
                        </div>
                    </div>
                </div>
                <div class="grid-item">
                    <div class="grid-item-content">
                        <div class="grid-item-header">
                            <div class="grid-item-title">Envío de Correos Masivos</div>
                        </div>
                        <div class="grid-item-body">
                            <p class="p-title">Plantilla de Correo:</p>
                            <p class="p-content">Promoción Especial</p>
                            <a href="#" class="btn-primary">Enviar Correo</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Módulo de Reportes y Estadísticas -->
        <div class="card">
            <label class="col-form-label">Reportes y Estadísticas</label>
            <div class="grid-container">
                <div class="grid-item">
                    <div class="grid-item-content">
                        <div class="grid-item-header">
                            <div class="grid-item-title">Reporte de Suscripciones</div>
                        </div>
                        <div class="grid-item-body">
                            <p class="p-title">Total Suscripciones:</p>
                            <p class="p-content">500</p>
                            <a href="#" class="btn-primary">Generar Reporte</a>
                        </div>
                    </div>
                </div>
                <div class="grid-item">
                    <div class="grid-item-content">
                        <div class="grid-item-header">
                            <div class="grid-item-title">Estadísticas de Visitas</div>
                        </div>
                        <div class="grid-item-body">
                            <p class="p-title">Visitas Totales:</p>
                            <p class="p-content">10,000</p>
                            <a href="#" class="btn-primary">Ver Estadísticas</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
